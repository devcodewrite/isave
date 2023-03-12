<?php
defined('BASEPATH') or exit('No direct script allowed');

class Loans extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/loans/list');
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $loan =  $this->loan->updateSettlementStatus($id);

        if(!$loan) show_404();

        $gate = auth()->can('view','loan');
        if($gate->denied()){
           show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $loan->account = $this->account->find($loan->account_id);
        $loan->owner = $loan->account->ownership==='individual'
                ?$this->member->find($loan->account->member_id)
                :$this->association->find($loan->account->association_id);
        $loan->totalPaid = $this->payment->sum(['loan_id'=>$id])->row('total');
        $loan->totalBalance = $this->loan->sum(['id'=>$id])->row('total')-$loan->totalPaid;
        $loan->principalBalance = $this->loan->sum(['id'=>$id], 'principal_amount')->row('total')-$this->payment->sum(['loan_id'=>$id], 'principal_amount')->row('total');
        $loan->interestBalance = $this->loan->sum(['id'=>$id], 'interest_amount')->row('total')-$this->payment->sum(['loan_id'=>$id], 'interest_amount')->row('total');
        
        $data = [
            'loan' => $loan,
        ];

        $this->load->view('pages/loans/detail', $data);
    }
    /**
     * Show a resource
     * html view
     */
    public function print(int $id = null)
    {
         $loan = $this->loan->find($id);

        if(!$loan) show_404();

        $gate = auth()->can('view','loan');
        if($gate->denied()){
           show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $loan->account = $this->account->find($loan->account_id);
        $loan->owner = $loan->account->ownership==='individual'
                ?$this->member->find($loan->account->member_id)
                :$this->association->find($loan->account->association_id);
        $data = [
            'loan' => $loan,
        ];
        $this->load->view('pages/loans/loan_letter', $data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function disbursements()
    {
        $gate = auth()->can('disburse','loan');
        if($gate->denied()){
           show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $this->load->view('pages/loans/disbursements');
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function defaults()
    {
        $gate = auth()->can('view','loan');
        if($gate->denied()){
           show_error($gate->message, 401, 'An Unathorized Access!');
        }

        foreach($this->loan->where(['appl_status'=>'disbursed'])->result() as $row) {
            $this->loan->updateSettlementStatus($row->id);
        }
        
        $loans = $this->loan->all()
                ->where('setl_status', 'defaulted')
                ->where('appl_status', 'disbursed')
                ->get()
                ->result();
        $data = [
            'loans' => $loans,
        ];
        $this->load->view('pages/loans/defaults', $data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function in_arrears()
    {
        $gate = auth()->can('view','loan');
        if($gate->denied()){
           show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $loans = $this->loan->all()
                ->where('appl_status', 'disbursed')
                ->where('arrears_days >', 0)
                ->get()
                ->result();
        $data = [
            'loans' => $loans,
        ];
        $this->load->view('pages/loans/in_arrears', $data);
    }
    /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $gate = auth()->can('create','loan');
        if($gate->denied()){
           show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $data = [
        ];
        $this->load->view('pages/loans/edit', $data);
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $loan = $this->loan->find($id);
        if (!$loan) show_404();

        $gate = auth()->can('update','loan');
        if($gate->denied()){
           show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $loan->account = $this->account->find($loan->account_id);

        $data = [
            'loan' => $loan
        ];
        $this->load->view('pages/loans/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();
        $loan  = $this->loan->create($record);

        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($loan) {
            $out = [
                'data' => $loan,
                'input' => $this->input->post(),
                'status' => true,
                'message' => 'Customer loan created successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error?$error:"Customer loan couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }

     /**
     * Store a resource
     * print json Response
     */
    public function repayment()
    {
        $record = $this->input->post();
        $repayment  = $this->payment->create($record);
        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($repayment) {
            $out = [
                'data' => $repayment,
                'input' => $this->input->post(),
                'status' => true,
                'message' => 'Repayment made successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error?$error:"Data couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }

    /**
     * Update a resource
     * print json Response
     */
    public function update(int $id = null)
    {
        $record = $this->input->post();
        $loan = $this->loan->update($id, $record);
        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');
        if ($loan) {
            $this->loan->updateSettlementStatus($id);
            $out = [
                'data' => $loan,
                'status' => true,
                'input' => $this->input->post(),
                'message' => 'Loan data updated successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error?$error:"Loan data couldn't be update!"
            ];
        }
        httpResponseJson($out);
    }

    /**
     * Delete a resource
     * print json Response
     */
    public function delete(int $id = null)
    {
    
        if ($this->loan->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'Loan data deleted successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Loan data couldn't be deleted!"
            ];
        }
        httpResponseJson($out);
    }

    public function datatables()
    {
        $start = $this->input->get('start', true);
        $length = $this->input->get('length', true);
        $draw = $this->input->get('draw', true);
        $inputs = $this->input->get();
        $query = $this->loan->all();

        $where = [];

        if($this->input->get('account_id'))
            $where = array_merge($where, ['loans.account_id' => $inputs['account_id']]);

        if($this->input->get('association_id'))
            $where = array_merge($where, ['accounts.association_id' => $inputs['association_id']]);

        if($this->input->get('appl_status'))
            $where = array_merge($where, ['loans.appl_status' => $inputs['appl_status']]);


        $query->where($where);

        $out = datatable($query, $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }

    public function select2()
    {
    }
}

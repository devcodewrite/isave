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
        $data = [
            'loan' =>null, //This is an example replace with actual model
        ];
        $this->load->view('pages/loans/detail', $data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function payouts()
    {
        $this->load->view('pages/loans/payout');
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $data = [
            'loanTypes' => $this->loantype->all()->get()->result(),
        ];
        $this->load->view('pages/loans/edit', $data);
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $data = [
            'loanTypes' => $this->loantype->all()->get()->result(),
        ];
        $this->load->view('pages/loans/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        $record = $this->input->post();
        $loan  = $this->loan->create($record);
       if($loan){
           $out = [
               'data' => $loan,
               'input' => $this->input->post(),
               'status' => true,
               'message' => 'Customer loan created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Customer loan couldn't be created!"
           ];
       }
       httpResponseJson($out);
    }

    /**
     * Update a resource
     * print json Response
     */
    public function update (int $id = null)
    {
        $record = $this->input->post();
        $loan = $this->loan->update($id, $record);
        if($loan){
            $out = [
                'data' => $loan,
                'status' => true,
                'input' => $this->input->post(),
                'message' => 'Loan data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Loan data couldn't be update!"
            ];
        }
        httpResponseJson($out);
    }

    /**
     * Delete a resource
     * print json Response
     */
    public function delete (int $id = null)
    {
        if($this->loan->delete($id)){
            $out = [
                'status' => true,
                'message' => 'Loan data deleted successfully!'
            ];
        }
        else {
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

        $out = datatable($this->loan->all(),$start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }

    public function select2()
    {
        
    }
}
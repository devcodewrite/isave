<?php
defined('BASEPATH') or exit('No direct script allowed');

class Deposits extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/deposits/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $deposit = $this->deposit->find($id);
        if(!$deposit) show_404();

        $deposit->account = $this->account->find($deposit->account_id);

        $data = [
            'deposit' => $deposit,
        ];
        $this->load->view('pages/deposits/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/deposits/edit');
    }
    /**
     * Show a form page for creating resource
     * html view
     */
    public function mass_create()
    {
        $this->load->view('pages/deposits/mass-deposit');
    }


     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $deposit = $this->deposit->find($id);
        if(!$deposit) show_404();
        
        $deposit->account = $this->account->find($deposit->account_id);
        $data = [
            'deposit' => $deposit,
        ];
        $this->load->view('pages/deposits/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        $record = $this->input->post();
        $deposit = $this->deposit->create($record);

       if($deposit){
           $out = [
               'data' => $deposit,
               'input' => $record,
               'status' => true,
               'message' => 'Customer deposit created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Customer deposit couldn't be created!"
           ];
       }
       httpResponseJson($out);
    }

     /**
     * Store a resources
     * print json Response
     */
    public function stores ()
    {
        $records = $this->input->post();
       if($this->deposit->createAll($records)){
           $out = [
               'status' => true,
               'input' =>$records,
               'message' => 'Mass deposit created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Mass deposit couldn't be created!"
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
        $deposit = $this->deposit->update($id, $record);

        if($deposit){
            $out = [
                'data' => $deposit,
                'status' => true,
                'message' => 'Deposit data deleted successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Deposit data couldn't be deleted!"
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
        if($this->deposit->delete($id)){
            $out = [
                'status' => true,
                'message' => 'Deposit data deleted successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Deposit data couldn't be deleted!"
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

        $out = datatable($this->deposit->all(), $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }
   
}
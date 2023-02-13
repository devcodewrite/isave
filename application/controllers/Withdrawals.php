<?php
defined('BASEPATH') or exit('No direct script allowed');

class Withdrawals extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/withdrawals/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $withdrawal = $this->withdrawal->find($id);
        $withdrawal->account = $this->account->find($withdrawal->account_id);
        if(!$withdrawal) show_404();
        $data = [
            'withdrawal' =>$withdrawal,
        ];
        $this->load->view('pages/withdrawals/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/withdrawals/edit');
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    { 
        $withdrawal = $this->withdrawal->find($id);

        if(!$withdrawal) show_404();
        $data = [
            'withdrawal' =>$withdrawal,
        ];
        $this->load->view('pages/withdrawals/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        $record = $this->input->post();
        $withdrawal  = $this->withdrawal->create($record);

       if($withdrawal){
           $out = [
               'data' => $withdrawal,
               'input' => $record,
               'status' => true,
               'message' => 'Withdrawal created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Withdrawal couldn't be created!"
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
        $withdrawal  = $this->withdrawal->update($id, $record);

        if($withdrawal){
            $out = [
                'data' => $withdrawal,
                'input' => $record,
                'status' => true,
                'message' => 'Withdrawal data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Withdrawal data couldn't be updated!"
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
    
        $withdrawal =null;
        if($withdrawal){
            $out = [
                'status' => true,
                'message' => 'Withdrawal data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Withdrawal data couldn't be updated!"
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

        $out = datatable($this->withdrawal->all(), $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }
}
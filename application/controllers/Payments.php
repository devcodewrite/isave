<?php
defined('BASEPATH') or exit('No direct script allowed');

class Payments extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/payments/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $data = [
            'payment' => null, //This is an example replace with actual model
        ];
        $this->load->view('pages/payments/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/payments/edit');
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $data = [
            'payment' => null, //This is an example replace with actual model
        ];
        $this->load->view('pages/payments/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        $record = $this->input->post();
        $repayment  = $this->payment->create($record);
        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($repayment) {
            $out = [
                'data' => $repayment,
                'input' => $record,
                'status' => true,
                'message' => 'Repayment made successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error?$error:"Data couldn't be processed!"
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
        $loan_payment  = $this->payment->update($id, $record);
        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if($loan_payment){
            $out = [
                'data' => $loan_payment,
                'input' => $record,
                'status' => true,
                'message' => 'Loan payment data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => $error?$error:"Loan payment data couldn't be update!"
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
        if($this->payment->delete($id)){
            $out = [
                'status' => true,
                'message' => 'Loan repayment deleted successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Loan repayment couldn't be deleted!"
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
        $query = $this->payment->all();

        if($this->input->get('loan_id')){
            $query->where(['loan_id' => $inputs['loan_id']]);
        }
        
        $out = datatable($query, $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }
}
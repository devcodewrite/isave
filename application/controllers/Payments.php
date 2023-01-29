<?php
defined('BASEPATH') or exit('No direct script allowed');

class Payments extends CI_Controller
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
        $table = "loan_payments";
        $column = "id";
        $data = [
            'payment' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
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
        $table = "loan_payments";
        $column = "id";
        $data = [
            'payment' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/payments/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function list ()
    {
        # code...
       $payment  = $this->common->get_loan_payments_data(); // replace created record object
       if($payment){
           $out = [
               'data' => $payment,
               'status' => true,
               'message' => 'Customer loan payment created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Customer loan payment couldn't be created!"
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
        $data = array();
        $table="loan_payments";
        $column = "id";
        $loan_payment = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($loan_payment){
            $out = [
                'status' => true,
                'message' => 'Loan payment data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Loan payment data couldn't be update!"
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
        $data = array();
        $table="loan_payments";
        $column = "id";
        $loan_payment = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($loan_payment){
            $out = [
                'status' => true,
                'message' => 'Loan payment data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Loan payment data couldn't be update!"
            ];
        }
        httpResponseJson($out);
    }
    public function insert ()
    {
        $data = array();
        $table="loan_payments";
        $loan  = $this->common->insert_data($table,$data); // replace created record object
        if($loan){
            $out = [
                'status' => true,
                'message' => 'Loan payment data created successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Loan payment data couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }
}
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
    public function list ()
    {
       # code...
       $loan  = $this->common->get_loans_data(); // replace created record object
       if($loan){
           $out = [
               'data' => $loan,
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
        $data = array();
        $table="loans";
        $column = "id";
        $loan = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($loan){
            $out = [
                'status' => true,
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
        $data = array();
        $table="loans";
        $column = "id";
        $loan = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($loan){
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
    public function insert ()
    {
        $data = array();
        $table="loans";
        $loan  = $this->common->insert_data($table,$data); // replace created record object
        if($loan){
            $out = [
                'status' => true,
                'message' => 'Loan data created successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Loan data couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }
}
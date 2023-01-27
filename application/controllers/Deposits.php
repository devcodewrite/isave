<?php
defined('BASEPATH') or exit('No direct script allowed');

class Deposits extends CI_Controller
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
        $data = [
            //'deposit' => $this->deposit_model->getById($id), //This is an example replace with actual model
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
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $table = "deposits";
        $column = "id";
        $data = [
            'deposit' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/deposits/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function list ()
    {
        # code...
       $deposit  = $this->common->get_deposits_data(); // replace created record object
       if($deposit){
           $out = [
               'data' => $deposit,
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
     * Update a resource
     * print json Response
     */
    public function update (int $id = null)
    {
        $data = array();
        $table="deposits";
        $column = "id";
        $deposit = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($deposit){
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

    /**
     * Delete a resource
     * print json Response
     */
    public function delete (int $id = null)
    {
        $data = array();
        $table="deposits";
        $column = "id";
        $deposit = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($deposit){
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
    public function insert ()
    {
        $data = array();
        $table="deposits";
        $deposit  = $this->common->insert_data($table,$data); // replace created record object
        if($deposit){
            $out = [
                'status' => true,
                'message' => 'Deposit data created successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Deposit data couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }
}
<?php
defined('BASEPATH') or exit('No direct script allowed');

class Withdrawals extends CI_Controller
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
        $table = "withdrawals";
        $column = "id";
        $data = [
            'withdrawal' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/withdrawals/details', $data);
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
        $table = "withdrawals";
        $column = "id";
        $data = [
            'withdrawal' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/withdrawals/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
          # code...
       $withdrawal  = $this->common->get_withdrawals_data(); // replace created record object
       if($withdrawal){
           $out = [
               'data' => $withdrawal,
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
        $data = array();
        $table="withdrawals";
        $column = "id";
        $withdrawal = $this->common->update_data($id,$data,$table,$column); // replace created record object
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

    /**
     * Delete a resource
     * print json Response
     */
    public function delete (int $id = null)
    {
        $data = array();
        $table="withdrawals";
        $column = "id";
        $withdrawal = $this->common->update_data($id,$data,$table,$column); // replace created record object
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
    public function insert ()
    {
        $data = array();
        $table="withdrawals";
        $withdrawal  = $this->common->insert_data($table,$data); // replace created record object
        if($withdrawal){
            $out = [
                'status' => true,
                'message' => 'Withdrawal data created successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Withdrawal data couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }
}
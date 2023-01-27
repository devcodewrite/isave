<?php
defined('BASEPATH') or exit('No direct script allowed');

class Customers extends CI_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/customers/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $table = "members";
        $column = "id";
        $data = [
            'customer' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/customers/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/customers/edit');
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $table = "members";
        $column = "id";
        $data = [
            'customer' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/customers/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function list ()
    {
        # code...
       $customer  = $this->common->get_members_data(); // replace created record object
        if($customer){
            $out = [
                'data' => $customer,
                'status' => true,
                'message' => 'Customer created successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Customer couldn't be created!"
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
        $table="members";
        $column = "id";
        $customer  = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($customer){
            $out = [
                'status' => true,
                'message' => 'Customer data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Customer data couldn't be updated!"
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
        $table="members";
        $column = "id";
        $customer  = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($customer){
            $out = [
                'status' => true,
                'message' => 'Customer data deleted successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Customer data couldn't be deleted!"
            ];
        }
        httpResponseJson($out);
    }
    public function insert ()
    {
        $data = array();
        $table="members";
        $customer  = $this->common->insert_data($table,$data); // replace created record object
        if($customer){
            $out = [
                'status' => true,
                'message' => 'Customer data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Customer data couldn't be updated!"
            ];
        }
        httpResponseJson($out);
    }
}
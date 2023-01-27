<?php
defined('BASEPATH') or exit('No direct script allowed');

class Users extends CI_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/users/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $table = "users";
        $column = "id";
        $data = [
            'user' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/users/details', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/users/edit');
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $table = "users";
        $column = "id";
        $data = [
            'user' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/users/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
         # code...
       $user  = $this->common->get_users_data(); // replace created record object
       if($user){
           $out = [
               'data' => $user,
               'status' => true,
               'message' => 'Users created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Users couldn't be created!"
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
        $table="users";
        $column = "id";
        $transfer = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($transfer){
            $out = [
                'status' => true,
                'message' => 'User data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "User data couldn't be updated!"
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
        $table="users";
        $column = "id";
        $transfer = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($transfer){
            $out = [
                'status' => true,
                'message' => 'User data deleted successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "User data couldn't be deleted!"
            ];
        }
        httpResponseJson($out);
    }
    public function list ()
    {
        $data = array();
        $table="users";
        $loan  = $this->common->insert_data($table,$data); // replace created record object
        if($loan){
            $out = [
                'status' => true,
                'message' => 'User data created successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "User data couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }
}
<?php
defined('BASEPATH') or exit('No direct script allowed');

class Associations extends CI_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/associations/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $data = [
            //'association' => $this->association_model->getById($id), //This is an example replace with actual model
        ];
        $this->load->view('pages/associations/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $row1 = (object)['community' => 'example community']; // example
        $row2 = (object)['cluster_office_address' => 'NB123, Main Street, Kumasi'];
        $data = [
            'communities' => [$row1,], // replace with a query of existing coummnunities in associations table
            'clusterOfficeAddresses' => [$row2,],  // replace with a query of existing cluter office address in associations table
        ];
        $this->load->view('pages/associations/edit', $data);
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $table = "associations";
        $column = "id";
        $data = [
            'association' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/associations/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function list ()
    {
        # code...
       $association  = $this->common->get_associations_data(); // replace created record object
       if($association){
           $out = [
               'data' => $association,
               'status' => true,
               'message' => 'Association created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Association couldn't be created!"
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
        $table="associations";
        $column = "id";
        $accounts = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($accounts){
            $out = [
                'status' => true,
                'message' => 'Association data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Association data couldn't be updated!"
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
        $table="associations";
        $column = "id";
        $accounts = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($accounts){
            $out = [
                'status' => true,
                'message' => 'Association data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Association data couldn't be updated!"
            ];
        }
        httpResponseJson($out);
    }
    public function insert ()
    {
        $data = array();
        $table="association";
        $association  = $this->common->insert_data($table,$data); // replace created record object
        if($association){
            $out = [
                'status' => true,
                'message' => 'Association data created successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Association data couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }
}
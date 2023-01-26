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
        $data = [
            //'association' => $this->association_model->getById($id), //This is an example replace with actual model
        ];
        $this->load->view('pages/associations/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        # code...
    }

    /**
     * Update a resource
     * print json Response
     */
    public function update (int $id = null)
    {
        # code...
    }

    /**
     * Delete a resource
     * print json Response
     */
    public function delete (int $id = null)
    {
        # code...
    }
}


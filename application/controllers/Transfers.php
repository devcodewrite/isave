<?php
defined('BASEPATH') or exit('No direct script allowed');

class Transfers extends CI_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/transfers/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $data = [
            //'transfer' => $this->transfer_model->getById($id), //This is an example replace with actual model
        ];
        $this->load->view('pages/transfers/details', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/transfers/edit');
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $data = [
            //'transfer' => $this->transfer_model->getById($id), //This is an example replace with actual model
        ];
        $this->load->view('pages/transfers/edit', $data);
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
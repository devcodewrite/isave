<?php
defined('BASEPATH') or exit('No direct script allowed');

class BankAccounts extends CI_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/bank-accounts/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $data = [
            //'account' => $this->account_model->getById($id), //This is an example replace with actual model
        ];
        $this->load->view('pages/bank-accounts/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/bank-accounts/edit');
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $data = [
            //'account' => $this->account_model->getById($id), //This is an example replace with actual model
        ];
        $this->load->view('pages/bank-accounts/edit', $data);
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
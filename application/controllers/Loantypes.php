<?php
defined('BASEPATH') or exit('No direct script allowed');

class Loantypes extends MY_Controller
{
     /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {

        $data = [
            'types' => $this->loantype->all()->get()->result(),
        ];
        $this->load->view('pages/setup/loantypes/list', $data);
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $type =  $this->loantype->find($id);
        if (!$type) show_404();

        $data = [
            'type' => $type,
        ];
        $this->load->view('pages/setup/loantypes/detail', $data);
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $loantype = $this->loantype->find($id);
        if (!$loantype) show_404();

        $data = [
            'type' => $loantype,
            'types' => $this->loantype->all()->get()->result(),
        ];
        $this->load->view('pages/setup/loantypes/list', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();

        $type  = $this->loantype->create($record);
        if ($type) {
            $out = [
                'data' => $type,
                'input' => $record,
                'status' => true,
                'message' => 'Account type created successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

            $out = [
                'status' => false,
                'message' => $error ? $error : "Account type couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }

    /**
     * Update a resource
     * print json Response
     */
    public function update(int $id = null)
    {
        $record = $this->input->post();
        $type  = $this->loantype->update($id, $record);
        if ($type) {
            $out = [
                'data' => $type,
                'input' => $record,
                'status' => true,
                'message' => 'Account type updated successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Account type couldn't be updated!"
            ];
        }
        httpResponseJson($out);
    }

    /**
     * Delete a resource
     * print json Response
     */
    public function delete(int $id = null)
    {
        if ($this->loantype->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'Account type deleted successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Account type couldn't be deleted!"
            ];
        }
        httpResponseJson($out);
    }
}

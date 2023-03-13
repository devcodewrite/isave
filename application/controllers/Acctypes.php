<?php
defined('BASEPATH') or exit('No direct script allowed');

class Acctypes extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {

        $data = [
            'types' => $this->acctype->all()->get()->result(),
        ];
        $gate = auth()->can('create', 'acctype');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }
        $this->load->view('pages/setup/acctypes/list', $data);
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $type =  $this->acctype->find($id);
        if (!$type) show_404();

        $gate = auth()->can('view', 'acctype');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $data = [
            'type' => $type,
        ];
        $this->load->view('pages/setup/acctypes/detail', $data);
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $acctype = $this->acctype->find($id);
        if (!$acctype) show_404();

        $gate = auth()->can('update', 'acctype');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }


        $data = [
            'type' => $acctype,
            'types' => $this->acctype->all()->get()->result(),
        ];
        $this->load->view('pages/setup/acctypes/list', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $gate = auth()->can('create', 'acctype');
        if ($gate->allowed()) {
            $record = $this->input->post();
            $type  = $this->acctype->create($record);

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
        } else {
            $out = [
                'status' => false,
                'message' => $gate->message
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
        if (!isset($record['is_investment'])) {
            $record['is_investment'] = 0;
        }

        if (!isset($record['is_loan_acc'])) {
            $record['is_loan_acc'] = 0;
            $record['lower_limit'] = null;
            $record['upper_limit'] = null;
        }

        if (!isset($record['is_default'])) {
            $record['is_default'] = 0;
        }
        $gate = auth()->can('update', 'acctype', $this->acctype->find($id));
        if ($gate->allowed()) {
            $type  = $this->acctype->update($id, $record);
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
        } else {
            $out = [
                'status' => false,
                'message' => $gate->message
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
        $gate = auth()->can('delete', 'acctype', $this->acctype->find($id));
        if ($gate->allowed()) {
            if ($this->acctype->delete($id)) {
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
        } else {
            $out = [
                'status' => false,
                'message' => $gate->message
            ];
        }
        httpResponseJson($out);
    }
}

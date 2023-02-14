<?php
defined('BASEPATH') or exit('No direct script allowed');

class Setup extends MY_Controller
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
     * Show a form page for creating resource
     * html view
     */
    public function account_types()
    {
        $input = $data = null;

        if ($this->input->get('action')) {
            $input = $this->input->get();
            if ($input['action'] === 'delete') {
                $message = "Type delete successfully!";
            } else if ($input['action'] === 'close') {
                $message = "Type closed successfully!";
            } else if ($input['action'] === 'open') {
                $message = "Type opened successfully!";
            }
        } else if ($this->input->post('id')) {
            $input = $this->input->post();
            $data = $this->acctype->update($input['id'], $input);
            $message = "Type updated successfully!";
        } else if($this->input->post()) {
            $data = $this->acctype->create($input);
        }

        if ($input && $data) {
            $out = [
                'data' => $data,
                'status' => true,
                'message' => $message
            ];
            return httpResponseJson($out);
        } else if ($input) {
            $out = [
                'status' => false,
                'message' => "Data couldn't be proccessed!"
            ];
            return httpResponseJson($out);
        }

        $this->load->view('pages/setup/account_types',$data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function id_card_types()
    {
        $this->load->view('pages/setup/account_types');
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function loan_types()
    {
        $this->load->view('pages/setup/account_types');
    }
}

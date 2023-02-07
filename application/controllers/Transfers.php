<?php
defined('BASEPATH') or exit('No direct script allowed');

class Transfers extends MY_Controller
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
            'transfer' => null, //This is an example replace with actual model
        ];
        $this->load->view('pages/transfers/detail', $data);
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
            'transfer' => null, //This is an example replace with actual model
        ];
        $this->load->view('pages/transfers/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
       $transfer  = null; // replace created record object
       if($transfer){
           $out = [
               'data' => $transfer,
               'status' => true,
               'message' => 'Transfer created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Transfer couldn't be created!"
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
        $transfer = null; // replace created record object
        if($transfer){
            $out = [
                'status' => true,
                'message' => 'Transfer data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Transfer data couldn't be update!"
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
        $transfer =null; // replace created record object
        if($transfer){
            $out = [
                'status' => true,
                'message' => 'Transfer data deleted successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Transfer data couldn't be deleted!"
            ];
        }
        httpResponseJson($out);
    }
   
    public function datatables()
    {
        $start = $this->input->get('start', true);
        $length = $this->input->get('length', true);
        $draw = $this->input->get('draw', true);
        $inputs = $this->input->get();

        $out = datatable($this->transfer->all(), $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }
}
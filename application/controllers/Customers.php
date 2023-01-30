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
        $member = $this->member->find($id);
        if(!$member) show_404();

        $data = [
            'member' => $member, //This is an example replace with actual model
        ];
        $this->load->view('pages/customers/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $data = [
            'id_card_types' => $this->idcardtype->all()->get()->result(),
            'acc_types' => $this->acctype->all()->get()->result(),
        ];
        $this->load->view('pages/customers/edit', $data);
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $data = [
            'customer' => null //This is an example replace with actual model
        ];
        $this->load->view('pages/customers/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        $record = $this->input->post();
        $member  = $this->member->create($record);
        
        if($member){
            $out = [
                'data' => $member,
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
        
            $customer = null; // replace created record object
            if ($customer) {
                $out = [
                    'status' => true,
                    'message' => 'Customer data updated successfully!'
                ];
            } else {
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
        $customer  = null; // replace created record object
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

    public function datatables()
    {
        $start = $this->input->get('start', true);
        $length = $this->input->get('length', true);
        $draw = $this->input->get('draw', true);
        $inputs = $this->input->get();

        $out = datatable($this->member->all(),$start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }

    public function select2()
    {
        
    }
}
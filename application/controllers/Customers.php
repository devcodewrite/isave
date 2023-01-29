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
        $table = "members";
        $column = "id";
        $data = [
            'customer' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model

            'id_card_types' => [], // replace [] with query of id types
            'account_types' => [], // replace [] with query of account types
        ];
        $this->load->view('pages/customers/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/customers/edit');
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $table = "members";
        $column = "id";
        $data = [
            'customer' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
        ];
        $this->load->view('pages/customers/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function list ()
    {
        # code...
       $customer  = $this->common->get_members_data(); // replace created record object
        if($customer){
            $out = [
                'data' => $customer,
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
        $data['firstname']=$this->input->post('firstname');
        $data['lastname']=$this->input->post('lastname');
        $data['othername']=$this->input->post('othername');
        $data['sex']=$this->input->post('sex');
        $data['dateofbirth']=$this->input->post('dateofbirth');
        $data['marital_status']=$this->input->post('marital_status');
        $data['primary_phone']=$this->input->post('primary_phone');
        $data['other_phone']=$this->input->post('other_phone');
        $data['email']=$this->input->post('email');
        $data['address']=$this->input->post('address');
        $data['occupation']=$this->input->post('occupation');
        $data['photo_url']=$this->input->post('photo_url');
        $data['title']=$this->input->post('title');
        $data['identity_card_number']=$this->input->post('identity_card_number');
        $data['identity_card_type_id']=$this->input->post('identity_card_type_id');
        $data['community_id']=$this->input->post('community_id');
        if(empty($data['community_id'])|| empty($data['identity_card_type_id'])|| empty($data['identity_card_number'])||empty($data['firstname'])||empty($data['lastname'])){
            $out = [
                'status' => false,
                'message' => 'These fields might be empty Firstname field, Lastname field, community filed, card type field,card number field!'
            ];
        } else {
            $table = "members";
            $column = "id";
            $customer = $this->common->update_data($id, $data, $table, $column); // replace created record object
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
        }
        httpResponseJson($out);
    }

    /**
     * Delete a resource
     * print json Response
     */
    public function delete (int $id = null)
    {
        $data = array("deleted_at"=>date("Y-m-d His"));
        $table="members";
        $column = "id";
        $customer  = $this->common->update_data($id,$data,$table,$column); // replace created record object
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
    public function insert ()
    {
        $data['firstname']=$this->input->post('firstname');
        $data['lastname']=$this->input->post('lastname');
        $data['othername']=$this->input->post('othername');
        $data['sex']=$this->input->post('sex');
        $data['dateofbirth']=$this->input->post('dateofbirth');
        $data['marital_status']=$this->input->post('marital_status');
        $data['primary_phone']=$this->input->post('primary_phone');
        $data['other_phone']=$this->input->post('other_phone');
        $data['email']=$this->input->post('email');
        $data['address']=$this->input->post('address');
        $data['occupation']=$this->input->post('occupation');
        $data['photo_url']=$this->input->post('photo_url');
        $data['title']=$this->input->post('title');
        $data['identity_card_number']=$this->input->post('identity_card_number');
        $data['identity_card_type_id']=$this->input->post('identity_card_type_id');
        $data['community_id']=$this->input->post('community_id');
        if(empty($data['community_id'])|| empty($data['identity_card_type_id'])|| empty($data['identity_card_number'])||empty($data['firstname'])||empty($data['lastname'])){
            $out = [
                'status' => false,
                'message' => 'These fields might be empty Firstname field, Lastname field, community filed, card type field,card number field!'
            ];
        }else{
            $table="members";
        $customer  = $this->common->insert_data($table,$data); // replace created record object
        $customer = $this->db->get_where($table,['id'=>$this->db->insert_id()])->row();

        if($customer){
            $out = [
                'data' => $customer,
                'status' => true,
                'message' => 'Customer data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Customer data couldn't be updated!"
            ];
        }
        }
        
        httpResponseJson($out);
    }
}
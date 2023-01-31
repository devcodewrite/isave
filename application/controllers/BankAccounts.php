<?php
defined('BASEPATH') or exit('No direct script allowed');

class BankAccounts extends MY_Controller
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
        $table = "accounts";
        $column = "id";
        $data = [
            'account' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
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
        $table = "accounts";
        $column = "id";
        $data = [
            'account' => $this->common->get_data_by_id($table,$id,$column), //This is an example replace with actual model
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
       $account  = null; // replace created record object
       if($account){
           $out = [
               'data' => $account,
               'status' => true,
               'message' => 'Account created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Account couldn't be created!"
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
        $accounts = null; // replace created record object
        if($accounts){
            $out = [
                'status' => true,
                'message' => 'Account data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Account data couldn't be updated!"
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
        $accounts = null; // replace created record object
        if($accounts){
            $out = [
                'status' => true,
                'message' => 'Account data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Account data couldn't be updated!"
            ];
        }
        httpResponseJson($out);
    }

    public function find()
    {
        $account = $this->account->where([
            'acc_number'=>$this->input->get('acc_number',true)
        ])->row(); 
        if($account){
            $account->member = $this->member->find($account->member_id);
            $account->idCardType = $this->idcardtype->find($account->member->identity_card_type_id);
            $out = [
                'data' => $account,
                'status' => true,
                'message' => 'Account found successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Couldn't find account!"
            ];
        }
        httpResponseJson($out);
    }
}
<?php
defined('BASEPATH') or exit('No direct script allowed');

class Bankaccounts extends MY_Controller
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
     * Show a list of resources
     * @return string html view
     */
    public function passbooks()
    {
        $this->load->view('pages/bank-accounts/passbooks');
    }


     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $account =  $this->account->find($id);
        if(!$account) show_404();

        $account->balance = $this->account->calBalance($id);
        $data = [
            'account' => $account,
            'member' => $this->member->find($account->member_id),
        ];
        $this->load->view('pages/bank-accounts/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $data = [
            'id_card_types' => $this->idcardtype->all()->get()->result(),
            'accountTypes' => $this->acctype->all()->get()->result(),
        ];

        $this->load->view('pages/bank-accounts/edit', $data);
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $data = [
            'id_card_types' => $this->idcardtype->all()->get()->result(),
            'accountTypes' => $this->acctype->all()->get()->result(),
            'account' => $this->account->find($id),
        ];
        $this->load->view('pages/bank-accounts/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        $record = $this->input->post();

       $account  = $this->account->create($record);
       if($account){
           $out = [
               'data' => $account,
               'input' => $record,
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
        $record = $this->input->post();
        $account  = $this->account->update($id, $record);
        if($account){
            $out = [
                'data' => $account,
                'input' => $record,
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
        if($this->account->delete($id)){
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
            $account->balance = $this->account->calBalance($account->id);
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

    public function datatables()
    {
        $start = $this->input->get('start', true);
        $length = $this->input->get('length', true);
        $draw = $this->input->get('draw', true);
        $inputs = $this->input->get();

        $out = datatable($this->account->all(),$start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }

    public function passbook_datatables()
    {
        $start = $this->input->get('start', true);
        $length = $this->input->get('length', true);
        $draw = $this->input->get('draw', true);
        $inputs = $this->input->get();

        $out = datatable($this->account->passbooks(),$start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }

    public function select2()
    {
        
    }
}
<?php
defined('BASEPATH') or exit('No direct script allowed');

class Withdrawals extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $data = $this->input->get();
        $data = array_merge($data, [
            'accountTypes' => $this->acctype->all()->get()->result(),
        ]);
        $this->load->view('pages/withdrawals/list', $data);
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $withdrawal = $this->withdrawal->find($id);
        if (!$withdrawal) show_404();
        $withdrawal->account = $this->account->find($withdrawal->account_id);

        $data = [
            'withdrawal' => $withdrawal,
        ];
        $this->load->view('pages/withdrawals/detail', $data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/withdrawals/edit');
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $withdrawal = $this->withdrawal->find($id);
        if (!$withdrawal) show_404();

        $withdrawal->account = $this->account->find($withdrawal->account_id);
        $withdrawal->account->accType = $this->acctype->find($withdrawal->account->acc_type_id);
        $data = [
            'withdrawal' => $withdrawal,
        ];
        $this->load->view('pages/withdrawals/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();
        $withdrawal  = $this->withdrawal->create($record);

        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($withdrawal) {
            $out = [
                'data' => $withdrawal,
                'input' => $record,
                'status' => true,
                'message' => 'Withdrawal made successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error ? $error : "Withdrawal couldn't be created!"
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
        $withdrawal  = $this->withdrawal->update($id, $record);
        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($withdrawal) {
            $out = [
                'data' => $withdrawal,
                'input' => $record,
                'status' => true,
                'message' => 'Withdrawal data updated successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error ? $error : "Withdrawal couldn't be created!"
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

        $withdrawal = null;
        if ($withdrawal) {
            $out = [
                'status' => true,
                'message' => 'Withdrawal deleted successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Withdrawal couldn't be deleted!"
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
        $query = $this->withdrawal->all();
        $where = [];
        if ($this->input->get('account_id'))
            $where = array_merge($where, ['withdrawals.account_id' => $inputs['account_id']]);

        if ($this->input->get('association_id'))
            $where = array_merge($where, ['association_members.association_id' => $inputs['association_id']]);

        if ($this->input->get('member_id'))
            $where = array_merge($where, ['association_members.member_id' => $inputs['member_id']]);

        if ($this->input->get('type'))
            $where = array_merge($where, ['deposits.type' => $inputs['type']]);

        if ($this->input->get('ownership'))
            $where = array_merge($where, ['accounts.ownership' => $inputs['ownership']]);

        if ($this->input->get('acc_type_id'))
            $where = array_merge($where, ['accounts.acc_type_id' => $inputs['acc_type_id']]);

        $query->where($where);

        $out = datatable($query, $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }
}

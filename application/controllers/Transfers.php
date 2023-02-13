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
        $transfer = $this->transfer->find($id);
        if (!$transfer) show_404();

        $transfer->fromAccount = $this->account->find($transfer->from_account_id);
        $transfer->toAccount = $this->account->find($transfer->to_account_id);
        $transfer->fromAssociation = $this->association->find($transfer->from_association_id);
        $transfer->toAssociation = $this->association->find($transfer->to_association_id);

        $data = [
            'transfer' => $transfer,
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
        $transfer = $this->transfer->find($id);
        if (!$transfer) show_404();
        $data = [
            'transfer' => $transfer,
        ];
        $this->load->view('pages/transfers/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();
        $transfer  = $this->transfer->create($record);

        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($transfer) {
            $out = [
                'data' => $transfer,
                'input' => $record,
                'status' => true,
                'message' => 'Transfer created successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error?$error:"Transfer couldn't be created!"
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
        $transfer  = $this->transfer->update($id, $record);

        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($transfer) {
            $out = [
                'data' => $transfer,
                'input' => $record,
                'status' => true,
                'message' => 'Transfer data updated successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error?$error:"Transfer data couldn't be update! "
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
        if ($this->transfer->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'Transfer data deleted successfully!'
            ];
        } else {
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
        $query = $this->transfer->all();
        $where = [];
        if ($this->input->get('account_id'))
            $where = array_merge($where, ['transfers.from_account_id' => $inputs['account_id']]);

        $query->where($where);

        $out = datatable($query, $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }
}

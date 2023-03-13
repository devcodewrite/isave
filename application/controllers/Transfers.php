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
        $gate = auth()->can('viewAny', 'transfer');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }
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

        $gate = auth()->can('view', 'transfer');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }

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
        $gate = auth()->can('create', 'transfer');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }
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

        $gate = auth()->can('update', 'transfer');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }
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
        $gate = auth()->can('create', 'transfer');
        if ($gate->allowed()) {
            $record = $this->input->post();
            $transfer  = $this->transfer->create($record);

            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

            if ($transfer) {
                $out = [
                    'data' => $transfer,
                    'input' => $record,
                    'status' => true,
                    'message' => 'Transfer made successfully!'
                ];
            } else {
                $out = [
                    'status' => false,
                    'message' => $error ? $error : "Transfer couldn't be created!"
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
        $gate = auth()->can('update', 'transfer', $this->transer->find($id));
        if ($gate->allowed()) {
            $record = $this->input->post();
            $transfer  = $this->transfer->update($id, $record);

            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

            if ($transfer) {
                $out = [
                    'data' => $transfer,
                    'input' => $record,
                    'status' => true,
                    'message' => 'Transfer updated successfully!'
                ];
            } else {
                $out = [
                    'status' => false,
                    'message' => $error ? $error : "Transfer couldn't be update! "
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
        $gate = auth()->can('delete', 'transfer', $this->transer->find($id));
        if ($gate->allowed()) {
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
        } else {
            $out = [
                'status' => false,
                'message' => $gate->message
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

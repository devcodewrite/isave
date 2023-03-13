<?php
defined('BASEPATH') or exit('No direct script allowed');

class Deposits extends MY_Controller
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

        $this->load->view('pages/deposits/list', $data);
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $deposit = $this->deposit->find($id);
        if (!$deposit) show_404();

        $gate = auth()->can('view', 'deposit');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $deposit->account = $this->account->find($deposit->account_id);

        $data = [
            'deposit' => $deposit,
        ];
        $this->load->view('pages/deposits/detail', $data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $gate = auth()->can('create', 'deposit');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $this->load->view('pages/deposits/edit');
    }
    /**
     * Show a form page for creating resource
     * html view
     */
    public function mass_create()
    {
        $gate = auth()->can('create', 'deposit');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $this->load->view('pages/deposits/mass-deposit');
    }


    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $deposit = $this->deposit->find($id);
        if (!$deposit) show_404();
        $gate = auth()->can('update', 'deposit');
        if ($gate->denied()) {
            show_error($gate->message, 401, 'An Unathorized Access!');
        }

        $deposit->account = $this->account->find($deposit->account_id);
        $deposit->account->accType = $this->acctype->find($deposit->account->acc_type_id);
        $data = [
            'deposit' => $deposit,
        ];
        $this->load->view('pages/deposits/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();
        $deposit = $this->deposit->create($record);

        if ($deposit) {
            $out = [
                'data' => $deposit,
                'input' => $record,
                'status' => true,
                'message' => 'Deposit made successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

            $out = [
                'status' => false,
                'message' => $error ? $error : "Deposit couldn't be created!"
            ];
        }
        httpResponseJson($out);
    }

    /**
     * Store a resources
     * print json Response
     */
    public function stores()
    {
        $records = $this->input->post();

        if ($this->deposit->createAll($records)) {
            $out = [
                'status' => true,
                'input' => $records,
                'message' => 'Mass deposit created successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');
            $out = [
                'status' => false,
                'message' => $error ? $error : "Mass deposit couldn't be created!"
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
        $gate = auth()->can('update', 'deposit', $this->deposit->find($id));
        if ($gate->allowed()) {
            $record = $this->input->post();
            $deposit = $this->deposit->update($id, $record);
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

            if ($deposit) {
                $out = [
                    'data' => $deposit,
                    'status' => true,
                    'message' => 'Deposit updated successfully!'
                ];
            } else {
                $out = [
                    'status' => false,
                    'message' => $error ? $error : "Deposit data couldn't be updated!"
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
        $gate = auth()->can('delete', 'deposit', $this->deposit->find($id));
        if ($gate->allowed()) {
            if ($this->deposit->delete($id)) {
                $out = [
                    'status' => true,
                    'message' => 'Deposit data deleted successfully!'
                ];
            } else {
                $out = [
                    'status' => false,
                    'message' => "Deposit data couldn't be deleted!"
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
        $query = $this->deposit->all();
        $where = [];
        if ($this->input->get('account_id'))
            $where = array_merge($where, ['deposits.account_id' => $inputs['account_id']]);

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

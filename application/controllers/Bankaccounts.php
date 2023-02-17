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

        $data = [
            'accountTypes' => $this->acctype->all()->get()->result(),
        ];
        $this->load->view('pages/bank-accounts/list', $data);
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
        if (!$account) show_404();

        $account->balance = $this->account->calBalance($id);
        $account->accType = $this->acctype->find($account->acc_type_id);
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
        $account = $this->account->find($id);
        if (!$account) show_404();

        if ($account->ownership === 'individual') {
            $account->member = $this->member->find($account->member_id);
        } else {
            $account->association = $this->member->find($account->association_id);
        }

        $data = [
            'id_card_types' => $this->idcardtype->all()->get()->result(),
            'accountTypes' => $this->acctype->all()->get()->result(),
            'account' => $account,
        ];
        $this->load->view('pages/bank-accounts/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();

        $account  = $this->account->create($record);
        if ($account) {
            $out = [
                'data' => $account,
                'input' => $record,
                'status' => true,
                'message' => 'Account created successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

            $out = [
                'status' => false,
                'message' => $error ? $error : "Account couldn't be created!"
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
        $account  = $this->account->update($id, $record);
        if ($account) {
            $out = [
                'data' => $account,
                'input' => $record,
                'status' => true,
                'message' => 'Account updated successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Account couldn't be updated!"
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
        $accounts = null; // replace created record object
        if ($this->account->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'Account deleted successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Account couldn't be deleted!"
            ];
        }
        httpResponseJson($out);
    }

    public function find()
    {
        $account = $this->account->where([
            'acc_number' => $this->input->get('acc_number', true)
        ])->row();
        if ($account) {
            $account->member = $this->member->find($account->member_id);
            $account->idCardType = $this->idcardtype->find($account->member->identity_card_type_id);
            $account->balance = $this->account->calBalance($account->id);
            $out = [
                'data' => $account,
                'status' => true,
                'message' => 'Account found successfully!'
            ];
        } else {
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
        $query = $this->account->all();
        $where = [];

        if ($this->input->get('association_id'))
            $where = array_merge($where, ['association_members.association_id' => $inputs['association_id']]);

        if ($this->input->get('member_id'))
            $where = array_merge($where, ['association_members.member_id' => $inputs['member_id']]);

        if ($this->input->get('status'))
            $where = array_merge($where, ['accounts.staus' => $inputs['status']]);

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

    public function passbook_datatables()
    {
        $start = $this->input->get('start', true);
        $length = $this->input->get('length', true);
        $draw = $this->input->get('draw', true);
        $inputs = $this->input->get();

        $out = datatable($this->account->passbooks(), $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }

    public function select2()
    {
        $term = trim($this->input->get('term'));
        $passbook = trim($this->input->get('passbook'));
        $take = 10;
        $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
        $skip = ($page - 1) * $take;

        $total = $this->account->all()->get()->num_rows();

        $records = $this->account->all()->select('accounts.id, concat(acc_types.label, " #",accounts.acc_number) as text', false)
            ->like('accounts.name', $term)
            ->where("accounts.passbook", $passbook)
            ->limit($take, $skip)
            ->get()
            ->result();

        $out = [
            'results' => $records,
            'pagination' => [
                'more' => ($skip + $take < $total),
                'page' => intval($page),
                'totalRows' => $total,
                'totalPages' => intval($total / $take + ($total % $take > 0 ? 1 : 0))
            ]
        ];

        return httpResponseJson($out);
    }

    public function passbook_select2()
    {
        $term = trim($this->input->get('term'));
        $association = $this->input->get('association_id');
        $take = 10;
        $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
        $skip = ($page - 1) * $take;

        $total = $this->account->passbooks()->get()->num_rows();

        $this->account->passbooks()->select('accounts.passbook as id, accounts.passbook as text', false)
            ->like('passbook', $term);

        if ($association) {
            $this->db->where('association_members.association_id', $association);
        }
        $records =  $this->db->limit($take, $skip)
            ->get()
            ->result();

        $out = [
            'results' => $records,
            'pagination' => [
                'more' => ($skip + $take < $total),
                'page' => intval($page),
                'totalRows' => $total,
                'totalPages' => intval($total / $take + ($total % $take > 0 ? 1 : 0))
            ]
        ];

        return httpResponseJson($out);
    }
}

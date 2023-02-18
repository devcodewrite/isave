<?php
defined('BASEPATH') or exit('No direct script allowed');

class Acctypes extends MY_Controller
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
        $this->load->view('pages/acctypes/list', $data);
    }

    /**
     * Show a list of resources
     * @return string html view
     */
    public function passbooks()
    {
        $this->load->view('pages/acctype/passbooks');
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $acctype =  $this->acctype->find($id);
        if (!$acctype) show_404();

        $acctype->balance = $this->acctype->calBalance($id);
        $acctype->accType = $this->acctype->find($acctype->acc_type_id);
        $data = [
            'acctype' => $acctype,
            'member' => $this->member->find($acctype->member_id),
        ];
        $this->load->view('pages/acctypes/detail', $data);
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

        $this->load->view('pages/acctypes/edit', $data);
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $acctype = $this->acctype->find($id);
        if (!$acctype) show_404();

        if ($acctype->ownership === 'individual') {
            $acctype->member = $this->member->find($acctype->member_id);
        } else {
            $acctype->association = $this->member->find($acctype->association_id);
        }

        $data = [
            'id_card_types' => $this->idcardtype->all()->get()->result(),
            'accountTypes' => $this->acctype->all()->get()->result(),
            'acctype' => $acctype,
        ];
        $this->load->view('pages/acctypes/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();

        $acctype  = $this->acctype->create($record);
        if ($acctype) {
            $out = [
                'data' => $acctype,
                'input' => $record,
                'status' => true,
                'message' => 'Account type created successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

            $out = [
                'status' => false,
                'message' => $error ? $error : "Account type couldn't be created!"
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
        $acctype  = $this->acctype->update($id, $record);
        if ($acctype) {
            $out = [
                'data' => $acctype,
                'input' => $record,
                'status' => true,
                'message' => 'Account type updated successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Account type couldn't be updated!"
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
        if ($this->acctype->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'Account type deleted successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Account type couldn't be deleted!"
            ];
        }
        httpResponseJson($out);
    }

    public function find()
    {
        $acctype = $this->acctype->where([
            'acc_number' => $this->input->get('acc_number', true)
        ])->row();
        if ($acctype) {
            $acctype->member = $this->member->find($acctype->member_id);
            $acctype->idCardType = $this->idcardtype->find($acctype->member->identity_card_type_id);
            $acctype->balance = $this->acctype->calBalance($acctype->id);
            $out = [
                'data' => $acctype,
                'status' => true,
                'message' => 'Account type found successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Couldn't find acctype!"
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
        $query = $this->acctype->all();
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

        $out = datatable($this->acctype->passbooks(), $start, $length, $draw, $inputs);
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

        $total = $this->acctype->all()->get()->num_rows();

        $records = $this->acctype->all()->select('accounts.id, concat(acc_types.label, " #",accounts.acc_number) as text', false)
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

        $total = $this->acctype->passbooks()->get()->num_rows();

        $this->acctype->passbooks()->select('accounts.passbook as id, accounts.passbook as text', false)
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

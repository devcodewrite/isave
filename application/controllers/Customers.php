<?php
defined('BASEPATH') or exit('No direct script allowed');

class Customers extends MY_Controller
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
        if (!$member) show_404();

        $member->associations = $this->member->associations($member->id);

        $data = [
            'member' => $member,
            'accountTypes' => $this->acctype->all()->get()->result(),
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
            'acc_types' => $this->acctype->all()->where(['is_default' => 1])->get()->result(),
        ];
        $this->load->view('pages/customers/edit', $data);
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $member = $this->member->find($id);
        if (!$member) show_404();

        $data = [
            'id_card_types' => $this->idcardtype->all()->get()->result(),
            'acc_types' => $this->acctype->all()->get()->result(),
            'member' => $member,
        ];
        $this->load->view('pages/customers/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();
        $member  = $this->member->create($record);

        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($member) {
            $out = [
                'data' => $member,
                'input' => $this->input->post(),
                'status' => true,
                'message' => 'Customer created successfully! ' . $error
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error ? $error : "Customer couldn't be created!"
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
        $member = $this->member->update($id, $record);
        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($member) {
            $out = [
                'data' => $member,
                'status' => true,
                'input' => $record,
                'message' => 'Customer updated successfully! ' . $error
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error ? $error : "Customer data couldn't be update!"
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
        if ($this->member->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'Customer data deleted successfully!'
            ];
        } else {
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
        $query = $this->member->all();
        $where = [];

        if ($this->input->get('association_id'))
            $where = array_merge($where, ['association_members.association_id' => $inputs['association_id']]);

        if ($this->input->get('passbook')) {
            $query->join('accounts', 'accounts.member_id=association_members.member_id');
            $query->distinct();
            $where = array_merge($where, ['accounts.passbook' => $inputs['passbook']]);
        }
        if ($this->input->get('rstate'))
            $where = array_merge($where, ['members.rstate' => $inputs['rstate']]);

        if ($this->input->get('city'))
            $query->like('members.city', $inputs['city']);

        if ($this->input->get('education'))
            $where = array_merge($where, ['members.education' => $inputs['education']]);

        if ($this->input->get('settlement'))
            $where = array_merge($where, ['members.settlement' => $inputs['settlement']]);

        if ($this->input->get('marital_status'))
            $where = array_merge($where, ['members.marital_status' => $inputs['marital_status']]);

        if ($this->input->get('sex'))
            $where = array_merge($where, ['members.sex' => $inputs['sex']]);

        $query->where($where);

        $out = datatable($query, $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }

    public function select2()
    {
        $term = trim($this->input->get('term'));
        $association = $this->input->get('association_id');
        $take = 10;
        $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
        $skip = ($page - 1) * $take;

        $total = $this->member->all()->get()->num_rows();

        $this->member->all()->select('members.id, concat(members.firstname," ",ifnull(members.lastname,"")) as text', false);

        if ($association) {
            $this->db->where('association_members.association_id', $association);
        }
        $records = $this->db->group_start()
            ->like('firstname', $term)
            ->or_like('lastname', $term)
            ->or_like('othername', $term)
            ->group_end()
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
}

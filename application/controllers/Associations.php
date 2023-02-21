<?php
defined('BASEPATH') or exit('No direct script allowed');

class Associations extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $data = [
            'communities' => $this->association->communities(),
            'clusterOfficeAddresses' => $this->association->clusterOffices(),
        ];
        $this->load->view('pages/associations/list', $data);
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $data = [
            'association' => $this->association->find($id),
        ];
        $this->load->view('pages/associations/detail', $data);
    }

      /**
     * Show a resource
     * html view
     */
    public function deposit_summary(int $id = null)
    {
        $data = [
            'association' => $this->association->find($id),
        ];
        $this->load->view('pages/associations/transactions', $data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $data = [
            'communities' => $this->association->communities(),
            'clusterOfficeAddresses' => $this->association->clusterOffices(),
        ];
        $this->load->view('pages/associations/edit', $data);
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $association = $this->association->find($id);
        if (!$association) show_404();

        $association->user = $this->user->find($association->assigned_user_id);
        $data = [
            'association' => $association,
            'communities' => $this->association->communities(),
            'clusterOfficeAddresses' => $this->association->clusterOffices(),
        ];
        $this->load->view('pages/associations/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();

        $association  = $this->association->create($record);
        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if ($association) {
            $out = [
                'data' => $association,
                'input' => $record,
                'status' => true,
                'message' => 'Association created successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => $error?$error:"Association couldn't be created!"
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
        $association = $this->association->update($id, $record);

        if ($association) {
            $out = [
                'data' => $association,
                'input' => $record,
                'status' => true,
                'message' => 'Association updated successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');
            $out = [
                'status' => false,
                'message' => $error?$error:"Association couldn't be updated!"
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

        if ($this->association->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'Association deleted successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');
            $out = [
                'status' => false,
                'message' => $error?$error:"Association couldn't be deleted!"
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
        $query = $this->association->all();
        $where = [];

        if ($this->input->get('cluster_office_address'))
            $where = array_merge($where, ['cluster_office_address' => $inputs['cluster_office_address']]);

        if ($this->input->get('status'))
            $where = array_merge($where, ['status' => $inputs['status']]);

        if ($this->input->get('user_id'))
            $where = array_merge($where, ['user_id' => $inputs['user_id']]);

        if ($this->input->get('community'))
            $where = array_merge($where, ['community' => $inputs['community']]);

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
        $take = 10;
        $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
        $skip = ($page - 1) * $take;

        $total = $this->association->all()->distinct()->get()->num_rows();

        $records = $this->association->all()->distinct()->select('id, name as text')
            ->like('name', $term)
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

    public function remove_member(int $id)
    {
        $member_id = $this->input->post('member_id');

        if ($this->association->removeMember($id, $member_id)) {
            $out = [
                'status' => true,
                'message' => 'Member removed successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');
            $out = [
                'status' => false,
                'message' => $error?$error:"Member couldn't be removed!"
            ];
        }
        httpResponseJson($out);
    }

    public function add_member(int $id)
    {
        $member_id = $this->input->post('member_id');

        if ($this->association->removeMember($id, $member_id)) {
            $out = [
                'status' => true,
                'message' => 'Member added successfully!'
            ];
        } else {
            $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');
            $out = [
                'status' => false,
                'message' => $error?$error:"Member couldn't be added!"
            ];
        }
        httpResponseJson($out);
    }
}

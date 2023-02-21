<?php
defined('BASEPATH') or exit('No direct script allowed');

class Users extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/users/list');
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $user = $this->user->find($id);
        if (!$user) show_404();

        $data = [
            'user' => $user,
        ];
        $this->load->view('pages/users/detail', $data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/users/edit');
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $user = $this->user->find($id);
        if (!$user) show_404();

        $data = [
            'user' => $user,
        ];
        $this->load->view('pages/users/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();

        $user  = $this->user->create($record);
        if ($user) {
            $out = [
                'data' => $user,
                'input' => $record,
                'status' => true,
                'message' => 'Users created successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Users couldn't be created!"
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

        $user = $this->user->update($id, $record);
        if ($user) {
            $out = [
                'data' => $user,
                'input' => $record,
                'status' => true,
                'message' => 'User updated successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "User couldn't be updated!"
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

        if ($this->user->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'User data deleted successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "User data couldn't be deleted!"
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
        $query = $this->user->all();

        $where = [];

        if ($this->input->get('rstatus'))
            $where = array_merge($where, ['users.rstatus' => $inputs['rstatus']]);

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

        $total = $this->user->all()->get()->num_rows();

        $records = $this->user->all()->select('id, concat(firstname," ",ifnull(lastname,""))as text')
            ->like('firstname', $term)
            ->or_like('lastname', $term)
            ->or_like('username', $term)
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

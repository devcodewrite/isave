<?php
defined('BASEPATH') or exit('No direct script allowed');

class Roles extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $data = [
            'roles' => $this->role->all()->get()->result(),
        ];
        $this->load->view('pages/roles/list', $data);
    }

    /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $role = $this->role->find($id);
        if (!$role) show_404();

        $data = [
            'role' => $role,
        ];
        $this->load->view('pages/roles/detail', $data);
    }

    /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $this->load->view('pages/roles/edit');
    }

    /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $role = $this->role->find($id);
        if (!$role) show_404();

        $data = [
            'role' => $role,
        ];
        $this->load->view('pages/roles/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();

        $role  = $this->role->create($record);
        if ($role) {
            $out = [
                'data' => $role,
                'input' => $record,
                'status' => true,
                'message' => 'Roles created successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Roles couldn't be created!"
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

        $role = $this->role->update($id, $record);
        if ($role) {
            $out = [
                'data' => $role,
                'input' => $record,
                'status' => true,
                'message' => 'Role updated successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Role couldn't be updated!"
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

        if ($this->role->delete($id)) {
            $out = [
                'status' => true,
                'message' => 'Role data deleted successfully!'
            ];
        } else {
            $out = [
                'status' => false,
                'message' => "Role data couldn't be deleted!"
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
        $query = $this->role->all();

        $where = [];

        if ($this->input->get('rstatus'))
            $where = array_merge($where, ['roles.rstatus' => $inputs['rstatus']]);

        $query->where($where);

        $out = datatable($query, $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }
}

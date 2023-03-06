<?php
defined('BASEPATH') or exit('No direct script allowed');

class Permissions extends MY_Controller
{

    /**
     * Store a resource
     * print json Response
     */
    public function store()
    {
        $record = $this->input->post();

        $permission  = $this->perm->create($record);
        if ($permission) {
            $out = [
                'data' => $permission,
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

        $permission = $this->perm->update($id, $record);
        if ($permission) {
            $out = [
                'data' => $permission,
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

        if ($this->perm->delete($id)) {
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
}

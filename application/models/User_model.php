<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class User_model extends CI_Model
{
    protected $table = 'users';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;

        if (!empty($record['password'])) $record['password'] = password_hash($record['password'], PASSWORD_DEFAULT);

        $data = $this->extract($record);

        if ($this->db->insert($this->table, $data)) {
            $this->uploadPhoto($this->db->insert_id());
            return $this->find($this->db->insert_id());
        }
    }

    /**
     * Update a record
     * @param $id
     * @return Boolean
     */
    public function update(int $id, array $record)
    {
        if (!$record) return;
        if (!empty($record['password'])) $record['password'] = password_hash($record['password'], PASSWORD_DEFAULT);

        $data = $this->extract($record);
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update($this->table);
        return $this->find($id);
    }

    /**
     * Delete a record
     * @param $id
     * @return Boolean
     */
    public function delete(int $id)
    {
        $this->db->set(['deleted_at' => date('Y-m-d H:i:s')]);
        $this->db->where('id', $id);
        $this->db->update($this->table);
        return $this->db->affected_rows() > 0;
    }

    /**
     * Extract only values of only fields in the table
     * @param $data
     * @return Array
     */
    protected function extract(array $data)
    {

        // filter array for only specified table data
        $filtered = array_filter($data, function ($key, $val) {
            return $this->db->field_exists($val, $this->table);
        }, ARRAY_FILTER_USE_BOTH);

        return $filtered;
    }

    /**
     * Upload photo
     * @param string $field_name
     * @return Boolean
     */
    public function uploadPhoto($id, string $field_name = 'photo', string $col_name = 'photo_url', $disp_error = true, $scale = '60%', $dim = ['w' => 200, 'h' => '200'])
    {
        $config['upload_path'] = './uploads/photos/' . $this->table;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = uniqid($id);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            $file_data = $this->upload->data();

            $resize['image_library'] = 'gd2';
            $resize['create_thumb'] = TRUE;
            $resize['maintain_ratio'] = TRUE;
            $resize['quality'] = $scale;
            $resize['width'] = $dim['w'];
            $resize['height'] = $dim['h'];
            $resize['source_image'] = $file_data['full_path'];

            $this->load->library('image_lib', $resize);

            if (!$this->image_lib->resize()) {
                if ($disp_error) {
                    $this->session->set_flashdata('error_message', $this->image_lib->display_errors('', ''));
                }
                return false;
            }
        } else {
            if ($disp_error) {
                $this->session->set_flashdata('warning_message', $this->upload->display_errors('', ''));
                return false;
            }
            return true;
        }
        $data = [
            $col_name => base_url('uploads/photos/' . $this->table . "/" . $file_data['file_name']),
        ];
        return $this->update($id, $data);
    }


    /**
     * Get user by id
     */
    public function find(int $id = null)
    {
        if (!$id) return;

        $where = [
            'id' => $id,
            "deleted_at" => null
        ];
        $user = $this->db->get_where($this->table, $where)->row();
        if ($user) {
            $user->role = $this->role->find($user->role_id);

            if (!$user->role) return false;
        }

        return $user;
    }

    /**
     * Get users by column where cluase
     */
    public function where(array $where)
    {
        $where = array_merge($where, ["{$this->table}.deleted_at =" => null]);
        return $this->db->get_where($this->table, $where);
    }

    /**
     * Get all users
     */
    public function all()
    {
        $rtable = 'roles';

        $where = ["{$this->table}.deleted_at =" => null];
        $fields = [
            "{$this->table}.id",
            "{$this->table}.username",
            "{$this->table}.firstname",
            "{$this->table}.lastname",
            "{$this->table}.phone",
            "{$this->table}.sex",
            "{$this->table}.email",
            "{$this->table}.salary",
            "{$this->table}.phone_verified_at",
            "{$this->table}.email_verified_at",
            "{$this->table}.photo_url",
            "{$this->table}.role_id",
            "$rtable.label as role_label",
            "{$this->table}.rstatus",
            "{$this->table}.created_at",
            "{$this->table}.updated_at",
        ];

        return
            $this->db->select($fields, true)
            ->from($this->table)
            ->join($rtable, "$rtable.id={$this->table}.role_id")
            ->where($where);
    }

    /**
     * Get the association that owner this user id
     */
    public function association(int $id)
    {
        $rtable = 'associations';
        $col = 'user_id';

        return $this->db->select("$rtable.*")
            ->from($this->table)
            ->join($rtable, "$rtable.$col=$rtable.id")
            ->where([$col => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->row();
    }

    /**
     * Get all account that belongs to this user id
     */
    public function accounts(int $id)
    {
        $rtable = 'accounts';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['user_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all loans that belongs to this user id through account
     */
    public function loans(int $id)
    {
        $rtable = 'loans';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['user_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all deposit that belongs to this user id through account
     */
    public function deposits(int $id)
    {
        $rtable = 'deposits';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['user_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }
    /**
     * Get all withdrawals that belongs to this user id through account
     */
    public function withdrawals(int $id)
    {
        $rtable = 'withdrawals';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['user_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all associations that the user id has
     */
    public function associations(int $id)
    {
        $rtable = 'associations';
        $pivot = 'association_users';
        $foreginKey1 = 'association_id';
        $foreginKey2 = 'user_id';

        return $this->db->select("{$this->table}.*")
            ->from($rtable)
            ->join($rtable, "$pivot.$foreginKey1=$rtable.id")
            ->join($this->table, "$pivot.$foreginKey2={$this->table}.id")
            ->where("{$this->table}.id", $id)
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get the identity card type that owner this user id
     */
    public function identityCardType(int $id)
    {
        $rtable = 'identity_card_types';
        $col = 'identity_card_type_id';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->join($this->table, "{$this->table}.$col=$rtable.id")
            ->where(["$this->table.id" => $id])
            ->get()
            ->row();
    }


    public function canDisburseLoan($id)
    {
        $role = $this->find($id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? true : in_array('disburse', explode(',', $role->permission->loans));
        return false;
    }

    public function canViewAny($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->members))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canView($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->members))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canCreate($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('create', explode(',', $role->permission->members))?auth()->allow()
                :auth()->deny("You don't have permission to create this record."));
        return auth()->deny("You don't have permission to create this record.");
    }

    public function canUpdate($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('update', explode(',', $role->permission->members))?auth()->allow()
                :auth()->deny("You don't have permission to update this record."));
        return auth()->deny("You don't have permission to update this record.");
    }

    public function canDelete($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('delete', explode(',', $role->permission->members))?auth()->allow()
                :auth()->deny("You don't have permission to delete this record."));
        return auth()->deny("You don't have permission to delete this record.");
    }
}

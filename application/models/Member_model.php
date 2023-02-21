<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Member_model extends CI_Model
{
    protected $table = 'members';
    protected $ftable = 'association_members';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;
        $data = $this->extract($record);

        if(!isset($record['associations'])){
            $this->session->set_flashdata('error', 'Select at least one association');
            return false;
        }

        if ($this->db->insert($this->table, $data)) {
            $id = $this->db->insert_id();

            foreach($record['associations'] as $assoc){
                $this->association->addMember($assoc, $id);
                $record['association_id'] = $assoc;
                foreach($this->acctype->where(['is_default'=>1]) as $acctype){
                    $record['acc_type_id'] = $acctype->id;
                    $this->account->create($record);
                }
                    
            }
            $member = $this->find($id);
            $this->uploadPhoto($id);
            $this->uploadPhoto($id,'card','identity_card_url',true,'100%',['w'=>null,'h' => null]);
            $record['member_id'] = $id;
            $record['ownership'] = 'individual';
            return $member;
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
        $record['user_id'] = auth()->user()->id;
        $data = $this->extract($record);

        if(!isset($record['associations'])){
            $this->session->set_flashdata('error', 'Select at least one association');
            return false;
        }

        if ($this->db->update($this->table, $data, ['id' => $id])) {
            $this->db->delete('association_members', ['member_id' => $id]);
            foreach($record['associations'] as $assoc){
                $this->association->addMember($assoc, $id);
            }
            $member = $this->find($id);
            $this->uploadPhoto($id);
            $this->uploadPhoto($id,'card','identity_card_url',true,'100%',['w'=>null,'h' => null]);
            $record['member_id'] = $id;
            $record['ownership'] = 'individual';
            return $member;
        }
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
     * Get member by id
     */
    public function find(int $id)
    {
        $where = [
            'id' => $id,
            "{$this->table}.deleted_at =" => null
        ];
        return $this->db->get_where($this->table, $where)->row();
    }

    /**
     * Get members by column where cluase
     */
    public function where(array $where)
    {
        $where = array_merge($where, ["{$this->table}.deleted_at =" => null]);
        return $this->db->get_where($this->table, $where);
    }

    /**
     * Get all members
     */
    public function all()
    {
        $rtable = 'associations';
        $col = 'association_id';

        $where = ["{$this->table}.deleted_at =" => null];
        $fields = [
            "{$this->table}.id",
            "{$this->table}.firstname",
            "{$this->table}.lastname",
            "{$this->table}.othername",
            "{$this->table}.sex",
            "{$this->table}.primary_phone",
            "{$this->table}.identity_card_number",
            "{$this->table}.occupation",
            "{$this->table}.rstate",
            "{$this->table}.occupation",
            "{$this->table}.photo_url",
            "DATE({$this->table}.created_at) as created_at",
            "$rtable.name as association_name",
        ];

        return
            $this->db->select($fields, true)
            ->from($this->table)
            ->join($this->ftable, "{$this->ftable}.member_id={$this->table}.id")
            ->join($rtable, "$rtable.id={$this->ftable}.$col", 'left')
            ->where($where);
    }

    /**
     * Get the association that owner this member id
     */
    public function association(int $id)
    {
        $rtable = 'associations';
        $col = 'association_id';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->join($this->table, "{$this->table}.$col=$rtable.id")
            ->where([$col => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->row();
    }

    /**
     * Get all account that belongs to this member id
     */
    public function accounts(int $id)
    {
        $rtable = 'accounts';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['member_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all loans that belongs to this member id through account
     */
    public function loans(int $id)
    {
        $rtable = 'loans';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['member_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all deposit that belongs to this member id through account
     */
    public function deposits(int $id)
    {
        $rtable = 'deposits';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['member_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }
    /**
     * Get all withdrawals that belongs to this member id through account
     */
    public function withdrawals(int $id)
    {
        $rtable = 'withdrawals';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['member_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all associations that the member id has
     */
    public function associations(int $id)
    {
        $rtable = 'associations';
        $pivot = 'association_members';
        $foreginKey1 = 'association_id';
        $foreginKey2 = 'member_id';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->join($pivot, "$pivot.$foreginKey1=$rtable.id")
            ->join($this->table, "$pivot.$foreginKey2={$this->table}.id")
            ->where("{$this->table}.id", $id)
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get the identity card type that owner this member id
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
}

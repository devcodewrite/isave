<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Transfer_model extends CI_Model
{
    protected $table = 'transfers';
    protected $ftable = 'association_members';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;

        if($record['from_account_id'] === $record['to_account_id']) {
            $this->session->set_flashdata('error_message', "You can't transfer to same account!");
            return false;
        }

        $record['from_member_id'] = $this->account->find($record['from_account_id'])->member_id;
        $record['to_member_id'] = $this->account->find($record['to_account_id'])->member_id;

        $data = $this->extract($record);

        if ($this->db->insert($this->table, $data)) {
            $id = $this->db->insert_id();
            return $this->find($id);
        }
    }

    /**
     * Update a record
     * @param $id
     * @return Boolean
     */
    public function update(int $id, array $data)
    {
        $data = $this->extract($data);
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update($this->table);
        return $this->find($id);
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
     * Get deposit by id
     */
    public function find(int $id)
    {
        $where = [
            'id'=> $id,
        ];
        return $this->db->get_where($this->table,$where)->row();
    }

     /**
     * Get transfers by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table,$where);
    }

    /**
     * Get all transfers
     */
    public function all()
    {
        $rtable1 = 'accounts';
        $col11 = 'from_account_id';
        $col12 = 'to_account_id';
        $F_ACC_NAME = "SELECT $rtable1.name FROM $rtable1 WHERE $rtable1.id = {$this->table}.$col11";
        $F_ACC_NO = "SELECT $rtable1.acc_number FROM $rtable1 WHERE $rtable1.id = {$this->table}.$col11";
        $T_ACC_NAME = "SELECT $rtable1.name FROM $rtable1 WHERE $rtable1.id = {$this->table}.$col12";
        $T_ACC_NO = "SELECT $rtable1.acc_number FROM $rtable1 WHERE $rtable1.id = {$this->table}.$col12";

        $rtable2 = 'associations';
        $col21 = 'from_association_id';
        $col22 = 'to_association_id';
        $F_ASSOC_NAME = "SELECT $rtable2.name FROM $rtable2 WHERE $rtable2.id = {$this->table}.$col21"; 
        $T_ASSOC_NAME = "SELECT $rtable2.name FROM $rtable2 WHERE $rtable2.id = {$this->table}.$col22"; 

        $rtable3 = 'users';
        $col3 = 'user_id';

        $fields = [
            "{$this->table}.*",
            "concat($rtable3.firstname,' ',$rtable3.lastname) as addedby",
            "($F_ACC_NAME) as from_acc_name",
            "($T_ACC_NAME) as to_acc_name",
            "($F_ACC_NO) as from_acc_number",
            "($T_ACC_NO) as to_acc_number",
            "($F_ASSOC_NAME) as from_assoc_name",
            "($T_ASSOC_NAME) as to_assoc_name",
        ];
        return 
            $this->db->select($fields, true)
                    ->join($rtable3, "$rtable3.id={$this->table}.$col3")
                    ->from($this->table);
    }

    /**
     * Get the association that owner this deposit id
     */
    public function association(int $id)
    {
        $rtable = 'associations';
        $col = 'association_id';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->join($this->table, "{$this->table}.$col=$rtable.id")
                    ->where([$col=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->row();
    }

     /**
     * Get all account that belongs to this deposit id
     */
    public function accounts(int $id)
    {
        $rtable = 'accounts';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['deposit_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all deposit that belongs to this deposit id through account
     */
    public function transfers(int $id)
    {
        $rtable = 'transfers';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['deposit_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }
 /**
     * Get all withdrawals that belongs to this deposit id through account
     */
    public function withdrawals(int $id)
    {
        $rtable = 'withdrawals';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['deposit_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all associations that the deposit id has
     */
    public function associations(int $id)
    {
        $rtable = 'associations';
        $pivot = 'association_transfers';
        $foreginKey1 = 'association_id';
        $foreginKey2 = 'deposit_id';

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
     * Get the identity card type that owner this deposit id
     */
    public function identityCardType(int $id)
    {
        $rtable = 'identity_card_types';
        $col = 'identity_card_type_id';
        
        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->join($this->table, "{$this->table}.$col=$rtable.id")
                    ->where([$col=> $id])
                    ->get()
                    ->row();
    }

}

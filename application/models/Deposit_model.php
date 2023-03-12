<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Deposit_model extends CI_Model
{
    protected $table = 'deposits';
    protected $ftable = 'association_members';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;

        $data = $this->extract($record);

        if ($this->db->insert($this->table, $data)) {
            $id = $this->db->insert_id();
            return $this->find($id);
        }
    }

    public function createAll(array $records)
    {
        if (!$records) return;
        $data = [];

        $user = auth()->user();
       if(!$user){
            $this->session->set_flashdata('error_message', "Your session has expired!");
        return false;
       }
        foreach ($records['account_id'] as $key => $accountId) {
            if(empty($accountId)) continue;
            array_push($data, [
                'account_id' => $records['account_id'][$key],
                'amount' => $records['amount'][$key],
                'type' => 'cash',
                'depositor_name' => "$user->firstname $user->lastname",
                'depositor_phone' => $user->phone,
                'user_id' => $user->id,
                'ddate' => (isset($records['ddate'])?$records['ddate']:date('Y-m-d')),
            ]);
        }

        if (sizeof($data) === 0){
            $this->session->set_flashdata('error_message', "no records input!");
            return false;
        }
       
        return $this->db->insert_batch($this->table, $data);
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
     * Delete a record
     * @param $id
     * @return Boolean
     */
    public function delete(int $id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
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
            'id' => $id,
        ];
        return $this->db->get_where($this->table, $where)->row();
    }

    /**
     * Get deposits by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table, $where);
    }

    /**
     * Get all deposits
     */
    public function all()
    {
        $rtable = 'accounts';
        $col = 'account_id';
        $rtable2 = 'members';
        $col2 = 'member_id';
        $rtable3 = 'associations';
        $col3 = 'association_id';

        $fields = ['deposits.*', 
        "$rtable.passbook", 
        "$rtable.name as acc_name", 
        "$rtable.acc_number",
        "$rtable3.name as association_name",
        "$rtable3.id as association_id"
    ];
        return 
            $this->db->select($fields, true)
                    ->distinct()
                    ->from($this->table)
                    ->join($rtable, "$rtable.id={$this->table}.$col")
                    ->join($this->ftable, "{$this->ftable}.$col3=$rtable.$col3", 'left')
                    ->join($rtable2, "$rtable2.id=$rtable.$col2", 'left')
                    ->join($rtable3, "$rtable3.id=$rtable.$col3");
                    
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
            ->where([$col => $id])
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
            ->where(['deposit_id' => $id])
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
        $pivot = 'association_deposits';
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
            ->where([$col => $id])
            ->get()
            ->row();
    }
}

<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Withdrawal_model extends CI_Model
{
    protected $table = 'withdrawals';
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
     * Get withdrawal by id
     */
    public function find(int $id)
    {
        $where = [
            'id' => $id,
        ];
        return $this->db->get_where($this->table, $where)->row();
    }

    /**
     * Get withdrawals by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table, $where);
    }

    /**
     * Get all withdrawals
     */
    public function all()
    {
        $rtable = 'accounts';
        $col = 'account_id';
        $rtable2 = 'members';
        $col2 = 'member_id';
        $rtable3 = 'associations';
        $col3 = 'association_id';

        $fields = [
            "$this->table.*",
            "$rtable.passbook",
            "$rtable.name as acc_name",
            "$rtable.acc_number",
            "$rtable3.name as association_name"
        ];
        return
            $this->db->select($fields, true)
            ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
            ->join($rtable2, "$rtable2.id=$rtable.$col2", 'left')
            ->join($this->ftable, "{$this->ftable}.$col2=$rtable.$col2")
            ->join($rtable3, "$rtable3.id={$this->ftable}.$col3", 'left')
            ->from($this->table);
    }

    /**
     * Get the association that owner this withdrawal id
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
     * Get all account that belongs to this withdrawal id
     */
    public function accounts(int $id)
    {
        $rtable = 'accounts';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['withdrawal_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all withdrawals that belongs to this withdrawal id through account
     */
    public function withdrawals(int $id)
    {
        $rtable = 'withdrawals';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['withdrawal_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all associations that the withdrawal id has
     */
    public function associations(int $id)
    {
        $rtable = 'associations';
        $pivot = 'association_withdrawals';
        $foreginKey1 = 'association_id';
        $foreginKey2 = 'withdrawal_id';

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
     * Get the identity card type that owner this withdrawal id
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

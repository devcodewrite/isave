<?php

use PhpParser\Node\Expr\Cast\Double;

defined('BASEPATH') or exit('Direct acess is not allowed');

class Withdrawal_model extends CI_Model
{
    protected $table = 'withdrawals';
    protected $ftable = 'association_members';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;

        if(!$this->account->canWithdraw($record['account_id'], $record['amount'])){
            return false;
        }
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
}

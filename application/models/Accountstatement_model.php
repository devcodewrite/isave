<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Accountstatement_model extends CI_Model
{
    protected $table = 'account_statements';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;
        $record['reconcile_diff'] = doubleval($record['total_amount']) - doubleval($record['reconcile_amount']);

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
    public function save(array $record)
    {
        $record['reconcile_diff'] = doubleval($record['total_amount']) - doubleval($record['reconcile_amount']);
        $data = $this->extract($record);
        $this->db->replace($this->table,$data);
        return $this->find($record['id']);
    }

    /**
     * Delete a record
     * @param $id
     * @return Boolean
     */
    public function delete(string $id)
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
     * Get acc_type by id
     */
    public function find(string $id)
    {
        $where = [
            'id' => $id,
        ];
        return $this->db->get_where($this->table, $where)->row();
    }

    /**
     * Get acc_types by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table, $where);
    }

    /**
     * Get all acc_types
     */
    public function all()
    {
        $fields = [];
        return
            $this->db->select($fields, true)
            ->from($this->table);
    }

    /**
     * Get the association that owner this acc_type id
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
     * Get all account that belongs to this acc_type id
     */
    public function accounts(int $id)
    {
        $rtable = 'accounts';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['acc_type_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }
}

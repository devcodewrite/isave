<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Account_model extends CI_Model
{
    protected $table = 'accounts';

    public function create(array $record)
    {
        if (!$record) return;

        $record['user_id'] = auth()->user()->id;
        $data = $this->extract($record);
        $last = $this->db->select()
                        ->from($this->table)
                        ->order_by('id', 'desc')
                        ->limit(1)
                        ->get()
                        ->row();
        $lastid = $last?$last->id:0;

        if($record['ownership'] === 'individual'){
            $owner_id = $record['member_id'];
        }
        else{
            $owner_id = $record['association_id'];
        }
        $data = array_merge($data, [
            'acc_number' => date('y').str_pad($owner_id,4,'0',STR_PAD_LEFT).str_pad($lastid+1,4,'0',STR_PAD_LEFT),
        ]);
        if ($this->db->insert($this->table, $data)) {
            return $this->find($this->db->insert_id());
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
     * Get account by id
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
     * Get accounts by column where cluase
     */
    public function where(array $where)
    {
        $where = array_merge($where, ["{$this->table}.deleted_at =" => null]);
        
        return $this->db->get_where($this->table, $where);
    }

    /**
     * Get all accounts
     */
    public function all()
    {
        $rtable = 'members';
        $col = 'member_id';
        $rtable2 = 'associations';
        $col2 = 'association_id';
        $rtable3 = 'acc_types';
        $col3 = 'acc_type_id';

        $qselect_sum_deposits = "SELECT SUM(deposits.amount) FROM deposits WHERE deposits.account_id={$this->table}.id";
        $qselect_sum_withdrawals = "SELECT SUM(withdrawals.amount) FROM withdrawals  WHERE withdrawals.account_id={$this->table}.id";

        $where = ["{$this->table}.deleted_at =" => null];
        $fields = [
            "{$this->table}.id",
            "{$this->table}.name",
            "{$this->table}.ownership",
            "{$this->table}.passbook",
            "{$this->table}.status",
            "(ifnull(($qselect_sum_deposits),0) - ifnull(($qselect_sum_withdrawals),0)) as balance",
            "{$this->table}.acc_type_id",
            "{$this->table}.member_id",
            "{$this->table}.association_id",
            "{$this->table}.acc_number",
            "{$this->table}.stamp_amount",
            "concat({$rtable}.firstname, ' ', {$rtable}.lastname) as member_owner",
            "$rtable2.name  as association_owner",
            "$rtable3.label  as acc_type",
            "DATE({$this->table}.created_at) as created_at",
        ];

        return
            $this->db->select($fields, true)
            ->from($this->table)
            ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
            ->join($rtable2, "$rtable2.id={$this->table}.$col2", 'left')
            ->join($rtable3, "$rtable3.id={$this->table}.$col3", 'left')
            ->where($where);
    }

      /**
     * Get all passbooks
     */
    public function passbooks()
    {
        $rtable = 'members';
        $col = 'member_id';
        $rtable2 = 'associations';
        $col2 = 'association_id';

        $qselect_sum_deposits = "SELECT SUM(deposits.amount) FROM deposits WHERE deposits.account_id={$this->table}.id";
        $qselect_sum_withdrawals = "SELECT SUM(withdrawals.amount) FROM withdrawals  WHERE withdrawals.account_id={$this->table}.id";

        $where = ["{$this->table}.deleted_at =" => null];
        $fields = [
            "{$this->table}.ownership",
            "count({$this->table}.id) as accounts",
            "{$this->table}.passbook",
            "ifnull(($qselect_sum_deposits) - ($qselect_sum_withdrawals),0) as balance",
            "{$this->table}.member_id",
            "{$this->table}.association_id",
            "concat($rtable.firstname, ' ', $rtable.lastname) as member_owner",
            "$rtable2.name  as association_owner",
        ];

        return
            $this->db->select($fields, true)
            ->from($this->table)
            ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
            ->join($rtable2, "$rtable2.id={$this->table}.$col2", 'left')
            ->group_by( $fields = [
                "{$this->table}.passbook",
                "{$this->table}.ownership",
                "{$this->table}.member_id",
                "{$this->table}.association_id",
                "$rtable.firstname",
                "$rtable.lastname",
                "$rtable2.name",
            ])
            ->where($where);
    }

    /**
     * Get the association that owner this account id
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
     * Get all loans that belongs to this account id through account
     */
    public function loans(int $id)
    {
        $rtable = 'loans';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['account_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    /**
     * Get all deposit that belongs to this account id through account
     */
    public function deposits(int $id)
    {
        $rtable = 'deposits';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['account_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }
    /**
     * Get all withdrawals that belongs to this account id through account
     */
    public function withdrawals(int $id)
    {
        $rtable = 'withdrawals';

        return $this->db->select("$rtable.*")
            ->from($rtable)
            ->where(['account_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }

    public function calBalance(int $id = null)
    {
        if(!$id)  return;

        $qselect_sum_deposits = "SELECT SUM(deposits.amount) FROM deposits WHERE deposits.account_id={$this->table}.id";
        $qselect_sum_withdrawals = "SELECT SUM(withdrawals.amount) FROM withdrawals  WHERE withdrawals.account_id={$this->table}.id";

        $query = $this->db->select("ifnull(($qselect_sum_deposits) - ($qselect_sum_withdrawals), 0) as total")
                    ->from($this->table)
                    ->where("{$this->table}.deleted_at =", null)
                    ->where("{$this->table}.id", $id)
                    ->get();
        if($query) return $query->row('total');

    }
}

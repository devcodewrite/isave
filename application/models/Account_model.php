<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Account_model extends CI_Model
{
    protected $table = 'accounts';
    protected $ftable = 'association_members';

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
        $lastid = $last ? $last->id : 0;

        if ($record['ownership'] === 'individual') {
            $owner_id = $record['member_id'];
        } else {
            $owner_id = $record['association_id'];
        }
        $data = array_merge($data, [
            'acc_number' => date('y') . str_pad($owner_id, 4, '0', STR_PAD_LEFT) . str_pad($lastid + 1, 4, '0', STR_PAD_LEFT),
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
     * Get account by id
     */
    public function find(int $id)
    {
        $where = [
            'id' => $id,
            "{$this->table}.deleted_at =" => null
        ];
        $result = $this->db->get_where($this->table, $where)->row();

        if ($result) {
            $result->association = $this->association($result->id);
            $result->accType = $this->acctype->find($result->acc_type_id);
        }
        return $result;
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
            "$rtable3.interest_rate",
            "$rtable3.label  as acc_type",
            "DATE({$this->table}.created_at) as created_at",
        ];

        return
            $this->db
            ->select($fields, true)
            ->from($this->table)
            ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
            ->join($rtable2, "$rtable2.id={$this->table}.$col2", 'left')
            ->join($rtable3, "$rtable3.id={$this->table}.$col3", 'left')
            ->join($this->ftable, "{$this->ftable}.$col={$this->table}.$col", 'left')
            ->group_by([
                "{$this->table}.id",
                "{$this->table}.name",
                "{$this->table}.ownership",
                "{$this->table}.passbook",
                "{$this->table}.status",
                "{$this->table}.acc_type_id",
                "{$this->table}.member_id",
                "{$this->table}.association_id",
                "{$this->table}.acc_number",
                "{$this->table}.stamp_amount",
                "$rtable2.name",
                "$rtable3.label",
                "{$this->table}.created_at",
            ])
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
            "(ifnull(($qselect_sum_deposits),0) - ifnull(($qselect_sum_withdrawals),0)) as balance",
            "{$this->table}.member_id",
            "{$this->table}.association_id",
            "$rtable2.name as association_name",
            "$rtable2.id as member_association_id",
            "{$this->table}.name",
            "concat($rtable.firstname, ' ', $rtable.lastname) as member_owner",
            "$rtable2.name  as association_owner",
        ];

        return
            $this->db->select($fields, true)
            ->from($this->table)
            ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
            ->join($this->ftable, "{$this->ftable}.$col={$this->table}.$col")
            ->join($rtable2, "$rtable2.id={$this->ftable}.$col2", 'left')
            ->group_by($fields = [
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
        $col2 = 'member_id';

        return $this->db->distinct()
            ->select("$rtable.*")
            ->from($rtable)
            ->join($this->ftable, "{$this->ftable}.$col=$rtable.id")
            ->join($this->table, "{$this->table}.$col2={$this->ftable}.$col2")
            ->where(["{$this->table}.id" => $id])
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

    public function entries(int $id)
    {
        $fields = [
            'id as ref',
            'amount',
            'type',
            '1 as is_credit',
            "ddate as edate",
            "created_at as creation"
        ];
        $fields1 = [
            'id as ref',
            'amount',
            'type',
            '0 as is_credit',
            "wdate as edate",
            "created_at as creation"
        ];

        $rtable = 'deposits';
        $query1 = $this->db->select($fields, false)
            ->from($rtable)
            ->where(['account_id' => $id])
            ->get_compiled_select();

        $rtable = 'withdrawals';
        $query2 = $this->db->select($fields1)
            ->from($rtable)
            ->where(['account_id' => $id])
            ->get_compiled_select();

        $qselect_sum_deposits = "SELECT SUM(deposits.amount) FROM deposits WHERE account_id=$id AND ddate <= edate AND id <= ref";
        $qselect_sum_withdrawals = "SELECT SUM(withdrawals.amount) FROM withdrawals WHERE account_id=$id AND wdate <= edate AND id <= ref";


        return $this->db->query("SELECT creation,ref, amount,type, is_credit,edate,(ifnull(($qselect_sum_deposits),0.00)-ifnull(($qselect_sum_withdrawals),0.00)) as balance  FROM ($query1 UNION $query2) as x order by edate asc, creation asc")
            ->result();
    }

    public function transactions()
    {
        $fields = [
            'id as ref',
            'amount',
            'deposits.account_id as account_id1',
            'type',
            'depositor_name as narration',
            '1 as is_credit',
            "ddate as edate",
            "created_at as creation"
        ];
        $fields1 = [
            'id as ref',
            'amount',
            'withdrawals.account_id as account_id1',
            'type',
            'withdrawer_name as narration',
            '0 as is_credit',
            "wdate as edate",
            "created_at as creation"
        ];

        $rtable = 'deposits';
        $query1 = $this->db->select($fields, false)
            ->from($rtable)
            ->get_compiled_select();

        $rtable = 'withdrawals';
        $query2 = $this->db->select($fields1)
            ->from($rtable)
            ->get_compiled_select();

        $qselect_sum_deposits = "SELECT SUM(deposits.amount) FROM deposits WHERE created_at <= creation AND id <= ref";
        $qselect_sum_withdrawals = "SELECT SUM(withdrawals.amount) FROM withdrawals WHERE created_at <= creation AND id <= ref";


        return $this->db->query("SELECT creation,ref,amount,type,narration, is_credit,edate,(ifnull(($qselect_sum_deposits),0.00)-ifnull(($qselect_sum_withdrawals),0.00)) as balance FROM (($query1) UNION ($query2)) as x order by creation, ref asc")
            ->result();
    }

    public function calBalance(int $id = null)
    {
        if (!$id)  return;

        $qselect_sum_deposits = "SELECT SUM(deposits.amount) FROM deposits WHERE deposits.account_id={$this->table}.id";
        $qselect_sum_withdrawals = "SELECT SUM(withdrawals.amount) FROM withdrawals  WHERE withdrawals.account_id={$this->table}.id";

        $query = $this->db->select("ifnull(($qselect_sum_deposits),0) - ifnull(($qselect_sum_withdrawals),0) as total")
            ->from($this->table)
            ->where("{$this->table}.deleted_at =", null)
            ->where("{$this->table}.id", $id)
            ->get();
        if ($query) return $query->row('total');
    }

    public function canWithdraw(int $id, float $amount)
    {
        $account = $this->find($id);
        if ($this->calBalance($id) < $amount) {
            $this->session->set_flashdata('error_message', "$account->name has insufficient balance to make this withdrawals!");
            return false;
        }

        return true;
    }

    public function canTransfer(int $id, float $amount)
    {
        $account = $this->find($id);
        if ($this->calBalance($id) < $amount) {
            $this->session->set_flashdata('error_message', "$account->name has insufficient balance to make this transfer!");
            return false;
        }

        return true;
    }

    public function canTakeLoan(int $id, float $amount)
    {
        $account = $this->find($id);
        $accType = $this->acctype->find($account->acc_type_id);

        if (!$accType->is_loan_acc) {
            $this->session->set_flashdata('error_message', "$account->name is not loan account!");
            return false;
        }

        if($amount < $accType->lower_limit || $amount > $accType->upper_limit ){
            $this->session->set_flashdata('error_message', "$account->name's account has an lower limit of $accType->lower_limit and upper limit of $accType->upper_limit for loan requests!");
            return false;
        }

        return true;
    }
}

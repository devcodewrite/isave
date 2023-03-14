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
            $result->association = $this->association->find($result->association_id);
            $result->accType = $this->acctype->find($result->acc_type_id);
            if(!$result->accType || !$result->association){
                return false;
            }
        }

        return $result;
    }

    /**
     * Get accounts by column where cluase
     */
    public function where(array $where = [])
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

        $qselect_sum_deposits = "SELECT ifnull(SUM(deposits.amount),0) FROM deposits WHERE deposits.account_id={$this->table}.id";
        $qselect_sum_withdrawals = "SELECT ifnull(SUM(withdrawals.amount),0) FROM withdrawals  WHERE withdrawals.account_id={$this->table}.id";

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
            "$rtable3.stamp_amount",
            "concat({$rtable}.firstname, ' ', {$rtable}.lastname) as member_owner",
            "$rtable2.name  as association_owner",
            "$rtable3.interest_rate",
            "$rtable3.label  as acc_type",
            "DATE({$this->table}.created_at) as created_at",
        ];

        return
            $this->db
            ->distinct()
            ->select($fields, true)
            ->from($this->table)
            ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
            ->join($rtable2, "$rtable2.id={$this->table}.$col2")
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
            ->join($rtable2, "$rtable2.id={$this->table}.$col2")
            ->group_by([
                "{$this->table}.passbook",
                "{$this->table}.ownership",
                "{$this->table}.association_id",
                ])
            ->where($where);
    }

     /**
     * Get all passbooks
     */
    public function passbooks2()
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
            "{$this->table}.ownership",
            "count({$this->table}.id) as accounts",
            "{$this->table}.passbook",
            "{$this->table}.acc_type_id",
            "$rtable3.label  as acc_type",
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
            ->join($rtable2, "$rtable2.id={$this->table}.$col2")
            ->join($rtable3, "$rtable3.id={$this->table}.$col3", 'left')
            ->group_by([
                "{$this->table}.passbook",
                "{$this->table}.ownership",
                "{$this->table}.association_id",
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
            ->join($this->ftable, "{$this->table}.$col=$rtable.id")
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
            'deposits.account_id as account_id1',
            'type',
            'depositor_name as narration',
            '1 as is_credit',
            "ddate as edate",
            "created_at as creation",
        ];
        $fields1 = [
            'id as ref',
            'amount',
            'withdrawals.account_id as account_id1',
            'type',
            'withdrawer_name as narration',
            '0 as is_credit',
            "wdate as edate",
            "created_at as creation",
        ];

        $rtable = 'deposits';
        $query1 = $this->db->select($fields, false)
            ->from($rtable)
            ->where('account_id', $id)
            ->order_by('ddate', 'asc')
            ->get_compiled_select();

        $rtable = 'withdrawals';
        $query2 = $this->db->select($fields1)
            ->from($rtable)
            ->where('account_id', $id)
            ->order_by('wdate', 'asc')
            ->get_compiled_select();

        $this->db->query("SET @balance:=0;");

        return $this->db->query("SELECT creation,ref,amount,type,narration,is_credit,edate,account_id1,(CASE WHEN is_credit=1 THEN @balance := @balance + amount ELSE @balance := @balance - amount END) as balance FROM (($query1) UNION ($query2)) as x order by edate asc, ref asc")
            ->result();
    }

    public function cashBookQuery($dWhere = [], $wWhere = [])
    {
        $fields = [
            'deposits.id as ref',
            'deposits.amount',
            'accounts.name',
            'accounts.passbook',
            'associations.name as associationName',
            'acc_types.label as accType',
            'deposits.account_id as account_id1',
            'deposits.account_id as d_acc_id',
            '0 as w_acc_id',
            'deposits.type',
            'depositor_name as narration',
            '1 as is_credit',
            "ddate as edate",
            "deposits.created_at as creation",
        ];
        $fields1 = [
            "withdrawals.id as ref",
            'withdrawals.amount',
            'accounts.name',
            'accounts.passbook',
            'associations.name as associationName',
            'acc_types.label as accType',
            'withdrawals.account_id as account_id1',
            'withdrawals.account_id as w_acc_id',
            '0 as d_acc_id',
            'withdrawals.type',
            'withdrawer_name as narration',
            '0 as is_credit',
            "wdate as edate",
            "withdrawals.created_at as creation",
        ];

        $rtable = 'deposits';
        $query1 = $this->db->select($fields, false)
            ->from($rtable)
            ->join("accounts", "accounts.id=$rtable.account_id")
            ->join("associations", "associations.id=accounts.association_id")
            ->join("acc_types", "acc_types.id=accounts.acc_type_id")
            ->order_by('ddate', 'asc')
            ->where($dWhere)
            ->get_compiled_select();
        $accumDeposits = "(SELECT SUM(amount) FROM $rtable WHERE ddate <= edate AND account_id = d_acc_id)";
        
        $rtable = 'withdrawals';
        $query2 = $this->db->select($fields1)
            ->from($rtable)
            ->join("accounts", "accounts.id=$rtable.account_id")
            ->join("associations", "associations.id=accounts.association_id")
            ->join("acc_types", "acc_types.id=accounts.acc_type_id")
            ->where($wWhere)
            ->order_by('wdate', 'asc')
            ->get_compiled_select();

        $accumWithdrawals = "(SELECT SUM(amount) FROM $rtable WHERE wdate <= edate AND account_id = w_acc_id)";
        $query3 = "SELECT creation,ref,associationName,name,passbook,accType,amount,type,narration,is_credit
        ,edate,account_id1,(ifnull($accumDeposits,0) - ifnull($accumWithdrawals,0)) as balance FROM (($query1) UNION ($query2)) as x order by edate desc, ref desc";
      
        return $query3;
    }

    public function associationTransactions()
    {
        $fields = [
            'associations.name',
            'associations.id as association_id',
            'SUM(amount) as deposit_amount',
            '0 as withdrawal_amount',
            "ddate as edate",
        ];
        $fields1 = [
            'associations.name',
            'associations.id as association_id',
            '0 as deposit_amount',
            'SUM(amount) as withdrawal_amount',
            "wdate as edate"
        ];

        $rtable = 'deposits';
        $query1 = $this->db->select($fields, false)
            ->from($rtable)
            ->join('accounts', "accounts.id=$rtable.account_id")
            ->join('associations', "associations.id=accounts.association_id")
            ->where('accounts.ownership', 'individual')
            ->order_by('ddate', 'asc')
            ->group_by('associations.id')
            ->group_by('ddate')
            ->get_compiled_select();

        $rtable = 'withdrawals';
        $query2 = $this->db->select($fields1)
            ->from($rtable)
            ->join('accounts', "accounts.id=$rtable.account_id")
            ->join('associations', "associations.id=accounts.association_id")
            ->where('accounts.ownership', 'individual')
            ->order_by('wdate', 'asc')
            ->group_by('associations.id')
            ->group_by('wdate')
            ->get_compiled_select();

        return $this->db->query("SELECT name,association_id,edate,SUM(ifnull(deposit_amount,0)) as deposit_amount,SUM(ifnull(withdrawal_amount,0)) as withdrawal_amount FROM (($query1) UNION ($query2)) as x group by edate, name order by edate asc")
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

    public function calBalance2($where = [], $date)
    {
        $qselect_sum_deposits = "SELECT SUM(deposits.amount) FROM deposits WHERE deposits.account_id={$this->table}.id AND ddate <='$date'";
        $qselect_sum_withdrawals = "SELECT SUM(withdrawals.amount) FROM withdrawals  WHERE withdrawals.account_id={$this->table}.id AND wdate <='$date'";

        $query = $this->db->select("SUM(ifnull(($qselect_sum_deposits),0) - ifnull(($qselect_sum_withdrawals),0)) as total")
            ->from($this->table)
            ->join('acc_types', "acc_types.id={$this->table}.acc_type_id")
            ->where("{$this->table}.deleted_at =", null)
            ->where($where)

            ->get();
        if ($query) return $query->row('total');
    }

    public function calBalance3($where = [])
    {
        $qselect_sum_deposits = "SELECT SUM(deposits.amount) FROM deposits WHERE deposits.account_id={$this->table}.id";
        $qselect_sum_withdrawals = "SELECT SUM(withdrawals.amount) FROM withdrawals  WHERE withdrawals.account_id={$this->table}.id";

        $query = $this->db->select("SUM(ifnull(($qselect_sum_deposits),0) - ifnull(($qselect_sum_withdrawals),0)) as total")
            ->from($this->table)
            ->join('acc_types', "acc_types.id={$this->table}.acc_type_id")
            ->where("{$this->table}.deleted_at =", null)
            ->where($where)

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

    public function canViewAny($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->accounts))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canView($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->accounts))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canCreate($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('create', explode(',', $role->permission->accounts))?auth()->allow()
                :auth()->deny("You don't have permission to create this record."));
        return auth()->deny("You don't have permission to create this record.");
    }

    public function canUpdate($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('update', explode(',', $role->permission->accounts))?auth()->allow()
                :auth()->deny("You don't have permission to update this record."));
        return auth()->deny("You don't have permission to update this record.");
    }

    public function canDelete($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('delete', explode(',', $role->permission->accounts))?auth()->allow()
                :auth()->deny("You don't have permission to delete this record."));
        return auth()->deny("You don't have permission to delete this record.");
    }
}

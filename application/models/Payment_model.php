<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Payment_model extends CI_Model
{
    protected $table = 'loan_payments';
    protected $ftable = 'association_members';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;

        $loan = $this->loan->find($record['loan_id']);
        if(!$loan) return false;
        $loan->account = $this->account->find($loan->account_id);
        if(!$loan->account) return false;

        $record['principal_amount'] = $this->loan->calcPrincipal($loan);
        if($record['amount'] > $record['principal_amount']){
            $record['interest_amount'] = $record['amount'] - $record['principal_amount'];
        }
        else {
            $record['principal_amount']  = $record['amount'];
        }
        $data = $this->extract($record);

        if ($this->db->insert($this->table, $data)) {
            $id = $this->db->insert_id();
            $this->loan->updateSettlementStatus($record['loan_id']);
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
     * Get loan by id
     */
    public function find(int $id)
    {
        $where = [
            'id' => $id,
        ];
        return $this->db->get_where($this->table, $where)->row();
    }

    /**
     * Get loans by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table, $where);
    }

    /**
     * Get all loans
     */
    public function all()
    {
        $rtable = 'loans';
        $col = 'loan_id';
        $fields =  [
            "{$this->table}.*",
        ];
        return
            $this->db->select($fields, false)
            ->from($this->table);
    }

    public function sum($where = [], string $select = "principal_amount+interest_amount", $alis = "total")
    {
        return $this->db->select("SUM($select) as $alis")->from($this->table)->where($where)->get();
    }

    public function delete(int $id)
    {
        $payment = $this->find($id);

        if ($this->db->delete($this->table, ['id' => $id])) {
            $deposit = $this->deposit->where(['loan_payment_id'=> $payment->id])->row();
            if($deposit) $this->deposit->delete($deposit->id);

            return $this->loan->updateSettlementStatus($payment->loan_id);
        }
        return false;
    }

    public function canViewAny($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->loan_payments))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canView($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->loan_payments))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canCreate($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('create', explode(',', $role->permission->loan_payments))?auth()->allow()
                :auth()->deny("You don't have permission to create this record."));
        return auth()->deny("You don't have permission to create this record.");
    }

    public function canUpdate($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('update', explode(',', $role->permission->loan_payments))?auth()->allow()
                :auth()->deny("You don't have permission to update this record."));
        return auth()->deny("You don't have permission to update this record.");
    }

    public function canDelete($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('delete', explode(',', $role->permission->loan_payments))?auth()->allow()
                :auth()->deny("You don't have permission to delete this record."));
        return auth()->deny("You don't have permission to delete this record.");
    }
}

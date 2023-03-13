<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Association_model extends CI_Model
{
    protected $table = 'associations';
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

    public function addMember(int $association_id,int $member_id)
    {
        $data = [
            'member_id' =>$member_id,
            'association_id' => $association_id,
        ];

        if ($this->db->insert($this->ftable, $data)) {
            $id = $this->db->insert_id();
            return $this->find($id);
        }
    }

    public function removeMember(int $association_id,int $member_id)
    {
        $data = [
            'member_id' =>$member_id,
            'association_id' => $association_id,
        ];

       return $this->db->delete($this->ftable, $data);
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
     * Get association by id
     */
    public function find(int $id)
    {
        $where = [
            'id'=> $id,
            "{$this->table}.deleted_at =" => null
        ];
        return $this->db->get_where($this->table,$where)->row();
    }

     /**
     * Get associations by column where cluase
     */
    public function where(array $where)
    {
        $where = array_merge($where, ["{$this->table}.deleted_at =" => null]);
        return $this->db->get_where($this->table,$where);
    }

    /**
     * Get all associations
     */
    public function all()
    {
        $where = ["{$this->table}.deleted_at =" => null];
        $fields = [
            "{$this->table}.*",
            "(SELECT count(*) from {$this->ftable} INNER JOIN members ON members.id={$this->ftable}.member_id where {$this->ftable}.association_id={$this->table}.id AND members.deleted_at IS NULL) as totalMembers ",
        ];

        return 
            $this->db->distinct()
                    ->select($fields, false)
                    ->from($this->table)
                    ->where($where);
    }

    /**
     * Get the cluster offices
     */
    public function clusterOffices()
    {
        return $this->db->select("cluster_office_address")
                    ->distinct()
                    ->from($this->table)
                    ->where("{$this->table}.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get the communities
     */
    public function communities()
    {
        return $this->db->select("community")
                    ->distinct()
                    ->from($this->table)
                    ->where("{$this->table}.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all account that belongs to this association id
     */
    public function accounts(int $id)
    {
        $rtable = 'accounts';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['association_id'=> $id, 'ownership' => 'association'])
                    ->where("$rtable.deleted_at", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all loans that belongs to this association id through account
     */
    public function loans(int $id)
    {
        $rtable = 'loans';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['association_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all deposit that belongs to this association id through account
     */
    public function deposits(int $id)
    {
        $rtable = 'deposits';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['association_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }
    /**
     * Get all withdrawals that belongs to this association id through account
     */
    public function withdrawals(int $id)
    {
        $rtable = 'withdrawals';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['association_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all transactions summary that belongs to this association id
     */
    public function transactions($where=[])
    {
        $rtable = 'deposits';
        $col = "account_id";
        $rtable1 = "accounts";
        $rtable2 = "associations";
        $col2 = "association_id";

        $cashDeposit = "SUM(ifnull( (CASE WHEN $rtable.type='cash' THEN $rtable.amount ELSE 0 END),0.00))";
        $momoDeposit = "SUM(ifnull( (CASE WHEN $rtable.type='momo' THEN $rtable.amount ELSE 0 END),0.00))";
        $transferDeposit = "SUM(ifnull( (CASE WHEN $rtable.type='transfer' THEN $rtable.amount ELSE 0 END),0.00))";

        $fields= [
            "ddate as tdate",
            "$cashDeposit as cash_deposits", 
            "$momoDeposit as momo_deposits", 
            "$transferDeposit as transfer_deposits",
            "association_id",
            'associations.name as association_name',
        ];

        return $this->db->select($fields, false)
                    ->from($rtable)
                    ->join($rtable1, "$rtable1.id=$rtable.$col", 'left')
                    ->join($rtable2, "$rtable2.id=$rtable1.$col2", 'left')
                    ->where($where)
                    ->group_by("$rtable.ddate")
                    ->group_by('association_id')
                    ->group_by("$rtable2.name");
    }

     /**
     * Get all transactions summary that belongs to this association id
     */
    public function transactions2($where=[])
    {
        $rtable = 'withdrawals';
        $col = "account_id";
        $rtable1 = "accounts";
        $rtable2 = "associations";
        $col2 = "association_id";

        $cashWithdrawal = "SUM(ifnull( (CASE WHEN $rtable.type='cash' THEN $rtable.amount ELSE 0 END),0.00))";
        $momoWithdrawal = "SUM(ifnull( (CASE WHEN $rtable.type='momo' THEN $rtable.amount ELSE 0 END),0.00))";
        $transferWithdrawal = "SUM(ifnull( (CASE WHEN $rtable.type='transfer' THEN $rtable.amount ELSE 0 END),0.00))";

        $fields= [
            "wdate as tdate",
            "$cashWithdrawal as cash_withdrawals", 
            "$momoWithdrawal as momo_withdrawals", 
            "$transferWithdrawal as transfer_withdrawals",
            "association_id",
            'associations.name as association_name',
        ];

        return $this->db->select($fields, false)
                    ->from($rtable)
                    ->join($rtable1, "$rtable1.id=$rtable.$col", 'left')
                    ->join($rtable2, "$rtable2.id=$rtable1.$col2", 'left')
                    ->where($where)
                    ->group_by("$rtable.wdate")
                    ->group_by('association_id')
                    ->group_by("$rtable2.name");
    }

     /**
     * Get all loans that belongs to this account id through account
     */
    public function statements($where = [])
    {
        $rcol = "association_id";

        $rtable = 'account_statements';
        $fields = [
            "$rtable.*",
            "{$this->table}.name as association_name",
        ];
        return $this->db->select($fields)
                    ->from($rtable)
                    ->join($this->table, "{$this->table}.id=$rtable.$rcol")
                    ->where($where);
    }

    public function canViewAny($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->associations))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canView($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->associations))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canCreate($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('create', explode(',', $role->permission->associations))?auth()->allow()
                :auth()->deny("You don't have permission to create this record."));
        return auth()->deny("You don't have permission to create this record.");
    }

    public function canUpdate($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('update', explode(',', $role->permission->associations))?auth()->allow()
                :auth()->deny("You don't have permission to update this record."));
        return auth()->deny("You don't have permission to update this record.");
    }

    public function canDelete($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('delete', explode(',', $role->permission->associations))?auth()->allow()
                :auth()->deny("You don't have permission to delete this record."));
        return auth()->deny("You don't have permission to delete this record.");
    }
}
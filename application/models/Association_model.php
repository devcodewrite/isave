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
            $this->db->select($fields, false)
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
                    ->where(['association_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
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
     * Get all associations that the association id has
     */
    public function associations(int $id)
    {
        $rtable = 'associations';
        $pivot = 'association_associations';
        $foreginKey1 = 'association_id';
        $foreginKey2 = 'association_id';

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
     * Get the identity card type that owner this association id
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

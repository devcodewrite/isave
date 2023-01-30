<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Association_model extends CI_Model
{
    protected $table = 'associations';

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
            "(SELECT count(members.id) from members where members.association_id={$this->table}.id AND members.deleted_at IS NULL) as totalMembers ",
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
    public function coummunities()
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

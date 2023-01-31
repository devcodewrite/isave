<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Withdrawal_model extends CI_Model
{
    protected $table = 'withdrawals';

     /**
     * Get withdrawal by id
     */
    public function find(int $id)
    {
        $where = [
            'id'=> $id,
        ];
        return $this->db->get_where($this->table,$where)->row();
    }

     /**
     * Get withdrawals by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table,$where);
    }

    /**
     * Get all withdrawals
     */
    public function all()
    {
        $fields = [];
        return 
            $this->db->select($fields, true)
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
                    ->where([$col=> $id])
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
                    ->where(['withdrawal_id'=> $id])
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
                    ->where(['withdrawal_id'=> $id])
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
                    ->where([$col=> $id])
                    ->get()
                    ->row();
    }

}

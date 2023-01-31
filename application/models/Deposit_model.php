<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Deposit_model extends CI_Model
{
    protected $table = 'deposits';

     /**
     * Get deposit by id
     */
    public function find(int $id)
    {
        $where = [
            'id'=> $id,
        ];
        return $this->db->get_where($this->table,$where)->row();
    }

     /**
     * Get deposits by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table,$where);
    }

    /**
     * Get all deposits
     */
    public function all()
    {
        $fields = [];
        return 
            $this->db->select($fields, true)
                    ->from($this->table);
    }

    /**
     * Get the association that owner this deposit id
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
     * Get all account that belongs to this deposit id
     */
    public function accounts(int $id)
    {
        $rtable = 'accounts';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['deposit_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all deposit that belongs to this deposit id through account
     */
    public function deposits(int $id)
    {
        $rtable = 'deposits';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['deposit_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }
 /**
     * Get all withdrawals that belongs to this deposit id through account
     */
    public function withdrawals(int $id)
    {
        $rtable = 'withdrawals';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['deposit_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all associations that the deposit id has
     */
    public function associations(int $id)
    {
        $rtable = 'associations';
        $pivot = 'association_deposits';
        $foreginKey1 = 'association_id';
        $foreginKey2 = 'deposit_id';

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
     * Get the identity card type that owner this deposit id
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

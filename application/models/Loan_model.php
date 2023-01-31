<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Loan_model extends CI_Model
{
    protected $table = 'loans';

     /**
     * Get loan by id
     */
    public function find(int $id)
    {
        $where = [
            'id'=> $id,
        ];
        return $this->db->get_where($this->table,$where)->row();
    }

     /**
     * Get loans by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table,$where);
    }

    /**
     * Get all loans
     */
    public function all()
    {
        $fields = [];
        return 
            $this->db->select($fields, true)
                    ->from($this->table);
    }

    /**
     * Get the association that owner this loan id
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
     * Get all account that belongs to this loan id
     */
    public function accounts(int $id)
    {
        $rtable = 'accounts';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['loan_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all loans that belongs to this loan id through account
     */
    public function loans(int $id)
    {
        $rtable = 'loans';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['loan_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all deposit that belongs to this loan id through account
     */
    public function deposits(int $id)
    {
        $rtable = 'deposits';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['loan_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }
 /**
     * Get all withdrawals that belongs to this loan id through account
     */
    public function withdrawals(int $id)
    {
        $rtable = 'withdrawals';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['loan_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }

     /**
     * Get all associations that the loan id has
     */
    public function associations(int $id)
    {
        $rtable = 'associations';
        $pivot = 'association_loans';
        $foreginKey1 = 'association_id';
        $foreginKey2 = 'loan_id';

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
     * Get the identity card type that owner this loan id
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

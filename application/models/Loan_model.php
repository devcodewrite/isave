<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Loan_model extends CI_Model
{
    protected $table = 'loans';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;

        $data = $this->extract($record);

        $data['user_id'] = auth()->user()->id;

        if ($this->db->insert($this->table, $data)) {
            $id = $this->db->insert_id();
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
        $rtable = 'loan_types';
        $col = 'loan_type_id';
        $rtable2 = 'accounts';
        $col2 = 'account_id';

        $fields = ['loans.*', 
        "$rtable.label as loanType", 
        "$rtable.rate_type",
        "$rtable2.acc_number"];
        return 
            $this->db->select($fields, true)
                    ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
                    ->join($rtable2, "$rtable2.id={$this->table}.$col2", 'left')
                    ->from($this->table);
    }

    public function calcReduceInterest($loan, $index = 0)
    {
        return 
        (($loan->principal_amount - ($loan->principal_amount/$loan->duration*$index)) * $loan->rate)/$loan->duration;
    }

    public function calcFlatInterest($loan)
    {
        return ($loan->principal_amount * $loan->rate)/$loan->duration;
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

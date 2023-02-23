<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Loan_model extends CI_Model
{
    protected $table = 'loans';
    protected $ftable = 'association_members';

    public function create(array $record)
    {
        if (!$record) return;
        $record['user_id'] = auth()->user()->id;

        if (!$this->account->canTakeLoan($record['account_id'], $record['principal_amount'])) {
            return false;
        }
        $loan = (object)$record;
        $loan->accType = $this->account->find($record['account_id'])->accType;

        $interestTotal = 0;
        for ($i = 0; $i < $loan->duration * 4; $i++) {
            if ($loan->accType->rate_type === 'flat_rate') {
                $interestTotal += $this->loan->calcFlatInterest($loan, $i);
            } else {
                $interestTotal += $this->loan->calcReduceInterest($loan, $i);
            }
        }
        $record['interest_amount'] = $interestTotal;

        $data = $this->extract($record);

        $data['user_id'] = auth()->user()->id;
        if ($this->db->insert($this->table, $data)) {
            $id = $this->db->insert_id();
            return $this->find($id);
        }
        return false;
    }

    /**
     * Update a record
     * @param $id
     * @return Boolean
     */
    public function update(int $id, array $record)
    {
        $loan =(object)$record;

        if (isset($record['principal_amount'])) {
            if (!$this->account->canTakeLoan($record['account_id'], $record['principal_amount'])) {
                return false;
            }
        }

        if (isset($record['account_id'])) {
            $loan->accType = $this->account->find($record['account_id'])->accType;
            $interestTotal = 0;
            for ($i = 0; $i < $loan->duration * 4; $i++) {
                if ($loan->accType->rate_type === 'flat_rate') {
                    $interestTotal += $this->loan->calcFlatInterest($loan, $i);
                } else {
                    $interestTotal += $this->loan->calcReduceInterest($loan, $i);
                }
            }
            $record['interest_amount'] = $interestTotal;
        }

        $data = $this->extract($record);

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
     * Get loan by id
     */
    public function find(int $id)
    {
        $where = [
            'id' => $id,
            'deleted_at' => null,
        ];
        return $this->db->get_where($this->table, $where)->row();
    }

    /**
     * Get loans by column where cluase
     */
    public function where(array $where)
    {
        $where = array_merge($where, ["{$this->table}.deleted_at"=>null]);
        return $this->db->get_where($this->table, $where);
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
        $rtable3  = 'acc_types';
        $col3 = 'acc_type_id';
        $rtable4  = 'users';
        $col4 = 'user_id';

        $fields =  [
            'loans.*',
            "$rtable.label as loanType",
            "$rtable.rate_type",
            "$rtable2.acc_number",
            "$rtable2.name",
            "$rtable3.label as accType",
            "concat($rtable4.firstname, ' ', $rtable4.lastname) as user",
        ];
        return
            $this->db->select($fields, true)
            ->from($this->table)
            ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
            ->join($rtable2, "$rtable2.id={$this->table}.$col2", 'left')
            ->join($rtable3, "$rtable3.id=$rtable2.$col3", 'left')
            ->join($rtable4, "$rtable4.id={$this->table}.$col4", 'left')
            ->where("{$this->table}.deleted_at", null);
    }
    public function calcPrincipal($loan)
    {
        return $loan->principal_amount / ($loan->duration * 4);
    }

    public function calcReduceInterest($loan, $index = 0)
    {
        return ($loan->principal_amount - $loan->principal_amount / 4* $index) * $loan->rate /4;
    }

    public function calcFlatInterest($loan)
    {
        return ($loan->principal_amount * $loan->rate) /  4;
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
            ->where([$col => $id])
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
            ->where(['loan_id' => $id])
            ->where("$rtable.deleted_at =", null)
            ->get()
            ->result();
    }


    public function sum($where = [], string $select = "principal_amount+interest_amount", $alis = "total")
    {
        return $this->db->select("SUM($select) as $alis")->where($where)->get($this->table);
    }
}

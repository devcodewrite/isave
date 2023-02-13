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
        $loan = (object)$record;
        $loan->LoanType = $this->loantype->find($record['loan_type_id']);

        $interestTotal = 0;
        for ($i = 0; $i < $loan->duration * 4; $i++) {
            if ($loan->LoanType->rate_type === 'flat_rate') {
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
        $loan = (object)$record;

        if (isset($record['loan_type_id'])) {
            $loan->LoanType = $this->loantype->find($record['loan_type_id']);
            $interestTotal = 0;
            for ($i = 0; $i < $loan->duration * 4; $i++) {
                if ($loan->LoanType->rate_type === 'flat_rate') {
                    $interestTotal += $this->loan->calcFlatInterest($loan, $i);
                } else {
                    $interestTotal += $this->loan->calcReduceInterest($loan, $i);
                }
            }
            $record['interest_amount'] = $interestTotal;
        }

        if(isset($record['appl_status'])){
            if($record['appl_status'] === 'disbursed'){
                $loan = $this->loan->find($id);
            $this->deposit->create([
                    'amount' => $loan->principal_amount,
                    'depositor_name' => 'System',
                    'type' => 'addition',
                    'ddate' => date('Y-m-d'),
                    'account_id' => $loan->account_id,
                ]);
            }
        }

        $data = $this->extract($record);

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
            ->join($rtable, "$rtable.id={$this->table}.$col", 'left')
            ->join($rtable2, "$rtable2.id={$this->table}.$col2", 'left')
            ->join($rtable3, "$rtable3.id=$rtable2.$col3", 'left')
            ->join($rtable4, "$rtable4.id={$this->table}.$col4", 'left')
            ->from($this->table);
    }
    public function calcPrincipal($loan)
    {
        return $loan->principal_amount / ($loan->duration * 4);
    }

    public function calcReduceInterest($loan, $index = 0)
    {
        return ($loan->principal_amount - $loan->principal_amount / ($loan->duration * 4) * $index) * $loan->rate / ($loan->duration * 4);
    }

    public function calcFlatInterest($loan)
    {
        return ($loan->principal_amount * $loan->rate) / ($loan->duration * 4);
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

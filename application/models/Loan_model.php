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
            $this->updateSettlementStatus($id);
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
        return $this->db->affected_loans() > 0;
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
        $where = array_merge($where, ["{$this->table}.deleted_at" => null]);
        return $this->db->get_where($this->table, $where);
    }

    /**
     * Get all loans
     */
    public function all()
    {
        $rtable2 = 'accounts';
        $col2 = 'account_id';
        $rtable3  = 'acc_types';
        $col3 = 'acc_type_id';
        $rtable4  = 'users';
        $col4 = 'user_id';
        $rtable5 = "associations";
        $col5 = "association_id";

        $fields =  [
            'loans.*',
            "$rtable2.acc_number",
            "$rtable2.name",
            "$rtable3.label as accType",
            "concat($rtable4.firstname, ' ', $rtable4.lastname) as user",
            "$rtable5.name as association_name",
        ];
        return
            $this->db->select($fields, true)
            ->from($this->table)
            ->join($rtable2, "$rtable2.id={$this->table}.$col2")
            ->join($rtable3, "$rtable3.id=$rtable2.$col3", 'left')
            ->join($rtable4, "$rtable4.id={$this->table}.$col4", 'left')
            ->join($rtable5, "$rtable5.id=$rtable2.$col5")
            ->where("{$this->table}.deleted_at", null);
    }

    public function calcPrincipal($loan)
    {
        return $loan->principal_amount / ($loan->duration * 4);
    }

    public function calcReduceInterest($loan, $index = 0)
    {
        return ($loan->principal_amount - $loan->principal_amount / 4 * $index) * $loan->rate / 4;
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

    public function updateSettlementStatus(int $id)
    {
        $loan = $this->find($id);
        $loan->account = $this->account->find($loan->account_id);
        $loan->totalPaid = $this->payment->sum(['loan_id' => $loan->id])->row('total');
        $date1 = new DateTime(($loan->last_repayment ? $loan->last_repayment : $loan->payin_start_date));

        $totalAmount = 0;
        $totalArrears = 0;
        $lastDayInArrears = null;
        $inArrears = false;
        for ($i = 0; $i < $loan->duration * 4; $i++) {

            if ($loan->account->accType->rate_type === 'flat_rate') {
                $totalAmount += $this->loan->calcPrincipal($loan)
                    + $this->loan->calcFlatInterest($loan, $i);
            } else {
                $totalAmount += $this->loan->calcPrincipal($loan)
                    + $this->loan->calcReduceInterest($loan, $i);
            }
            $setl = new DateTime($loan->payin_start_date . " + $i week");

            if ($setl > (new DateTime('today'))) {
                break;
            }

            if ($setl >= $date1 && $totalAmount > $loan->totalPaid) {
                $totalArrears = $totalAmount - $loan->totalPaid;
                $inArrears = true;
                $lastDayInArrears = $setl;
            }
        }

        if ($inArrears) {
            $l = $loan->duration * 4;
            $lastDay =  new DateTime($loan->payin_start_date . " + $l week");
            $interval = DateInterval::createFromDateString('1 week');
            $record = [
                'arrears_days' => $lastDayInArrears->diff($date1->add($interval))->format('%a'),
                'total_arrears' => $totalArrears
            ];
            if ((new DateTime('today')) > $lastDay) {
                $record = array_merge($record, ['setl_status' => 'defaulted']);
            }
            return $this->update($id, $record);
        }
        return true;
    }
}

<?php
defined('BASEPATH') or exit('No direct script allowed');

class Reporting extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function cashbook()
    {
        $this->load->view('pages/reportings/cashbook');
    }

    /**
     * Show a list of resources
     * @return string html view
     */
    public function transactions()
    {
        $this->load->view('pages/reportings/transactions');
    }


    /**
     * Show a list of resources
     * @return string html view
     */
    public function loan_transactions()
    {
        $this->load->view('pages/reportings/loan_transactions');
    }


    /**
     * Show a list of resources
     * @return string html view
     */
    public function member_refundable_balances()
    {
        $accTypes = $this->acctype->where()->result();

        $data = [
            'columns' => $accTypes,
        ];
        $assoid = $this->input->get('association_id');
        $association = $this->association->find(($assoid ? $assoid : 0));

        if ($association) {
            $data = array_merge($data, ['association' => $association]);
        }
        $this->load->view('pages/reportings/member_refundable_balances', $data);
    }

    public function cashbook_datatable()
    {
        $start = $this->input->get('start', true);
        $length = $this->input->get('length', true);
        $draw = $this->input->get('draw', true);
        $inputs = $this->input->get();
        if (isset($inputs['date_from']) && isset($inputs['date_to'])) {
            $where1 = [
                'ddate >=' => $inputs['date_from'],
                'ddate >=' => $inputs['date_to'],
            ];
            $where2 = [
                'wdate >=' => $inputs['date_from'],
                'wdate >=' => $inputs['date_to'],
            ];
        }
        
        $query = $this->account->cashBookQuery($where1, $where2);

        $out = datatable($query, $start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }
}

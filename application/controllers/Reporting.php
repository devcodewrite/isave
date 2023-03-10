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
        $association = $this->association->find(($assoid?$assoid:0));

        if($association){
            $data = array_merge($data, ['association'=> $association]);
        }
        $this->load->view('pages/reportings/member_refundable_balances', $data);
    }
}

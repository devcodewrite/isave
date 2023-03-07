<?php
defined('BASEPATH') or exit('No direct script allowed');

class Reporting extends MY_Controller
{
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
}

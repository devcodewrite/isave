<?php
defined('BASEPATH') or exit('No direct script allowed');

class Reporting extends MY_Controller
{
     /**
     * Show a list of resources
     * @return string html view
     */
    public function deposits()
    {
        $from = $this->input->post('form_date');
        $to = $this->input->post('to_date');
        $association = $this->input->post('association_id');
        $member = $this->input->post('member_id');

        if($association) $association = $this->association->find($association);
        if($member) $member = $this->member->find($member);
        $data = [
           'from' => $from,
           'to' => $to,
           'association' => $association,
           'member' => $member,
        ];
        $this->load->view('pages/reportings/deposits', $data);
    }
}

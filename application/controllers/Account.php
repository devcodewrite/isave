<?php
defined('BASEPATH') or exit('No direct script allowed');

class Account extends CI_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        redirect('account/profile');
    }

     /**
     * Show authenticated user profile
     * html view
     */
    public function profile()
    {
        $uid = $this->session->userdata('login_id');
        $data = [
           // 'authUser' => $this->user_model->getById($uid), //This is an example replace with actual model
        ];
        $this->load->view('pages/account/profile', $data);
    }

     /**
     * Show authenticated user profile update form
     * html view
     */
    public function profile_update()
    {
        $this->load->view('pages/account/update-profile');
    }

    /**
     * Update a resource
     * print json Response
     */
    public function update_profile ()
    {
      // $authUser = $this->auth->getUser();

    }
}
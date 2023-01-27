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
        $table = "members";
        $column = "id";
        $data = [
            'customer' => $this->common->get_data_by_id($table,$uid,$column), //This is an example replace with actual model
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
      $id = $this->session->userdata('login_id');
      $data = array();
        $table="members";
        $column = "id";
        $customer  = $this->common->update_data($id,$data,$table,$column); // replace created record object
        if($customer){
            $out = [
                'status' => true,
                'message' => 'Customer data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Customer data couldn't be updated!"
            ];
        }
        httpResponseJson($out);

    }
}
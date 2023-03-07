<?php
defined('BASEPATH') or exit('No direct script allowed');

class Account extends MY_Controller
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
        $data = [
            'customer' => null //This is an example replace with actual model
        ];
        $this->load->view('pages/account/profile', $data);
    }

     /**
     * Show authenticated user profile update form
     * html view
     */
    public function update_profile()
    {
        $this->load->view('pages/account/update-profile');
    }

    /**
     * Update a resource
     * print json Response
     */
    public function update ()
    {
        $user  = null;// replace created record object
        if($user){
            $out = [
                'status' => true,
                'message' => 'Profile updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Profile couldn't be updated!"
            ];
        }
        httpResponseJson($out);

    }
}
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
            'user' => auth()->user()
        ];
        $this->load->view('pages/account/profile', $data);
    }

     /**
     * Show authenticated user profile update form
     * html view
     */
    public function update_profile()
    {
        $data = [
            'user' => auth()->user()
        ];
        $this->load->view('pages/account/profile_update', $data);
    }

    /**
     * Update a resource
     * print json Response
     */
    public function update ()
    {
        $record = $this->input->post(null);

        $user  = $this->user->update(auth()->user()->id, $record);
        
        $error = $this->session->flashdata('error_message') . $this->session->flashdata('warning_message');

        if($user){
            $out = [
                'status' => true,
                'message' => 'Profile updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => $error ? $error : "Profile couldn't be updated!"
            ];
        }
        httpResponseJson($out);

    }
}
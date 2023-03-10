<?php
defined('BASEPATH') or exit('No direct script allowed');

class Auth extends CI_Controller
{
    /**
     * Show login form
     * @return string html view
     */
    public function index()
    {
        $data = [
            'pageTitle' => 'Login - '.config_item('app_name'),
        ];
        $this->load->view('pages/auth/login', $data);
    }

     /**
     * Show forgotten password form
     * html view
     */
    public function forgot_password()
    {
        $this->load->view('pages/auth/forgot_password');
    }

    /**
     * Show reset password form
     * html view
     */
    public function reset_password ()
    {
        $this->load->view('pages/auth/reset_password');
    }

    /**
     * Authenticate user and login
     * print json Response
     */
    public function login ()
    {
       if(auth()->loginUser(
        $this->input->post('username'), 
        $this->input->post('password')) ){
            $out = [
                'status' => true,
                'message' => 'You have logged in successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => auth()->error()
            ];
        }
        httpResponseJson($out);
    }

    public function logout()
    {
        auth()->logout();
    }

    /**
     * Check email/username and  send reset password email
     * print json Response
     */
    public function reset_password_email ()
    {
        # code...
    }
}
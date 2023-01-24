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
        $this->load->view('pages/auth/login');
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
        # code...
    }

    /**
     * Check email/username and  send reset password email
     * print json Response
     */
    public function sendResetPasswordEmail ()
    {
        # code...
    }
}
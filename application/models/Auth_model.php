<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
     protected $excluded_uris = [
          'dashboard',
          'account/profile',
          'account/profile-update',
     ];

     public function user()
     {
          if(!$this->session->has_userdata('login_id')) return false;
          return $this->user->find($this->session->userdata('login_id'));
     }

     public function hasPermission(string $uri = null)
     {
          if (!$this->checkPermissions($uri)) show_error('Authorized Access!', 401);
     }

     /**
      * check if session loginid exist and verify from database 
      * if user exist and is not disabled
      *@return boolean true if everything is ok
      */
     public function isLoggedIn()
     {
          return $this->user()?true:false;
     }

     public function checkPermissions(string $uri = null)
     {
          if (!$uri) return false;
          
          if(in_array($uri, $this->excluded_uris)) return true;
          
          return true;
     }

     /**
      * check authenticated user can perform $action on $moduleName
      */
     public function can(string $action='', string $moduleName = '', $module = null)
     {
          if($action === '' || $moduleName === '') return false;  

          return $this->{$moduleName}->{'can'.ucfirst($action)}(auth()->user(), $module);
     }

     public function canAny(array $actions = [], string $moduleName = '', $module = null)
     {
          if( sizeof($actions) === 0 || $moduleName === '') return false;  
          foreach ($actions as $key => $action) {
               $gate = $this->{$moduleName}->{'can'.ucfirst($action)}(auth()->user(), $module); 
               if($gate->allowed())return $gate;
          }

          return $this->deny();
     }

     public function allow(string $message =null)
     {
          return new AuthResponse(true, $message);
     }

     public function deny(string $message =null)
     {
          return new AuthResponse(false, $message);
     }

     public function loginUser(string $username, string $pass)
     {
          $where = [
               'rstatus' => 'open',
               'username' => $username,
          ];
          $user = $this->user->where($where)->row();
          if (!$user) {
               $this->session->set_flashdata('auth_error', "This account doesn't exist! or its closed!");
               return false;
          }

          if (password_verify($pass, $user->password)){
               $this->session->set_userdata('login_id', $user->id);
               return true;
          }
          $this->session->set_flashdata('auth_error', "Invalid credentials");

          return false;
     }

     public function error()
     {
          return $this->session->flashdata('auth_error');
     }

     public function logout()
     {
          session_destroy();
          redirect();
     }
}

class AuthResponse
{
     public $message;
     protected $status;

     public function __construct(bool $status, $message = null) {
          $this->status = $status;
          $this->message = $message;
     }
     public function allowed()
     {
          return $this->status;
     }
     public function denied()
     {
          return !$this->status;
     }
}


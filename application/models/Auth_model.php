<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function user()
    { 
        // replace user_model with actual
        return $this->user_model->getById($this->session->userdata('login_id'));
    }
   public function hasLoggedIn()
   {
        if(!$this->isLoggedIn())
            redirect('');
   }

   public function hasPermission(string $uri = null)
   {
        if(!$this->checkPermissions($uri)) show_error('Authorized Access!', 401);
   }

   /**
    * check if session loginid exist and verify from database 
    * if user exist and is not disabled
    *@return boolean true if everything is ok
    */
   public function isLoggedIn()
   {
        $uid = $this->session->userdata('login_id');
        //TODO: implement
   }

   public function checkPermissions(string $uri = null)
   {
        if($uri) return true;

        //TODO: implement
   }
}

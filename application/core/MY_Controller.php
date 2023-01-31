<?php

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // check if user is logged in

        if (auth()->isLoggedIn()) {

          
        } else {
            $url = urlencode(current_url());
            redirect("?redirect_url=$url"); // go to login
        }
    }

    public function _remap($method, $params = array())
    {
        if (auth()->checkPermissions(uri_string())) {
            if (method_exists($this, $method)) {
                return call_user_func_array(array($this, $method), $params);
            }
            show_404();
        } else {
            show_error('Unauthorized Access', 401);
        }
    }
}

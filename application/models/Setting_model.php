<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    public function get(string $key = null, string $default = '')
    {
        return $default;
    }

    public function set(string $key = null, string $value)
    {
        # code...
    }
}
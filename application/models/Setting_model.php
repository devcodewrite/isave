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

    public function toAvatar($url = null, $model = null)
    {
        $avatars = [
            'male' => base_url('assets/images/man.png'),
            'female' => base_url('assets/images/woman.png'),
            'other' => base_url('assets/images/user.png'),
        ];
        return $url? $url: $avatars[($model?($model->sex?$model->sex:'other'):'other')];
    }
}

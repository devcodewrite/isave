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

    public function canViewAny($user){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->settings))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canView($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('view', explode(',', $role->permission->settings))?auth()->allow()
                :auth()->deny("You don't have permission to view this recored."));
        return auth()->deny("You don't have permission to view this recored.");
    }

    public function canUpdate($user, $model){
        $role = $this->user->find($user->id)->role;
        if ($role)
            return
                $role->permission->is_admin === '1'
                ? auth()->allow() : (in_array('update', explode(',', $role->permission->settings))?auth()->allow()
                :auth()->deny("You don't have permission to update this record."));
        return auth()->deny("You don't have permission to update this record.");
    }
}

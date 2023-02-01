<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Role_model extends CI_Model
{
    protected $table = 'roles';

     /**
     * Get role by id
     */
    public function find(int $id)
    {
        if(!$id) return;
        
        $where = [
            'id'=> $id,
        ];
        return $this->db->get_where($this->table,$where)->row();
    }

     /**
     * Get roles by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table,$where);
    }

    /**
     * Get all roles
     */
    public function all()
    {
        $fields = [];
        return 
            $this->db->select($fields, true)
                    ->from($this->table);
    }

     /**
     * Get all users that belongs to this role id
     */
    public function users(int $id)
    {
        $rtable = 'users';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['role_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }
}

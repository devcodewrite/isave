<?php
defined('BASEPATH') or exit('Direct acess is not allowed');

class Permission_model extends CI_Model
{
    protected $table = 'permissions';

     /**
     * Get permission by id
     */
    public function find(int $id)
    {
        $where = [
            'id'=> $id,
        ];
        return $this->db->get_where($this->table,$where)->row();
    }

     /**
     * Get permissions by column where cluase
     */
    public function where(array $where)
    {
        return $this->db->get_where($this->table,$where);
    }

    /**
     * Get all permissions
     */
    public function all()
    {
        $fields = [];
        return 
            $this->db->select($fields, true)
                    ->from($this->table);
    }

     /**
     * Get all users that belongs to this permission id
     */
    public function users(int $id)
    {
        $rtable = 'users';

        return $this->db->select("$rtable.*")
                    ->from($rtable)
                    ->where(['permission_id'=> $id])
                    ->where("$rtable.deleted_at =", null)
                    ->get()
                    ->result();
    }
}

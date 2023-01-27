<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model
{
    public function update_data($id,$data,$table,$column)
    {
        $this->db->update($table,$data,"$column=$id");
        return true;
    }
    public function insert_data($table,$data)
    {
        $this->db->insert($table,$data);
        return true;
    }
    public function get_data_by_id($table,$id,$column)
    {
        $query =  $this->db->query("SELECT * FROM $table WHERE $column=$id");
        $result=$query->result_array();
        return $result;
    }


    //All data queries
    public function get_members_data()
    {
        $query =  $this->db->query("SELECT * FROM members WHERE deleted_at is null");
        $result=$query->result_array();
        return $result;
    }
    public function get_accounts_data()
    {
        $query =  $this->db->query("SELECT * FROM accounts WHERE deleted_at is null");
        $result=$query->result_array();
        return $result;
    }
    public function get_associations_data()
    {
        $query =  $this->db->query("SELECT * FROM associations WHERE deleted_at is null");
        $result=$query->result_array();
        return $result;
    }
    public function get_deposits_data()
    {
        $query =  $this->db->query("SELECT * FROM deposits WHERE deleted_at is null");
        $result=$query->result_array();
        return $result;
    }
    public function get_loans_data()
    {
        $query =  $this->db->query("SELECT * FROM loans WHERE deleted_at is null");
        $result=$query->result_array();
        return $result;
    }
    public function get_loan_payments_data()
    {
        $query =  $this->db->query("SELECT * FROM loans WHERE deleted_at is null");
        $result=$query->result_array();
        return $result;
    }
    public function get_internal_transfers_data()
    {
        $query =  $this->db->query("SELECT * FROM internal_transfers WHERE deleted_at is null");
        $result=$query->result_array();
        return $result;
    }
    public function get_users_data()
    {
        $query =  $this->db->query("SELECT * FROM users WHERE deleted_at is null");
        $result=$query->result_array();
        return $result;
    }
}
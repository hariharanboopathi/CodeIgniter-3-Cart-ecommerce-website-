<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup_Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function store($data)
    {
        if ($this->db->insert('user_database_table', $data)) { 
            return true;
        } else {
            return false;
        }
    
    }
    public function getUser($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user_database_table');
        return $query->row();
    }
}
?>

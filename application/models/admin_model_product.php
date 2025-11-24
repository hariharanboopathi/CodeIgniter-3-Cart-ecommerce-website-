<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model_product extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert_product($data)
    {
        return $this->db->insert('admin_product_update', $data);
    }

    public function get_product()
    {
        $query = $this->db->get('admin_product_update');
        return $query->result();
    }
     public function get_product_by_id($id) {
        return $this->db->get_where('admin_product_update', ['id' => $id])->row();
    }
     public function edit_product($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('admin_product_update', $data);
    }

    public function delete_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('admin_product_update');
    }

    public function get_latest_products($limit = 3)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('admin_product_update');
        return $query->result();
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_product() {
        $query = $this->db->get('admin_product_update');
        return $query->result();
    }

  public function get_product_by_id($id) {
    $query = $this->db->get_where('admin_product_update', array('id' => $id));
    return $query->row(); 
}

    }
?>

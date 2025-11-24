<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library('upload'); 
        $this->load->model('Admin_model_product');
        $this->load->library(['cart', 'session', 'form_validation']);

          if(!$this->session->userdata('logged_in')){
            $this->load->view('login_form');
        
    }
}

    public function index() {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
    redirect('user/home');
    exit;

    }
       $data['products'] = $this->Admin_model_product->get_product();
        $this->load->view('admin_table_show', $data);
         
}
    public function product() {
        $this->load->view('admin_add_product');
    }

    public function save() {
        $data = [
            'productName'        => $this->input->post('productName'),
            'productPrice'       => $this->input->post('productPrice'),
            'productCategory'    => $this->input->post('productCategory'),
            'productDescription' => $this->input->post('productDescription'),
            'productquantity'    => $this->input->post('productquantity'),
         ];
     
        if (!empty($_FILES['productImage']['name'])) {
            $config['upload_path']   = './update/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->upload->initialize($config);

            if ($this->upload->do_upload('productImage')) {
                $upload_data = $this->upload->data();
                $data['productImage'] = $upload_data['file_name'];
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }

        if ($this->Admin_model_product->insert_product($data)) {
            redirect('admin/index');
        }
    }
 public function edit($id) {
        $data['product'] = $this->Admin_model_product->get_product_by_id($id);
        $this->load->view('admin_edit_product', $data);
    }

    public function update($id) {
        $data = [
            'productName'        => $this->input->post('productName'),
            'productPrice'       => $this->input->post('productPrice'),
            'productCategory'    => $this->input->post('productCategory'),
            'productDescription' => $this->input->post('productDescription'),
            'productquantity'    => $this->input->post('productquantity'),
        ];

        if (!empty($_FILES['productImage']['name'])) {
            $config['upload_path'] = './update/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('productImage')) {
                $uploadData = $this->upload->data();
                $data['productImage'] = $uploadData['file_name'];
            }
        }

        $this->Admin_model_product->edit_product($id, $data);
        redirect('admin/index');
    }

    public function delete($id){
       
        $this->Admin_model_product->delete_product($id);
        redirect('admin/index');
    }
}
?>

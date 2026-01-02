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




public function logout (){

this->session-desstory();


}


//
public function updatePaymentStatus()
{
    $db = \Config\Database::connect();

    // Example: update pending payments every 15 minutes
    $db->table('payments')
       ->where('status', 'pending')
       ->where('created_at <', date('Y-m-d H:i:s', strtotime('-15 minutes')))
       ->update([
           'status'     => 'expired',
           'updated_at' => date('Y-m-d H:i:s')
       ]);

    return true;
}


function test() {


$db = \Config\Database::connect();

        $builder = $db->table('orders');

        $builder->select('
            users.name AS user_name,
            orders.id AS order_id,
            products.product_name,
            product_variants.sku,
            order_items.qty,
            order_items.price,
            variant_options.option_name,
            variant_options.option_value
        ');

        $builder->join('users', 'users.id = orders.user_id');
        $builder->join('order_items', 'order_items.order_id = orders.id');
        $builder->join('products', 'products.id = order_items.product_id');
        $builder->join('product_variants', 'product_variants.id = order_items.variant_id');
        $builder->join('variant_options', 'variant_options.variant_id = product_variants.id', 'left');

} 
$orders = [];

foreach ($result as $row) {
    $key = $row['order_id'].'_'.$row['sku'];

    if (!isset($orders[$key])) {
        $orders[$key] = [
            'user_name' => $row['user_name'],
            'order_id' => $row['order_id'],
            'product_name' => $row['product_name'],
            'sku' => $row['sku'],
            'qty' => $row['qty'],
            'price' => $row['price'],
            'options' => []
        ];
    }

    if ($row['option_name']) {
        $orders[$key]['options'][$row['option_name']] = $row['option_value'];
    }
}

echo '<pre>';
print_r(array_values($orders));
exit;

// check tomorrow 
?>

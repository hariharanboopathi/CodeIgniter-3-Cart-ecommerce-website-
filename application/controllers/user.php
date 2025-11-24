<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('signup_login_model');
        $this->load->model('admin_model_product');
        $this->load->model('user_model');
        $this->load->library(['cart', 'session', 'form_validation']);

        if(!$this->session->userdata('logged_in')){
            $this->load->view('login_form');

        }
    }
  
    
  public function signup()
    {
        $this->load->view('signup_form');
    }


 public function submit()
{
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_database_table.email]');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

   
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('login_form');
    } else {
        $data = [
            'email'    => $this->input->post('email'),
            'name'     => $this->input->post('name'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT), // hash password
            'role'     => $this->input->post('role')
        ];

        $user_id = $this->signup_login_model->store($data);

        if ($user_id) {
            $user = $this->signup_login_model->get_user_by_id($user_id);

    
            $this->session->set_userdata([
                'user_id'   => $user_id,
                'username'  => $user->name,
                'role'      => $user->role,
                'logged_in' => TRUE
            ]);
        

            redirect('user/home');
        } else {
            echo 'Failed to register';
        }
    }
}

   public function login()
{
    $this->load->view('login_form');
}

public function login_user()
{
  
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

   
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('login_form');
        return; 
    }


    $email    = $this->input->post('email');
    $password = $this->input->post('password');
    $role     = strtolower($this->input->post('role'));

   
    $check = $this->signup_login_model->getUser($email, $password, $role);
     
    
    if ($check) {
        
        $session_data = [
            'user_id'   => $check->id,
            'email'     => $check->email,
            'role'      => $check->role,
            'logged_in' => TRUE
        ];

        $this->session->set_userdata($session_data);

     
        if ($check->role == 'admin') {
           
            redirect('admin');
        } else {
            redirect('user/home');
        }
    } else {
        $this->session->set_flashdata('error', 'Invalid email, password, or role.');
        redirect('user/login');
    }
    
}

public function test()
{
    $user_id  = $this->session->userdata('user_id');
    $email    = $this->session->userdata('email');
    $role     = $this->session->userdata('role');
    $logged_in = $this->session->userdata('logged_in');

    echo "User ID: $user_id <br>";
    echo "Email: $email <br>";
    echo "Role: $role <br>";
    echo "Logged In: $logged_in <br>";
    echo "<pre>";
    print_r($this->session->all_userdata());
    echo "</pre>";
}



 public function logout()
    {     
        $this->session->unset_userdata(['user_id', 'email', 'role', 'logged_in']);
        $this->session->sess_destroy();
        redirect('user/login');
    }
  


    public function home()
    {
        $this->load->view('Navbar');
        $data['products'] = $this->admin_model_product->get_latest_products(3);
        $this->load->view('home', $data);
    }

    public function Navbar()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('user/login');
        }
        $this->load->view('Navbar');
    }

    public function product()
    {
        $this->load->view('Navbar');
        $data['products'] = $this->admin_model_product->get_product();
        $this->load->view('Product_view', $data);
    }

    public function cart_view($id = NULL)
    {
        $this->load->view('Navbar');

        if (!empty($id)) {
            $product = $this->user_model->get_product_by_id($id);

            if ($product) {
                $data = [
                    'id'    => $product->id,
                    'qty'   => 1,
                    'price' => $product->productPrice,
                    'name'  => $product->productName,
                    'image' => $product->productImage
                ];
                $this->cart->insert($data);
            }

            if (!empty($_SERVER['HTTP_REFERER'])) {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect('user/product');
            }
        } else {
            $data['cart_items'] = $this->cart->contents();
            $this->load->view('user_cart', $data);
        }
    }

    public function update_cart()
    {
        $qtys = $this->input->post('qty');

        if (!empty($qtys)) {
            foreach ($qtys as $rowid => $qty) {
                $this->cart->update([
                    'rowid' => $rowid,
                    'qty'   =>  $qty
                ]);
            }
          
            $this->session->set_flashdata('success', 'Cart updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'No items to update.');
        }

        redirect('user/cart_view/0');
    }

    public function remove($rowid)
    {
        $this->cart->remove($rowid);
        $this->session->set_flashdata('success', 'Item removed from cart.');
        redirect('user/cart_view/0');
    }

    public function clear_cart()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Cart cleared successfully.');
        redirect('user/cart_view/0');
    }

    public function checkout()
    {
        $this->load->view('user/Checkout');
    }

   
}
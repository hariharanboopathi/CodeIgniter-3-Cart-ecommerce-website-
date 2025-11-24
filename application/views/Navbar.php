<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>MyFlipkart | Navbar</title>
</head>
<style>
  /* Navbar overall styling */
  .navbar {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 0.5rem 1rem;
    background-color: #fff;
  }

  /* Brand styling */
  .navbar-brand {
    font-size: 1.8rem;
    font-weight: 700;
    color: #dc3545 ;
    letter-spacing: 1px;
  }

  .navbar-brand:hover {
    color: #ff4d4d ;
  }
 .dashboard-button {
    background-color: #4CAF50; 
    color: white;             
    padding: 10px 15px;       
    border: none;              
    border-radius: 8px;       
    font-size: 16px;           
    cursor: pointer;           
    transition: background 0.3s, transform 0.2s;
  }

  .dashboard-button:hover {
    background-color: #45a049;
    transform: scale(1.05);  
  }

  /* Navbar links styling */
  .navbar-nav .nav-item .nav-link {
    color: #333;
    font-weight: 500;
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
    position: relative;
  }

  .navbar-nav .nav-item.active .nav-link {
    color: #dc3545 ;
    font-weight: 700;
  }

  .navbar-nav .nav-item .nav-link:hover {
    color: #ff6600 ;
  }

  .form-inline .form-control {
    border-radius: 20px;
    padding: 0.4rem 1rem;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
  }

  .form-inline .form-control:focus {
    border-color: #22e72cff;
    box-shadow: 0 0 5px rgba(220, 53, 69, 0.3);
    outline: none;
  }

  .form-inline .btn {
    border-radius: 20px;
    margin-left: 0.5rem;
    transition: all 0.3s ease;
  }

  .form-inline .btn:hover {
    color: #fff;
  }

  /* Cart icon styling */
  .fa-shopping-cart {
    font-size: 28px;
    color: #333;
    margin-right: 15px;
    position: relative;
    transition: color 0.3s ease;
  }

  .fa-shopping-cart:hover {
    color: #f01d1dff;
  }

  .cart-badge {
    position: absolute;
    top: -8px;
    right: 5px;
    background: #dc3545;
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    padding: 2px 6px;
    border-radius: 50%;
    border: 1px solid #fff;
  }

  @media (max-width: 992px) {
    .form-inline {
      flex-direction: column;
      width: 100%;
    }
    .form-inline .form-control {
      margin-bottom: 0.5rem;
      width: 100%;
    }
    .form-inline .btn {
      width: 100%;
    }
  }
</style>

<body>
 

  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
   
    <div class="container">
      <a class="navbar-brand font-weight-bold text-danger" href="<?= base_url('user/home') ?>">MyFlipkart</a>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= ($this->uri->segment(2) == 'home' || $this->uri->segment(2) == '') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= base_url('user/home') ?>">Home</a>
        </li>
        
        
        <li class="nav-item <?= ($this->uri->segment(2) == 'product') ? 'active' : '' ?>">
          <a class="nav-link" href="<?= base_url('user/product') ?>">Products</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 mr-3">


 <a href="<?= base_url('user/cart_view') ?>" style="position: relative;">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-badge"><?= $this->cart->total_items() ?></span>
</a>
<?php if ($this->session->userdata('logged_in') && $this->session->userdata('role') == 'admin'): ?>
    <input 
        type="button" 
        class="dashboard-button" 
        value="Dashboard" 
        onclick="window.location.href='<?= base_url('admin/index') ?>';"
    />
<?php endif; ?>


        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <a href="<?= base_url('user/logout') ?>" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </nav>
</body>

</html>
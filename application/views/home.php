<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | MySite</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Navbar */
    .navbar-nav .nav-item .nav-link {
      color: #333 !important;
      font-weight: 500;
    }

    .navbar-nav .nav-item.active .nav-link {
      color: #dc3545 !important;
      font-weight: bold;
    }

    /* Hero Section */
    .hero {
      background: url('https://images.unsplash.com/photo-1523275335684-37898b6baf30') center/cover no-repeat;
      height: 75vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      position: relative;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      position: relative;
      z-index: 1;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 1.5rem;
    }

    .btn-main {
      background-color: #dc3545;
      color: white;
      border-radius: 5px;
      padding: 0.75rem 1.5rem;
      transition: background 0.3s;
    }

    .btn-main:hover {
      background-color: #b02a37;
      color: #fff;
    }

    /* Featured Products */
    .products {
      padding: 4rem 2rem;
      text-align: center;
    }

    .products h2 {
      font-weight: bold;
      margin-bottom: 2rem;
      color: #343a40;
    }

    .card {
      transition: transform 0.3s;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      height: 220px;
      object-fit: cover;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    /* Footer */
    footer {
      background-color: #f8f9fa;
      text-align: center;
      padding: 1.5rem;
      color: #555;
      margin-top: 3rem;
    }
  </style>
</head>

<body>

  <section class="hero">
    <div class="hero-content">
      <h1>Welcome to MySite</h1>
      <p>Your one-stop shop for trendy products</p>
      <a href="<?= base_url('user/product') ?>" class="btn btn-main">Shop Now</a>
    </div>
  </section>

  <section class="products container">
    <h2>Featured Products</h2>
    <div class="row">
      <?php if (!empty($products)): ?>
        <?php foreach ($products as $a): ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <?php if (!empty($a->productImage)): ?>
                <img src="<?= base_url('update/' . $a->productImage) ?>" class="card-img-top" alt="<?= $a->productName ?>">
              <?php else: ?>
                <img src="<?= base_url('update/default.png') ?>" class="card-img-top" alt="No Image">
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title"><?= $a->productName ?></h5>
                <p class="card-text text-success font-weight-bold">₹<?= $a->productPrice ?></p>
                <a href="<?= base_url('user/cart_view/' . $a->id) ?>" class="btn btn-danger btn-sm">Add to Cart</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <p>No featured products available.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <footer>
    <p>© 2025 MySite. All Rights Reserved.</p>
  </footer>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Display</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
      font-weight: 600;
      color: #333;
    }
    
    .card {
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      display: flex;
      flex-direction: column;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

  
    .card-img-container {
      width: 100%;
      height: 300px; 
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #fff;
    }

    .card-img-container img {
      width: 80%;
      height: 80%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .card-img-container img:hover {
      transform: scale(1.05);
    }

    .card-body {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card-title {
      font-size: 1.1rem;
      font-weight: 600;
      color: #333;
    }

    .card-text {
      color: #666;
      font-size: 0.95rem;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      padding: 8px 15px;
      transition: background-color 0.2s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="container my-5">
 
  <h2 class="text-center mb-4">Our Products</h2>
  <div class="row">
    <?php if(!empty($products)): ?>
      <?php foreach($products as $a): ?>
        <div class="col-md-4 mb-4 d-flex">
          <div class="card w-100">
            <div class="card-img-container">
              <?php if(!empty($a->productImage)): ?>  
                <img src="<?= base_url('update/'.$a->productImage) ?>" alt="<?= $a->productName ?>">
              <?php else: ?>
                <img src="<?= base_url('update/default.png') ?>" alt="No Image">
              <?php endif; ?>
            </div>
            <div class="card-body">
              <div>
                <h5 class="card-title"><?= $a->productName ?></h5>
                <p class="card-text"><?= $a->productDescription ?></p>
                <p class="font-weight-bold text-primary">₹<?= $a->productPrice ?></p>
              </div>
              <a href="<?= base_url('user/cart_view/'.$a->id) ?>" class="btn btn-primary mt-auto">Add to Cart</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12">
        <p class="text-center">No products available.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

</body>
</html>

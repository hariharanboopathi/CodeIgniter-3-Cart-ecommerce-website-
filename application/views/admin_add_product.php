<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <h2 class="text-center mb-4">Add Product</h2>
  <form action="<?= base_url('admin/save') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="productName">Product Name</label>
      <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
    </div>
    <div class="form-group mb-3">
      <label for="productPrice">Price (₹)</label>
      <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter price" required>
    </div>
    <div class="form-group mb-3">
      <label for="productCategory">Category</label>
      <select class="form-control" id="productCategory" name="productCategory">
        <option>Electronics</option>
        <option>Fashion</option>
        <option>Home & Kitchen</option>
        <option>Books</option>
        <option>Other</option>
      </select>
    </div>
    <div class="form-group mb-3">
      <label for="productDescription">Description</label>
      <textarea class="form-control" id="productDescription" name="productDescription" rows="3" placeholder="Enter product description"></textarea>
    </div>
     <div class="form-group mb-3">
      <label for="productName">Quantity</label>
      <input type="text" class="form-control" id="productquantity" name="productquantity" placeholder="Enter quantity" required>
    </div>
    
    <div class="form-group mb-3">
      <label for="productImage">Product Image</label>
      <input type="file" class="form-control-file" id="productImage" name="productImage">
    </div>
    <div class="d-flex justify-content-start">
      <button type="submit" class="btn btn-success me-2">Save Product</button>
      <a href="<?= base_url('admin/index') ?>" class="btn btn-primary">Show Table</a>
    </div>
  </form>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Product</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <h2 class="text-center mb-4">Edit Product</h2>
  <form action="<?= base_url('admin/update/'.$product->id) ?>" method="post" enctype="multipart/form-data">
    
    <div class="form-group mb-3">
      <label for="productName">Product Name</label>
      <input type="text" class="form-control" id="productName" name="productName" value="<?= $product->productName ?>" required>
    </div>

    <div class="form-group mb-3">
      <label for="productPrice">Price (₹)</label>
      <input type="number" class="form-control" id="productPrice" name="productPrice" value="<?= $product->productPrice ?>" required>
    </div>

    <div class="form-group mb-3">
      <label for="productCategory">Category</label>
      <select class="form-control" id="productCategory" name="productCategory">
        <?php 
        $categories = ['Electronics','Fashion','Home & Kitchen','Books','Other'];
        foreach($categories as $cat): ?>
          <option <?= $product->productCategory==$cat?'selected':'' ?>><?= $cat ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group mb-3">
      <label for="productDescription">Description</label>
      <textarea class="form-control" id="productDescription" name="productDescription" rows="3"><?= $product->productDescription ?></textarea>
    </div>

    <div class="form-group mb-3">
      <label for="productQuantity">Quantity</label>
      <input type="number" class="form-control" id="productQuantity" name="productquantity" value="<?= $product->productquantity ?>" required>
    </div>

    <div class="form-group mb-3">
      <label for="productImage">Product Image</label>
      <input type="file" class="form-control-file" id="productImage" name="productImage">
      <?php if($product->productImage): ?>
        <img src="<?= base_url('update/'.$product->productImage) ?>" width="100" class="mt-2">
      <?php endif; ?>
    </div>

    <div class="d-flex justify-content-start">
      <button type="submit" class="btn btn-success me-2">Update Product</button>
      <a href="<?= base_url('admin/index') ?>" class="btn btn-primary">Back to Table</a>
    </div>

  </form>
</div>
</body>
</html>

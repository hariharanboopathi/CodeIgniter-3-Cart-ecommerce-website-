<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Product List</h2>
        <div class="mb-3 text-start">
            <a href="<?= base_url('admin/product') ?>" class="btn btn-primary">Add Product</a>
            <a href="<?= base_url('user/home') ?>" class="btn btn-danger">Home</a>
        </div>
        <table class="table table-bordered table-hover table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $a):
                ?>

                    <tr>
                        <td><?= $a->id ?></td>
                        <td><?= $a->productName ?></td>
                        <td><?= $a->productPrice ?></td>
                        <td><?= $a->productCategory ?></td>
                        <td><?= $a->productDescription ?></td>
                        <td><?= $a->productquantity ?></td>

                        <td>
                            <?php if ($a->productImage): ?>
                                <img src="<?= base_url('update/' . $a->productImage) ?>" width="100" alt="<?= $a->productName ?>">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/edit/' . $a->id) ?>">Edit</a>
                            <a href="<?= base_url('admin/delete/' . $a->id) ?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
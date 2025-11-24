<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">Shopping Cart</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('user/update_cart') ?>" method="post">
        <div class="row">
            <div class="col-md-8">
                <div class="list-group">
                    <?php if (!empty($cart_items)): ?>
                        <?php foreach ($cart_items as $item): ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('update/' . ($item['image'] ?? 'default.png')) ?>" 
                                         class="me-3" width="100" alt="<?= htmlspecialchars($item['name']) ?>">
                                    <div>
                                        <h5 class="mb-1"><?= htmlspecialchars($item['name']) ?></h5>
                                        <div class="mb-2">
                                            <label class="form-label me-2 mb-0">Quantity:</label>
                                            <input type="number" name="qty[<?= $item['rowid'] ?>]" 
                                                   value="<?= $item['qty'] ?>" min="1" max=""
                                                   class="form-control d-inline-block w-auto">
                                        </div>
                                        <small class="text-muted">
                                            Price: $<?= number_format($item['price'], 2) ?>
                                        </small><br>
                                        <small class="text-muted">
                                            Subtotal: $<?= number_format($item['subtotal'], 2) ?>
                                        </small>
                                    </div>
                                </div>
                                <a href="<?= base_url('user/remove/' . $item['rowid']) ?>" 
                                   class="btn btn-danger btn-sm">Remove</a>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-warning mt-3">Update Cart</button>
                    <?php else: ?>
                        <p class="text-muted p-3">Your cart is empty.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <?php $subtotal = $this->cart->total(); ?>
                        <p class="card-text">Subtotal: $<?= number_format($subtotal, 2) ?></p>
                        <p class="card-text">Tax (10%): $<?= number_format($subtotal * 0.1, 2) ?></p>
                        <p class="card-text fw-bold">Total: $<?= number_format($subtotal * 1.1, 2) ?></p>
                        <a href="<?= base_url('user/checkout') ?>" class="btn btn-primary w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>

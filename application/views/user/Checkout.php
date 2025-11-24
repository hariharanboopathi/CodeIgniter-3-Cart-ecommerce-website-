<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        form h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        textarea, select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            resize: vertical;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        .mt-3 {
            margin-top: 15px;
        }

        @media (max-width: 500px) {
            form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <form method="post" action="<?=base_url('user/checkout')?>">
        <h3>Checkout</h3>

        <label>Shipping Address</label>
        <textarea name="address" class="form-control" rows="4" placeholder="Enter your shipping address" required></textarea>

        <label class="mt-3">Payment Method</label>
        <select name="payment_method" class="form-control" required>
            <option value="" disabled selected>Select payment method</option>
            <option value="cod">Cash on Delivery</option>
            <option value="online">Online Payment</option>
        </select>

        <button type="submit" class="btn btn-success mt-3">Place Order</button>
    </form>
</body>
</html>

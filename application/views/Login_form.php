<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <h2 class="text-center text-primary mb-4">Login</h2>

            <form method="post" action="<?= base_url('user/login_user') ?>">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password">
                </div>

                <p>Select User Role:</p>

                <input type="radio" id="admin" name="role" value="admin" checked>
                <label for="admin">Administrator</label><br>

                <input type="radio" id="editor" name="role" value="user">
                <label for="user">user</label><br>

                <button type="submit" class="btn btn-primary w-100">Login</button>

                <div class="d-flex justify-content-between mt-3 small">
                    <a href="<?= base_url('user/forgot_password') ?>">Forgot Password?</a>
                    <a href="<?= base_url('user/signup') ?>">Signup</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
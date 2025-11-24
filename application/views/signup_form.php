<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
        <div class="card shadow-sm p-4" style="max-width: 450px; width: 100%;">
            <h2 class="text-center text-primary mb-4">Signup</h2>

            <div class="mb-3">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>

            <form method="post" action="<?= base_url('user/submit') ?>">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold text-primary">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold text-primary">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold text-primary">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Your Password" required>
                </div>
                <input type="hidden" name="role" value="user">


                <button type="submit" class="btn btn-primary w-100">Signup</button>

                <div class="text-center mt-3 small">
                    Already have an account? <a href="<?= base_url('user/login') ?>"
                        class="text-primary fw-bold">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
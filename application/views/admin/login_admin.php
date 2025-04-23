<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link href="<?= base_url('assets/img/logo.png'); ?>" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .login-box {
            max-width: 400px;
            margin: 100px auto;
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #388da8;
            border-color: #388da8;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h3 class="text-center mb-4">Login Admin</h3>

        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('admin/login'); ?>">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required autofocus autocomplete="off">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required autocomplete="off">
            </div>
            <button class="btn btn-primary w-100" type="submit">Login</button>
        </form>
    </div>

</body>

</html>
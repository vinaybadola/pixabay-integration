<!DOCTYPE html>
</head>
    <link rel="stylesheet" href="<?= base_url('styles/auth.css') ?>">

</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="form-container">
        <h1>Login</h1>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <form action="/auth/authenticate" method="post">
            <input type="email" name="email" placeholder="Email" required> <br>
            <input type="password" name="password" placeholder="Password" required> <br>
            <button type="submit">Login</button>
        </form>
        <p>Not a Registered Member? <a class="register-class" href="/register">Register </a></p>
    </div>
</body>
</html>
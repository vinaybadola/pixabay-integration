<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="<?= base_url('styles/auth.css') ?>">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="form-container">
        <h1>Register Here</h1>
        <form action="/auth/store" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name" required> <br>
            <input type="email" name="email" placeholder="Email" required> <br>
            <input type="password" name="password" placeholder="Password"  minlength="8" maxlength="20" required> <br>
            <p>Choose your profile picture</p>
            <input type="file" name="picture" accept="image/png, image/gif, image/jpeg" required><br>
            <button type="submit">Register</button>
            <p>Already a Registered Member? <a class="register-class" href="/login">Login </a></p>
            
        </form>
    </div>
</body>
</html>
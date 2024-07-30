<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="<?= base_url('styles/dashboard.css') ?>">
</head>
<?php include 'navbar.php'; ?>
<?php

use App\Models\UserModel;

$userModel = new UserModel();

$user = $userModel->find($userId);

$picturePath = $user['picture'];
?>

<h2>User Dashboard</h2>

<?php if (!empty($picturePath)) : ?>
    <img src="<?= base_url($picturePath) ?>" alt="User Picture">

<?php else : ?>
    <p>No picture available</p>
<?php endif; ?>

<h1>Welcome, <?= $user['name'] ?></h1>

</html>
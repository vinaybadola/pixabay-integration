<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>
    <style>
        .profile-class {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        .profile-class label {
            margin-top: 10px;
            font-weight: bold;
        }

        .profile-class input[type="text"],
        .profile-class input[type="email"],
        .profile-class input[type="password"],
        .profile-class input[type="file"] {
            margin-top: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        .profile-class button {
            margin-top: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .profile-class button:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            position: relative;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h2>Update Your Details Here!</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
            <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= session()->getFlashdata('error') ?>
            <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
    <?php endif; ?>

    <form class="profile-class" action="/dashboard/updateProfile" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" pattern="[a-zA-Z\s]+"  id="name" name="name" value="<?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')  ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" required>

        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" placeholder="New Password">

        <label for="picture">Profile Picture:</label>
        <input type="file" id="picture" name="picture">

        <button type="submit">Update Profile</button>
    </form>
</body>
</html>

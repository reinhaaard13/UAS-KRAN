<?php
session_start();

// cek session
if (!isset($_SESSION['login'])) {
    header('Location: ../login');
    exit;
}
require 'functions.php';

if (isset($_POST['register'])) {
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // cek ketersediaan username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah ada!');
            window.location.href = 'registeradmin';
        </script>";
        exit;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");
    echo "<script>
            alert('User berhasil didaftarkan!');
            window.location.href = '../login';
        </script>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Web Admin Register</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg" />

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/registeradmin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" action="" method="POST">
        <img class="mb-4" src="../assets/img/logo.jpg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Admin Register</h1>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; Barber Room 2020</p>
    </form>
</body>

</html>
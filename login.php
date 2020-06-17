<?php
session_start();

require 'admin/functions.php';

// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['key'])) {
    $username = $_COOKIE['username'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

// session redirect
if ( isset($_SESSION['login']) ) {
    header('Location: admin/dashboard');
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // session
            $_SESSION['login'] = true;

            if (isset($_POST['remember'])) {
                setcookie('username', $row['username'], time() + 900);
                setcookie('key', hash('sha256', $row['username']), time() + 900);
            }

            header("Location: admin/dashboard");
            exit;
        }
    }
    $error = true;
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
    <title>Admin Login</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.jpg" />
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/"> -->

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

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
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center bg-holder">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <form class="form-signin" method="POST" action="">
                            <img class="mb-4" src="assets/img/logo.jpg" alt="" width="72" height="72">
                            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger fade show" role="alert">
                                    <strong>Try Again!</strong> Username/password yang anda masukkan salah
                                </div>
                            <?php endif; ?>
                            <label for="inputEmail" class="sr-only">Username</label>
                            <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me" name="remember"> Remember me
                                </label>
                            </div>
                            <button class="btn btn-lg btn-warning btn-block" type="submit" name="login">Sign in</button>
                            <a class="btn btn-light mt-3 btn-sm" href="index" role="button">return to home</a>
                            <p class="mt-5 mb-1 text-muted">&copy; 2020</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php

require 'admin/functions.php';
include 'vendor/phpqrcode-master/qrlib.php';

if (isset($_POST['booking'])) {
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $date = $_POST['date'];
    $pesan = $_POST['pesan'];

    $query = "INSERT INTO booking VALUES ('','$nama','$no_telp','$date','$pesan')";
    mysqli_query($conn, $query);

    QRcode::png("$nama - $no_telp - $date", "bookqr.png", "M", 3, 3);
}

$namaDepan = explode(" ", $nama);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $namaDepan[0]; ?>'s Booking - Barber Room</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-brown">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="container-fluid my-4">
                                    <div class="jumbotron jumbotron-fluid py-2">
                                        <div class="container">
                                            <h4 class="display-4">Your booking has been made!</h4>
                                            <p class="lead">Nama : <br><strong><?= $nama; ?></strong></p>
                                            <p class="lead">Nomor Handphone : <br><strong><?= $no_telp; ?></strong></p>
                                            <p class="lead">Waktu Booking : <br><strong><?= $date; ?></strong></p>
                                            <p class="lead">Pesan : <br><strong><?= $pesan; ?></strong></p>
                                            <?php echo "<img src='bookqr.png'/>" ?><br>
                                            <a class="btn btn-secondary my-2 btn-sm" href="index" role="button">Back to home</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
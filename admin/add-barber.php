<?php

require 'functions.php';

if (isset($_POST['addBarb'])) {
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO barber VALUES ('','$nama','$no_telp','$alamat','0')");

    echo "
    <script>
        alert('Berhasil menambahkan barber baru!');
        window.location.href = 'barber';
    </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add New Barber</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.jpg" />
    <link href="../css/styles-admin.css" rel="stylesheet" />
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="../ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn-sm order-1 order-lg-0 ml-2" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="dashboard"><img src="../assets/img/logo.jpg" style="height: 30px;">&nbsp;&nbsp;Barber Room</a>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../logout">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="attendance">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                            Attendance
                        </a>
                        <div class="sb-sidenav-menu-heading">Database</div>
                        <a class="nav-link" href="customer">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                            Customer
                        </a><a class="nav-link" href="barber">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-card-alt"></i></div>
                            Barber
                        </a>
                        <div class="sb-sidenav-menu-heading">Registration</div>
                        <a class="nav-link" href="add-customer">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                            Add New Customer
                        </a><a class="nav-link" href="add-barber">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                            Add New Barber
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Welcome To</div>
                    Barber Room Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Add New Barber</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add New Barber</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Add Barber to Database</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barber" required autofocus autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Handphone" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" placeholder="Alamat Rumah" name="alamat" rows="3" required autocomplete="off"></textarea>
                                </div>
                                <button class="btn btn-lg btn-warning btn-block" name="addBarb" type="submit">Add Barber</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Barber Room 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Barber</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts-admin.js"></script>
    <script src="../vendor/Chart.js/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="../vendor/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="../vendor/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
</body>

</html>
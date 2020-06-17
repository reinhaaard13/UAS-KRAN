<?php

require 'functions.php';

$barber = query("SELECT * FROM barber");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Show Barber</title>
    <link href="../css/styles-admin.css" rel="stylesheet" />
    <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="../ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn-sm order-1 order-lg-0 ml-2" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="dashboard"><img src="assets/img/logo.jpg" style="height: 30px;">&nbsp;&nbsp;Barber Room</a>
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
                    <a class="dropdown-item" href="#">My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
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
                        <a class="nav-link" href="attendance.php">
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
                        <a class="nav-link" href="add-customer.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                            Add New Customer
                        </a><a class="nav-link" href="add-barber.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                            Add New Barber
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Barber Room Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Barber</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Barber</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Database Customer</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nomor HP</th>
                                            <th>Alamat</th>
                                            <th>Exp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($barber as $data) : ?>
                                            <tr>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['no_telp']; ?></td>
                                                <td><?= $data['alamat']; ?></td>
                                                <td><?= $data['exp']; ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" id="editBarber" data-toggle="modal" data-target="#modalEdit" data-id="<?= $data['id']; ?>" data-nama="<?= $data['nama']; ?>" data-notelp="<?= $data['no_telp']; ?>" data-alamat="<?= $data['alamat']; ?>" data-exp="<?= $data['exp']; ?>">Edit</a>
                                                    <!-- <a href="#" class="badge badge-primary showUpdateModal" data-toggle="modal" data-target="#exampleModal">Edit</a> -->
                                                    <a class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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
                <div class="modal-body">
                    <form action="update.php" method="POST" id="form">
                        <input type="hidden" name="id" id="id" value="id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exp">Experience</label>
                            <input type="number" class="form-control" id="exp" name="exp">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="editBarber">Save changes</button>
                    </form>
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
    <script>
        $('#dataTable').dataTable({
            "order": [
                [0, "asc"]
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": 4
            }, {
                "width": "15%",
                "targets": 4
            }, {
                "width": "15%",
                "targets": 1
            }]
        });
    </script>
</body>

</html>
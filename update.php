<?php 

require 'functions.php';

if ( isset($_POST['edit']) ) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $birth = $_POST['birth'];
    $exp = $_POST['exp'];

    $query = "UPDATE customer SET nama = '$nama', no_telp = '$no_telp', birth = '$birth', exp = $exp WHERE id = $id";
    mysqli_query($conn,$query);

    echo "<script>alert('Data Berhasil Diubah');
        window.location.href = 'customer';    
    </script>";
};

if (isset($_POST['editBarber'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $exp = $_POST['exp'];

    $query = "UPDATE barber SET nama = '$nama', no_telp = '$no_telp', alamat = '$alamat', exp = $exp WHERE id = $id";
    mysqli_query($conn, $query);

    echo "<script>alert('Data Berhasil Diubah');
        window.location.href = 'barber';    
    </script>";
};
?>
<?php 

require 'functions.php';


if ( isset($_GET['customer']) ) {
    $id = $_GET['customer'];

    mysqli_query($conn, "DELETE FROM customer WHERE id = '$id'");

    echo "
    <script>
        alert('Berhasil menghapus customer!');
        window.location.href = 'customer';
    </script>
    ";
}
if (isset($_GET['barber'])) {
    $id = $_GET['barber'];

    mysqli_query($conn, "DELETE FROM barber WHERE id = '$id'");

    echo "
    <script>
        alert('Berhasil menghapus barber!');
        window.location.href = 'barber';
    </script>
    ";
}

?>
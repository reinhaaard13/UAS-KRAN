<?php 

require 'functions.php';

$id = $_GET['id'];

$query = "UPDATE customer SET exp = exp+1 WHERE id = $id";
mysqli_query($conn, $query);

echo "<script>alert('Berhasil confirm attendance!');
        window.location.href = 'customer';    
    </script>";
?>
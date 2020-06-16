<?php
require '../functions.php';

$id = $_GET['id'];

$query = "SELECT * FROM mahasiswa WHERE id = $id";
$customer = query($query);

return json_encode($customer);
?>
<!--  -->
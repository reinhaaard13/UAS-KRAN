<?php 

require "functions.php";

if ( isset($_GET['done']) ) {
    $id = $_GET['done'];

    $query = "UPDATE booking SET status = 1 WHERE id = '$id'";
    mysqli_query($conn,$query);
    echo "
    <script>
        alert('Booking selesai!');
        window.location.href = 'showBooking';
    </script>
    ";
}

?>
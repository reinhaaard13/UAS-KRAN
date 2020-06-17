<?php
require '../admin/functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM customer WHERE nama LIKE '%$keyword%' OR no_telp LIKE '%$keyword%'";
$customer = query($query);

?>
<div class="row">
    <?php foreach ($customer as $data) : ?>
        <div class="card col-md-3 mx-2 my-2">
            <div class="card-body">
                <h5 class="card-title"><?= $data['nama']; ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $data['no_telp']; ?></h6>
                <p class="card-text">exp <strong><?= $data['exp']; ?></strong>
                    <?php
                    if ($data['exp'] % 5 == 0 && $data['exp'] != 0) {
                        if ($data['exp'] % 10 == 0) { ?>
                            <span class="badge badge-success">Gratis!</span>
                        <?php } else { ?>
                            <span class="badge badge-warning">Diskon 50%!</span>
                    <?php }
                    }
                    ?>
                </p>
                <a href="add-attendance.php?id=<?= $data['id']; ?>" class="card-link">Confirm Attendance</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
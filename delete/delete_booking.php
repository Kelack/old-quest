<?php
    require '../configDB.php';
    $id_booking = $_GET['id_booking'];
    $sql = 'DELETE FROM `booking` WHERE `id_booking` = ?';
    $query = $pdo->prepare($sql);
    $query -> execute([$id_booking]);

    header('Location: ../booking.php')
?>
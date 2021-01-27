<?php
    require '../configDB.php';
    $id_report = $_GET['id_report'];
    $sql = 'DELETE FROM `report` WHERE `id_report` = ?';
    $query = $pdo->prepare($sql);
    $query -> execute([$id_report]);

    header('Location: ../report.php')
?>
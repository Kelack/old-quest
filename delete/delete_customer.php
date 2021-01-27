<?php
    require '../configDB.php';
    $Nickname = $_GET['Nickname'];
    $sql = 'DELETE FROM `customer` WHERE `Nickname` = ?';
    $query = $pdo->prepare($sql);
    $query -> execute([$Nickname]);

    header('Location: ../customer.php')
?>
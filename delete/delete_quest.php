<?php
    require '../configDB.php';
    $id_quest = $_GET['id_quest'];
    $sql = 'DELETE FROM `quest` WHERE `id_quest` = ?';
    $query = $pdo->prepare($sql);
    $query -> execute([$id_quest]);

    header('Location: ../quest.php')
?>
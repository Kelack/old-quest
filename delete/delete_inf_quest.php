<?php
    require '../configDB.php';
    $id_inf_quest = $_GET['id_inf_quest'];
    $sql = 'DELETE FROM `inf_quest` WHERE `id_inf_quest` = ?';
    $query = $pdo->prepare($sql);
    $query -> execute([$id_inf_quest]);

    header('Location: ../inf_quest.php')
?>
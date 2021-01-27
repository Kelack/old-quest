<?php
    require '../configDB.php';

    $id_report = $_GET['id_report'];

    $id_booking = $_POST['id_booking'];
    $status = $_POST['status'];
    $comments = $_POST['comments'];

        if(($id_booking == '') or ($status == '') or ($comments == ''))
        {
            header('Location: ../report.php');
        }
        else
        {
            $sql = 'UPDATE `report` SET `id_booking`=?,`status`=?,`comments`=?  WHERE `id_report` = ?';
            $query = $pdo->prepare($sql);
            $query -> execute([$id_booking,$status,$comments,$id_report]);
            
            header('Location: ../report.php');
        }
?>
<?php
    session_start();
    require '../configDB.php';

    $id_booking = $_POST['id_booking'];
    $status = $_POST['status'];
    $comments = $_POST['comments'];

    if(($id_booking == '') or ($status == '') or ($comments == ''))
    {           
        header('Location: ../report.php');
    }
    else
    {
        $sql = 'INSERT INTO report(id_booking,status,comments) VALUES(?,?,?)';
        $query = $pdo->prepare($sql);
        $query->execute([$id_booking,$status,$comments]);
        header('Location: ../report.php');
    }
     
?>
<?php
    require '../configDB.php';

    $id_booking = $_GET['id_booking'];

        $id_quest = $_POST['id_quest'];
        $Nickname = $_POST['Nickname'];
        $date = $_POST['date'];
        if(($id_quest == '') or ($Nickname == '') or ($date == ''))
        {
            header('Location: ../booking.php');
        }
        else
        {
            $sql = 'UPDATE `booking` SET `id_quest`=?,`Nickname`=?,`date`=?  WHERE `id_booking` = ?';
            $query = $pdo->prepare($sql);
            $query -> execute([$id_quest,$Nickname,$date,$id_booking]);
        
            header('Location: ../booking.php');
        }
?>
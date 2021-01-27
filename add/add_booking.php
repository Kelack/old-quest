<?php
    session_start();
    require '../configDB.php';

    $id_quest = $_POST['id_quest'];
    $Nickname = $_POST['Nickname'];
    $date = $_POST['date'];

    if(($id_quest == '') or ($Nickname == '') or ($date == ''))
    {
        header('Location: ../booking.php');
    }
    else
    {
        $sql = 'INSERT INTO booking(id_quest,Nickname,date) VALUES(?,?,?)';
        $query = $pdo->prepare($sql);
        $query->execute([$id_quest,$Nickname,$date]);

        header('Location: ../booking.php');
    } 
?>
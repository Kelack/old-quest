<?php
    session_start();
    require '../configDB.php';

    $id_quest = $_GET['id_quest'];
    $Nickname = $_GET['Nickname'];
    $calendar = $_POST['calendar'];

    if(($id_quest == '') or ($Nickname == '') or ($calendar == ''))
    {
        header('Location: ../indexQuest.php?id_quest='.$id_quest.'');
    }
    else
    {
        $sql = 'INSERT INTO booking(id_quest,Nickname,date) VALUES(?,?,?)';
        $query = $pdo->prepare($sql);
        $query->execute([$id_quest,$Nickname,$calendar]);
        header('Location: ../index.php');
    } 
?>
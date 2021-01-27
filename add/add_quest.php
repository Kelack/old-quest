<?php
    session_start();
    require '../configDB.php';

    $id_inf_quest = $_POST['id_inf_quest'];
    $name_quest = $_POST['name_quest'];
    $organizer = $_POST['organizer'];
    $address = $_POST['address'];
    $number_organizer = $_POST['number_organizer'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];
    $description = $_POST['description'];

    if(($id_inf_quest == '') or ($organizer == '') or ($address == '') or ($number_organizer == '') or ($price == '') or ($photo == '') or ($description == ''))
    {           
        header('Location: ../quest.php');
    }
    else
    {
        $sql = 'INSERT INTO quest(id_inf_quest,name_quest,organizer,address,number_organizer,price,photo,description) VALUES(?,?,?,?,?,?,?,?)';
        $query = $pdo->prepare($sql);
        $query->execute([$id_inf_quest,$name_quest,$organizer,$address,$number_organizer,$price,$photo,$description]);

        header('Location: ../quest.php');
    }
     
?>
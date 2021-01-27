<?php
    require '../configDB.php';

    $id_quest = $_GET['id_quest'];

    $id_inf_quest = $_GET['id_inf_quest'];
    $name_quest = $_GET['name_quest'];
    $organizer = $_GET['organizer'];
    $address = $_GET['address'];
    $number_organizer = $_GET['number_organizer'];
    $price = $_GET['price'];
    $photo = $_GET['photo'];
    $description = $_GET['description'];

        if(($id_inf_quest == '') or ($name_quest == '') or ($organizer == '') or ($address == '') or ($number_organizer == '') or ($price == '') or ($photo == '') or ($description == ''))
        {
            header('Location: ../quest.php');
        }
        else
        {
            $sql = 'UPDATE `quest` SET `id_inf_quest`=?,`name_quest`=?,`organizer`=?,`address`=?,`number_organizer`=?,`price`=?,`photo`=?,`description`=?  WHERE `id_quest` = ?';
            $query = $pdo->prepare($sql);
            $query -> execute([$id_inf_quest,$name_quest,$organizer,$address,$number_organizer,$price,$photo,$description,$id_quest]);

            header('Location: ../quest.php');
        }
?>
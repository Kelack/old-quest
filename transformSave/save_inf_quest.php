<?php
    require '../configDB.php';

    $id_inf_quest = $_GET['id_inf_quest'];

        $name_category = $_POST['name_category'];
        $number_of_players = $_POST['number_of_players'];
        $time = $_POST['time'];
        $complexity = $_POST['complexity'];
        $fear_level = $_POST['fear_level'];
        $year = $_POST['year'];

        if(($name_category == '') or ($number_of_players == '') or ($time == '') or ($complexity == '') or ($fear_level == '') or ($year == ''))
        {
            header('Location: ../inf_quest.php');
        }
        else
        {
            $sql = 'UPDATE `inf_quest` SET `name_category`=?,`number_of_players`=?,`time`=?,`complexity`=?,`fear_level`=?,`year`=?  WHERE `id_inf_quest` = ?';
            $query = $pdo->prepare($sql);
            $query -> execute([$name_category,$number_of_players,$time,$complexity,$fear_level,$year,$id_inf_quest]);
            
            header('Location: ../inf_quest.php');
        }
?>
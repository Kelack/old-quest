<?php
    session_start();
    require '../configDB.php';

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
        $sql = 'INSERT INTO inf_quest(name_category,number_of_players,time,complexity,fear_level,year) VALUES(?,?,?,?,?,?)';
        $query = $pdo->prepare($sql);
        $query->execute([$name_category,$number_of_players,$time,$complexity,$fear_level,$year]);
        header('Location: ../inf_quest.php');
    }
     
?>
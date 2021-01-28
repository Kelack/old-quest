<?php
    session_start();
    $Nickname = $_SESSION['Nickname'];
    require 'configDB.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
</head>
<body>
    <?php 
        $proverka = 0;
        $query = $pdo->query('SELECT * FROM customer WHERE (Nickname = "'.$Nickname.'")');
        
        while($row = $query->fetch(PDO::FETCH_OBJ))
        {
            if($row->Admin == "yes")
            {
                $proverka = 1;
                break;
            }
        }

        if($proverka == 1)
        {
            
    ?>
    <div class="header">
        <div class="logo">
            <a href="index.php" style="color: white;">Топы</a>
        </div>
        <div class="header-menu" style="margin-left: 200px;">
            <ul class="" >
                <li><a href="booking.php">Бронирование</a></li>
                <li><a href="customer.php">Пользователь</a></li>
                <li><a href="inf_quest.php">Информация о квесте</a></li>
                <li><a href="quest.php">Квест</a></li>
                <li><a href="report.php">Отчет</a></li>
                <li><a href="top.php">Топы</a></li>
            </ul>
        </div>
    </div>
    
    <?php
            require 'configDB.php';

            echo'<div class="container">Топ 3 самых популярных квеста:<hr>';
            $query = $pdo->query('SELECT name_quest FROM quest WHERE id_quest in (SELECT id_quest FROM booking ORDER BY id_quest DESC) LIMIT 3');
            while($row = $query->fetch(PDO::FETCH_OBJ))
            {
                echo'<div>Название квеста: <b>'.$row->name_quest.'; </b></div><hr>';
            } 

            echo'<hr><hr><hr>Топ 5 популярных даты:<hr>';
            $query = $pdo->query('SELECT date FROM booking WHERE id_booking in (SELECT id_booking FROM booking ORDER BY date DESC) LIMIT 5');
            while($row = $query->fetch(PDO::FETCH_OBJ))
            {
                echo'<div>Дата: <b>'.$row->date.'; </b></div><hr>';
            } 
            echo'<hr><hr><hr>Самая популярная категория:<hr>';
            $query = $pdo->query('SELECT name_category FROM quest q inner join inf_quest i ON q.id_inf_quest = i.id_inf_quest WHERE q.id_quest in (SELECT id_quest FROM booking) ORDER BY COUNT(name_category)');
            while($row = $query->fetch(PDO::FETCH_OBJ))
            {
                echo'<div>Категория: <b>'.$row->name_category.'; </b></div><hr>';
            } 
            echo '</div>';
        }
        else
        {
            echo'<h2>У вас недостаточно прав, для этой страници</h2><a href="index.php"><button class="btn-top">Вернуться назад</button></a></div>';
        }
    ?>
    
</body
</html>
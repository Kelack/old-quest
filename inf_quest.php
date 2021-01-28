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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
    <link rel="stylesheet" href="style2.css">
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
            <a href="index.php" style="color: white;">Информация о квесте</a>
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
        if($_SERVER['REQUEST_URI'] == "/inf_quest.php")
        {
            echo '
            <form action="/inf_quest.php" method=GET>
                <input type=submit name="add" class="form-control" value="Добавление">
                <input type=submit name="viewing" class="form-control" value="Просмотр">
            </form>';
        }
    ?>
    
            <?php
            if(isset($_REQUEST["add"]))
            {
            ?>
            
                <form action="/inf_quest.php" method=GET>
                    <input type=submit name="viewing" class="form-control" value="Просмотр">
                </form>
            <div class="conteiner">
                <form action="add/add_inf_quest.php" method="post">
                    Категория: 
                    <select name=name_category>
                        <option value="Перформанс">Перформанс</option>';
                        <option value="Квест">Квест</option>';
                        <option value="Экшн-игра">Экшн-игра</option>';
                    </select>
                    <input type="text" name="number_of_players" id="number_of_players" placeholder="Количество игроков (2-5)" class="form-control">
                    <input type="text" name="time" id="time" placeholder="Время" class="form-control">
                    <input type="text" name="complexity" id="complexity" placeholder="Сложность (кол-во ключей:`0-3`)" class="form-control">
                    <input type="text" name="fear_level" id="fear_level" placeholder="Уровень страха (кол-во черепков:`0-5`)" class="form-control">
                    <input type="text" name="year" id="year" placeholder="возраст `14`" class="form-control">
                    <button type="submit" name="sendTask" class="btn-top">Отправить</button>
                </form>
            </div>
            <?php
            }

            if(isset($_REQUEST["viewing"]))
            {
                echo'
                <form action="/inf_quest.php" method=GET>
                    <input type=submit name="add" class="form-control" value="Добавление">
                </form>
                <div class="conteiner">
                    <ul class = "table-info">';
                    $query = $pdo->query('SELECT * FROM `inf_quest` ORDER BY id_inf_quest DESC');
                    while($row = $query->fetch(PDO::FETCH_OBJ))
                    {
                        echo'
                        
                        <li>
                            <div class="description">
                                <br>
                                <div><span class = "text-span-left">id информации о квесте: </span><b>'.$row->id_inf_quest.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Категория: </span><b>'.$row->name_category.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Количество игроков: </span><b>'.$row->number_of_players.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Время: </span><b>'.$row->time.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Сложность: </span><b>'.$row->complexity.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Уровень страха: </span><b>'.$row->fear_level.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">возраст: </span><b>'.$row->year.'</b></div>
                                <hr>

                                <a href="delete\delete_inf_quest.php?id_inf_quest='.$row->id_inf_quest.'"><button>Удалить</button></a>
                                <a href="
                                    transformSave/transform_inf_quest.php
                                    ?id_inf_quest='.$row->id_inf_quest.'
                                    &name_category='.$row->name_category.'
                                    &number_of_players='.$row->number_of_players.'
                                    &time='.$row->time.'
                                    &complexity='.$row->complexity.'
                                    &fear_level='.$row->fear_level.'
                                    &year='.$row->year.'
                                    ">
                                    <button>Изменить</button>
                                </a>
                                <br><br><br><br>
                            </div>
                        </li>';
                    }
                    echo'</ul>
                </div>';
            }
        }
        else
        {
            echo'<h2>У вас недостаточно прав, для этой страници</h2><a href="index.php"><button class="btn-top">Вернуться назад</button></a></div>';
        }
        ?>
    
</body
</html>
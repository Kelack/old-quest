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
            <a href="index.php" style="color: white;">Бронирование</a>
        </div>
        <div class="header-menu" style="margin-left: -40px;">
            <ul class="">
                <li><a href="booking.php">Бронирование</a></li>
                <li><a href="customer.php">Пользователь</a></li>
                <li><a href="inf_quest.php">Информация о квесте</a></li>
                <li><a href="quest.php">Квест</a></li>
                <li><a href="report.php">Отчет</a></li>
            </ul>
        </div>
    </div>
    <?php
        if($_SERVER['REQUEST_URI'] == "/booking.php")
        {
            echo '
            <form action="/booking.php" method=GET>
                <input type=submit name="add" class="form-control" value="Добавление">
                <input type=submit name="viewing" class="form-control" value="Просмотр">
            </form>';
        }
    ?>
    
            <?php
            if(isset($_REQUEST["add"]))
            {
            ?>
                <form action="/booking.php" method=GET>
                    <input type=submit name="viewing" class="form-control" value="Просмотр">
                </form>
            <div class="conteiner">
                <form action="add/add_booking.php" method="post">
                    Название квеста: 
                    <select name=id_quest>
                    <?php
                        $query = $pdo->query('SELECT * FROM `quest`');
                        while($row = $query->fetch(PDO::FETCH_OBJ))
                        {
                                echo'
                                <option value="'.$row->id_quest.'">'.$row->name_quest.'</option>';
                        }
                    ?>
                    </select>
                    <br>
                    Ник пользователя: 
                    <select name=Nickname>
                    <?php
                        $query = $pdo->query('SELECT * FROM `customer`');
                        while($row = $query->fetch(PDO::FETCH_OBJ))
                        {
                                echo'
                                <option value="'.$row->Nickname.'">'.$row->Nickname.'</option>';
                        }
                    ?>
                    </select>

                    <input type="text" name="date" id="date" placeholder="дата (гггг-дд-мм)" class="form-control">
                    <button type="submit" name="sendTask" class="btn-top">Отправить</button>
                </form>
            </div>
                    
            <?php
            }

            if(isset($_REQUEST["viewing"]))
            {
                echo'
                <form action="/booking.php" method=GET>
                    <input type=submit name="add" class="form-control" value="Добавление">
                </form>
                <div class="conteiner">
                    <ul class = "table-info">';
                    $query = $pdo->query('SELECT * FROM booking ORDER BY id_booking DESC');
                    while($row = $query->fetch(PDO::FETCH_OBJ))
                    {
                        echo'
                        <li>
                            <br>
                            <div class="description">
                                <div><span class = "text-span-left">id бронирования: </span><b>'.$row->id_booking.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">id квеста: </span><b>'.$row->id_quest.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Ник: </span><b>'.$row->Nickname.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Дата: </span><b>'.$row->date.'</b></div>
                                <hr>
                                <a href="delete/delete_booking.php?id_booking='.$row->id_booking.'"><button>Удалить</button></a>
                                <a href="transformSave/transform_booking.php
                                    ?id_booking='.$row->id_booking.'
                                    &id_quest='.$row->id_quest.'
                                    &Nickname='.$row->Nickname.'
                                    &date='.$row->date.'">
                                    <button>Изменить</button>
                                </a>
                                <br><br><br><br>
                            </div>
                        </li>';
                    }
                    echo'
                    </ul>
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
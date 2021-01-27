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
            <a href="index.php" style="color: white;">Отчет</a>
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
        if($_SERVER['REQUEST_URI'] == "/report.php")
        {
            echo '
            <form action="/report.php" method=GET>
                <input type=submit name="add" class="form-control" value="Добавление">
                <input type=submit name="viewing" class="form-control" value="Просмотр">
            </form>';
        }
    ?>
    
            <?php
            if(isset($_REQUEST["add"]))
            {
            ?>
                <form action="/report.php" method=GET>
                    <input type=submit name="viewing" class="form-control" value="Просмотр">
                </form>
            <div class="conteiner">
                <form action="add\add_report.php" method="post">
                    Бронирование: 
                    <select name=id_booking>
                    <?php
                        $query = $pdo->query('SELECT * FROM `booking` WHERE id_booking NOT IN (SELECT id_booking FROM `report`)');
                        while($row = $query->fetch(PDO::FETCH_OBJ))
                        {
                                echo'
                                <option value="'.$row->id_booking.'">Квест: '.$row->id_quest.'; Ник пользователя: '.$row->Nickname.'; Дата: '.$row->date.'</option>';
                        }
                    ?>
                    </select>
                    <input type="text" name="status" id="status" placeholder="Был ли квест (max 30 символов)" class="form-control">
                    <input type="text" name="comments" id="comments" placeholder="Комментарий (max 200 символов" class="form-control">
                    <button type="submit" name="sendTask" class="btn-top">Отправить</button>
                </form>
            </div>   
            <?php
            }

            if(isset($_REQUEST["viewing"]))
            {
                echo'
                <form action="/report.php" method=GET>
                    <input type=submit name="add" class="form-control" value="Добавление">
                </form>
                <div class="conteiner">
                    <ul class = "table-info">';
                    $query = $pdo->query('SELECT * FROM `report` ORDER BY id_report DESC');
                    while($row = $query->fetch(PDO::FETCH_OBJ))
                    {
                        echo'
                        <li>
                            <div class="description">
                                <br>
                                <div><span class = "text-span-left">id отчета: </span><b>'.$row->id_report.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">id бронирвоания: </span><b>'.$row->id_booking.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Статус: </span><b>'.$row->status.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Комментарий: </span><b>'.$row->comments.'</b></div>
                                <hr>
                                <a href="delete\delete_report.php?id_report='.$row->id_report.'"><button>Удалить</button></a>
                                <a href="transformSave\transform_report.php
                                    ?id_report='.$row->id_report.'
                                    &id_booking='.$row->id_booking.'
                                    &status='.$row->status.'
                                    &comments='.$row->comments.'">
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
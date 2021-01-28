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
            <a href="index.php" style="color: white;">Квест</a>
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
        if($_SERVER['REQUEST_URI'] == "/quest.php")
        {
            echo '
            <form action="/quest.php" method=GET>
                <input type=submit name="add" class="form-control" value="Добавление">
                <input type=submit name="viewing" class="form-control" value="Просмотр">
            </form>';
        }
    ?>
    
            <?php
            if(isset($_REQUEST["add"]))
            {
            ?>
                <form action="/quest.php" method=GET>
                    <input type=submit name="viewing" class="form-control" value="Просмотр">
                </form>
            <div class="conteiner">
                <form action="add\add_quest.php" method="post">
                    Категория квеста: 
                    <select name=id_inf_quest>
                    <?php
                        $query = $pdo->query('SELECT * FROM `inf_quest`');
                        while($row = $query->fetch(PDO::FETCH_OBJ))
                        {
                                echo'
                                <option value="'.$row->id_inf_quest.'">'.$row->name_category.'; кол-во: '.$row->number_of_players.'; время: '.$row->time.'; сложность: '.$row->complexity.'; страх: '.$row->fear_level.'; возраст: '.$row->year.'</option>';
                        }
                    ?>
                    </select>
                    <input type="text" name="name_quest" id="name_quest" placeholder="название квеста" class="form-control">
                    <input type="text" name="organizer" id="organizer" placeholder="организатор" class="form-control">
                    <input type="text" name="address" id="address" placeholder="адрес квеста" class="form-control">
                    <input type="text" name="number_organizer" id="number_organizer" placeholder="телефон организатора" class="form-control">
                    <input type="text" name="price" id="price" placeholder="стоимость" class="form-control">
                    <input type="text" name="photo" id="photo" placeholder="фото" class="form-control">
                    <input type="text" name="description" id="description" placeholder="Описание (максимально 2000 символов)" class="form-control">
                    <button type="submit" name="sendTask" class="btn-top">Отправить</button>
                </form>
            </div>   
            <?php
            }

            if(isset($_REQUEST["viewing"]))
            {
                echo'
                <form action="/quest.php" method=GET>
                    <input type=submit name="add" class="form-control" value="Добавление">
                </form>
                <div class="conteiner">
                    <ul class = "table-info">';
                    $query = $pdo->query('SELECT * FROM `quest` ORDER BY id_quest DESC');
                    while($row = $query->fetch(PDO::FETCH_OBJ))
                    {
                        echo'
                        <li>
                            <div class="description">
                                <br>
                                <div><span class = "text-span-left">id: </span><b>'.$row->id_quest.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">id категории: </span><b>'.$row->id_inf_quest.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Название квеста: </span><b>'.$row->name_quest.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Огранизатор: </span><b>'.$row->organizer.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Адрес: </span><b>'.$row->address.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Телефон организатора: </span><b>'.$row->number_organizer.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Стоимость: </span><b>'.$row->price.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Фото: </span><b>'.$row->photo.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Описание квеста: </span><b>'.$row->description.'</b></div>
                                <hr>
                                <a href="delete\delete_quest.php?id_quest='.$row->id_quest.'"><button>Удалить</button></a>
                                <a href="transformSave\transform_quest.php
                                    ?id_quest='.$row->id_quest.'
                                    &id_inf_quest='.$row->id_inf_quest.'
                                    &name_quest='.$row->name_quest.'
                                    &organizer='.$row->organizer.'
                                    &address='.$row->address.'
                                    &number_organizer='.str_ireplace("+", "", $row->number_organizer).'
                                    &price='.$row->price.'
                                    &photo='.$row->photo.'
                                    &description='.$row->description.'">
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
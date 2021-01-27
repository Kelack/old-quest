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
            <a href="index.php" style="color: white;">Пользователь</a>
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
        if($_SERVER['REQUEST_URI'] == "/customer.php")
        {
            echo '
            <form action="/customer.php" method=GET>
                <input type=submit name="add" class="form-control" value="Добавление">
                <input type=submit name="viewing" class="form-control" value="Просмотр">
            </form>';
        }
    ?>
    
            <?php
            if(isset($_REQUEST["add"]))
            {
            ?>
                <form action="/customer.php" method=GET>
                    <input type=submit name="viewing" class="form-control" value="Просмотр">
                </form>

            <div class="conteiner">
                <form action="add\add_customer.php" method="post">
                    <input type="text" name="Nickname" id="Nickname" placeholder="Nickname" class="form-control">
                    <input type="text" name="Name" id="Name" placeholder="Name" class="form-control">
                    <input type="text" name="Number" id="Number" placeholder="Number" class="form-control">
                    <input type="text" name="Password" id="Password" placeholder="Password" class="form-control">
                    <button type="submit" name="sendTask" class="btn-top">Отправить</button>
                </form>
            </div>
            <?php
            }

            if(isset($_REQUEST["viewing"]))
            {
                echo'
                <form action="/customer.php" method=GET>
                    <input type=submit name="add" class="form-control" value="Добавление">
                </form>
                <div class="conteiner">
                    <ul class = "table-info">';
                    $query = $pdo->query('SELECT * FROM `customer` ORDER BY Nickname DESC');
                    while($row = $query->fetch(PDO::FETCH_OBJ))
                    {
                        echo'
                        <li>
                            <div class="description">
                                <br>
                                <div><span class = "text-span-left">Nickname: </span><b>'.$row->Nickname.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Name: </span><b>'.$row->Name.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Number: </span><b>'.$row->Number.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Password: </span><b>'.$row->Password.'</b></div>
                                <hr>
                                <div><span class = "text-span-left">Admin: </span><b>'.$row->Admin.'</b></div>
                                <hr>
                                <a href="delete\delete_customer.php?Nickname='.$row->Nickname.'"><button>Удалить</button></a>
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
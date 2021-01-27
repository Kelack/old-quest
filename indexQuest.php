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
    <title>old quest</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script>
        var showButton = document.getElementById('buttonShow');
        var closeButton = document.getElementById('buttonClose');
        var outSession = document.getElementById('out');

        function showForm() {
            
            $(".modal-quest").css('display','block');
            $(".tabpanel").css('display','block');
            $("#Section1").addClass("show");
            $("#buttonClose").click(function(){
                $(".modal-quest").css('display','none');
                $(".tabpanel").css('display','none');
            });
        }
        
        function closeForm() {
            const closeButton_ = document.getElementById('buttonClose');

            closeButton_.style.display = "block";
        }

        showButton.addEventListener('click', showForm);


    </script>

</head>

<body>

    <nav style="border-radius: 0px" class="navbar navbar-expand-sm bg-dark navbar-dark">
        <span class="navbar-text">
            <a href="index.php" style="color: white;"><h1>old quests</h1></a>
        </span>

        <?php 
            if($Nickname == '')
            {
                echo'<button type="button" id="buttonShow" onclick="showForm()" class="right btn btn-secondary">
                        <h4>Login\Registration</h4>
                    </button>';
            }   
            else
            {
                echo '<span class="navbar-text right2"><h3>Вы вошли как: '.$Nickname.'</h3></span><a href=out.php><button class="btn-top btn btn-secondary">Выйти</button></a>';
                
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
                    echo '<a href=booking.php><button class="right btn-top btn btn-secondary">Админка</button></a>';
                }
            }
        ?>
        
    </nav>

    <span class = "finder">
        <form class="form-inline" action="/action_page.php">
            <input class="form-control mr-sm-2" type="text" placeholder="квест">
            <button class="btn btn-secondary" type="button">Поиск</button>
        </form>
    </span>

    <div class="modal-quest" index>
        <div class="container" style="position: absolute; z-index: 100; left: 0%; transform: translateX(25%); top:20%">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">

                    <div class="tab tabpanel" role="tabpanel" id="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
                            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Registration</a></li>  
                            <li><button id="buttonClose" class="btn btn-secondary close" type="submit">x</button></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabs" id="login">
                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                <form class="form-horizontal" action="in.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nickname</label>
                                        <input type="text" name="Nickname" id="Nickname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="text" name="Password" id="Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="Section2">
                                <form class="form-horizontal" action="add/add_customer.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nickname</label>
                                        <input type="text" name="Nickname" id="Nickname" placeholder="Вводится при входе в учетную запись (max 20 символов)" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text"  name="Name" id="Name" placeholder="Как к вам будут обращаться (max 30 символов)" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Number</label>
                                        <input type="text" name="Number" id="Number" placeholder="На этот номер вам будут звонить (max 13 символов)" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="text" name="Password" id="Password" placeholder="Вводится при входе в учетную запись (max 20 символов)" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Sign up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    $today  = date("Y-m-d");
    $todayM = date("Y-m-d",strtotime("+1 month", strtotime($today)));

        $id_quest = $_GET['id_quest'];
        $query = $pdo->query('SELECT * FROM quest q inner join inf_quest i ON q.id_inf_quest = i.id_inf_quest WHERE q.id_quest = '.$id_quest.'');
        while($row = $query->fetch(PDO::FETCH_OBJ))
        {
            echo '
            <div id="overview" style="float: left;background-image: url(photo/'.$row->photo.');height: 800px;width: 100%;margin-top:-50px;background-blend-mode: multiply;background-color: #403f40;background-size: cover;background-attachment: fixed;padding: 100px 0;width: 100%;text-align: center;color: #fff;" >
                <h2>'.$row->name_quest.'</h2>

                <div class="img">
                    <span>
                        <div style="font-size: 1em">'.$row->name_category.'</div>
                        <div style="font-size: 1em">Кол-во человек: '.$row->number_of_players.'</div>
                        <div style="font-size: 1em">Возраст: '.$row->year.'+</div>
                        <div style="font-size: 1em">Минимальная стоимость: '.$row->price.'р</div>
                        <div style="font-size: 1em">'.$row->time.'</div>
                        
                            <div style="justify-content: right; margin-right: 7px; font-size: 1em">Сложность: ';
                            if($row->complexity>0)
                            {
                                for ($i = 1; $i <= $row->complexity; $i++) 
                                {
                                    echo'<img  style=" width: 25px;" src="https://mir-kvestov.by/uploads/quest_type_icons/1/original.svg?1602791444">';
                                }
                            }
                            else
                            {
                                echo'Без загадок';
                            }
                            echo'
                            </div>

                            <div style="justify-content: right; margin-right: 7px; font-size: 1em">Уровень страха: ';
                            if($row->fear_level>0)
                            {
                                for ($i = 1; $i <= $row->fear_level; $i++) 
                                {
                                    echo'<img style=" width: 25px;" src="https://mir-kvestov.by/assets/quest/scary-6-0d41f7034a8f1e83028785bf236d827c3a83299871a088cedb678ff2d2a976b0.svg">';
                                }
                            }
                            else
                            {
                                echo'Не страшный';
                            }
                            echo'
                            </div>
                    </span>
                </div>
                <div class="img">
                    <span>
                        <div style="font-size: 0.5em">'.$row->description.'</div>
                    </span>
                </div>
            </div>
            <div class="conteiner">              
                <div style="font-size: 1.6em; color: #fff;>Организатор: '.$row->organizer.'</div>  <hr>  <hr>             
                <div style="font-size: 1.6em; color: #fff;">Адрес: '.$row->address.'</div>    <hr>  <hr>             
                <div style="font-size: 1.6em; color: #fff;">Телефон: '.$row->number_organizer.'</div> <hr>  <hr>'; 
                if($Nickname=='')
                {
                    echo'
                            <div style="font-size: 1.6em; color: #fff;">Выберите дату: </div>
                            <input type="date" name="calendar" id="calendar" style="color: rgb(0, 0, 0);" value="'.$today.'"  min="'.$today.'" max="'.$todayM.'">
                            <button type="button" id="buttonShow" onclick="showForm()">Забронировать</button>
                        ';
                }
                else
                {
                    echo'
                <form action="add/add_booking2.php?id_quest='.$row->id_quest.'&Nickname='.$Nickname.'"  method="post">
                    <div style="font-size: 1.6em; color: #fff;">Выберите дату: </div>
                    <input type="date" name="calendar" id="calendar" style="color: rgb(0, 0, 0);" value="'.$today.'"  min="'.$today.'" max="'.$todayM.'">
                    <button type="submit" name="sendTask" class="btn-top">Забронировать</button>
                </form>';
                }
                echo'
            </div>
            ';
        }
    ?>
    
    

    
    
</body>
</html>
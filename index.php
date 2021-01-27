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
        <form class="form-inline" action="search.php" method="post">
            <input name="name_quest" id="name_quest" class="form-control mr-sm-2" type="text" placeholder="квест">
            <button class="btn btn-secondary" type="submit" name="sendTask">Поиск</button>
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
    <a href="name.php?1"><img  style="margin-bottom: 5px; margin-left:200px; width: 50px;" src="https://mir-kvestov.by/assets/category-interrupt/scary-df8dee2d7838a7ea0825d2ad0f7dad3367a72b97b0fb330b1edae1e2f3dbb3d8.svg"></a>
    <a href="name.php?2"><img  style="margin-bottom: 5px; margin-left:200px; width: 50px;" src="https://mir-kvestov.by/uploads/quest_type_icons/2/original.svg?1605080749"></a>
    <a href="name.php?3"><img  style="margin-bottom: 5px; margin-left:200px; width: 50px;" src="https://mir-kvestov.by/assets/category-interrupt/novice-8e46f2db99a240048f1f532b11ab3dcde76aa06aa7325bf8c22e521693d621ee.svg"></a>

    <div class="conteiner">
            <?php
                if($_SERVER['REQUEST_URI'] == "/index.php")
                {
                    $query = $pdo->query('SELECT * FROM quest q inner join inf_quest i ON q.id_inf_quest = i.id_inf_quest  ORDER BY q.id_inf_quest DESC');
                }
                else
                {
                    if(isset($_REQUEST["name_quest"]))
                    {
                        $name_quest = $_SESSION['name_quest'];

                        $query = $pdo->query('SELECT * FROM quest q inner join inf_quest i ON q.id_inf_quest = i.id_inf_quest WHERE name_quest LIKE "%'.$name_quest.'%" ORDER BY q.id_inf_quest DESC');
                    }
                    if(isset($_REQUEST["name_category"]))
                    {
                        $name_category = $_SESSION['name_category'];

                        $query = $pdo->query('SELECT * FROM quest q inner join inf_quest i ON q.id_inf_quest = i.id_inf_quest WHERE name_category = "'.$name_category.'" ORDER BY q.id_inf_quest DESC');
                    }

                }
                while($row = $query->fetch(PDO::FETCH_OBJ))
                {
                    echo'
                    <div class="col-md-4" id="col-md-4" style="padding-top: 50px;">
                            <div class="block-post" style=" background: url(photo/'.$row->photo.'); 
                                height: 320px;
                                width: 476px;
                                background-repeat: no-repeat;
                                background-size: contain;">
                                <div >
                                    <a href="indexQuest.php?id_quest='.$row->id_quest.'" style="font-size: 16px; 
                                    justify-content: center;
                                    text-align: center;
                                    color: white;">
                                    <h1>'.$row->name_quest.'</h1></a>
                                </div>
                                <div><a href="indexQuest.php?id_quest='.$row->id_quest.'" style="color:white; font-size:16px; justify-content:center;"><h4>';
                                
                                
                                if ($row->name_category == 'Квест')
                                {
                                    echo'<img  style="margin-bottom: 5px; width: 20px;" src="https://mir-kvestov.by/assets/category-interrupt/scary-df8dee2d7838a7ea0825d2ad0f7dad3367a72b97b0fb330b1edae1e2f3dbb3d8.svg">';
                                }
                                if ($row->name_category == 'Перформанс')
                                {
                                    echo'<img  style="margin-bottom: 5px; width: 20px;" src="https://mir-kvestov.by/uploads/quest_type_icons/2/original.svg?1605080749">';
                                }    
                                if ($row->name_category == 'Экшн-игра')
                                {
                                    echo'<img  style="margin-bottom: 5px; width: 20px;" src="https://mir-kvestov.by/assets/category-interrupt/novice-8e46f2db99a240048f1f532b11ab3dcde76aa06aa7325bf8c22e521693d621ee.svg">';
                                }    
                                
                                
                                echo $row->name_category,'</h4></a></div>
                                <div><a href="indexQuest.php?id_quest='.$row->id_quest.'" style="color: white;"><h4>'.$row->time.'</h4></a></div>

                                <div style="justify-content: right; text-align: right; margin-right: 7px;">
                                    <a href="indexQuest.php?id_quest='.$row->id_quest.'" style="color: white;"><h4>';
                                        for ($i = 1; $i <= $row->complexity; $i++) 
                                        {
                                            echo'<img  style="margin-bottom: 30px; width: 25px;" src="https://mir-kvestov.by/uploads/quest_type_icons/1/original.svg?1602791444">';
                                        }
                                    echo'</h4></a>
                                </div>
                                <div style="justify-content: right; text-align: right; margin-right: 7px;">
                                    <a href="indexQuest.php?id_quest='.$row->id_quest.'" style="color: white;"><h4>';
                                        for ($i = 1; $i <= $row->fear_level; $i++) 
                                        {
                                            echo'<img style="margin-bottom: 30px; width: 25px;" src="https://mir-kvestov.by/assets/quest/scary-6-0d41f7034a8f1e83028785bf236d827c3a83299871a088cedb678ff2d2a976b0.svg">';
                                        }
                                    echo'</h4></a>
                                </div>
                                <div class="link">
                                    <a href="indexQuest.php?id_quest='.$row->id_quest.'"></a>
                                </div>
                            </div>
                    </div>'
                    ;
                }
            ?>
    </div>
    

    
    
</body>
</html>
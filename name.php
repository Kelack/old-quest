<?php
    session_start();
    if(isset($_REQUEST["1"]))
    {
        $_SESSION['name_category'] = 'Квест';
    }
    if(isset($_REQUEST["2"]))
    {
        $_SESSION['name_category'] = 'Перформанс';
    }
    if(isset($_REQUEST["3"]))
    {
        $_SESSION['name_category'] = 'Экшн-игра';
    }

    header('Location: index.php?name_category=квест');
?>
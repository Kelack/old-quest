<?php
    session_start();
    $name_quest = $_POST['name_quest'];
    $_SESSION['name_quest'] = $name_quest;
    header('Location: index.php?name_quest=квест');

    

?>
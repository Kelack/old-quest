<?php
    session_start();

    $_SESSION['Nickname'] = '';
    header('Location: ../index.php');
?>


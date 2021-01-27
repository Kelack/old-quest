<?php
    session_start();
    $Nickname = $_POST['Nickname'];
    $Password = $_POST['Password'];

        $proverka = 0;

        require 'configDB.php';
        $query = $pdo->query('SELECT * FROM `customer`');
        while($row = $query->fetch(PDO::FETCH_OBJ))
        {
            if(($Nickname == $row->Nickname) and ($Password == $row->Password))
            {
                $proverka = 1;
                break;
            }
        }

        if($proverka == 1)
        {
            $_SESSION['Nickname'] = $Nickname;
            header('Location: ../index.php');
        }
        else
        {
            $_SESSION['Nickname'] = '';
            header('Location: ../index.php');
        }
?>
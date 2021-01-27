<?php
    session_start();
    require '../configDB.php';

    $Nickname = $_POST['Nickname'];
    $Name = $_POST['Name'];
    $Number = $_POST['Number'];
    $Password = $_POST['Password'];

        $nik = $_SESSION['Nickname'];
        $admin=0;
            $query = $pdo->query('SELECT * FROM customer WHERE (Nickname = "'.$nik.'")');
            
            while($row = $query->fetch(PDO::FETCH_OBJ))
            {
                if($row->Admin == "yes")
                {
                    $admin=1;
                    break;
                }
            }



    if(($Nickname == '') or ($Name == '') or ($Number == '') or ($Password == ''))
    {            
        if($admin==1)
        {
            header('Location: ../customer.php');
        }
        else
        header('Location: ../index.php');
    }
    else
    {
        $proverka = 0;
        $query = $pdo->query('SELECT * FROM `customer`');
        while($row = $query->fetch(PDO::FETCH_OBJ))
        {
            if($Nickname == $row->Nickname)
            {
                $proverka = 1;
                break;
            }
        }

        if($proverka == 1)
        {
            if($admin==1)
            {
                header('Location: ../customer.php');
            }
            else
            header('Location: ../index.php');
        }
        else
        {
            $sql = 'INSERT INTO customer(Nickname,Name,Number,Password) VALUES(?,?,?,?)';
            $query = $pdo->prepare($sql);
            $query->execute([$Nickname,$Name,$Number,$Password]);

            

            
            if($admin==1)
            {
                header('Location: ../customer.php');
            }
            else
            {
                $_SESSION['Nickname'] = $Nickname;
            
                header('Location: ../index.php');
            }
            
        }
    } 
?>
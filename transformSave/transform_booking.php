<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">    
</head>
<body>

    <div class="container">
        <?php
        $id_booking = $_GET['id_booking'];

        $id_quest = $_GET['id_quest'];
        $Nickname = $_GET['Nickname'];
        $date = $_GET['date'];

        echo '<form action="save_booking.php ?id_booking='.$id_booking.'"  method="post" >
            <input type="text" name="id_quest" id="id_quest" value="'.$id_quest.'" class="form-control">
            <input type="text" name="Nickname" id="Nickname" value="'.$Nickname.'" class="form-control">
            <input type="text" name="date" id="date" value="'.$date.'" class="form-control">
            
            <button type="submit" name="sendTask" class="btn-top">Сохранить</button>
            
        </form>'
        ?>
    </div>

</body
</html>
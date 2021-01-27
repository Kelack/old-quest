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
        $id_inf_quest = $_GET['id_inf_quest'];

        $name_category = $_GET['name_category'];
        $number_of_players = $_GET['number_of_players'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $complexity = $_GET['complexity'];
        $fear_level = $_GET['fear_level'];
        $year = $_GET['year'];

        echo '<form action="save_inf_quest.php ?id_inf_quest='.$id_inf_quest.'"  method="post" >
            <input type="text" name="name_category" id="name_category" value="'.$name_category.'" class="form-control">
            <input type="text" name="number_of_players" id="number_of_players" value="'.$number_of_players.'" class="form-control">
            <input type="text" name="time" id="time" value="'.$time.'" class="form-control">
            <input type="text" name="complexity" id="complexity" value="'.$complexity.'" class="form-control">
            <input type="text" name="fear_level" id="fear_level" value="'.$fear_level.'" class="form-control">
            <input type="text" name="year" id="year" value="'.$year.'" class="form-control">
            
            <button type="submit" name="sendTask" class="btn-top">Сохранить</button>
            
        </form>'
        ?>
    </div>

</body
</html>
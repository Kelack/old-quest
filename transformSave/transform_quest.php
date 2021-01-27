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
        $id_quest = $_GET['id_quest'];

        $id_inf_quest = $_GET['id_inf_quest'];
        $name_quest = $_GET['name_quest'];
        $organizer = $_GET['organizer'];
        $address = $_GET['address'];
        $number_organizer = $_GET['number_organizer'];
        $price = $_GET['price'];
        $photo = $_GET['photo'];
        $description = $_GET['description'];

        echo '<form action="save_quest.php?id_quest='.$id_quest.'" method="post">
            <input type="text" name="id_inf_quest" id="id_inf_quest" value="'.$id_inf_quest.'" class="form-control">
            <input type="text" name="name_quest" id="name_quest" value="'.$name_quest.'" class="form-control">
            <input type="text" name="organizer" id="organizer" value="'.$organizer.'" class="form-control">
            <input type="text" name="address" id="address" value="'.$address.'" class="form-control">
            <input type="text" name="number_organizer" id="number_organizer" value="+'.$number_organizer.'" class="form-control">
            <input type="text" name="price" id="price" value="'.$price.'" class="form-control">
            <input type="text" name="photo" id="photo" value="'.$photo.'" class="form-control">
            <input type="text" name="description" id="description" value="'.$description.'" class="form-control">
            
            <button type="submit" name="sendTask" class="btn-top">Сохранить</button>
            
        </form>'
        ?>
    </div>

</body
</html>
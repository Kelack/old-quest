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
        $id_report = $_GET['id_report'];

        $id_booking = $_GET['id_booking'];
        $status = $_GET['status'];
        $comments = $_GET['comments'];

        echo '<form action="save_report.php ?id_report='.$id_report.'"  method="post" >
            <input type="text" name="id_booking" id="id_booking" value="'.$id_booking.'" class="form-control">
            <input type="text" name="status" id="status" value="'.$status.'" class="form-control">
            <input type="text" name="comments" id="comments" value="'.$comments.'" class="form-control">
            
            <button type="submit" name="sendTask" class="btn-top">Сохранить</button>
            
        </form>'
        ?>
    </div>

</body
</html>
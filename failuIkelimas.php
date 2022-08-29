<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="failuIkelimas.php" method="POST" enctype="multipart/form-data">
        <input type="tekstas" name="tekstas">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
    </form>
    <?php

    $fileDir="images/";

    if(isset($_POST["submit"])) {
        $fileTarget=$fileDir.basename($_FILES["file"]["name"]);

        $fileType=strtolower(pathinfo($fileTarget,PATHINFO_EXTENSION));

        if($_FILES["file"]["error"]==0) {
            if(move_uploaded_file($_FILES["file"]["tmp_name"],$fileTarget)) {
                echo "Failas ikeltas sekmingai";
            } else {
                echo "Failo ikelti nepavyko";
            }
        }

    }

    ?>
</body>
</html>
<?php include("classes/categoriesDatabase-class.php"); ?>
<?php 
    $categoriesDatabase = new categoriesDatabase();  
    $categoriesDatabase->createCategory();  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurti kategoriją</title>
</head>
<body>
    <form method="POST">
        <input class="form-control" name="title" placeholder="Pavadinimas">
        <input class="form-control" name="description" placeholder="Aprašymas">

        <button class="btn btn-primary" type="submit" name="katPatvirtinti">Kurti</button>
    </form>
</body>
</html>
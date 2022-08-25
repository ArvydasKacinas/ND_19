<?php include("classes/categoriesDatabase-class.php"); ?>
<?php 
$categoriesDatabase = new categoriesDatabase();  
$categories=$productsDatabase->selectOneCategory();
$categoriesDatabase->editCategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redaguoti produktą</title>
</head>
<body>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input class="form-control" name="title" value="<?php echo $categories['id']["title"]; ?>" placeholder="Pavadinimas">
        <input class="form-control" name="description" value="<?php echo $categories['id']["description"]; ?>" placeholder="Aprašymas">

        <button class="btn btn-primary" type="submit" name="redaguoti">Redaguoti</button>
    </form>
</body>
</html>
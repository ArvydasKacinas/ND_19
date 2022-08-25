<?php include("classes/productsDatabase-class.php"); ?>
<?php $productsDatabase = new productsDatabase();  
      $productsDatabase->createProduct();  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurti produktą</title>
</head>
<body>
    <form method="POST">
        <input class="form-control" name="title" placeholder="Pavadinimas">
        <input class="form-control" name="description" placeholder="Aprašymas">
        <input class="form-control" name="price" placeholder="Kaina">
        <select class="form-select" name="category_id">
            <?php foreach($productsDatabase->getCategories() as $category) { ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
            <?php } ?>
        </select>
        <input class="form-control" name="image_url" placeholder="Paveikslėlis">
        <?php 
        ?>
        <button class="btn btn-primary" type="submit" name="patvirtinti">Kurti</button>
    </form>
</body>
</html>
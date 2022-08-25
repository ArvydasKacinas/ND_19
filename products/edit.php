<?php include("classes/productsDatabase-class.php"); ?>
<?php 
$productsDatabase = new productsDatabase();  
$products=$productsDatabase->selectOneProduct();
$productsDatabase->editProduct();
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
        <input class="form-control" name="title" value="<?php echo $products['id']["title"]; ?>" placeholder="Pavadinimas">
        <input class="form-control" name="description" value="<?php echo $products['id']["description"]; ?>" placeholder="Aprašymas">
        <input class="form-control" name="price" value="<?php echo $products['id']["price"]; ?>" placeholder="Kaina">
        <!-- <input class="form-control" name="kategorijosID" value="<?php echo $products['id']["category_id"]; ?>"  placeholder="Kategorija"> -->
        <select class="form-select" name="category_id">
            <!-- <option value="1">Siaubo </option> -->
            <?php foreach($productsDatabase->getCategories() as $category) { ?>
                <?php if($products[0]["category_id"] == $category["id"]) { ?>
                    <option value="<?php echo $category['id']; ?>" selected><?php echo $category['title']; ?></option>
                <?php }  else {?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['title']; ?></option>
                <?php } ?>
            
                <?php } ?>
        </select>
        <input class="form-control" name="image_url" value="<?php echo $products['id']["image_url"]; ?>"  placeholder="Paveikslėlis">
        <button class="btn btn-primary" type="submit" name="redaguoti">Redaguoti</button>
    </form>
</body>
</html>
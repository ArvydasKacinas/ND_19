<?php include("classes/productsDatabase-class.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parduotuvė</title>
</head>
<body>
    <h1>Parduotuvė</h1>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php $products = new productsDatabase(); ?>
        <?php $products->selectWithJoin("products", "categories","category_id", "id", "LEFT JOIN",["products.id", "products.title", "products.description", "products.image", "categories.title as categoryTitle"]); ?>
        <?php $products->deleteProduct(); ?>
        
    </table>
    
    <!-- <button class="btn btn-primary" type="submit" name="generuoti">Generuoti</button> -->

</body>
</html>
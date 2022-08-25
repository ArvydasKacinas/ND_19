<?php
include("classes/databaseConnection-class.php");

class productsDatabase extends DatabaseConnection{
    public $products;
    public $categories;

    public function __construct(){
        parent::__construct();

        $this->products = $this->selectWithJoin("products", "categories","category_id", "id", "LEFT JOIN",["products.id", "products.title", "products.description", "products.price", "products.category_id", "products.image_url", "categories.title as categoryTitle"]);
        
        if(!isset($_GET["page"])) {
            foreach ($this->products as $products) {
                echo "<tr>";
                echo "<td>".$products["id"]."</td>";
                echo "<td>".$products["title"]."</td>";
                echo "<td>".$products["description"]."</td>";
                echo "<td>".$products["price"]."</td>";
                if(empty($products["categoryTitle"])) {
                    echo "<td>Nėra kategorijos</td>";
                } else {
                    echo "<td>".$products["categoryTitle"]."</td>";
                }
                echo "<td>".$products["image_url"]."</td>";
                echo "<td>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='id' value='".$products["id"]."'>";
                echo "<button class='btn btn-danger' type='submit' name='delete'>DELETE</button>";
                echo "</form>";
                echo "<a href='index.php?page=update&id=".$products["id"]."' class='btn btn-success'>EDIT</a>";
                echo "</td>";
                echo "</tr>";

            }
        }
    }

    public function getCategories() {
        $this->categories =  $this->selectAction("categories");
        if(isset($_GET["page"]) && ($_GET["page"] == "categories")) {
            foreach ($this->categories as $category) {
                echo "<tr>";
                echo "<td>".$category["id"]."</td>";
                echo "<td>".$category["title"]."</td>";
                echo "<td>".$category["description"]."</td>";
                echo "</tr>";

            }
        }

        return $this->categories;
    }

    public function createProduct() {
        if(isset($_POST["patvirtinti"])) {
            $products = array(
                "title" => $_POST["title"],
                "description" => $_POST["description"],
                "price" => $_POST["price"],
                "category_id" => $_POST["category_id"],
                "image_url" => $_POST["image_url"]
            );
            $products["title"] = '"' . $products["title"] . '"';
            $products["description"] = '"' . $products["description"] . '"';
            $products["price"] = '"' . $products["price"] . '"';
            $products["category_id"] = '"' . $products["category_id"] . '"';
            $products["image_url"] = '"' . $products["image_url"] . '"';
            $this->insertAction("products", ["title", "description", "price", "category_id","image_url"],[$products["title"], $products["description"], $products["price"], $products["category_id"], $products["image_url"]]);
        }
    }

    public function deleteProduct() {
        if(isset($_POST["delete"])) {
            $this->deleteAction("products", $_POST["id"]);
            header("Location: index.php");
        }
    }

    public function selectOneProduct() {
        if(isset($_GET["page"]) && ($_GET["page"] == "edit" && isset($_GET["id"]))) {
            $products = $this->selectOneAction("products", $_GET["id"]);
            return $products;
            
        }
    }

    public function editProduct() {
        if(isset($_POST["redaguoti"])) {
            $products = array(
                "title" => $_POST["title"],
                "description" => $_POST["description"],
                "price" => $_POST["price"],
                "category_id" => $_POST["category_id"],
                "image_url" => $_POST["image_url"]
            );
            $this->updateAction("products", $_POST["id"] , $products);
           header("Location: index.php");
        }
    }
} 


?>
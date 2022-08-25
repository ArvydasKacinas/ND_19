<?php
include("classes/databaseConnection-class.php");

class categoriesDatabase extends DatabaseConnection{
    public $products;
    public $categories;

    public function __construct(){
        parent::__construct();

        $this->categories = $this->selectWithJoin("products", "categories","category_id", "id", "LEFT JOIN",["products.id", "products.title", "products.description", "products.price", "products.category_id", "products.image_url", "categories.title as categoryTitle"]);
        
        if(!isset($_GET["page"])) {
            foreach ($this->categories as $categories) {
                echo "<tr>";
                echo "<td>".$categories["id"]."</td>";
                echo "<td>".$categories["title"]."</td>";
                echo "<td>".$categories["description"]."</td>";
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

    public function createCategory() {
        if(isset($_POST["katPatvirtinti"])) {
            $categories = array(
                "title" => $_POST["title"],
                "description" => $_POST["description"]
            );
            $categories["title"] = '"' . $categories["title"] . '"';
            $categories["description"] = '"' . $categories["description"] . '"';
            $this->insertAction("categories", ["title", "description"],[$categories["title"], $categories["description"]]);
        }
    }

    public function selectOneCategory() {
        if(isset($_GET["page"]) && ($_GET["page"] == "edit" && isset($_GET["id"]))) {
            $categories = $this->selectOneAction("categories", $_GET["id"]);
            return $categories;
            
        }
    }

    public function editCategory() {
        if(isset($_POST["redaguoti"])) {
            $categories = array(
                "title" => $_POST["title"],
                "description" => $_POST["description"],
            );
            $this->updateAction("categories", $_POST["id"] , $categories);
           header("Location: index.php");
        }
    }

} 


?>
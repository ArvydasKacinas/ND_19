<?php

include ("classes/databaseConnection-class.php");

class ShopDatabase extends DatabaseConnection {
    public $products;
    public $categories;

    public function __construct(){
        parrent::__construct();
    }

    public function getProduct() {
        $this->products = $this->selectWithJoin("products","categories","category_id","id", "LEFT JOIN",["products.id", "products.title", "products.description", "products.price", "products.image_url", "categories.title AS categoryTitle"], "categoryTitle","DESC");
        return $this->products;
        
    }   

    public function getCategories() {
        $this->categories=$this-selectAction("categoires");
        return $this->categories;
    }

    public function createProduct() {
        if(isset($_POST["submit"])) {
            $product = array(
                "tittle"=>$_POST["tittle"],
                "description"=>$_POST["description"],
                "price"=>$_POST["price"],
                "category_id"=>$_POST["category_id"],
                "image_url"=>$this->uploadImage($_FILES["image_url"])
            );
            $this->insertAction("products",["title","description","price","category_id","image_url"],["'".$product["title"]."'","'".$product["description"]."'","'".$product["price"]."'","'".$product["category_id"]."'","'".$product["image_url"]."'"]);
        }
    }

    private function uploadImage($file) {
        $fileDir="images/";
        $fileTarget=$fileDir.basename($file);
        $fileType=strtolower(pathinfo($fileTarget,PATHINFO_EXTENSION));

        if($file["error"]==0) {
            if(move_uploaded_file($file["tmp_name"],$fileTarget)) {
                return $fileTarget;;
            } else {
                echo "images/default.jpg";
            }
        }
    }





}

?>
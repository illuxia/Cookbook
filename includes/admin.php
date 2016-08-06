<?php
require_once('database.php');

class Admin {

    public $db = '';
    public function __construct(){
        $this->db = new Database;
    }

    public function getAllRecipes(){

        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page=1;
        }

        $num_rec_per_page=10;
        $start_from = ($page-1) * $num_rec_per_page;
        $recipes = $return = array();
        $query = $this->db->pdo->prepare("SELECT * FROM recipe ORDER BY recipedate DESC LIMIT $start_from, $num_rec_per_page");

        try {
            $query->execute();
            for($i=0; $row = $query->fetch(); $i++){
                $return[$i] = array();
                foreach($row as $key => $rowitem){
                    $return[$i][$key] = $rowitem;
                }
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        $recipes = $return;

        $query = $this->db->pdo->prepare("SELECT * FROM recipe");
        try {
            $query->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        $total_records = $query->rowCount();
        $total_pages = ceil($total_records / $num_rec_per_page);

        include_once('templates/managerecipes.php');

    }

    public function getPrivateRecipes(){

        $query = $this->db->pdo->prepare('SELECT * FROM recipe ORDER BY recipedate DESC');
        try {
            $query->execute();
            for($i=0; $row = $query->fetch(); $i++){
                $return[$i] = array();
                foreach($row as $key => $rowitem){
                    $return[$i][$key] = $rowitem;
                }
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        $category = $return;
        $pageTitle = 'PRIVATE RECIPES';

        include_once('../templates/privaterecipes.php');
    }

    public function getOneRecipe($recipeId){
        $id = $recipeId;
        $recipes = $return = array();
        $query = $this->db->pdo->prepare("SELECT * FROM recipe WHERE id = :id");
        $query->bindValue(':id', $id);
        try {
            $query->execute();
            for($i=0; $row = $query->fetch(); $i++){
                $return[$i] = array();
                foreach($row as $key => $rowitem){
                    $return[$i][$key] = $rowitem;
                }
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        $recipes = $return;
        include_once('../templates/displayprivaterecipe.php');
    }

    public function view($recipeId){
        $id = $recipeId;
        $recipes = $return = array();
        $query = $this->db->pdo->prepare("SELECT * FROM recipe WHERE id = :id");
        $query->bindValue(':id', $id);
        try {
            $query->execute();
            for($i=0; $row = $query->fetch(); $i++){
                $return[$i] = array();
                foreach($row as $key => $rowitem){
                    $return[$i][$key] = $rowitem;
                }
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        $recipes = $return;
        include_once('templates/displayrecipe.php');
    }

    public function insert($title, $description, $ingredients, $category, $image) {
        $item_title = $title;
        $item_description = $description;
        $item_ingredients = $ingredients;
        $item_category = $category;
        $item_image = fopen($image,'rb');

        $query = $this->db->pdo->prepare("INSERT INTO recipe(recipetitle,recipedescription,recipeingredients,recipedate,recipecategory,recipeimage)
                                          values(:title,:description,:ingredients,CURRENT_TIMESTAMP,:category,:image)");
        $query->bindValue(':title', $item_title);
        $query->bindValue(':description', $item_description);
        $query->bindValue(':ingredients', $item_ingredients);
        $query->bindValue(':category', $item_category);
        $query->bindValue(':image', $item_image, PDO::PARAM_LOB);
        $query->execute();
    }

    public function edit($recipeId) {
        $id = $recipeId;
        $query = $this->db->pdo->prepare("SELECT * FROM recipe WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();

        $row = $query->fetch();

        $item_id = $row['id'];
        $item_title = $row['recipetitle'];
        $item_description = $row['recipedescription'];
        $item_ingredients = $row['recipeingredients'];
        $item_category = $row['recipecategory'];

        include_once('templates/editrecipe.php');
    }

    public function delete($recipeId) {
        $id = $recipeId;
        $query = $this->db->pdo->prepare("DELETE FROM recipe WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->execute();

        $this->getAllRecipes();
    }

    public function update($recipeId) {
        $id = $recipeId;
        $item_title = $_POST['title'];
        $item_description = $_POST['description'];
        $item_ingredients = $_POST['ingredients'];
        $item_category = $_POST['category'];
        $query = $this->db->pdo->prepare("UPDATE recipe SET recipetitle = :title, recipedescription = :description, recipeingredients = :ingredients, recipecategory = :category WHERE id = :id");
        $query->bindValue(':id', $id);
        $query->bindValue(':title', $item_title);
        $query->bindValue(':description', $item_description);
        $query->bindValue(':ingredients', $item_ingredients);
        $query->bindValue(':category', $item_category);
        try
        {
            $query->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}

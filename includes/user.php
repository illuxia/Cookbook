<?php
require_once('database.php');

class User {

    public $db = '';
    public function __construct(){
        $this->db = new Database;
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
        include_once('frontend/templates/viewrecipe.php');
    }
    
    public function displayCategory($categoryId) {

        $id = $categoryId;
        $category = $return = array();
        $pageTitle = '';

        switch ($id){
            case 'appetizers':
                $query = $this->db->pdo->prepare("SELECT * FROM recipe WHERE recipecategory = :id ORDER BY recipedate DESC");
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
                $category = $return;
                $pageTitle = 'Appetizers';
                break;
            case 'salads':
                $query = $this->db->pdo->prepare('SELECT * FROM recipe WHERE recipecategory = :id ORDER BY recipedate DESC');
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
                $category = $return;
                $pageTitle = 'Salads';
                break;
            case 'soups':
                $query = $this->db->pdo->prepare('SELECT * FROM recipe WHERE recipecategory = :id ORDER BY recipedate DESC');
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
                $category = $return;
                $pageTitle = 'Soups';
                break;
            case 'main':
                $query = $this->db->pdo->prepare('SELECT * FROM recipe WHERE recipecategory = :id ORDER BY recipedate DESC');
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
                $category = $return;
                $pageTitle = 'Main Course';
                break;
            case 'desserts':
                $query = $this->db->pdo->prepare('SELECT * FROM recipe WHERE recipecategory = :id ORDER BY recipedate DESC');
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
                $category = $return;
                $pageTitle = 'Desserts';
                break;
            case 'sauces':
                $query = $this->db->pdo->prepare('SELECT * FROM recipe WHERE recipecategory = :id ORDER BY recipedate DESC');
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
                $category = $return;
                $pageTitle = 'Sauces';
                break;
            case 'all':
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
                $pageTitle = 'All Recipes';
                break;
            default:
                header('Location: /index.php');
                exit();
        }
        include_once('frontend/templates/category.html.php');
    }

    public function search($word) {

        $word = '%' . $word . '%';

        $query = $this->db->pdo->prepare("SELECT * FROM recipe WHERE
                                          recipetitle LIKE :search OR
                                          recipedescription LIKE :search OR
                                          recipeingredients LIKE :search OR
                                          recipecategory LIKE :search
                                          ORDER BY recipedate DESC");
        $query->bindValue(':search', $word);
        $query->execute();

        $result = $query->fetchAll();

        if(empty($result) or $result == false)
            return array();
        else
            return $result;
    }

    public function count($categoryid) {
        $id = $categoryid;
        $query = $this->db->pdo->prepare('SELECT * FROM recipe WHERE recipecategory = :id');
        $query->bindValue(':id', $id);
        try {
            $query->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        $total_records = $query->rowCount();
        return $total_records;
    }

}

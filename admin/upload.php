<?php
require_once('../includes/database.php');
require_once('../includes/admin.php');

$admin_recipes = new Admin;

$target_dir = "uploads/";
$target_file = $target_dir . rand(1000,100000)."-". basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
// }
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $recipe_title=$_POST['title'];
        $recipe_description=$_POST['description'];
        $recipe_ingredients=$_POST['ingredients'];
        $recipe_category=$_POST['category'];
        $img_url= $target_file;

        $admin_recipes->insert($recipe_title, $recipe_description, $recipe_ingredients, $recipe_category, $img_url);
        header('Location: /admin/manage.php');
        exit();
} else {
    echo "Sorry, there was an error uploading your file.";


if (isset($_POST['id']) && !empty($_POST['id'])) {
    $admin_recipes->update($_POST['id']);
    header('Location: /admin/manage.php');
    exit();
    }
}

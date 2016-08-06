<?php require_once('../header.php');?>
<?php require_once('../includes/admin.php');?>
<?php
$adminRecipe = new Admin;

if(!empty($_POST['action']) && (!empty($_POST['id']))){
    switch ($_POST['action']){
        case 'view':
            $adminRecipe->view($_POST['id']);
            break;
        case 'edit':
            $adminRecipe->edit($_POST['id']);
            break;
        case 'delete':
            $adminRecipe->delete($_POST['id']);
            break;
        default:
            $adminRecipe->getAllRecipes();
            break;
    }
}else{
    $adminRecipe->getAllRecipes();
}

?>

<?php require_once('../footer.php');?>

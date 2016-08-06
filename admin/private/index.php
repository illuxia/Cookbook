<?php require_once('../../header.php'); ?>

<?php
require_once('../../includes/database.php');
require_once('../../includes/admin.php');

$adminRecipe = new Admin;

if(!empty($_REQUEST['action']) && (!empty($_REQUEST['id']))){
    switch ($_REQUEST['action']){
        case 'view':
            $adminRecipe->getOneRecipe($_REQUEST['id']);
            break;
        case 'edit':
            $adminRecipe->edit($_REQUEST['id']);
            break;
        case 'delete':
            $adminRecipe->delete($_REQUEST['id']);
            break;
        default:
            $adminRecipe->getPrivateRecipes();
            break;
    }
}else{
    $adminRecipe->getPrivateRecipes();
}

?>

<?php require_once('../../footer.php'); ?>

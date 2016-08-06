<?php
require_once('includes/database.php');
require_once('includes/user.php');

$recipes = new User;



if(isset($_GET['action']) && $_GET['action'] == 'view') {

	$recipes->getOneRecipe($_GET['id']);
}else{
	if(isset($_GET['category'])){
		$recipes->displayCategory($_GET['category']);
	}else {
		require_once('homepage.php');
	}
}

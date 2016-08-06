<?php
require_once('../includes/database.php');
require_once('../includes/admin.php');

$admin_recipes = new Admin;

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $admin_recipes->update($_POST['id']);
}
header('Location: /admin/manage.php');
exit();
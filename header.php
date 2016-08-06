<?php
session_start();
require_once('includes/database.php');
function loggedIn() {
    return isset($_SESSION['user']); // true | false
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CookBook</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom -->
    <link href="/css/mycustomstyles.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="/css/tables.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" rel="home" href="/index.php"><strong>HOME</strong></a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <?php if(loggedIn()) : ?>
                    <li><a href="/admin/logout.php"><strong>LOGOUT</strong></a></li>
                    <li><a href="/admin/manage.php"><strong>MANAGE</strong></a></li>
                    <li><a href="/admin/private/index.php"><strong>PRIVATE</strong></a></li>
                    <li><a href="/admin/templates/newrecipe.php"><strong>NEW</strong></a></li>
                <?php else: ?>
                    <li><a href="/admin/"><strong>LOGIN</strong></a></li>
                <?php endif; ?>
            </ul>
            <div class="col-sm-3 col-md-3 pull-right">
                <form class="navbar-form" role="search" name="search" method="get" action="/frontend/templates/search.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="keyword" id="keyword">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

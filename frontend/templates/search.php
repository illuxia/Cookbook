<?php
require_once('../../includes/database.php');
require_once('../../includes/user.php');
require_once('../../header.php');

$usersearch = new User;

$recipes = $usersearch->search($_GET['keyword']);
?>

<!-- Main Content -->
<div class="container">
    <?php foreach($recipes as $item): ?>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center"><?php echo htmlentities($item['recipetitle']); ?></h3 >
                <hr>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($item['recipeimage']) . '"width="100%" height="300" class="img-responsive center-block">'; ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="col-md-6">
                    <h4>Description:</h4>
                    <p><?php echo htmlentities($item['recipedescription']); ?></p>
                </div>
                <div class="col-md-6">
                    <h4>Ingredients:</h4>
                    <p><?php echo htmlentities($item['recipeingredients']); ?></p>
                    <hr>
                    <h5>Date Added</h5>
                    <p><?php echo ($item['recipedate']); ?></p>
                    <a href="javascript:history.back()"><button type="button" class="btn btn-success">Back</button></a>
                </div>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
</div>


<?php require_once('../../footer.php'); ?>

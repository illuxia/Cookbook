<?php require_once('../header.php');?>

<hr>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-xs-12">

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
                            <p>Category: <?php echo htmlentities($item['recipecategory']); ?></p>
                            <hr>
                            <h5>Date Added</h5>
                            <p><?php echo ($item['recipedate']); ?></p>
                            <hr>
                            <form action="" method="post">
                                <div class="pull-right">
                                    <a href="javascript:history.back()"><button type="button" class="btn btn-warning">Back</button></a>
                                    <input type="hidden" name="id" value="<?php echo ($item['id']); ?>">
                                    <button type="submit" name="action" value="edit" class="btn btn-success">Edit</button>
                                    <button type="submit" name="action" value="delete" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<?php require_once('../footer.php');?>


<hr>

<!-- Main Content -->
<div class="container">
    <div class="col-md-10">
        <div class="row text-center">
            <h2><?php echo htmlentities($pageTitle); ?></h2>
        </div>
        <hr>
        <div class="row">

            <?php foreach($category as $item): ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($item['recipeimage']) . '"width="100%" height="auto" class="img-responsive center-block">'; ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3><?php echo htmlentities($item['recipetitle']); ?></h3 >
                        <hr>
                        <div class="col-md-6">
                            <h4>Description:</h4>
                            <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($item['recipedescription'])), 0, 30)); ?> [...]</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Ingredients:</h4>
                            <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($item['recipeingredients'])), 0, 30)); ?> [...]</p>
                            <a class="btn btn-info pull-right" href="<?php echo "?id=".$item['id']."&action=view"; ?>">Read More</i></a>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>

        </div>
    </div>
</div>


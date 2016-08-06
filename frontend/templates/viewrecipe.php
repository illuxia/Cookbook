<?php require_once('header.php'); ?>

<!-- Header Carousel -->
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="/images/carousel_img_1.jpg" style="width:100%" class="img-responsive center-block">
            <div class="container">
                <div class="carousel-caption">
                    <p><a class="btn btn-large btn-primary" href="/?category=all">Browse Recipes</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="/images/carousel_img_2.jpg" class="img-responsive center-block">
            <div class="container">
                <div class="carousel-caption">
                    <p><a class="btn btn-large btn-primary" href="/?category=all">Browse Recipes</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="/images/carousel_img_3.jpg" class="img-responsive center-block">
            <div class="container">
                <div class="carousel-caption">
                    <p><a class="btn btn-large btn-primary" href="/?category=all">Browse Recipes</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>

<!-- Main Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/index.php">HOME</a></li>
                <li class="active"><?php if (isset($_GET['category'])): ?>
                                   <?php echo strtoupper($_GET['category']) ?>
                                   <?php endif; ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Sidebar Column -->
        <div class="col-md-2">
            <div class="list-group">
                <a href="/?category=all" class="list-group-item">ALL RECIPES</a>
                <a href="/?category=appetizers" class="list-group-item">APPETIZERS</a>
                <a href="/?category=salads" class="list-group-item">SALADS</a>
                <a href="/?category=soups" class="list-group-item">SOUPS</a>
                <a href="/?category=main" class="list-group-item">MAIN COURSE</a>
                <a href="/?category=desserts" class="list-group-item">DESSERTS</a>
                <a href="/?category=sauces" class="list-group-item">SAUCES</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="row">
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
                                <a href="javascript:history.back()"><button type="button" class="btn btn-success">Back</button></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>

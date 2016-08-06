<?php require_once('header.php'); ?>
<?php
$user = new User;
$total_appetizers = $user->count('appetizers');
$total_salads = $user->count('salads');
$total_soups = $user->count('soups');
$total_main = $user->count('main');
$total_desserts = $user->count('desserts');
$total_sauces = $user->count('sauces');
?>

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
        <!-- Content Column -->
        <div class="col-md-10 text-center">

            <div class="row">

                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="images/appetizers.jpg" class="img-responsive">
                        <div class="caption">
                            <h3>Appetizers</h3>
                            <p>Total Recipes: <span class="badge"><?php echo $total_appetizers; ?></span></p>
                            <p><a href="/?category=appetizers" class="btn btn-primary">Browse</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="images/salads.jpg" class="img-responsive">
                        <div class="caption">
                            <h3>Salads</h3>
                            <p>Total Recipes: <span class="badge"><?php echo $total_salads; ?></span></p>
                            <p><a href="/?category=salads" class="btn btn-primary">Browse</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="images/soups.jpg" class="img-responsive">
                        <div class="caption">
                            <h3>Soups</h3>
                            <p>Total Recipes: <span class="badge"><?php echo $total_soups; ?></span></p>
                            <p><a href="/?category=soups" class="btn btn-primary">Browse</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="images/main.jpg" class="img-responsive">
                        <div class="caption">
                            <h3>Main Course</h3>
                            <p>Total Recipes: <span class="badge"><?php echo $total_main; ?></span></p>
                            <p><a href="/?category=main" class="btn btn-primary">Browse</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="images/desserts.jpg" class="img-responsive">
                        <div class="caption">
                            <h3>Desserts</h3>
                            <p>Total Recipes: <span class="badge"><?php echo $total_desserts; ?></span></p>
                            <p><a href="/?category=desserts" class="btn btn-primary">Browse</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="images/sauces.jpg" class="img-responsive">
                        <div class="caption">
                            <h3>Sauces</h3>
                            <p>Total Recipes: <span class="badge"><?php echo $total_sauces; ?></span></p>
                            <p><a href="/?category=sauces" class="btn btn-primary">Browse</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>

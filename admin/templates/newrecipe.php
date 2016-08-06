<?php require_once('../../header.php');?>

<hr>

<!-- Main content -->
<div class = "container">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">ADD NEW RECIPE</h4>
            </div>
            <hr>
            <form role="form" action="../upload.php" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" name="description" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ingredients</label>
                        <textarea class="form-control" rows="10" name="ingredients" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            <option value="appetizers">Appetizers</option>
                            <option value="salads">Salads</option>
                            <option value="soups">Soups</option>
                            <option value="main">Main Course</option>
                            <option value="desserts">Desserts</option>
                            <option value="sauces">Sauces</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fileToUpload">Upload Image</label>
                        <input type="file" name="fileToUpload">
                    </div>
                </div>
                <hr>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <a href="javascript:history.back()"><button type="button" class="btn btn-default">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../../footer.php');?>

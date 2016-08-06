<?php require_once('../header.php'); ?>

<!-- Main Content -->
<div class="container">
    <div class="col-sm-5"></div>

        <div class="col-sm-2">
            <form class="form-signin" method = "post" action = "../admin/checklogin.php">
                <h3 class="form-signin-heading" style="text-align: center">Please Log in</h3>
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" name = "username" class="form-control" style="margin-top: 20px" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" name = "password" class="form-control"style="margin-top: 1px"  placeholder="Password" required>
                <input type="hidden" name="action" value="login">
                <button class="btn btn-primary center-block" style="margin-top: 20px" type="submit">Login</button>
            </form>
        </div>

    <div class="col-sm-5"></div>
</div>

<?php require_once('../footer.php'); ?>

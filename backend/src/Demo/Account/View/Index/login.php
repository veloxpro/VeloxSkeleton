<?php $this->extend('src/Demo/App/layout/front.php') ?>


<?php $this->startBlock('body') ?>
<br/>
<br/>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 well">
        <h3>Login</h3>
        <form method="post" action="">
            <div class="form-group">
                <label for="login_username">Username</label>
                <input type="text" class="form-control" id="login_username" name="_username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="login_password">Password</label>
                <input type="password" class="form-control" id="login_password" name="_password" placeholder="Enter your password">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="_remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>
</div>
<?php $this->endBlock() ?>

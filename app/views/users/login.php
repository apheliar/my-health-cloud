<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 class="text-center">Login</h2>
            <p class="text-center my-2">Please enter your credential</p>
            <form action="<?=URLROOT?>/users/login" method="post">
                <div class="form-group">
                    <label for="email">Email : <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?=(!empty($data['email_error'])) ? 'is-invalid' : '';?>" value="<?$data['email']; ?>">
                    <span class="invalid-feedback"><?=$data['email_error'];?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password : <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?=(!empty($data['password_error'])) ? 'is-invalid' : '';?>" value="<?$data['password']; ?>">
                    <span class="invalid-feedback"><?=$data['password_error'];?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?=URLROOT;?>/users/register" class="btn btn-light btn-block">
                        Don't have an account? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

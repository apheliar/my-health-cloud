<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2 class="text-center">Create an Account</h2>
            <p class="text-center my-2">Please fill out this form to register with us</p>
            <form action="<?=URLROOT?>/users/register" method="post">
                <div class="form-group">
                   <label for="name">Name : <sup>*</sup></label>
                   <input type="text" name="name" class="form-control form-control-lg <?=(!empty($data['name_error'])) ? 'is-invalid' : '';?>" value="<?$data['name']; ?>">
                   <span class="invalid-feedback"><?=$data['name_error'];?></span>
                </div>
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
                <div class="form-group">
                    <label for="confirmed_password">Confirm Password : <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?=(!empty($data['confirmed_password_error'])) ? 'is-invalid' : '';?>" value="<?$data['confirmed_password']; ?>">
                    <span class="invalid-feedback"><?=$data['confirm_password_error'];?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?=URLROOT;?>/users/login"' value="login" class="btn btn-light btn-block">
                        Have an account? Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>


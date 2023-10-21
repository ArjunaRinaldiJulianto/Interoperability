<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <div class="mx-4 py-4">
                    <?php flash('register_success'); ?>
                    <h2>Login</h2>
                    <p>Masukan Email dan Password!</p>
                    <form action="<?= URLROOT; ?>/users/login" method="post">
                        <div class="form-group">
                            <label for="email">Email : <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>">
                            <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password : <sup>*</sup></label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
                            <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                        </div>

                        <div class="row mt-4">
                            <div class="col d-grid">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>
                            <div class="col d-grid text-center mt-2">
                                <a href="<?= URLROOT; ?>/users/register" class="text-decoration-none">Tidak punya Akun ?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
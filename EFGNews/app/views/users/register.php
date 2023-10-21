<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <div class="mx-4 py-4">
                    <h2>Buat Akun Baru</h2>
                    <p>Silahkan isi form untuk melakukan register</p>
                    <form action="<?= URLROOT; ?>/users/register" method="post">
                        <div class="form-group">
                            <label for="name">Nama : <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name']; ?>">
                            <span class="invalid-feedback"><?= $data['name_err']; ?></span>
                        </div>
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
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password : <sup>*</sup></label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['confirm_password']; ?>">
                            <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
                        </div>

                        <div class="row mt-4">
                            <div class="col d-grid">
                                <input type="submit" value="Register" class="btn btn-success btn-block">
                            </div>
                            <div class="col d-grid text-center mt-2">
                                <a href="<?= URLROOT; ?>/users/login" class="text-decoration-none">Punya akun? Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
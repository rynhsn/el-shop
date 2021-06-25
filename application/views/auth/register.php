<div class="container">
    <div class="row justify-content-center">
        <div class=" col-xl-6 col-lg-7 col-md-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('register'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= form_error('fullname') ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" placeholder="Full Name" value="<?= set_value('fullname'); ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('fullname') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                        <div class="invalid-feedback text-small">
                                            <?= form_error('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user <?= form_error('password1') ? 'is-invalid' : ''; ?>" id=" password1" name="password1" placeholder="Password" value="<?= set_value('password1'); ?>">
                                            <div class="invalid-feedback text-small">
                                                <?= form_error('password1') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Register Account
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('login'); ?>">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
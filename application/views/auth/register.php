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
                                    <input type="hidden" name="role" value="member">
                                    <input type="hidden" name="username" value="member">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= form_error('full_name') ? 'is-invalid' : ''; ?>" id="full_name" name="full_name" placeholder="Full Name" value="<?= set_value('full_name'); ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('full_name') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : ''; ?>" id=" password" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                                            <div class="invalid-feedback">
                                                <?= form_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Repeat Password">
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
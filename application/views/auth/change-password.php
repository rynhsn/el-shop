<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                    <span><?= ucfirst($this->uri->segment(1)); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->


<!-- Forgot password Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="text-center">
                        <h2>Change your password</h2>
                        <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                    </div>
                    <form method="post" action="<?= base_url('auth/changepassword'); ?>">
                        <div class="group-input">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" value="<?= set_value('password'); ?>">
                            <?= form_error('password') ?>
                        </div>
                        <div class="group-input">
                            <label for="password1">Repeat Password*</label>
                            <input type="password" id="password1" name="password1" value="<?= set_value('password1'); ?>">
                            <?= form_error('password1') ?>
                        </div>
                        <button type="submit" class="site-btn login-btn">Change password</button>
                    </form>
                    <div class="switch-login">
                        <a href="<?= base_url('login'); ?>" class="or-login">Back to login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Forgot password Form Section End -->
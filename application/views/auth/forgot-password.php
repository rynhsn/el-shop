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
                    <h2>Forgot Password</h2>
                    <form method="post" action="<?= base_url('forgot-password'); ?>">
                        <div class="group-input">
                            <label for="email">Email address *</label>
                            <input type="text" id="email" name="email" value="<?= set_value('email'); ?>">
                            <?= form_error('email') ?>
                        </div>
                        <button type="submit" class="site-btn login-btn">Reset password</button>
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
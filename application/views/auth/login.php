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


<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <?= $this->session->flashdata('message'); ?>
                    <h2>Login</h2>
                    <form method="post" action="<?= base_url('login'); ?>">
                        <div class="group-input">
                            <label for="email">Email address *</label>
                            <input type="text" id="email" name="email" value="<?= set_value('email'); ?>">
                            <?= form_error('email') ?>
                        </div>
                        <div class="group-input">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password">
                            <?= form_error('password') ?>
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">

                                <a href="#" class="forget-pass">Forget your Password</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Sign In</button>
                    </form>
                    <div class="switch-login">
                        <a href="<?= base_url('register'); ?>" class="or-login">Or Create An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
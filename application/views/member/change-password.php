<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="row">

                <?php include('menu.php'); ?>

                <div class="col-lg-10">

                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('wrong')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('wrong'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg order-1">
                            <div class="contact-widget">
                                <div class="cw-item">
                                    <div class="ci-icon">
                                        <i class="icon_key"></i>
                                    </div>
                                    <div class="ci-text">
                                        <span>Current Password :</span>
                                        <br>
                                        <input type="password" name="current_password">
                                        <?= form_error('current_password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-widget">
                                <div class="cw-item">
                                    <div class="ci-icon">
                                        <i class="icon_key"></i>
                                    </div>
                                    <div class="ci-text">
                                        <span>New Password :</span>
                                        <br>
                                        <input type="password" name="new_password">
                                        <?= form_error('new_password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-widget">
                                <div class="cw-item">
                                    <div class="ci-icon">
                                        <i class="icon_key"></i>
                                    </div>
                                    <div class="ci-text">
                                        <span>Repeat Password :</span>
                                        <br>
                                        <input type="password" name="new_password1">
                                        <?= form_error('new_password1'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-widget">
                                <div class="cw-item">
                                    <div class="ci-button">
                                        <button type="submit" type="" class="proceed-btn primary-btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Contact Section End -->
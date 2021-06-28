<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Configuration</h1>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success rounded-pill" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5>Basic</h5>
        </div>
        <div class="card-body">

            <form action="<?= site_url('admin/config'); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="site_name" class="col-sm-2 col-form-label">Site Name</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= form_error('site_name') ? 'is-invalid' : '' ?>" type="text" name="site_name" id="site_name" value="<?= $config['site_name']; ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('site_name') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tagline" class="col-sm-2 col-form-label">Tagline</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= form_error('tagline') ? 'is-invalid' : '' ?>" type="text" name="tagline" id="tagline" value="<?= $config['tagline']; ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('tagline') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" id="email" value="<?= $config['email']; ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('email') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="website" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= form_error('website') ? 'is-invalid' : '' ?>" type="text" name="website" id="website" value="<?= $config['website']; ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('website') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= form_error('phone') ? 'is-invalid' : '' ?>" type="text" name="phone" id="phone" value="<?= $config['phone']; ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('phone') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= form_error('address') ? 'is-invalid' : '' ?>" type="text" name="address" id="address"><?= $config['address']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('address') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= form_error('keywords') ? 'is-invalid' : '' ?>" type="text" name="keywords" id="keywords"><?= $config['keywords']; ?> </textarea>
                        <div class="invalid-feedback">
                            <?= form_error('keywords') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="metatext" class="col-sm-2 col-form-label">Metatext</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= form_error('metatext') ? 'is-invalid' : '' ?>" type="text" name="metatext" id="metatext"><?= $config['metatext']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('metatext') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= form_error('description') ? 'is-invalid' : '' ?>" type="text" name="description" id="description"><?= $config['description']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= form_error('description') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_account" class="col-sm-2 col-form-label">Payment Account</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= form_error('payment_account') ? 'is-invalid' : '' ?>" type="text" name="payment_account" id="payment_account" value="<?= $config['payment_account']; ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('payment_account') ?>
                        </div>
                    </div>
                </div>

                <input class="btn btn-success rounded-pill ml-auto mr-3" type="submit" name="btn" value="Save" />
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
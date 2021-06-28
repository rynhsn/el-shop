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
            <h5>Logo</h5>
        </div>
        <div class="card-body">

            <form action="<?= site_url('admin/config/logo/'); ?>" method="post" enctype="multipart/form-data">
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
                    <label for="image" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-3 form-group">
                        <input class="form-control-file <?= form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" id="image" value="<?= set_value('image'); ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('image') ?>
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm form-group">
                        <img src="<?= base_url('assets/img/' . $config['logo']); ?>" alt="logo" class="img img-responsive img thumbnail" width="200">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-3 form-group">
                        <input class="btn btn-success rounded-pill ml-auto mr-3" type="submit" name="btn" value="Save" />
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
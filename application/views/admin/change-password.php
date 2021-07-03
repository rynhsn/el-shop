<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success rounded-pill" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('wrong')) : ?>
        <div class="alert alert-danger rounded-pill" role="alert">
            <?= $this->session->flashdata('wrong'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col col-lg">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm">
                                <input type="password" class="form-control <?= form_error('current_password') ? 'is-invalid' : ''; ?>" name="current_password" id="current_password">
                                <div class="invalid-feedback">
                                    <?= form_error('current_password') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm">
                                <input type="password" class="form-control <?= form_error('new_password') ? 'is-invalid' : ''; ?>" name="new_password" id="new_password">
                                <div class="invalid-feedback">
                                    <?= form_error('new_password') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password1" class="col-sm-3 col-form-label">Repeat New Password</label>
                            <div class="col-sm">
                                <input type="password" class="form-control <?= form_error('new_password1') ? 'is-invalid' : ''; ?>" name="new_password1" id="new_password1">
                                <div class="invalid-feedback">
                                    <?= form_error('new_password1') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-2 float-right">
                            <div class="col-sm">
                                <button type="submit" class="btn btn-success rounded-pill">Change Password</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
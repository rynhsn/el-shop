<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Accounts</h1>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success rounded-pill" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('admin/accounts'); ?>"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/accounts/add'); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="bank_name">Bank*</label>
                    <input class="form-control <?= form_error('bank_name') ? 'is-invalid' : '' ?>" type="text" name="bank_name" placeholder="Bank Name" value="<?= set_value('bank_name'); ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('bank_name') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="acc_num">Account Number*</label>
                    <input class="form-control <?= form_error('acc_num') ? 'is-invalid' : '' ?>" type="text" name="acc_num" placeholder="Account Number" value="<?= set_value('acc_num'); ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('acc_num') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="owner_name">Owner*</label>
                    <input class="form-control <?= form_error('owner_name') ? 'is-invalid' : '' ?>" type="text" name="owner_name" placeholder="Owner Name" value="<?= set_value('owner_name'); ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('owner_name') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <input class="btn btn-success rounded-pill" type="submit" name="btn" value="Save" />
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
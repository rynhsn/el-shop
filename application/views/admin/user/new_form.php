<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
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
            <a href="<?= site_url('admin/users'); ?>"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/users/add'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="password" value="">
                <div class="form-group">
                    <label for="full_name">Name*</label>
                    <input class="form-control <?= form_error('full_name') ? 'is-invalid' : '' ?>" type="text" name="full_name" placeholder="Full Name" value="<?= set_value('full_name'); ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('full_name') ?>
                    </div>
                </div>

                <div class="form-group">
                    <!-- <label for="username">Username*</label> -->
                    <input class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" type="hidden" name="username" placeholder="Username" value="<?= set_value('username'); ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('username') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email*</label>
                    <input class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('email') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role">Role*</label>
                    <select class="form-control" name="role" id="role">
                        <option value="admin">Admin</option>
                        <option value="kurir">Kurir</option>
                        <option value="member">Member</option>
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
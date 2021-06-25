<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success rounded-pill" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo site_url('admin/users/add') ?>"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['full_name']; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['role']; ?></td>
                                <td>
                                    <?php if ($user['is_active']) : ?>
                                        <a href="<?= base_url('admin/users/active/' . $user['id_user'] . '/inactivate'); ?>" class="btn btn-sm btn-circle btn-success">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= base_url('admin/users/active/' . $user['id_user'] . '/activate'); ?>" class="btn btn-sm btn-circle btn-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td><?= $user['date_created']; ?></td>
                                <td><?= $user['last_login']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url('admin/users/edit/') . $user['id_user']; ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#passModal<?= $user['id_user']; ?>">
                                            <i class="fas fa-key"></i>
                                        </a>
                                        <a class="btn btn-danger btn-circle btn-sm" onclick="deleteConfirm('<?= base_url('admin/users/delete/' . $user['id_user']); ?>')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- edit passModal -->
<?php foreach ($users as $user) : ?>
    <div class="modal fade" id="passModal<?= $user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="passModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/users/editpass/' . $user['id_user']); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="hidden" name="id" value="<?= $user['id_user']; ?>" />

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" type="text" name="password" placeholder="Change password" required />
                            <div class="invalid-feedback">
                                <?= form_error('password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success rounded-pill">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
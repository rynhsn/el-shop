<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Accounts</h1>
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
            <a href="<?php echo site_url('admin/accounts/add') ?>"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Owner Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Owner Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($accounts as $account) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $account['bank_name']; ?></td>
                                <td><?= $account['acc_num']; ?></td>
                                <td><?= $account['owner_name']; ?></td>
                                <td>
                                    <?php if ($account['is_active']) : ?>
                                        <a href="<?= base_url('admin/accounts/active/' . $account['id_acc'] . '/inactivate'); ?>" class="btn btn-sm btn-circle btn-success">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?= base_url('admin/accounts/active/' . $account['id_acc'] . '/activate'); ?>" class="btn btn-sm btn-circle btn-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url('admin/accounts/edit/') . $account['id_acc']; ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger btn-circle btn-sm" onclick="deleteConfirm('<?= base_url('admin/accounts/delete/' . $account['id_acc']); ?>')">
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
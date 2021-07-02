<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transactions</h1>
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
            <a href="<?php echo site_url('admin/transactions/add') ?>"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Trx Code</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <td>
                                    <?= $transaction['nama_penerima']; ?>
                                    <small>
                                        <br>
                                        <?= $transaction['no_hp_penerima']; ?>
                                        <br>
                                        <!-- <?= $transaction['email']; ?> -->
                                        <?= $transaction['alamat_lengkap']; ?>
                                    </small>
                                </td>
                                <td><?= $transaction['id_trx']; ?></td>
                                <td><?= $transaction['tgl_trx']; ?></td>
                                <td><?= $transaction['total_item']; ?></td>
                                <td><?= "Rp " . number_format($transaction['total'], 0, ',', '.'); ?></td>
                                <td>
                                    <span class="badge badge-pill badge-dark"><?= $transaction['status_trx']; ?></span>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/transactions/detail/') . $transaction['id_trx']; ?>" class="btn btn-warning btn-circle btn-sm text-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
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
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Delivery</h1>
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Shipping Code</th>
                            <th>Date</th>
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
                                        <?= $transaction['alamat_lengkap']; ?>
                                    </small>
                                </td>
                                <td><?= $transaction['kode_resi']; ?></td>
                                <td><?= $transaction['tgl_trx']; ?></td>
                                <td>
                                    <span class="badge badge-pill badge-dark"><?= $transaction['status_trx']; ?></span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url('kurir/shipping/finish/') . $transaction['id_trx']; ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-people-carry"></i>
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
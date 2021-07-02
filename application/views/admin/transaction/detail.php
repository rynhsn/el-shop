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
        <div class="card-header">
            <a href="<?= base_url('admin/transactions/'); ?>" class="btn btn-primary rounded-pill ml-1 float-left">Back</a>
            <a href="<?= base_url('admin/transactions/print/' . $trx['id_trx']); ?>" class="btn btn-dark rounded-pill ml-1 float-right" target="_blank">Print</a>
            <?php if ($trx['status_trx'] == 'Waiting for Confirmation') : ?>
                <a href="<?= base_url('admin/transactions/proccess/' . $trx['id_trx']); ?>" class="btn btn-info rounded-pill ml-1 float-right">Proccess</a>
            <?php elseif ($trx['status_trx'] == 'In Proccess') : ?>
                <a href="<?= base_url('admin/transactions/send/' . $trx['id_trx']); ?>" class="btn btn-info rounded-pill ml-1 float-right">Send Now!</a>
            <?php endif; ?>
            <a href="<?= base_url('admin/transactions/cancel/' . $trx['id_trx']); ?>" class="btn btn-danger rounded-pill ml-1 float-right">Cancel</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>TRX Code </th>
                        <th><?= $trx['id_trx']; ?></th>
                    </tr>
                    <tr>
                        <th>Shipping Code </th>
                        <th><?= $trx['kode_resi']; ?></th>
                    </tr>
                    <tr>
                        <td>Date </td>
                        <td><?= $trx['tgl_trx']; ?></td>
                    </tr>
                    <tr>
                        <td>Status </td>
                        <td><?= $trx['status_trx']; ?></td>
                    </tr>
                    <tr>
                        <td>Total </td>
                        <td><?= "Rp " . number_format($trx['total'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php if ($trx['status_bayar']) : ?>
                        <tr>
                            <td>From </td>
                            <td><?= $trx['bank_pelanggan']; ?> (<?= $trx['rekening_pembayaran']; ?> aka <?= $trx['rekening_pelanggan']; ?>)</td>
                        </tr>
                        <tr>
                            <td>To </td>
                            <td><?= $account['bank_name']; ?> (<?= $account['acc_num']; ?> aka <?= $account['owner_name']; ?>)</td>
                        </tr>
                        <tr>
                            <td>Date </td>
                            <td><?= $trx['pay_date']; ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>Customer </td>
                        <td><?= $trx['nama_penerima']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone </td>
                        <td><?= $trx['no_hp_penerima']; ?></td>
                    </tr>
                    <tr>
                        <td>Address </td>
                        <td><?= $trx['alamat_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Proof of trx </td>
                        <td>
                            <img src="<?= base_url('assets/img/transactions/thumbs/' . $trx['bukti_bayar']); ?>" alt="" width="128" class="img img-thumbnail">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Kode Produk</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <td><img src="<?= base_url('assets/img/products/thumbs/' . $transaction['image']); ?>" alt="" width="64"></td>
                                <td>
                                    <?= $transaction['product_id']; ?>
                                </td>
                                <td><?= $transaction['name']; ?></td>
                                <td><?= $transaction['qty']; ?></td>
                                <td><?= "Rp " . number_format($transaction['price'], 0, ',', '.'); ?></td>
                                <td><?= "Rp " . number_format($transaction['sub_total'], 0, ',', '.'); ?></td>
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
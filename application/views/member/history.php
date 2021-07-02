<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?= base_url('member'); ?>"><?= ucfirst($this->uri->segment(1)); ?></a>
                    <span><?= ucfirst($this->uri->segment(2)); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($this->session->flashdata('message')) : ?>
                            <div class="alert alert-success rounded-0">
                                <?= $this->session->flashdata('message'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>TRX Code</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Items</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($history as $item) : ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="num first-row"><?= $i; ?></td>
                                            <td class="qua-col first-row">
                                                <a href="<?= base_url('member/history/' . $item['id_trx']); ?>" class="trx" class="trx">
                                                    <?= $item['id_trx']; ?>
                                                </a>
                                            </td>
                                            <td class="qua-col first-row"><?= $item['tgl_trx']; ?></td>
                                            <td class="p-price first-row"><?= 'IDR ' . number_format($item['total'], 0, ',', '.'); ?></td>
                                            <td class="qua-col first-row"><?= $item['total_item']; ?></td>
                                            <td class="qua-col first-row"><?= $item['status_trx']; ?></td>
                                            <?php if ($item['status_trx'] == 'Arrived') : ?>
                                                <td class="qua-col first-row"><a href="<?= base_url('member/accept/' . $item['id_trx']); ?>" class="site-btn confirm">Confirm</a></td>
                                            <?php elseif ($item['status_bayar'] == 0) : ?>
                                                <td class="qua-col first-row"><a href="<?= base_url('member/payout/' . $item['id_trx']); ?>" class="site-btn payout">Payout</a></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
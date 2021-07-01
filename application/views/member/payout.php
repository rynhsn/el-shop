<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?= base_url('member'); ?>"><?= ucfirst($this->uri->segment(1)); ?></a>
                    <a href="<?= base_url('member/history'); ?>"><?= ucfirst($this->uri->segment(2)); ?></a>
                    <span>Detail</span>
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
                    <div class="col-lg-4">
                        <div class="proceed-checkout">
                            <table>
                                <tr>
                                    <td class="title top">TRX Code</td>
                                    <td class="title content top"><?= $trx['id_trx']; ?></td>
                                </tr>
                                <tr>
                                    <td class="title">Date</td>
                                    <td class="content"><?= $trx['tgl_trx']; ?></td>
                                </tr>
                                <tr>
                                    <td class="title">Total</td>
                                    <td class="content"><?= 'IDR ' . number_format($trx['total'], 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td class="title bottom">Status</td>
                                    <td class="content bottom"><?= $trx['status_trx']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th class="p-name">Name</th>
                                        <th>QTY</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php foreach ($detail as $item) : ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="num first-row"><?= $i; ?></td>
                                            <td class="cart-pic first-row"><img src="<?= base_url('assets/img/products/thumbs/' . $item['image']); ?>" alt="<?= $item['name']; ?>" width="128"></td>
                                            <td class="cart-title first-row"><?= $item['name']; ?></td>
                                            <td class="qua-col first-row"><?= $item['qty']; ?></td>
                                            <td class="p-price first-row"><?= 'IDR ' . number_format($item['price'], 0, ',', '.'); ?></td>
                                            <td class="p-price first-row"><?= 'IDR ' . number_format($item['sub_total'], 0, ',', '.'); ?></td>
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
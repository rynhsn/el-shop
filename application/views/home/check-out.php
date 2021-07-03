<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <form action="<?= base_url('shop/check-out'); ?>" class="checkout-form" method="post">
            <input type="hidden" name="user_id" value="<?= $user['id_user']; ?>">
            <input type="hidden" name="total" value="<?= $this->cart->total(); ?>">
            <input type="hidden" name="tgl_trx" value="<?= date('Y-m-d'); ?>">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Shipping Details</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="fir">TRX Code </label>
                            <input type="text" name="id_trx" id="fir" value="<?= $trx_code; ?>" readonly>
                            <?= form_error('id_trx'); ?>
                        </div>
                        <div class="col-lg-12">
                            <label for="fir">Full Name<span>*</span></label>
                            <input type="text" name="nama_penerima" id="fir" value="<?= $user['full_name']; ?>" required>
                            <?= form_error('nama_penerima'); ?>

                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Province<span>*</span></label>
                            <input type="text" name="prov" value="<?= $user['prov']; ?>" id="cun" required>
                            <?= form_error('prov'); ?>

                        </div>
                        <div class="col-lg-12">
                            <label for="town">Town / City<span>*</span></label>
                            <input type="text" name="kab_kota" value="<?= $user['kab_kota']; ?>" id="town" required>
                            <?= form_error('kab_kota'); ?>

                        </div>
                        <div class="col-lg-12">
                            <label for="district">District<span>*</span></label>
                            <input type="text" name="kecamatan" value="<?= $user['kecamatan']; ?>" id="district" class="street-first" required>
                            <?= form_error('kecamatan'); ?>

                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Postcode / ZIP (optional)</label>
                            <input type="text" name="kode_pos" value="<?= $user['kode_pos']; ?>" id="zip">
                        </div>
                        <div class="col-lg-12">
                            <label for="address">Shipping Address<span>*</span></label>
                            <input type="text" name="alamat_lengkap" value="<?= $user['alamat_lengkap']; ?>" id="address" class="street-first" required>
                            <?= form_error('alamat_lengkap'); ?>

                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone<span>*</span></label>
                            <input type="text" name="no_hp_penerima" value="<?= $user['no_hp']; ?>" id="phone" required>
                            <?= form_error('no_hp_penerima'); ?>

                        </div>
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                                <?php foreach ($items as $item) : ?>
                                    <li class="fw-normal"><?= $item['name']; ?> x <?= $item['qty']; ?> <span><?= 'IDR ' . number_format($item['subtotal'], 0, ',', '.'); ?></span></li>
                                <?php endforeach; ?>
                                <li class="fw-normal">Subtotal <span><?= 'IDR ' . number_format($this->cart->total(), 0, ',', '.'); ?></span></li>
                                <li class="total-price">Total <span><?= 'IDR ' . number_format($this->cart->total(), 0, ',', '.'); ?></span></li>
                            </ul>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->
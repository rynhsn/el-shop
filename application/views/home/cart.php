<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?= base_url('shop'); ?>"><?= ucfirst($this->uri->segment(1)); ?></a>
                    <span><?= ucfirst($this->uri->segment(2)); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<?= form_open('shop/update-cart'); ?>
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-warning">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><i class="ti-close"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) : ?>
                                <?= form_hidden('rowid[]', $item['rowid']); ?>
                                <tr>
                                    <td class="cart-pic first-row"><img src="<?= base_url('assets/img/products/thumbs/' . $item['options']['image']); ?>" alt="<?= $item['name']; ?>" width="128"></td>
                                    <td class="cart-title first-row">
                                        <h5><?= $item['name']; ?></h5>
                                    </td>
                                    <td class="p-price first-row"> <?= 'IDR ' . number_format($item['price'], 0, ',', '.'); ?></td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="qty[]" value="<?= $item['qty']; ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row"><?= 'IDR ' . number_format($item['subtotal'], 0, ',', '.'); ?></td>
                                    <td class="close-td first-row"><a href="<?= base_url('shop/remove-cart/' . $item['rowid']); ?>"><i class="ti-close"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="<?= base_url('shop'); ?>" class="primary-btn continue-shop">Continue shopping</a>
                            <?php if ($items) : ?>
                                <button name="update" type="submit" class="primary-btn up-cart">Update cart</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span><?= 'IDR ' . number_format($this->cart->total(), 0, ',', '.'); ?></span></li>
                                <li class="cart-total">Total <span><?= 'IDR ' . number_format($this->cart->total(), 0, ',', '.'); ?></span></li>
                            </ul>
                            <?php if ($items) : ?>
                                <a href="<?= base_url('shop/check-out'); ?>" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
<?= form_close(); ?>
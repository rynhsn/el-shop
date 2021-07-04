<?php
$items = $this->cart->contents();
?>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="<?= base_url(); ?>">
                            <img src="<?= base_url('assets/img/' . $site['logo']); ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">

                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="cart-icon">
                            <a href="<?= base_url('shop/cart'); ?>">
                                <i class="icon_bag"></i>
                                <span><?= count($items); ?></span>
                            </a>

                            <div class="cart-hover">
                                <?php if (empty($items)) : ?>
                                    <h6>You don't have a cart yet!</h6>
                                <?php else : ?>
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <?php
                                                foreach ($items as $item) :
                                                ?>
                                                    <tr>
                                                        <td class="si-pic"><img src="<?= base_url('assets/img/products/thumbs/' . $item['options']['image']); ?>" alt="<?= $item['name']; ?>" width="64"></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p><?= $item['name']; ?></p>
                                                                <h6><?= 'IDR ' . number_format($item['price'], 0, ',', '.') . ' x ' . $item['qty']; ?></h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <a href="<?= base_url('shop/remove-cart/' . $item['rowid']); ?>"><i class="ti-close"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5><?= 'IDR ' . number_format($this->cart->total(), 0, ',', '.'); ?></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="<?= base_url('shop/cart'); ?>" class="primary-btn view-card">VIEW CART</a>
                                        <a href="<?= base_url('shop/check-out'); ?>" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li class="heart-icon">
                            <?php if ($user) : ?>
                                <a href="<?= base_url('member'); ?>">
                                    <i class="icon_profile"></i><span> <?= $user['full_name']; ?></span>
                                </a>
                            <?php else : ?>
                                <a href="<?= base_url('login'); ?>">
                                    <i class="icon_profile"></i>
                                </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li <?= $this->uri->segment(1) == '' ? 'class="active"' : ''; ?>><a href="<?= base_url(); ?>">Home</a></li>
                    <li <?= $this->uri->segment(1) == 'shop' ? 'class="active"' : ''; ?>><a href="<?= base_url('shop'); ?>">Shop</a></li>
                    <li <?= $this->uri->segment(1) == 'about' ? 'class="active"' : ''; ?>><a href="<?= base_url('about'); ?>">About us</a></li>
                    <li <?= $this->uri->segment(1) == 'contact' ? 'class="active"' : ''; ?>><a href="<?= base_url('contact'); ?>">Contact</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->
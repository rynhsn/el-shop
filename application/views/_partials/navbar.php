<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    <?= $site['email']; ?>
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    <?= $site['phone']; ?>
                </div>
            </div>
            <div class="ht-right">
                <?php if ($this->session->userdata('email')) : ?>
                    <a href="<?= base_url('profile'); ?>" class="login-panel"><i class="fa fa-user"></i><?= $user['full_name']; ?></a>
                <?php else : ?>
                    <a href="<?= base_url('login'); ?>" class="login-panel"><i class="fa fa-user"></i>Masuk</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="<?= base_url('assets'); ?>/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">All Categories</button>
                        <div class="input-group">
                            <input type="text" placeholder="What do you need?">
                            <button type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>3</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="si-pic"><img src="<?= base_url('assets'); ?>/img/select-product-1.jpg" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="si-pic"><img src="<?= base_url('assets'); ?>/img/select-product-2.jpg" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>$120.00</h5>
                                </div>
                                <div class="select-button">
                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                    <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
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
                    <li <?= $this->uri->segment(1) == 'products' ? 'class="active"' : ''; ?>><a href="<?= base_url('products'); ?>">Product</a></li>
                    <li <?= $this->uri->segment(1) == 'blogs' ? 'class="active"' : ''; ?>><a href="<?= base_url('blogs'); ?>">Blog</a></li>
                    <li <?= $this->uri->segment(1) == 'about' ? 'class="active"' : ''; ?>><a href="<?= base_url('about'); ?>">About us</a></li>
                    <li <?= $this->uri->segment(1) == 'contact' ? 'class="active"' : ''; ?>><a href="<?= base_url('contact'); ?>">Contact</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->
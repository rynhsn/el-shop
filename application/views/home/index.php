<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="<?= base_url('assets/'); ?>img/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Category</span>
                        <h1>Name</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="<?= base_url('shop'); ?>" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="<?= base_url('assets/'); ?>img/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Category</span>
                        <h1>Name</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="<?= base_url('shop'); ?>" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
<!-- Women Banner Section Begin -->
<section class="women-banner spad mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Products</h2>
                </div>
            </div>
            <div class="product-slider owl-carousel">
                <?php foreach ($products as $product) : ?>

                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="<?= base_url('assets/img/products/' . $product['image']); ?>" alt="<?= $product['product_slug']; ?>">
                            <ul>
                                <li class="w-icon active">
                                    <a href="<?= base_url('shop/add-to-cart/' . $product['id_product']); ?>"><i class=" icon_bag_alt"></i></a>
                                <li class="quick-view"><a href="<?= base_url('shop/detail/' . $product['product_slug']); ?>">+ Details</a></li>
                                <!-- <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"><?= $product['category']; ?></div>
                            <a href="<?= base_url('shop/detail/' . $product['product_slug']); ?>">
                                <h5><?= $product['name']; ?></h5>
                            </a>
                            <div class="product-price">
                                <?= "IDR " . number_format($product['price'], 0, ',', '.'); ?>
                            </div>
                        </div>
                    </div>
                    <?= form_close(); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Women Banner Section End -->
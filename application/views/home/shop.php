<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                    <span><?= ucfirst($this->uri->segment(1)); ?></span>
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
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        <?php foreach ($nav_product as $category) : ?>
                            <li><a href="<?= base_url('shop/category/' . $category['category_slug']); ?>"><?= $category['category']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <!-- <p>Show 1 - <?= $total_product; ?> Of <?= $total_product; ?> Product</p> -->
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row">
                        <?php foreach ($products as $product) : ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="<?= base_url('assets/img/products/thumbs/' . $product['image']); ?>" alt="<?= $product['product_slug']; ?>">
                                        <ul>
                                            <li class="w-icon active"> <a href="<?= base_url('shop/add-to-cart/' . $product['id_product']); ?>"><i class=" icon_bag_alt"></i></a>
                                            </li>
                                            <li class="quick-view"><a href="<?= base_url('shop/detail/' . $product['product_slug']); ?>">+ Details</a></li>
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
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- <nav aria-label="Page navigation"> -->
                    <?= $page; ?>
                    <!-- </nav> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
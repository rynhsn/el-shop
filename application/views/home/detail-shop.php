 <?php
    echo form_open(base_url('shop/add-to-cart'));
    echo form_hidden('id', $product['id_product']);
    echo form_hidden('price', $product['price']);
    echo form_hidden('name', $product['name']);
    echo form_hidden('image', $product['image']);
    echo form_hidden('redirect_page', current_url());
    ?>

 <!-- Product Shop Section Begin -->
 <section class="product-shop spad page-details">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="filter-widget">
                     <h4 class="fw-title">Categories</h4>
                     <ul class="filter-catagories">
                         <?php foreach ($nav_product as $category) : ?>
                             <li><a href="<?= base_url('shop/category/' . $category['category_slug']); ?>"><?= $category['category']; ?></a></li>
                         <?php endforeach; ?>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-9">
                 <div class="row">

                     <div class="col-lg-6">
                         <div class="product-pic-zoom">
                             <img class="product-big-img" src="<?= base_url('assets/img/products/' . $product['image']); ?>" alt="<?= $product['product_slug']; ?>">
                             <div class="zoom-icon">
                                 <i class="fa fa-search-plus"></i>
                             </div>
                         </div>
                         <div class="product-thumbs">
                             <div class="product-thumbs-track ps-slider owl-carousel">
                                 <div class="pt active" data-imgbigurl="<?= base_url('assets/img/products/' . $product['image']); ?>"><img src="<?= base_url('assets/img/products/thumbs/' . $product['image']); ?>" alt=""></div>
                                 <?php foreach ($images as $image) : ?>
                                     <div class="pt active" data-imgbigurl="<?= base_url('assets/img/products/' . $image['image']); ?>"><img src="<?= base_url('assets/img/products/' . $image['image']); ?>" alt="<?= $image['image_title']; ?>"></div>
                                 <?php endforeach; ?>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="product-details">
                             <div class="pd-title">
                                 <h3><?= $product['name']; ?></h3>
                             </div>
                             <ul class="pd-desc">
                                 <p>
                                     <?= substr($product['desc_product'], 0, 100) . '...'; ?>
                                 </p>
                                 <h4><?= "IDR " . number_format($product['price'], 0, ',', '.'); ?></h4>
                             </ul>
                             <?php if ($this->session->flashdata('message')) : ?>
                                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                     <?= $this->session->flashdata('message'); ?>
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                             <?php endif; ?>
                             <div class="quantity">
                                 <div class="pro-qty">
                                     <input type="text" name="qty" value="1">
                                 </div>
                                 <button type="submit" class="primary-btn pd-cart">Add To Cart</button>
                             </div>
                             <ul class="pd-tags">
                                 <li><span>CATEGORY</span> : <?= $product['category']; ?></li>
                                 <li><span>TAGS</span>: <?= $product['keywords']; ?></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="product-tab">
                     <div class="tab-item">
                         <ul class="nav" role="tablist">
                             <li>
                                 <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                             </li>
                             <li>
                                 <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                             </li>
                         </ul>
                     </div>
                     <div class="tab-item-content">
                         <div class="tab-content">
                             <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                 <div class="product-content">
                                     <div class="row">
                                         <div class="col-lg-7">
                                             <?= $product['desc_product']; ?>
                                         </div>
                                         <div class="col-lg-5">
                                             <img src="img/product-single/tab-desc.jpg" alt="">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                 <div class="specification-table">
                                     <table>
                                         <tr>
                                             <td class="p-catagory">Price</td>
                                             <td>
                                                 <div class="p-price"><?= "IDR " . number_format($product['price'], 0, ',', '.'); ?></div>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td class="p-catagory">Availability</td>
                                             <td>
                                                 <div class="p-stock"><?= $product['stock']; ?> in stock</div>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td class="p-catagory">Weight</td>
                                             <td>
                                                 <div class="p-weight"><?= $product['weight']; ?></div>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td class="p-catagory">Size</td>
                                             <td>
                                                 <div class="p-weight"><?= $product['size']; ?></div>
                                             </td>
                                         </tr>
                                     </table>
                                 </div>
                             </div>
                             <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                 <div class="customer-review-option">
                                     <h4>2 Comments</h4>
                                     <div class="comment-option">
                                         <div class="co-item">
                                             <div class="avatar-pic">
                                                 <img src="img/product-single/avatar-1.png" alt="">
                                             </div>
                                             <div class="avatar-text">
                                                 <div class="at-rating">
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star-o"></i>
                                                 </div>
                                                 <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                 <div class="at-reply">Nice !</div>
                                             </div>
                                         </div>
                                         <div class="co-item">
                                             <div class="avatar-pic">
                                                 <img src="img/product-single/avatar-2.png" alt="">
                                             </div>
                                             <div class="avatar-text">
                                                 <div class="at-rating">
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star-o"></i>
                                                 </div>
                                                 <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                 <div class="at-reply">Nice !</div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="personal-rating">
                                         <h6>Your Ratind</h6>
                                         <div class="rating">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star-o"></i>
                                         </div>
                                     </div>
                                     <div class="leave-comment">
                                         <h4>Leave A Comment</h4>
                                         <form action="#" class="comment-form">
                                             <div class="row">
                                                 <div class="col-lg-6">
                                                     <input type="text" placeholder="Name">
                                                 </div>
                                                 <div class="col-lg-6">
                                                     <input type="text" placeholder="Email">
                                                 </div>
                                                 <div class="col-lg-12">
                                                     <textarea placeholder="Messages"></textarea>
                                                     <button type="submit" class="site-btn">Send message</button>
                                                 </div>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Product Shop Section End -->

 <?= form_close(); ?>

 <!-- Related Products Section End -->
 <!-- Women Banner Section Begin -->
 <section class="related-products spad mt-3">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <div class="section-title">
                     <h2>Related Products</h2>
                 </div>
             </div>
             <div class="product-slider owl-carousel">
                 <?php foreach ($related as $product) : ?>

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
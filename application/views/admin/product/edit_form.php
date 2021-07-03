<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success rounded-pill" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('admin/products'); ?>"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->
                <input type="hidden" name="id_product" value="<?= $product['id_product']; ?>" />

                <div class="form-group">
                    <label for="id_product">Product code*</label>
                    <input class="form-control <?= form_error('id_product') ? 'is-invalid' : '' ?>" type="text" name="id_product" id="id_product" placeholder="Product code" value="<?= $product['id_product']; ?>" disabled />
                    <div class="invalid-feedback">
                        <?= form_error('id_product') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Name*</label>
                    <input class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" type="text" id="name" name="name" placeholder="Product name" value="<?= $product['name']; ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('name') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category">Category*</label>
                    <select class="form-control" name="category" id="category">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id_category']; ?>" <?= $product['category_id'] == $category['id_category'] ? 'selected' : ''; ?>><?= $category['category']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= form_error('category') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Price*</label>
                    <input class="form-control <?= form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Product price" value="<?= $product['price']; ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('price') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="stock">Stock*</label>
                    <input class="form-control <?= form_error('stock') ? 'is-invalid' : '' ?>" type="number" name="stock" min="0" placeholder="Product stock" value="<?= $product['stock']; ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('stock') ?>
                    </div>
                </div>



                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input class="form-control <?= form_error('weight') ? 'is-invalid' : '' ?>" type="text" name="weight" id="weight" placeholder="Product weight" value="<?= $product['weight']; ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('weight') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="size">Ukuran</label>
                    <input class="form-control <?= form_error('size') ? 'is-invalid' : '' ?>" type="text" name="size" id="size" placeholder="Product size" value="<?= $product['size']; ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('size') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description*</label>
                    <textarea class="form-control <?= form_error('description') ? 'is-invalid' : '' ?>" name="description" id="description" placeholder="Product description..."><?= $product['desc_product']; ?></textarea>
                    <div class="invalid-feedback">
                        <?= form_error('description') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="keywords">Keywords (for SEO)</label>
                    <textarea class="form-control <?= form_error('keywords') ? 'is-invalid' : '' ?>" name="keywords" id="keywords" placeholder="Product keywords..."><?= $product['keywords']; ?></textarea>
                    <div class="invalid-feedback">
                        <?= form_error('keywords') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input class="form-control-file <?= form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
                    <input type="hidden" name="old_image" value="<?= $product['image'] ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('image') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="is_active">Status*</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="1" <?= $product['is_active'] == 1 ? 'selected' : ''; ?>> Publish </option>
                        <option value="0" <?= $product['is_active'] == 0 ? 'selected' : ''; ?>> Save as draft </option>
                    </select>
                </div>


                <input class="btn btn-success rounded-pill" type="submit" name="btn" value="Save" />
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
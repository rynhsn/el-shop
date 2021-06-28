<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success rounded-pill" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo site_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('assets/img/products/thumbs/' . $product['image']) ?>" width="64" />
                                </td>
                                <td><?= $product['name']; ?></td>
                                <td><?= $product['category']; ?></td>
                                <td><?= "Rp " . number_format($product['price'], 0, ',', '.'); ?></td>
                                <td><?= $product['stock']; ?></td>
                                <td><?= $product['is_active'] == 1 ? 'Publish' : 'Draft'; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url('admin/products/edit/') . $product['id_product']; ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="<?= base_url('admin/products/images/') . $product['id_product']; ?>" class="btn btn-warning btn-circle btn-sm text-sm">
                                            <i class="fas fa-image"></i> <?= $product['image_total']; ?>
                                        </a>
                                        <a class="btn btn-danger btn-circle btn-sm" onclick="deleteConfirm('<?= base_url('admin/products/delete/' . $product['id_product']); ?>')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
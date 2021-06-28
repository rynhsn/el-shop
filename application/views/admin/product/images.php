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
        <div class="card-body">

            <form action="<?= site_url('admin/products/images/' . $product['id_product']); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="image_title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= form_error('image_title') ? 'is-invalid' : '' ?>" type="text" name="image_title" id="image_title" value="<?= set_value('image_title'); ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('image_title') ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-3 form-group">
                        <input class="form-control-file <?= form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" id="image" value="<?= set_value('image'); ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('image') ?>
                        </div>
                    </div>
                    <input class="btn btn-success rounded-pill ml-auto mr-3" type="submit" name="btn" value="Save" />
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($images as $image) : ?>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('assets/img/products/thumbs/' . $image['image']) ?>" width="64" />
                                </td>
                                <td><?= $image['image_title']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-danger btn-circle btn-sm" onclick="deleteConfirm('<?= base_url('admin/products/delimage/' . $image['id_image']) . '/' . $product['id_product']; ?>')">
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
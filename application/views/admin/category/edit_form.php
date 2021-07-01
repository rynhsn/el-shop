<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
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
            <a href="<?= site_url('admin/categories'); ?>"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/categories/edit/ID --->

                <input type="hidden" name="id" value="<?php echo $category['id_category'] ?>" />

                <div class="form-group">
                    <label for="name">Name*</label>
                    <input class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Category name" value="<?= $category['category']; ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('name') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sort">Sort*</label>
                    <input class="form-control <?= form_error('sort') ? 'is-invalid' : '' ?>" type="text" name="sort" placeholder="Sort" value="<?= $category['sort']; ?>" />
                    <div class="invalid-feedback">
                        <?= form_error('sort') ?>
                    </div>
                </div>

                <input class="btn btn-success rounded-pill" type="submit" name="btn" value="Save" />
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
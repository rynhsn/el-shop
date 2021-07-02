<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success rounded-pill" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col col-lg-2">
                    <img src="<?= base_url('assets/img/users/' . $brainware['image']); ?>" alt="<?= $brainware['full_name']; ?>" class="img-thumbnail" width="128px">
                </div>
                <div class="col col-lg">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $brainware['id_user'] ?>" />
                        <input type="hidden" name="role" value="<?= $brainware['role'] ?>" />
                        <input type="hidden" name="username" value="<?= $brainware['username'] ?>" />
                        <input type="hidden" name="is_active" value="<?= $brainware['is_active'] ?>" />
                        <input type="hidden" name="old_image" value="<?= $brainware['image'] ?>" />

                        <div class="form-group row">
                            <label for="full_name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm">
                                <input type="text" class="form-control <?= form_error('full_name') ? 'is-invalid' : ''; ?>" name="full_name" id="full_name" placeholder="Full Name" value="<?= $brainware['full_name']; ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('full_name') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-3 col-form-label">Mobile Phone</label>
                            <div class="col-sm">
                                <input type="text" class="form-control <?= form_error('no_hp') ? 'is-invalid' : ''; ?>" name="no_hp" id="no_hp" placeholder="0812 3456 789" value="<?= $brainware['no_hp']; ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('no_hp') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm">
                                <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="example@email.com" value="<?= $brainware['email']; ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('email') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-sm-3 col-form-label">Birth Day</label>
                            <div class="col-sm">
                                <input type="date" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : ''; ?>" name="tgl_lahir" id="tgl_lahir" value="<?= $brainware['tgl_lahir']; ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('tgl_lahir') ?>
                                </div>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                                <div class="col-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="gridRadios1" value="Laki-laki" <?= $brainware['jk'] == '' ? 'checked' : ''; ?> <?= $brainware['jk'] == 'Laki-laki' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="gridRadios2" value="Perempuan" <?= $brainware['jk'] == 'Perempuan' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <label for="kecamatan" class="col-sm-3 col-form-label">Region</label>
                            <div class="col-sm">
                                <input type="text" class="form-control <?= form_error('kecamatan') ? 'is-invalid' : ''; ?>" name="kecamatan" id="kecamatan" placeholder="ex : Pamulang" value="<?= $brainware['kecamatan']; ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('kecamatan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kab_kota" class="col-sm-3 col-form-label">City / Town</label>
                            <div class="col-sm">
                                <input type="text" class="form-control <?= form_error('kab_kota') ? 'is-invalid' : ''; ?>" name="kab_kota" id="kab_kota" placeholder="ex : Tangerang Selatan" value="<?= $brainware['kab_kota']; ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('kab_kota') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prov" class="col-sm-3 col-form-label">Province</label>
                            <div class="col-sm">
                                <input type="text" class="form-control <?= form_error('prov') ? 'is-invalid' : ''; ?>" name="prov" id="prov" placeholder="ex : Banten" value="<?= $brainware['prov']; ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('prov') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-sm-3 col-form-label">Postcode / ZIP</label>
                            <div class="col-sm">
                                <input type="text" class="form-control <?= form_error('kode_pos') ? 'is-invalid' : ''; ?>" name="kode_pos" id="kode_pos" placeholder="ex : Banten" value="<?= $brainware['kode_pos']; ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('kode_pos') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_lengkap" class="col-sm-3 col-form-label">Full Address</label>
                            <div class="col-sm">
                                <textarea type="text" class="form-control <?= form_error('alamat_lengkap') ? 'is-invalid' : ''; ?>" name="alamat_lengkap" id="alamat_lengkap" placeholder="ex : Banten"><?= $brainware['alamat_lengkap']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('alamat_lengkap') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                        <div class="form-group row mt-2 float-right">
                            <div class="col-sm">
                                <button type="submit" class="btn btn-success rounded-pill">Update</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
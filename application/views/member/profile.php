    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">

            <form action="<?= site_url('member/profile'); ?>" method="post" enctype="multipart/form-data">

                <div class="row">

                    <?php include('menu.php'); ?>

                    <div class="col-lg-10">

                        <?php if ($this->session->flashdata('message')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('message'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-lg-2 order-1">
                                <div class="contact-widget">
                                    <div class="cw-item">
                                        <div class="ci-image">
                                            <img src="<?= base_url('assets/img/users/' . $user['image']); ?>" alt="" width="120px">
                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-button">
                                            <button type="submit" type="" class="proceed-btn">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 order-1">
                                <div class="contact-widget">
                                    <div class="cw-item">
                                        <div class="ci-icon">
                                            <i class="icon_id-2"></i>
                                        </div>
                                        <div class="ci-text">
                                            <span>Full Name :</span>
                                            <br>
                                            <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                                            <input type="hidden" name="username" value="<?= $user['username']; ?>">
                                            <input type="hidden" name="role" value="<?= $user['role']; ?>">
                                            <input type="hidden" name="is_active" value="<?= $user['is_active']; ?>">
                                            <input type="hidden" name="jk" value="<?= $user['jk']; ?>">
                                            <input type="text" name="full_name" value="<?= $user['full_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-icon">
                                            <i class="icon_mail_alt"></i>
                                        </div>
                                        <div class="ci-text">
                                            <span>Email :</span>
                                            <br>
                                            <input type="text" name="email" value="<?= $user['email']; ?>" readonly>

                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-icon">
                                            <i class="icon_mobile"></i>
                                        </div>
                                        <div class="ci-text">
                                            <span>Phone :</span>
                                            <br>
                                            <input type="text" name="no_hp" value="<?= $user['no_hp']; ?>">
                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-icon">
                                            <i class="icon_calendar"></i>
                                        </div>
                                        <div class="ci-text">
                                            <span>Birthday :</span>
                                            <br>
                                            <input type="date" name="tgl_lahir" value="<?= $user['tgl_lahir']; ?>">
                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-icon">
                                            <i class="icon_image"></i>
                                        </div>
                                        <div class="ci-text">
                                            <span>Photo :</span>
                                            <br>
                                            <input type="file" name="image" />
                                            <input type="hidden" name="old_image" value="<?= $user['image']; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 order-2">
                                <div class="contact-widget">
                                    <div class="cw-item">
                                        <div class="ci-text">
                                            <span>District :</span>
                                            <br>
                                            <input type="text" name="kecamatan" value="<?= $user['kecamatan']; ?>">
                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-text">
                                            <span>Town / City :</span>
                                            <br>
                                            <input type="text" name="kab_kota" value="<?= $user['kab_kota']; ?>">
                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-text">
                                            <span>Postcode / ZIP :</span>
                                            <br>
                                            <input type="text" name="kode_pos" value="<?= $user['kode_pos']; ?>">
                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-text">
                                            <span>Province :</span>
                                            <br>
                                            <input type="text" name="prov" value="<?= $user['prov']; ?>">
                                        </div>
                                    </div>
                                    <div class="cw-item">
                                        <div class="ci-text">
                                            <span>Full Address :</span>
                                            <br>
                                            <textarea type="text" name="alamat_lengkap" class="address"><?= $user['alamat_lengkap']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Contact Section End -->
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?= base_url('member'); ?>"><?= ucfirst($this->uri->segment(1)); ?></a>
                    <span>Payout</span>
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
            <div class="col-lg-12">
                <table class="table table-hover">
                    <tr>
                        <th scope="col">TRX Code</th>
                        <th scope="col"><?= $trx['id_trx']; ?></th>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?= $trx['tgl_trx']; ?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?= 'IDR ' . number_format($trx['total'], 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $trx['status_trx']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 ml-3">
                <form action="<?= base_url('member/payout/' . $trx['id_trx']); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="acc_id" class="col-sm-3 col-form-label">Pay to account</label>
                        <div class="col-sm-9">
                            <select class="rounded-0 form-control" id="acc_id" name="acc_id">
                                <?php foreach ($accounts as $account) : ?>
                                    <option value="<?= $account['id_acc']; ?>" <?= set_value('acc_id') == $account['acc_num'] ? 'selected' : ''; ?>><?= $account['bank_name']; ?> (Account number : <?= $account['acc_num']; ?> aka <?= $account['owner_name']; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pay_date" class="col-sm-3 col-form-label">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="rounded-0 form-control <?= form_error('pay_date') ? 'is-invalid' : '' ?>" name="pay_date" id="pay_date" placeholder="Date" value="<?= set_value('pay_date'); ?>">
                            <div class="invalid-feedback">
                                <?= form_error('pay_date') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="rounded-0 form-control <?= form_error('amount') ? 'is-invalid' : '' ?>" name="amount" id="amount" placeholder="Amount" value="<?= 'IDR ' . number_format($trx['total'], 0, ',', '.'); ?>" readonly>
                            <div class="invalid-feedback">
                                <?= form_error('amount') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bank_pelanggan" class="col-sm-3 col-form-label">Bank Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="rounded-0 form-control <?= form_error('bank_pelanggan') ? 'is-invalid' : '' ?>" name="bank_pelanggan" id="bank_pelanggan" placeholder="Bank Name" value="<?= set_value('bank_pelanggan'); ?>">
                            <div class="invalid-feedback">
                                <?= form_error('bank_pelanggan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rekening_pembayaran" class="col-sm-3 col-form-label">Account Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="rounded-0 form-control <?= form_error('rekening_pembayaran') ? 'is-invalid' : '' ?>" name="rekening_pembayaran" id="rekening_pembayaran" placeholder="Account Number" value="<?= set_value('rekening_pembayaran'); ?>">
                            <div class="invalid-feedback">
                                <?= form_error('rekening_pembayaran') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rekening_pelanggan" class="col-sm-3 col-form-label">Alias</label>
                        <div class="col-sm-9">
                            <input type="text" class="rounded-0 form-control <?= form_error('rekening_pelanggan') ? 'is-invalid' : '' ?>" name="rekening_pelanggan" id="rekening_pelanggan" placeholder="Owner Name" value="<?= set_value('rekening_pelanggan'); ?>">
                            <div class="invalid-feedback">
                                <?= form_error('rekening_pelanggan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label">Proof of trx</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-custom-file" name="image" id="image" placeholder="Owner Name">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark rounded-0 float-right">Pay Now!</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
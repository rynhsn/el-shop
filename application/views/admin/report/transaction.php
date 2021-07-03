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
    <?php if ($this->session->flashdata('wrong')) : ?>
        <div class="alert alert-danger rounded-pill" role="alert">
            <?= $this->session->flashdata('wrong'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daily Report</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-lg">
                            <form action="<?= base_url('admin/reports/transactions/daily'); ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="from" class="col-sm-3 col-form-label">From</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control <?= form_error('from') ? 'is-invalid' : ''; ?>" name="from" id="from" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="to" class="col-sm-3 col-form-label">To</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control <?= form_error('to') ? 'is-invalid' : ''; ?>" name="to" id="to" required>
                                    </div>
                                </div>
                                <div class="form-group row mt-2 float-right">
                                    <div class="col-sm">
                                        <button type="submit" class="btn btn-success btn-circle"><i class="fas fa-print fa-sm"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Report</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-lg">
                            <form action="<?= base_url('admin/reports/transactions/monthly'); ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="year" class="col-sm-3 col-form-label">Year</label>
                                    <div class="col-sm-9">
                                        <select name="year" id="year" class="form-control" required>
                                            <?php foreach ($years as $year) : ?>
                                                <option value="<?= $year['year']; ?>"><?= $year['year']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="from" class="col-sm-3 col-form-label">From</label>
                                    <div class="col-sm-9">
                                        <select name="from" id="from" class="form-control" required>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="to" class="col-sm-3 col-form-label">To</label>
                                    <div class="col-sm-9">
                                        <select name="to" id="to" class="form-control" required>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-2 float-right">
                                    <div class="col-sm">
                                        <button type="submit" class="btn btn-success btn-circle"><i class="fas fa-print fa-sm"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Annual Report</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-lg">
                            <form action="<?= base_url('admin/reports/transactions/annual'); ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="year" class="col-sm-3 col-form-label">Year</label>
                                    <div class="col-sm-9">
                                        <select name="year" id="year" class="form-control" required>
                                            <?php foreach ($years as $year) : ?>
                                                <option value="<?= $year['year']; ?>"><?= $year['year']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-2 float-right">
                                    <div class="col-sm">
                                        <button type="submit" class="btn btn-success btn-circle"><i class="fas fa-print fa-sm"></i></button>
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
<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="lnr-picture text-danger"></i>
                </div>
                <div>Default Loans
                    <div class="page-title-subheading">List of loans in default.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('loans') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-exit-up icon-gradient bg-plum-plate"> </i>Default Loans
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-end row px-3">
                        <div>
                            <label for="from">From</label>
                            <div class="form-group">
                                <input type="date" name="date_from" id="date-from" class="form-control">
                            </div>
                        </div>
                        <div class="ml-3">
                            <label for="from">To</label>
                            <div class="form-group">
                                <input type="date" name="date_to" id="date-to" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <button class="btn btn-primary filter">
                                <i class="fa fa-filter"></i>
                                Filter</button>
                            <button class="btn btn-warning ml-2 filter-clear">
                                <i class="fa fa-times"></i>
                                Clear</button>
                        </div>
                    </div>
                    <table style="width: 100%;" id="dt-defaults" class="table table-hover table-striped table-bordered">
                        <thead class="text-uppercase">
                            <tr>
                                <th>#ID</th>
                                <th>Association</th>
                                <th>Passbook</th>
                                <th>Account</th>
                                <th>Repay. Start</th>
                                <th>Days in Arrears</th>
                                <th>Last Payment</th>
                                <th>Arrears</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($loans as $key => $row) {
                                $row->totalPaid = $this->payment->sum(['loan_id' => $row->id])->row('total');
                                $row->totalBalance = $this->loan->sum(['id' => $row->id])->row('total') - $row->totalPaid;
                                $row->account = $this->account->find($row->account_id);
                            ?>
                                <tr>
                                    <td><a href="<?= site_url('loans/' . $row->id) ?>" class="btn btn-link"><?= $row->id ?></a></td>
                                    <td><?= $row->association_name ?></td>
                                    <td><?= $row->passbook ?></td>
                                    <td>
                                        <a href="<?= site_url('bankaccounts/' . $row->account_id) ?>" class="btn btn-link">
                                            <?= $row->name ?><br>(<?= $row->accType ?>)
                                        </a>
                                    </td>
                                    <td><?= date('d/m/y',strtotime($row->payin_start_date)); ?></td>
                                    <td><?= $row->arrears_days; ?></td>
                                    <td><?= $row->last_repayment?date('d/m/y',strtotime($row->last_repayment)):'None'; ?></td>
                                    <td><?= number_format($row->total_arrears, 2) ?></td>
                                    <td><?= number_format($row->totalBalance, 2); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot class="text-uppercase">
                            <tr>
                                <th>#ID</th>
                                <th>Association</th>
                                <th>Passbook</th>
                                <th>Account</th>
                                <th>Repay. Start</th>
                                <th>Days in Arrears</th>
                                <th>Last Payment</th>
                                <th>Arrears</th>
                                <th>Balance</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/loans/defaults.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
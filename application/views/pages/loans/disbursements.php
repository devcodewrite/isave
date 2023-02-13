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
                <div>Disbursement Schedules
                    <div class="page-title-subheading">List of loans and disbursement schedules.</div>
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
                    <i class="header-icon lnr-exit-up icon-gradient bg-plum-plate"> </i>Disbursement Schedules
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
                    <table style="width: 100%;" id="dt-payouts" class="table table-hover table-striped table-bordered">
                        <thead class="text-uppercase">
                            <tr>
                                <th>Disbursement Date</th>
                                <th>#ID</th>
                                <th>Passbook</th>
                                <th>Account</th>
                                <th>Amount</th>
                                <th>Owner</th>
                                <th>Repayment Start</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tfoot class="text-uppercase">
                            <tr>
                                <th>Disbursement Date</th>
                                <th>#ID</th>
                                <th>Passbook</th>
                                <th>Account</th>
                                <th>Amount</th>
                                <th>Owner</th>
                                <th>Repayment Start</th>
                                <th>Status</th>
                                <th>Action</th>
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
<script src="<?= site_url('assets/js/loans/disbursements.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
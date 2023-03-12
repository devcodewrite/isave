<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                </div>
                <div>Loan Transactions
                    <div class="page-title-subheading">Table of loans and their details.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3" style="max-width:calc(100% - 10px);">
        <div class="card">
            <div class="card-header">
                <div class="btn-actions-pane-right actions-icon-btn">
                    <a href="<?= site_url('loans/create') ?>" class="btn btn-primary text-uppercase">
                        <i class="pe-7s-plus btn-icon-wrapper"></i>
                        New Loan Request
                    </a>
                </div>
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
                <div class="table-responsive">
                    <table style="width: 100%;" id="dt-loans" class="table table-hover table-striped table-bordered">
                        <thead class="text-uppercase">
                            <tr>
                                <th>#ID</th>
                                <th>Association</th>
                                <th>Pas.B No.</th>
                                <th>Account</th>
                                <th>Principal</th>
                                <th>Interest</th>
                                <th>Duration</th>
                                <th>Rate</th>
                                <th>Req. Status</th>
                                <th>Disbursed At</th>
                                <th>Repay. Start</th>
                                <th>Repay. Status</th>
                                <th>Added by</th>
                            </tr>
                        </thead>

                        <tfoot class="text-uppercase">
                            <tr>
                            <th>#ID</th>
                                <th>Association</th>
                                <th>Pas.B No.</th>
                                <th>Account</th>
                                <th>Principal</th>
                                <th>Interest</th>
                                <th>Duration</th>
                                <th>Rate</th>
                                <th>Req. Status</th>
                                <th>Disbursed At</th>
                                <th>Repay. Start</th>
                                <th>Repay. Status</th>
                                <th>Added by</th>
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
<script src="<?= base_url('assets/js/loans/list.js?v=12') ?>" defer></script>
<?php app_end(); ?>
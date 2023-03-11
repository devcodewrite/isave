<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-notebook icon-gradient bg-happy-itmeo"></i>
                </div>
                <div>Reporting Transactions
                    <div class="page-title-subheading">Reporting transactions.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="max-width: calc(100% - 10px);">
            <div class="mb-3 card">
                <div class="card-header d-none">
                    <div class="btn-actions-pane-right actions-icon-btn">
                        <button type="button" class="btn btn-primary text-uppercase">
                            <i class="pe-7s-plus btn-icon-wrapper"></i>
                            New Deposit
                        </button>
                        <button class="btn btn-secondary text-uppercase">
                            <i class="pe-7s-plus btn-icon-wrapper"></i>
                            New Withdrawal
                        </button>
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
                    <table style="width: 100%;" id="dt-cashbook" class="table table-hover table-striped table-bordered">
                        <thead class="text-uppercase">
                            <tr>
                               
                                <th>Date</th>
                                <th>Association</th>
                                <th>Account</th>
                                <th>Acc. Type</th>
                                <th>Transac. Type</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Balance</th>
                                <th>Narration</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot class="text-uppercase">
                            <tr>
                                
                                <th>Date</th>
                                <th>Association</th>
                                <th>Account</th>
                                <th>Acc. Type</th>
                                <th>Transac. Type</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Balance</th>
                                <th>Narration</th>
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
<script src="<?= base_url('assets/js/reportings/cashbook.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
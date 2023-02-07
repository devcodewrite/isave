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
    <div class="main-card mb-3 card">
        <div class="card-header">
            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('loans/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Loan Request
                </a>
            </div>
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="dt-loans" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Pas.B No.</th>
                        <th>Account</th>
                        <th>Principal Amt.</th>
                        <th>Interest Amt.</th>
                        <th>Dur.</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th>Payout Date</th>
                        <th>Repay. Date</th>
                        <th>Repay. Status</th>
                        <th>Loan Type</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Pas.B No.</th>
                        <th>Account</th>
                        <th>Principal Amt.</th>
                        <th>Interest Amt.</th>
                        <th>Dur.</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th>Payout Date</th>
                        <th>Repay. Date</th>
                        <th>Repay. Status</th>
                        <th>Loan Type</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/loans/list.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
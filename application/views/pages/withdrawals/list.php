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
                <div>Withdrawal Transactions
                    <div class="page-title-subheading">Table of withdrawals and their details.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('withdrawals/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Withdrawal
                </a>
            </div>
        </div>
        <div class="card-body">
        <table style="width: 100%;" id="dt-withdrawals" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Association</th>
                        <th>Pas.B No.</th>
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Withdrawer's Name</th>
                        <th>Withdrawer's Phone</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Association</th>
                        <th>Pas.B No.</th>
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Transferor's Name</th>
                        <th>Transferor's Phone</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/withdrawals/list.js?v=3') ?>" defer></script>
<?php app_end(); ?>
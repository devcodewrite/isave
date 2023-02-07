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
                <div>Transfer Transactions
                    <div class="page-title-subheading">Table of transfers and their details.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-header">
            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('transfers/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Internal Transfer
                </a>
            </div>
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="dt-transfers" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>From Acc.</th>
                        <th>To Acc.</th>
                        <th>From Pas.B</th>
                        <th>To Pas.B</th>
                        <th>From Assoc.</th>
                        <th>To Assoc.</th>
                        <th>By User</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>From Acc.</th>
                        <th>To Acc.</th>
                        <th>From Pas.B</th>
                        <th>To Pas.B</th>
                        <th>From Assoc.</th>
                        <th>To Assoc.</th>
                        <th>By User</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/transfers/list.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
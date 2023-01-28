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
                <div>List Deposits
                    <div class="page-title-subheading">Table of deposits and their details.</div>
                </div>
            </div>

        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <table style="width: 100%;" id="dt-deposits" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Account Number</th>
                        <th>Amount</th>
                        <th>Depositor</th>
                        <th>Depositor's Phone</th>
                        <th>Depositor's Address</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Account Number</th>
                        <th>Amount</th>
                        <th>Depositor</th>
                        <th>Depositor's Phone</th>
                        <th>Depositor's Address</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/deposits/list.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
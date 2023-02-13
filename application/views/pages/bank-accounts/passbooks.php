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
                <div>List Passbooks
                    <div class="page-title-subheading">Table of passbooks and their details.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('deposits') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-header">
            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('bankpassbooks/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Account
                </a>
            </div>
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="dt-passbooks" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#No.</th>
                        <th>Owner</th>
                        <th>Balance</th>
                        <th>Accounts</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>#No.</th>
                        <th>Owner</th>
                        <th>Balance</th>
                        <th>Accounts</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/accounts/passbooks.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
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
                <div>Account Types
                    <div class="page-title-subheading">Table of account types and their details.</div>
                </div>
            </div>

        </div>
    </div>

    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i> Account Types
        </div>
        <div class="card-body">
            <form class="d-flex flex-row align-items-end">
                <div class="form-group">
                    <label for="label">Label</label>
                    <input type="text" name="label" id="label" placeholder="Enter the account type" class="form-control">
                </div>
                <div class="form-group ml-5">
                    <button type="submit" class="btn btn-primary text-uppercase">Add</button>
                </div>

            </form>
            <table style="width: 100%;" id="dt-account-types" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Label</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Label</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/setup/account-types.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
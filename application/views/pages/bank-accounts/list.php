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
                <div>List Accounts
                    <div class="page-title-subheading">Table of accounts and their details.</div>
                </div>
            </div>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Account Filter

            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('bankaccounts/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Account
                </a>
            </div>
        </div>
        <div class="card-body px-5">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Association</label>
                        <select name="associaton_id" class="form-control select2-associations filter" required>
                            <option value=""></option>
                            <?php if (isset($account)) { ?>
                                <option value="<?= $account->association->id  ?>" selected><?= $account->association->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="user_id">Account Owner</label>
                        <select name="member_id" class="form-control select2-members filter" required>
                            <option value="">Select a member</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="acc_type_id">Account type</label>
                        <select name="acc_type_id" class="form-control select2-account-types filter" required>
                            <option value=""></option>
                            <?php foreach ($accountTypes as $row) { ?>
                                <option value="<?= $row->id; ?>"><?= $row->label; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative form-group">
                        <label for="ownership">Ownership</label>
                        <select name="ownership" class="form-control select2-ownership filter" required>
                            <option value=""></option>
                            <option value="individual">Individual</option>
                            <option value="association">Association</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control select2-status filter" required>
                            <option value="">Select a status</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('bankaccounts/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Account
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
            <table style="width: 100%;" id="dt-accounts" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Passbook</th>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Type</th>
                        <th>Balance</th>
                        <th>Ownership</th>
                        <th>Status</th>
                        <th>Created On</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Passbook</th>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Type</th>
                        <th>Balance</th>
                        <th>Ownership</th>
                        <th>Status</th>
                        <th>Created On</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/accounts/list.js?v=6') ?>" defer></script>
<?php app_end(); ?>
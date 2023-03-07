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
                <div>Deposit Transactions
                    <div class="page-title-subheading">Table of deposits and their details.</div>
                </div>
            </div>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Deposit Filter

            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('deposits/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Deposit
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
                            <?php if (isset($association_id)) { ?>
                                <option value="<?= $association_id  ?>" selected><?= $this->association->find($association_id)->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="user_id">Account Owner</label>
                        <select name="member_id" class="form-control select2-members filter" required>
                            <option value="">Select a member</option>
                            <?php if (isset($member_id)) {
                                $member = $this->member->find($member_id);
                            ?>
                                <option value="<?= $member_id  ?>" selected><?= $member->firstname; ?> <?= $member->othername; ?> <?= $member->lastname; ?></option>
                            <?php } ?>
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
                        <label for="type">Method</label>
                        <select id="type" name="type" class="form-control select2-method filter" required>
                            <option value=""></option>
                            <option value="cash" <?= isset($type) ? ($type === 'cash' ? 'selected' : '') : '' ?>>Cash</option>
                            <option value="momo" <?= isset($type) ? ($type === 'momo' ? 'selected' : '') : '' ?>>Mobile Money Transfer</option>
                            <option value="transfer" <?= isset($type) ? ($type === 'transfer' ? 'selected' : '') : '' ?>>Internal Transfer</option>

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('deposits/mass-create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Mass Deposit
                </a>
                <a href="<?= site_url('deposits/create') ?>" class="btn btn-secondary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Deposit
                </a>

            </div>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-end row px-3">
                <div>
                    <label for="from">From</label>
                    <div class="form-group">
                        <input type="date" name="date_from" id="date-from" value="<?= isset($from_date) ? $from_date : '' ?>" class="form-control">
                    </div>
                </div>
                <div class="ml-3">
                    <label for="from">To</label>
                    <div class="form-group">
                        <input type="date" name="date_to" id="date-to" value="<?= isset($to_date) ? $to_date : '' ?>" class="form-control">
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
            <table style="width: 100%;" id="dt-deposits" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Date</th>
                        <th>Association</th>
                        <th>Pas.B No.</th>
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Type</th>  
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/deposits/list.js?v=13') ?>" defer></script>
<?php app_end(); ?>
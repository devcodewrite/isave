<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="lnr-map text-info"></i>
                </div>
                <div>Account Form
                    <div class="page-title-subheading">Create or update accounts</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('bankaccounts') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
                </a>
            </div>
        </div>
    </div>
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link <?= isset($account) ? ($account->ownership === 'individual' ? 'active d-block' : 'd-none') : 'active' ?>" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Membership</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link <?= isset($account) ? ($account->ownership === 'association' ? 'active d-block' : 'd-none') : '' ?>" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>Association</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade <?= isset($account) ? ($account->ownership === 'individual' ? 'show active d-block' : 'd-none') : 'show active' ?>" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Membership Account Form</h5>
                            <form class="col-md-10 mx-auto memberAccForm" method="post" action="<?=isset($account)?site_url('bankaccounts/update/'.$account->id):site_url('bankaccounts/store') ?>" data-redirect-url="<?= site_url('bankaccounts') ?>">
                                <input type="hidden" name="ownership" value="individual">
                                <?php if (isset($account)) { ?>
                                    <input type="hidden" name="_method" value="put">
                                    <input type="hidden" name="id" value="<?= $account->id ?>">
                                <?php } else { ?>
                                    <input type="hidden" name="_method" value="post">
                                <?php } ?>
                                <div class="form-group">
                                    <label>Member's association</label>
                                    <select name="association_id" class="form-control select2-associations" required>
                                        <option value=""></option>
                                        <?php if (isset($account)) { ?>
                                            <option value="<?= $account->association_id  ?>" selected><?= $account->association->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="member_id">Search a member</label>
                                    <div>
                                        <select name="member_id" class="form-control select2-members" required>
                                            <option value=""></option>
                                            <?php if (isset($account)) { ?>
                                                <option value="<?= $account->member_id ?>" selected><?= $account->member->firstname ?> <?= $account->member->othername ?> <?= $account->member->lastname ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="passbook">Passbook No.</label>
                                    <input name="passbook" id="passbook" placeholder="Enter passbook no." type="number" value="<?= isset($account) ? $account->passbook : "" ?>" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Account Name</label>
                                    <div>
                                        <input type="text" class="form-control" name="name" value="<?= isset($account) ? $account->name : "" ?>" placeholder="Account name" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="acc_type_id">Account type</label>
                                            <select name="acc_type_id" class="form-control select2-account-types2" required>
                                                <option value=""></option>
                                                <?php foreach ($accountTypes as $row) { ?>
                                                    <option value="<?= $row->id; ?>" <?= isset($account) ? ($account->acc_type_id === $row->id ? 'selected' : '') : '' ?> data-type="<?= $row->type; ?>"><?= $row->label; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stamp_amount">Amount per stamp</label>
                                            <div>
                                                <input type="number" class="form-control stamps2" name="stamp_amount" placeholder="Enter amount per stamp" <?= isset($account) ? (empty($account->stamp_amount) ? 'disabled' : '') : 'disabled' ?> />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (isset($account)) { ?>
                                    <a href="<?= site_url('bankaccounts/' . $account->id) ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                                    <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                <?php } else { ?>
                                    <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                                    <button type="submit" class="btn btn-primary text-uppercase">Create Account</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane tabs-animation fade <?= isset($account) ? ($account->ownership === 'association' ? 'd-block active' : 'd-none') : '' ?>" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Association Form</h5>
                            <form class="col-md-10 mx-auto associationAccForm" method="post" action="<?= isset($account) ? site_url('bankaccounts/update/' . $account->id) : site_url('bankaccounts/store') ?>" data-redirect-url="<?= site_url('bankaccounts') ?>">
                                <input type="hidden" name="ownership" value="association">
                                <?php if (isset($account)) { ?>
                                    <input type="hidden" name="_method" value="put">
                                    <input type="hidden" name="id" value="<?= $account->id ?>">
                                <?php } else { ?>
                                    <input type="hidden" name="_method" value="post">
                                <?php } ?>
                                <div class="form-group">
                                    <label for="association_id">Search an association</label>
                                    <select name="association_id" class="form-control select2-associations" required>
                                        <option value=""></option>
                                        <?php if (isset($account)) { ?>
                                            <option value="<?= $account->association_id ?>" selected><?= $account->association_owner ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Account Name</label>
                                    <div>
                                        <input type="text" class="form-control acc-name" name="name" value="<?= isset($account) ? $account->name : "" ?>" placeholder="Account name" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="acc_type_id">Account type</label>
                                            <select name="acc_type_id" class="form-control select2-account-types2" required>
                                                <option value=""></option>
                                                <?php foreach ($accountTypes as $row) { ?>
                                                    <option value="<?= $row->id; ?>" <?= isset($account) ? ($account->acc_type_id === $row->id ? 'selected' : '') : '' ?> data-type="<?= $row->type; ?>"><?= $row->label; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stamp_amount">Amount per stamp</label>
                                            <div>
                                                <input type="number" class="form-control stamps1" name="stamp_amount" placeholder="Enter amount per stamp" <?= isset($account) ? (empty($account->stamp_amount) ? 'disabled' : '') : 'disabled' ?> />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (isset($account)) { ?>
                                    <a href="<?= site_url('bankaccounts/' . $account->id) ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                                    <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                                <?php } else { ?>
                                    <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                                    <button type="submit" class="btn btn-primary text-uppercase">Create Account</button>
                                <?php } ?>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/accounts/edit.js?v=7') ?>" defer></script>
<?php app_end(); ?>
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
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span> Inbox</span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span> Book</span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span> Picture</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span> File Disabled</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Association</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                <span>Membership</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Association Form</h5>
                            <form class="col-md-10 mx-auto associationAccForm" method="post" action="<?= site_url('bankaccounts/store') ?>" data-redirect-url="<?= site_url('bankaccounts') ?>">
                                <input type="hidden" name="ownership" value="association">
                                <?php if (isset($account)) { ?>
                                    <input type="hidden" name="_method" value="put">
                                <?php } else { ?>
                                    <input type="hidden" name="_method" value="post">
                                <?php } ?>
                                <div class="form-group">
                                    <label for="association_id">Search an association</label>
                                    <select name="association_id" class="form-control select2-associations" required>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="passbook">Passbook No.</label>
                                    <input name="passbook" id="passbook" placeholder="Enter passbook no." type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Account Name</label>
                                    <div>
                                        <input type="text" class="form-control" name="name" placeholder="Account name" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="acc_type_id">Account type</label>
                                            <select name="acc_type_id" class="form-control select2-account-types1" required>
                                                <option value=""></option>
                                                <?php foreach ($accountTypes as $row) { ?>
                                                    <option value="<?= $row->id; ?>" data-type="<?= $row->type; ?>"><?= $row->label; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stamp_amount">Amount per stamp</label>
                                            <div>
                                                <input type="text" class="form-control stamps1" name="stamp_amount" placeholder="Enter amount per stamp" disabled />
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary text-uppercase">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Membership Account Form</h5>
                            <form class="col-md-10 mx-auto memberAccForm" method="post" action="<?= site_url('bankaccounts/store') ?>" data-redirect-url="<?= site_url('bankaccounts') ?>">
                                <input type="hidden" name="ownership" value="individual">
                                <?php if (isset($account)) { ?>
                                    <input type="hidden" name="_method" value="post">
                                <?php } else { ?>
                                    <input type="hidden" name="_method" value="put">
                                <?php } ?>
                                <div class="form-group">
                                    <label for="member_id">Search a member</label>
                                    <div>
                                        <select name="member_id" class="form-control select2-members" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="passbook">Passbook No.</label>
                                    <input name="passbook" id="passbook" placeholder="Enter passbook no." type="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Account Name</label>
                                    <div>
                                        <input type="text" class="form-control" name="name" placeholder="Account name" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="acc_type_id">Account type</label>
                                            <select name="acc_type_id" class="form-control select2-account-types2" required>
                                                <option value=""></option>
                                                <?php foreach ($accountTypes as $row) { ?>
                                                    <option value="<?= $row->id; ?>" data-type="<?= $row->type; ?>"><?= $row->label; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stamp_amount">Amount per stamp</label>
                                            <div>
                                                <input type="text" class="form-control stamps2" name="stamp_amount" placeholder="Enter amount per stamp" disabled />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary text-uppercase">Create Account</button>
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
<script src="<?= site_url('assets/js/accounts/edit.js?v=3') ?>" defer></script>
<?php app_end(); ?>
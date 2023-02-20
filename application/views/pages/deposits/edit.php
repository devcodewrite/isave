<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="lnr-picture text-danger"></i>
                </div>
                <div>Deposit Form
                    <div class="page-title-subheading">Fill in this form to register or update an.</div>
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
    <div class="row">
        <div class="col-md-8">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-enter-down icon-gradient bg-plum-plate"> </i>Deposit Request From
                </div>
                <div class="card-body px-5">
                    <form action="<?= isset($deposit) ? site_url('deposits/update/' . $deposit->id) : site_url('deposits/store') ?>" class="editDepositForm" data-redirect-url="<?= site_url('deposits') ?>">
                        <?php if (isset($deposit)) { ?>
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="id" value="<?= $deposit->id ?>">
                        <?php } else { ?>
                            <input type="hidden" name="_method" value="post">
                        <?php } ?>
                        <input type="hidden" name="type" value="cash">
                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="association_id">Search an association</label>
                                    <select name="association_id" class="form-control select2-associations" required>
                                        <option value=""></option>
                                        <?php if (isset($deposit)) { ?>
                                            <option value="<?= $deposit->account->association->id ?>" selected><?= $deposit->account->association->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passbook NO.</label>
                                    <select name="passbook" id="passbook" class="form-control select2-passbooks" required>
                                        <option value=""></option>
                                        <?php if (isset($deposit)) { ?>
                                            <option value="<?= $deposit->account->passbook ?>" selected><?= $deposit->account->passbook ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-12 border-bottom pb-2">
                                <div class="form-group">
                                    <label>Account</label>
                                    <select name="account_id" id="account_id" class="form-control select2-accounts" required>
                                        <option value=""></option>
                                        <?php if (isset($deposit)) { ?>
                                            <option value="<?= $deposit->account_id ?>" selected><?= $deposit->account->accType->label ?>#<?= $deposit->account->acc_number ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ddate">Date</label>
                                    <input type="date" name="ddate" id="ddate" class="form-control" value="<?= isset($deposit) ? $deposit->ddate : '' ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" value="<?= isset($deposit) ? $deposit->amount : '' ?>" placeholder="Enter the amount" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Method</label>
                                    <select name="type" id="type" class="form-control select2-method" required <?=isset($deposit)?(($deposit->type==='transfer'||$deposit->type==='addition')?' readonly ':''):'' ?>>
                                        <option value=""></option>
                                        <option value="cash" <?=isset($deposit)?($deposit->type==='cash'?'selected':''):'' ?>>Cash</option>
                                        <option value="momo" <?=isset($deposit)?($deposit->type==='momo'?'selected':''):'' ?>>Mobile Money Transfer</option>
                                        <option value="bank_transfer" <?=isset($deposit)?($deposit->type==='bank_transfer'?'selected':''):'' ?>>Bank Transfer</option>

                                        <?php if ((isset($deposit)?$deposit->type==='transfer'||$deposit->type==='addition':false)) { ?>
                                            <option value="<?= $deposit->type ?>" selected><?= $deposit->type ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Deposit By</label>
                                    <input type="text" name="depositor_name" id="depositor-name" class="form-control" value="<?= isset($deposit) ? $deposit->depositor_name : '' ?>" placeholder="Enter the name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="tel" name="depositor_phone" id="phone" class="form-control" placeholder="Enter the phone number">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-block text-right card-footer">
                    <?php if (isset($deposit)) { ?>
                        <a href="<?= site_url('deposits/' . $deposit->id) ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                        <button class="btn btn-success btn-lg deposit">Save Changes</button>
                    <?php } else { ?>
                        <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                        <button class="btn btn-success btn-lg deposit">Deposit</button>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/deposits/edit.js?v=3') ?>" defer></script>
<?php app_end(); ?>
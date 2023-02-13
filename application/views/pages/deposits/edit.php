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
                    <form action="<?= site_url('deposits/store') ?>" class="editDepositForm" data-redirect-url="<?= site_url('deposits') ?>">
                        <input type="hidden" name="type" value="cash">
                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="association_id">Search an association</label>
                                    <select name="association_id" class="form-control select2-associations" required>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passbook NO.</label>
                                    <select name="passbook" id="passbook" class="form-control select2-passbooks" required>
                                        <option value=""></option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ddate">Date</label>
                                    <input type="ddate" name="ddate" id="ddate" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Deposit By</label>
                                    <input type="text" name="deposit_by" id="name" class="form-control" placeholder="Enter the name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="tel" name="deposit_phone" id="phone" class="form-control" placeholder="Enter the phone number">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                    <button class="btn btn-success btn-lg deposit">Deposit</button>
                </div>
            </div>
        </div>

    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/deposits/edit.js?v=1') ?>" defer></script>
<?php app_end(); ?>
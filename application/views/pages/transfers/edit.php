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
                <div>Transfer Form
                    <div class="page-title-subheading">Fill in this form to make an internal transfer.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('transfers') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card col-md-8">
        <div class="card-header">
            <i class="header-icon lnr-laptop-phone icon-gradient bg-plum-plate"> </i>Internal Transfer
        </div>
        <div class="card-body">
            <form class="editTransferForm" action="<?= site_url('transfers/store') ?>" data-redirect-url="<?= site_url('transfers') ?>">
                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="association_id">From association</label>
                            <select id="from-association" name="from_association_id" class="form-control select2-associations" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row pb-3 border-bottom">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>From Passbook NO.</label>
                            <select name="from_passbook" id="passbook" class="form-control select2-from-passbooks">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>From Account</label>
                            <select name="from_account_id" id="account_id" class="form-control select2-from-accounts">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tdate">Date</label>
                            <input type="date" name="tdate" id="tdate" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="amount">Transfer Note</label>
                            <textarea name="note" id="" rows="2" class="form-control" placeholder="State the reason here...."></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="association_id">To association</label>
                            <select id="to-association" name="to_association_id" class="form-control select2-associations" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row my-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>To Passbook NO.</label>
                            <select name="to_passbook" class="form-control select2-to-passbooks">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>To Account</label>
                            <select name="to_account_id" class="form-control select2-to-accounts">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-block text-right card-footer">
            <button class="mr-2 btn btn-warning btn-sm reset">Cancel</button>
            <button class="btn btn-success btn-lg transfer">Transfer</button>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/transfers/edit.js?v=6') ?>" defer></script>
<?php app_end(); ?>
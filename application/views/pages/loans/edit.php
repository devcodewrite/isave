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
                <div>Loan Form
                    <div class="page-title-subheading">Fill in this form to register or update an.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('loans ') ?>" class="btn-shadow btn btn-info">
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
                    <i class="header-icon lnr-exit-up icon-gradient bg-plum-plate"> </i>Loan Request From
                </div>
                <div class="card-body px-5">
                    <form class="editLoanForm" action="<?= site_url('loans/store') ?>" data-redirect-url="<?= site_url('loans') ?>">
                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="association_id">Search an association</label>
                                    <select name="association_id" class="form-control select2-associations" required>
                                        <option value=""></option>
                                        <?php if(isset($loan)){ ?>
                                            <option value="<?=$loan->account->association->id ?>" selected><?=$loan->account->association->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passbook NO.</label>
                                    <select name="passbook" id="passbook" class="form-control select2-passbooks" required>
                                        <option value=""></option>
                                        <?php if(isset($loan)){ ?>
                                            <option value="<?=$loan->account->passbook ?>" selected><?=$loan->account->passbook ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Account</label>
                                    <select name="account_id" id="account_id" class="form-control select2-accounts" required>
                                        <option value=""></option>
                                        <?php if(isset($loan)){ ?>
                                            <option value="<?=$loan->account_id ?>" selected><?=$loan->account->name ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="position-relative form-group">
                                    <label for="loan_type_id">Loan type</label>
                                    <select name="loan_type_id" class="form-control select2-loan-types" required>
                                        <option value=""></option>
                                        <?php foreach ($loanTypes as $row) { ?>
                                            <option value="<?= $row->id; ?>"><?= $row->label; ?>@<?= str_replace('_', ' ', $row->rate_type); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ldate">Date</label>
                                    <input type="date" name="ldate" id="ldate" class="form-control" value="<?=isset($loan)?$loan->ldate:'' ?>" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" name="principal_amount" id="amount" class="form-control" value="<?=isset($loan)?$loan->principal_amount:'' ?>" placeholder="Enter the amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Interest Rate</label>
                                    <input type="number" name="rate" id="rate" class="form-control"  value="<?=isset($loan)?$loan->rate:'' ?>"placeholder="Enter the rate" min="0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration">Duration (in months)</label>
                                    <input type="number" name="duration" id="duration" class="form-control" value="<?=isset($loan)?$loan->duration:'' ?>" placeholder="Enter the duration" min="1" max="12" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payout_date">Disbursement Date</label>
                                    <input type="date" name="payout_date" id="payout_date" value="<?=isset($loan)?$loan->payout_date:'' ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payin_start_date">Repayment Start Date</label>
                                    <input type="date" name="payin_start_date" id="payin_start_date" value="<?=isset($loan)?$loan->payin_start_date:'' ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-block text-right card-footer">
                <?php if (isset($loan)) { ?>
                        <a href="<?= site_url('loans/' . $loan->id) ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                    <?php } else { ?>
                        <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                    <?php } ?>
                    <button class="btn btn-success btn-lg apply">Apply</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/loans/edit.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
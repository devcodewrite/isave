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
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>

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
                            <div class="col-md-12 border-bottom pb-2">
                                <div class="form-group">
                                    <label>Passbook NO.</label>
                                    <select name="passbook" id="passbook" class="form-control select2-passbooks" required>
                                        <option value=""></option>
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
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Rate</label>
                                    <input type="number" name="rate" id="rate" class="form-control" placeholder="Enter the rate" min="0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration">Duration (in months)</label>
                                    <input type="number" name="duration" id="duration" class="form-control" placeholder="Enter the duration" min="1" max="12" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payout_date">Payout Date</label>
                                    <input type="date" name="payout_date" id="payout_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payin_start_date">Repayment Start Date</label>
                                    <input type="date" name="payin_start_date" id="payin_start_date" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                    <button class="mr-2 btn btn-info">Preview Letter</button>
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
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
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-exit-up icon-gradient bg-plum-plate"> </i>Loan Request From

                </div>
                <div class="card-body px-5">
                    <form action="">
                        <div class="form-row mb-3">
                            <div class="col-md-12 border-bottom pb-2">
                                <div class="form-group">
                                    <label for="search-customer-account">Account ID</label>
                                    <div class="input-group">
                                        <input type="text" name="account_number" id="account_number" class="form-control border-rounded" placeholder="Enter the account number" required>
                                        <a href="javascript:;" class="ml-2 btn-icon btn-pill btn btn-outline-primary find-account">
                                            <i class="pe-7s-search btn-icon-wrapper"> </i>Search
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="position-relative form-group">
                                    <label for="loan_type_id">Loan type</label>
                                    <select name="loan_type_id" class="form-control select2-loan-types" required>
                                        <option value=""></option>
                                        <?php foreach ($loanTypes as $row) { ?>
                                            <option value="<?= $row->id; ?>"><?= $row->label; ?>@<?= $row->rate; ?>[<?=str_replace('_',' ',$row->rate_type); ?>]</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payout_date">Payout Date</label>
                                    <input type="date" name="payout_date" id="payout_date" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="mr-2 btn btn-link btn-sm">Cancel</button>
                    <button class="btn btn-success btn-lg">Apply</button>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Indentity Card Details
                </div>
                <div class="card-body px-5">
                    <div id="acc-id-photo" style="height: 200px; width:400px;">
                        <?php $this->load->view('templates/svg/id-card') ?>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">ID Number</p>
                        <p class="col-6 input-placeholder text-black h-5 bg-light acc-id"></p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">ID Type</p>
                        <p class="col-6 input-placeholder text-black h-5 bg-light acc-id-type"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Account Owner Details
                </div>
                <div class="card-body p-5">
                    <div class="text-center">
                        <img id="cus-passport-photo" height="150" width="150" src="<?= base_url('assets/images/photo-placeholder.jpeg') ?>" alt="Passport Photo">
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Account Number</p>
                        <p class="col-6 input-placeholder text-primary acc-number">xxxx xxx xxxx</p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Account Name</p>
                        <p class="col-6 input-placeholder text-black h-5 bg-light acc-name"></p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Account Balance</p>
                        <p class="col-6 input-placeholder text-black h-5 bg-light acc-balance"></p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Phone Number</p>
                        <p class="col-6 input-placeholder text-black  h-5 bg-light cus-primary-phone"></p>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="btn btn-warning btn-lg">Suspend Account</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/loans/edit.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
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
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-laptop-phone icon-gradient bg-plum-plate"> </i>Transfer Request From
                </div>
                <div class="card-body px-5">
                    <form action="">
                        <div class="form-row mb-3">
                            <div class="col-md-12 border-bottom pb-2">
                                <div class="form-group">
                                    <label for="search-customer-account">From Account ID</label>
                                    <div class="input-group">
                                        <input type="text" name="account_number" id="account_number" class="form-control border-rounded" placeholder="From account no." required>
                                        <a href="javascript:;" class="ml-2 btn-icon btn-pill btn btn-outline-primary find-account">
                                            <i class="pe-7s-search btn-icon-wrapper"> </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-12 border-bottom pb-2">
                                <div class="form-group">
                                    <label for="search-customer-account">To Account ID</label>
                                    <div class="input-group">
                                        <input type="text" name="account_number" id="account_number" class="form-control border-rounded" placeholder="To account no." required>
                                        <a href="javascript:;" class="ml-2 btn-icon btn-pill btn btn-outline-primary find-account">
                                            <i class="pe-7s-search btn-icon-wrapper"> </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="mr-2 btn btn-warning btn-sm">Cancel</button>
                    <button class="btn btn-success btn-lg">Transfer</button>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>From Account
                </div>
                <div class="card-body p-5">
                    <div class="text-center">
                        <img id="from-cus-passport-photo" height="150" width="150" src="<?= base_url('assets/images/photo-placeholder.jpeg') ?>" alt="Passport Photo">
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Acc. NO.</p>
                        <p class="col-6 input-placeholder text-primary from-acc-number">xxxx xxx xxxx</p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Acc. Name</p>
                        <p class="col-6 input-placeholder text-black h-5 bg-light from-acc-name"></p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Acc. Bal.</p>
                        <p class="col-6 input-placeholder text-black h-5 bg-light from-acc-balance"></p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Phone No.</p>
                        <p class="col-6 input-placeholder text-black  h-5 bg-light from-cus-primary-phone"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>To Account
                </div>
                <div class="card-body p-5">
                    <div class="text-center">
                        <img id="to-cus-passport-photo" height="150" width="150" src="<?= base_url('assets/images/photo-placeholder.jpeg') ?>" alt="Passport Photo">
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Acc. NO.</p>
                        <p class="col-6 input-placeholder text-primary to-acc-number">xxxx xxx xxxx</p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Acc. Name</p>
                        <p class="col-6 input-placeholder text-black h-5 bg-light to-acc-name"></p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Acc. Bal.</p>
                        <p class="col-6 input-placeholder text-black h-5 bg-light to-acc-balance"></p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Phone No.</p>
                        <p class="col-6 input-placeholder text-black  h-5 bg-light to-cus-primary-phone"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/transfers/edit.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
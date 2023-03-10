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
                <div>Withdrawal Form
                    <div class="page-title-subheading">Fill in this form to request for a withdraw.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('withdrawals') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-exit-up icon-gradient bg-plum-plate"> </i>Withdrawal Request From

                </div>
                <div class="card-body px-5">
                    <form action="<?= isset($withdrawal) ? site_url('withdrawals/update/' . $withdrawal->id) : site_url('withdrawals/store') ?>" class="editWithdrawalForm" data-redirect-url="<?= site_url('withdrawals') ?>">
                        <?php if (isset($withdrawal)) { ?>
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="id" value="<?= $withdrawal->id ?>">
                        <?php } else { ?>
                            <input type="hidden" name="_method" value="post">
                        <?php } ?>
                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="association_id">Search an association</label>
                                    <select name="association_id" class="form-control select2-associations" required>
                                        <option value=""></option>
                                        <?php if (isset($withdrawal)) { ?>
                                            <option value="<?= $withdrawal->account->association->id ?>" selected><?= $withdrawal->account->association->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passbook NO.</label>
                                    <select name="passbook" id="passbook" class="form-control select2-passbooks" required>
                                        <option value=""></option>
                                        <?php if (isset($withdrawal)) { ?>
                                            <option value="<?= $withdrawal->account->passbook ?>" selected><?= $withdrawal->account->passbook ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-12 border-bottom pb-2">
                                <div class="form-group">
                                    <label>Account</label>
                                    <select name="account_id" id="account_id" class="form-control select2-accounts1" required>
                                        <option value=""></option>
                                        <?php if (isset($withdrawal)) { ?>
                                            <option value="<?= $withdrawal->account_id ?>" selected><?= $withdrawal->account->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wdate">Date</label>
                                    <input type="date" name="wdate" id="wdate" value="<?= isset($withdrawal) ? $withdrawal->wdate : '' ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" value="<?= isset($withdrawal) ? $withdrawal->amount : '' ?>" placeholder="Enter the amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Withdrawal By</label>
                                    <input type="text" name="withdrawer_name" id="name" value="<?= isset($withdrawal) ? $withdrawal->withdrawer_name : '' ?>" class="form-control" placeholder="Enter the name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="tel" name="withdrawer_phone" id="phone" class="form-control" value="<?= isset($withdrawal) ? $withdrawal->withdrawer_phone : '' ?>" placeholder="Enter the phone number">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-block text-right card-footer">
                    <?php if (isset($withdrawal)) { ?>
                        <a href="<?= site_url('withdrawals/' . $withdrawal->id) ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                        <button class="btn btn-success btn-lg withdraw">Save Changes</button>
                    <?php } else { ?>
                        <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                        <button class="btn btn-success btn-lg withdraw">Withdraw</button>
                    <?php } ?>
                   
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Indentity Card Details
                </div>
                <div class="card-body px-5">
                    <div id="acc-card-placeholder" style="height: 200px; width:400px;">
                        <?php $this->load->view('templates/svg/id-card') ?>
                    </div>
                    <img src="" height="200" style="display: none; object-fit:scale-down;" width="400" class="cus-id-card-photo" alt="ID Card Photo">
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
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Account Details
                </div>
                <div class="card-body p-5">
                    <div class="text-center">
                        <img class="cus-passport-photo" height="150" width="150" src="<?= base_url('assets/images/photo-placeholder.jpeg') ?>" alt="Passport Photo">
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
<script src="<?= site_url('assets/js/withdrawals/edit.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
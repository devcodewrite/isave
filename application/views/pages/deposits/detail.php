<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-notebook icon-gradient bg-happy-itmeo"></i>
                </div>
                <div>Deposit Details
                    <div class="page-title-subheading">Deposit details.</div>
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
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Deposit Slip
                </div>
                <div class="card-body p-5">
                    <div style="height: 70%; width: 100%;" class="deposit-slip">
                        <div class="p-5 border border-primary m-5">
                            <div class="row">
                                <div class="col-md-12 d-flex items-center justify-content-between">
                                    <h5>
                                        <span><?= $this->setting->get('org_name', 'iSave') ?></span><br>
                                        <span><?= $this->setting->get('org_address', 'Atonsu, Kumasi') ?></span>
                                    </h5>
                                    <img class="float-right" height="40" src="<?= $this->setting->get('org_logo_url', base_url('assets/images/logo.png')) ?>" alt="">
                                </div>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-6 text-black"><?= $deposit->type ?> Deposit</p>
                                <p class="col-6 text-black text-right">Transaction Date: <?= date('d/m/y', strtotime($deposit->created_at)); ?></p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Transaction Reference</p>
                                <p class="col-6 input-placeholder text-black"><?= $deposit->id ?></p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Transaction Account</p>
                                <p class="col-6 input-placeholder text-black"><?= $deposit->account->acc_number ?></p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Account Name</p>
                                <p class="col-6 input-placeholder text-black">
                                    <?= $deposit->account->name ?>
                                </p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Transaction Amount</p>
                                <h5 class="col-6 input-placeholder text-primary">
                                    GHS <?= number_format($deposit->amount, 2) ?>
                                </h5>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Narration</p>
                                <p class="col-6 input-placeholder text-black">
                                    <?= $deposit->depositor_name ? "Deposit by $deposit->depositor_name ( $deposit->depositor_phone)" : ''; ?>
                                </p>
                            </div>
                            <div class="d-flex mt-3">
                                <p class="text-black-50 mr-3">Note:</p>
                                <p class=" text-black fs-sm"><?= $this->setting->get('deposit_note', "Example note on deposit slip") ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="btn btn-primary btn-lg print">Print</button>
                    <a href="<?=site_url('deposits/'.$deposit->id.'/edit') ?>" class="btn btn-warning btn-lg">Modify</a>
                    <button class="btn btn-danger btn-lg">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/deposits/detail.js?v=1'); ?>" defer></script>
<?php app_end(); ?>
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
                <div>Transfer Details
                    <div class="page-title-subheading">Transfer details.</div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Transfer Slip
                </div>
                <div class="card-body p-5">
                    <div style="height: 70%; width: 100%;" class="transfer-slip">
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
                                <p class="col-6 text-black"><?=$transfer->type ?> Transfer</p>
                                <p class="col-6 text-black text-right">Transaction Date: <?= date('d/m/y', strtotime($transfer->created_at) ); ?></p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Transaction Reference</p>
                                <p class="col-6 input-placeholder text-black"><?=$transfer->id ?></p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Transaction Account</p>
                                <p class="col-6 input-placeholder text-black"><?=$transfer->account->acc_number ?></p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Account Name</p>
                                <p class="col-6 input-placeholder text-black">
                                <?=$transfer->account->name ?>
                                </p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Transaction Amount</p>
                                <h5 class="col-6 input-placeholder text-primary">
                                GHS <?=number_format($transfer->amount,2) ?>
                                </h5>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Narration</p>
                                <p class="col-6 input-placeholder text-black">
                                <?=$transfer->transferor_name?"Transfer by $transfer->transferor_name ( $transfer->transferor_phone)": ''; ?>
                                </p>
                            </div>
                            <div class="d-flex mt-3">
                                <p class="text-black-50 mr-3">Note:</p>
                                <p class=" text-black fs-sm"><?= $this->setting->get('transfer_note',"Example note on transfer slip") ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="btn btn-primary btn-lg print">Print</button>
                    <button class="btn btn-danger btn-lg">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/transfers/detail.js?v=1'); ?>" defer></script>
<?php app_end(); ?>
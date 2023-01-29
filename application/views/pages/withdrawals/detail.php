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
                <div>Withdrawal Details
                    <div class="page-title-subheading">Withdrawal details.</div>
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
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Withdrawal Reciept
                </div>
                <div class="card-body px-5">
                    <div style="width: 100%" class="withdrawal-slip">
                        <div class="px-3 border border-primary m-5">
                            <div class="row">
                                <div class="text-center col-12">
                                    <img height="50" src="<?= $this->setting->get('org_logo_url', base_url('assets/images/logo.png')) ?>" alt="">
                                    <h5 class="text-center col-12">
                                        <span><?= $this->setting->get('org_name', 'iSave') ?></span><br>
                                        <span><?= $this->setting->get('org_address', 'Atonsu, Kumasi') ?></span>
                                    </h5>
                                </div>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-12 text-black text-right"> Date: </p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Transac. ID:</p>
                                <p class="col-8 input-placeholder text-black">xxxx xxx xxxx</p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Acc. NO.:</p>
                                <p class="col-8 input-placeholder text-black">xxxx xxx xxxx</p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Acc. Name:</p>
                                <p class="col-8 input-placeholder text-black h-5 bg-light"></p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">Amount</p>
                                <p class="col-8 input-placeholder text-black h-5 bg-light"></p>
                            </div>
                            <div class="row text-uppercase mt-1 border-bottom">
                                <p class="col-4 text-black-50">By:</p>
                                <p class="col-8 input-placeholder text-black  h-5 bg-light"></p>
                            </div>
                            <div class="d-flex mt-3">
                                <p class="text-black-50 mr-3">Note:</p>
                                <p class=" text-black fs-sm">Example note on withdrawal receipt</p>
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
<script src="<?= base_url('assets/js/withdrawals/detail.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
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
        <div class="col-md-10">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Withdrawal
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 px-5">
                            <div class="row text-uppercase text-center border-bottom">
                                <p class="col-12 text-black-50">Transaction ID</p>
                                <h4 class="col-12 text-primary"><?= $withdrawal->id; ?></h4>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">PassBook No.</p>
                                <h4 class="col-6 input-placeholder text-info"><?= $withdrawal->account->passbook ?></h4>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">Account Name</p>
                                <p class="col-6 input-placeholder text-primary"><?= $withdrawal->account->name ?></p>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">Withdrawn Amount</p>
                                <h4 class="col-6 input-placeholder text-success">GHS <?= number_format($withdrawal->amount,2) ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6 px-5">
                            <div class="row m-5">
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">Date</p>
                                <p class="col-6 input-placeholder text-blaick">
                                    <?= date('d/m/y', strtotime($withdrawal->wdate)) ?>
                                </p>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">Added by</p>
                                <p class="col-6 input-placeholder text-blaick">
                                    <?php $user = $this->user->find($withdrawal->account->user_id) ?>
                                    <?= "$user->firstname $user->lastname" ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <a href="<?=site_url('withdrawals/'.$withdrawal->id.'/edit') ?>" class="btn btn-info btn-lg">Modify</a>
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
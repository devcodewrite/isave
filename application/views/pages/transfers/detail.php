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
                <a href="<?= site_url('transfers') ?>" class="btn-shadow btn btn-info">
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
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Transfer
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 px-5">
                            <div class="row text-uppercase text-center border-bottom">
                                <p class="col-12 text-black-50">Transaction ID</p>
                                <h4 class="col-12 text-primary"><?= $transfer->id; ?></h4>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">From Association</p>
                                <p class="col-6 input-placeholder text-info"><?= $transfer->fromAssociation->name ?></p>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">From PassBook No.</p>
                                <h4 class="col-6 input-placeholder text-info"><?= $transfer->from_passbook ?></h4>
                            </div>
                           
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">From Account Name</p>
                                <p class="col-6 input-placeholder text-primary"><?= $transfer->fromAccount->name ?></p>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">Transfer Amount</p>
                                <h4 class="col-6 input-placeholder text-success">GHS <?= number_format($transfer->amount,2) ?></h4>
                            </div>

                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">To Association</p>
                                <p class="col-6 input-placeholder text-info"><?= $transfer->toAssociation->name ?></p>
                            </div>

                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">To PassBook No.</p>
                                <h4 class="col-6 input-placeholder text-info"><?= $transfer->to_passbook ?></h4>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">To Account Name</p>
                                <p class="col-6 input-placeholder text-primary"><?= $transfer->toAccount->name ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 px-5">
                            <div class="row m-5">
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">Date</p>
                                <p class="col-6 input-placeholder text-blaick">
                                    <?= date('d/m/y', strtotime($transfer->tdate)) ?>
                                </p>
                            </div>
                            <div class="row text-uppercase mt-3 border-bottom">
                                <p class="col-6 text-black-50">Added by</p>
                                <p class="col-6 input-placeholder text-blaick">
                                    <?php $user = $this->user->find($transfer->user_id) ?>
                                    <?= "$user->firstname $user->lastname" ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
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
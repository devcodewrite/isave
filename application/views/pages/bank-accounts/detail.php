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
                <div>Account Details
                    <div class="page-title-subheading">Account details.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('bankaccounts') ?>" class="btn-shadow btn btn-info">
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
            <div class="mb-3 card">
                <div class="tabs-lg-alternate card-header">
                    <ul class="nav nav-justified">
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-0" class="active nav-link">
                                <div class="widget-number">Account</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-book"></i>
                                    </span>

                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                <div class="widget-number">Loans</div>
                                <div class="tab-subheading">Loan</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                                <div class="widget-number text-danger">Withdrawals</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    withdrawal
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-3" class="nav-link">
                                <div class="widget-number text-danger">Deposits</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    deposits
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-4" class="nav-link">
                                <div class="widget-number text-danger">Transfers</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    transfers
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 px-5">
                                    <div class="row text-uppercase text-center border-bottom">
                                        <p class="col-12 text-black-50">Account Number</p>
                                        <h4 class="col-12 text-primary"><?= $account->acc_number ?></h4>
                                        <p class="col-12"><span class="alert alert-success text-uppercase float-right">Open</span></p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">PassBook No.</p>
                                        <h4 class="col-6 input-placeholder text-info"><?= $account->passbook ?></h4>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Account Name</p>
                                        <p class="col-6 input-placeholder text-primary"><?= $account->name ?></p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Account Balance</p>
                                        <h4 class="col-6 input-placeholder text-success">GHS <?=$account->balance ?></h4>
                                    </div>
                                    <div class="row text-uppercase mt-3">
                                        <p class="col-6 text-black-50">Primary Contact</p>
                                        <p class="col-6 input-placeholder text-black  h-5">
                                            <a href="tel:<?= $member->primary_phone ?>"><?= $member->primary_phone; ?></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 px-5">
                                    <div class="row m-5">
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Created On</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= date('d/m/y', strtotime($account->created_at)) ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Account Ownership</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $account->ownership ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Owner's Name</p>
                                        <p class="col-6 input-placeholder text-black h-5">
                                            <?= $member->firstname ?> <?= $member->othername ?> <?= $member->lastname ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Added by</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?php $user = $this->user->find($account->user_id) ?>
                                            <?= "$user->firstname $user->lastname" ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <a href="<?=site_url('bankaccounts/'.$account->id.'/edit') ?>" class="btn btn-info btn-lg">Modify</a>
                            <button class="btn btn-warning btn-lg suspend">Suspend</button>
                            <button class="btn btn-danger btn-lg">Close</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
                        <div class="card-header">
                            <div class="btn-actions-pane-right actions-icon-btn">
                                <a href="<?= site_url('loans/create') ?>" class="btn btn-primary text-uppercase">
                                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                                    New Loan
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table style="width: 100%;" id="dt-related-loans" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Account Number</th>
                                        <th>Amount</th>
                                        <th>Owner</th>
                                        <th>Owner's Phone</th>
                                        <th>Owner's Address</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Account Number</th>
                                        <th>Amount</th>
                                        <th>Owner</th>
                                        <th>Owner's Phone</th>
                                        <th>Owner's Address</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-2" role="tabpanel">
                        <div class="card-header">
                            <div class="btn-actions-pane-right actions-icon-btn">
                                <a href="<?= site_url('withdrawals/create') ?>" class="btn btn-primary text-uppercase">
                                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                                    New Withdrawal
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table style="width: 100%;" id="dt-related-withdrawals" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Amount</th>
                                        <th>Withdrawn By</th>
                                        <th>Withdrawer's Phone</th>
                                        <th>Withdrawer's Address</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Amount</th>
                                        <th>Withdrawn By</th>
                                        <th>Withdrawer's Phone</th>
                                        <th>Withdrawer's Address</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-3" role="tabpanel">
                        <div class="card-header">
                            <div class="btn-actions-pane-right actions-icon-btn">
                                <a href="<?= site_url('withdrawals/create') ?>" class="btn btn-primary text-uppercase">
                                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                                    New Deposit
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                        <table style="width: 100%;" id="dt-related-deposits" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Association</th>
                        <th>Pas.B No.</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Depositor</th>
                        <th>Depositor's Phone</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Association</th>
                        <th>Pas.B No.</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Depositor's Name</th>
                        <th>Depositor's Phone</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-eg9-4" role="tabpanel">
                        <div class="card-header">
                            <div class="btn-actions-pane-right actions-icon-btn">
                                <a href="<?= site_url('withdrawals/create') ?>" class="btn btn-primary text-uppercase">
                                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                                    New Transfer
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/accounts/detail.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
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
                <div>Loan Details
                    <div class="page-title-subheading">Loan details.</div>
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
            <div class="mb-3 card">
                <div class="tabs-lg-alternate card-header">
                    <ul class="nav nav-justified">
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-0" class="active nav-link">
                                <div class="widget-number">Loan</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-book"></i>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                <div class="widget-number">Repayment</div>
                                <div class="tab-subheading">list of settlements made or deducted.</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                        <div class="card-body">
                            <div class="row text-uppercase border-bottom">
                                <p class="col-md-2 text-black-50">Loan ID</p>
                                <h4 class="col-md-6 text-primary text-left"><?= $loan->id; ?></h4>
                                <?php $alerts = [
                                    'pending' => 'alert-danger',
                                    'approved' => 'alert-warning',
                                    'paid_out' => 'alert-success'
                                ];
                                $alerts2 = [
                                    'not_paid' => 'alert-danger',
                                    'started' => 'alert-warning',
                                    'paid' => 'alert-success'
                                ];
                                ?>
                                <p class="col-12">
                                    <span class="alert <?= $alerts[$loan->appl_status] ?> text-uppercase float-right">
                                        <?= str_replace('_', ' ', $loan->appl_status); ?>
                                    </span>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-5">
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Principal Amount</p>
                                        <h5 class="col-6 input-placeholder text-danger">GHS <?= number_format($loan->principal_amount, 2) ?></h5>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Interest Amount</p>
                                        <h5 class="col-6 input-placeholder text-warning">GHS <?= number_format($loan->interest_amount, 2) ?></h5>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Duration</p>
                                        <p class="col-6 input-placeholder text-info"><?= $loan->duration; ?> months</p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Rate</p>
                                        <p class="col-6 input-placeholder text-black"><?= $loan->rate * 100 ?>%</p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Account</p>
                                        <a href="<?= site_url('accounts/' . $loan->account_id) ?>" class="col-6 input-placeholder text-black">
                                            <?= $loan->account->name; ?> (<?= $loan->account->acc_number; ?>)
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-5">
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Applied Date</p>
                                        <p class="col-6 input-placeholder text-black"><?= date('d/m/y', strtotime($loan->created_at)) ?></p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Repayment start date</p>
                                        <p class="col-6 input-placeholder text-black"><?= date('d/m/y', strtotime($loan->payin_start_date)) ?></p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Repayment status</p>
                                        <div class="col-6">
                                            <span style="font-size: 12px;" class="alert <?= $alerts2[$loan->setl_status] ?> text-uppercase">
                                                <?= str_replace('_', ' ', $loan->setl_status); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Total Paid</p>
                                        <h4 class="col-6 input-placeholder text-warning">GHS 0.00</h4>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Repayment Balance</p>
                                        <h4 class="col-6 input-placeholder text-success">GHS 0.00</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block text-right card-footer">
                                <a href="<?= site_url('loans/print/' . $loan->id) ?>" class="btn btn-info btn-lg">Print Advice Letter</a>
                                <button class="btn btn-warning btn-lg">Modify</button>
                                <button class="btn btn-danger btn-lg">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
                        <div class="card-body">
                            <form action="<?= site_url('loan/repayment') ?>" class="repaymentForm p-3">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <button class="btn btn-warning float-right">Reset</button>
                                        <button class="btn btn-primary float-right mr-3">Add Payment</button>
                                    </div>
                                </div>
                            </form>

                            <table style="width: 100%;" id="dt-related-settlements" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/loans/detail.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
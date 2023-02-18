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
        <div class="col-md-12" style="max-width: calc(100% - 10px);">
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
                        <?php if (intval($account->accType->is_loan_acc) === 1) { ?>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                    <div class="widget-number">Loans</div>
                                    <div class="tab-subheading">Requested and approved Loans</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#tab-eg9-5" class="nav-link">
                                    <div class="widget-number">Repayments</div>
                                    <div class="tab-subheading">list of loan settlements made.</div>
                                </a>
                            </li>
                        <?php } else { ?>
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
                        <?php } ?>

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
                                        <p class="col-6 text-black-50">Account Type</p>
                                        <p class="col-6 input-placeholder text-info"><?= $account->accType->label ?></p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Account Name</p>
                                        <p class="col-6 input-placeholder text-primary"><?= $account->name ?></p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Account Balance</p>
                                        <h4 class="col-6 input-placeholder text-success">GHS <?= $account->balance ?></h4>
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
                                        <p class="col-6 text-black-50">Associations</p>
                                        <p class="col-6 input-placeholder text-black h-5">
                                            <?php foreach ($member->associations as $row) {
                                                ?>
                                                  <a href="<?=site_url('assocations/'.$row->id) ?>" class="btn btn-info"><?= $row->name ?></a>
                                                <?php
                                            } ?>
                                          
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
                            <a href="<?= site_url('bankaccounts/' . $account->id . '/edit') ?>" class="btn btn-primary btn-lg">Modify</a>
                            <button class="btn btn-info btn-lg suspend">Suspend</button>
                            <button class="btn btn-warning btn-lg close-acc">Close</button>
                            <button class="btn btn-danger btn-lg delete" data-url="<?=site_url('bankaccounts') ?>" data-id="<?=$account->id ?>">Delete</button>
                        </div>
                    </div>
                    <?php if (intval($account->accType->is_loan_acc) === 1) { ?>
                        <div class="tab-pane" id="tab-eg9-1" role="tabpanel" style="max-width: calc(100% - 20px);">
                            <div class="card-header">
                                <div class="btn-actions-pane-right actions-icon-btn">
                                    <a href="<?= site_url('loans/create') ?>" class="btn btn-primary text-uppercase">
                                        <i class="pe-7s-plus btn-icon-wrapper"></i>
                                        New Loan
                                    </a>
                                </div>
                            </div>
                            <div class="card-body" style="max-width: calc(100% - 20px);">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-end row px-3">
                                            <div>
                                                <label for="from">From</label>
                                                <div class="form-group">
                                                    <input type="date" name="date_from" id="loan-date-from" class="form-control">
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <label for="from">To</label>
                                                <div class="form-group">
                                                    <input type="date" name="date_to" id="loan-date-to" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 form-group">
                                                <button class="btn btn-primary loan-filter">
                                                    <i class="fa fa-filter"></i>
                                                    Filter</button>
                                                <button class="btn btn-warning ml-2 loan-filter-clear">
                                                    <i class="fa fa-times"></i>
                                                    Clear</button>
                                            </div>
                                        </div>
                                        <table style="width: 100%; max-width:calc(100% - 50px);" id="dt-related-loans" data-account-id="<?= $account->id ?>" class="table table-hover table-striped table-bordered">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Req. Date</th>
                                                    <th>Principal Amt.</th>
                                                    <th>Interest Amt.</th>
                                                    <th>Dur.</th>
                                                    <th>Rate</th>
                                                    <th>Req. Status</th>
                                                    <th>Disburs. Date</th>
                                                    <th>Repay. Date</th>
                                                    <th>Repay. Status</th>
                                                    <th>Loan Type</th>
                                                    <th>Added by</th>
                                                </tr>
                                            </thead>

                                            <tfoot class="text-uppercase">
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Req. Date</th>
                                                    <th>Principal Amt.</th>
                                                    <th>Interest Amt.</th>
                                                    <th>Dur.</th>
                                                    <th>Rate</th>
                                                    <th>Req. Status</th>
                                                    <th>Disburs. Date</th>
                                                    <th>Repay. Date</th>
                                                    <th>Repay. Status</th>
                                                    <th>Loan Type</th>
                                                    <th>Added by</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg9-5" role="tabpanel">
                            <div class="card-body">
                                <form action="<?= site_url('payments/store') ?>" class="repaymentForm p-3">
                                    <input type="hidden" name="_method" value="post">
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" name="pdate" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="loan_id">Search a loan</label>
                                                <div>
                                                    <select name="loan_id" class="form-control select2-avaliable-loans" required>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="principal_amount">Principal Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="cursor:pointer" onclick="$('#pr-amount').val($(this).text())"><?= number_format($loan->principalBalance, 2) ?></span>
                                                    </div>
                                                    <input type="number" id="pr-amount" name="principal_amount" class="form-control" placeholder="Enter the principal amount" required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="amount">Interest Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="cursor:pointer" onclick="$('#in-amount').val($(this).text())"><?= number_format($loan->interestBalance, 2) ?></span>
                                                    </div>
                                                    <input type="number" id="in-amount" name="interest_amount" class="form-control" placeholder="Enter the interest amount" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button onclick="$('.repaymentForm').trigger('reset')" type="button" class="btn btn-warning float-right">Reset</button>
                                            <button class="btn btn-primary float-right mr-3">Add Payment</button>
                                        </div>
                                    </div>
                                </form>

                                <table style="width: 100%;" id="dt-related-settlements" data-loan-id="<?= $loan->id ?>" class="table table-hover table-striped table-bordered">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>#Ref</th>
                                            <th>Date</th>
                                            <th>Principal Amount</th>
                                            <th>Interest Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="text-uppercase">
                                        <tr>
                                            <th>#Ref</th>
                                            <th>Date</th>
                                            <th>Principal Amount</th>
                                            <th>Interest Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    <?php } else { ?>
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
                                <div class="d-flex align-items-end row px-3">
                                    <div>
                                        <label for="from">From</label>
                                        <div class="form-group">
                                            <input type="date" name="date_from" id="withdrawal-date-from" class="form-control">
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <label for="from">To</label>
                                        <div class="form-group">
                                            <input type="date" name="date_to" id="withdrawal-date-to" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 form-group">
                                        <button class="btn btn-primary withdrawal-filter">
                                            <i class="fa fa-filter"></i>
                                            Filter</button>
                                        <button class="btn btn-warning ml-2 withdrawal-filter-clear">
                                            <i class="fa fa-times"></i>
                                            Clear</button>
                                    </div>
                                </div>
                                <table style="width: 100%;" id="dt-related-withdrawals" data-account-id="<?= $account->id ?>" class="table table-hover table-striped table-bordered">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Withdrawer's Name</th>
                                            <th>Withdrawer's Phone</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>

                                    <tfoot class="text-uppercase">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Transferor's Name</th>
                                            <th>Transferor's Phone</th>
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
                                <div class="d-flex align-items-end row px-3">
                                    <div>
                                        <label for="from">From</label>
                                        <div class="form-group">
                                            <input type="date" name="date_from" id="deposit-date-from" class="form-control">
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <label for="from">To</label>
                                        <div class="form-group">
                                            <input type="date" name="date_to" id="deposit-date-to" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 form-group">
                                        <button class="btn btn-primary deposit-filter">
                                            <i class="fa fa-filter"></i>
                                            Filter</button>
                                        <button class="btn btn-warning ml-2 deposit-filter-clear">
                                            <i class="fa fa-times"></i>
                                            Clear</button>
                                    </div>
                                </div>
                                <table style="width: 100%;" id="dt-related-deposits" data-account-id="<?= $account->id ?>" class="table table-hover table-striped table-bordered">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Depositor's Name</th>
                                            <th>Depositor's Phone</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>

                                    <tfoot class="text-uppercase">
                                        <tr>
                                            <th>#ID</th>
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
                                <div class="d-flex align-items-end row px-3">
                                    <div>
                                        <label for="from">From</label>
                                        <div class="form-group">
                                            <input type="date" name="date_from" id="transfer-date-from" class="form-control">
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <label for="from">To</label>
                                        <div class="form-group">
                                            <input type="date" name="date_to" id="transfer-date-to" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 form-group">
                                        <button class="btn btn-primary transfer-filter">
                                            <i class="fa fa-filter"></i>
                                            Filter</button>
                                        <button class="btn btn-warning ml-2 transfer-filter-clear">
                                            <i class="fa fa-times"></i>
                                            Clear</button>
                                    </div>
                                </div>
                                <table style="width: 100%;" id="dt-related-transfers" data-account-id="<?= $account->id ?>" class="table table-hover table-striped table-bordered">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>To Acc.</th>
                                            <th>To Pas.B</th>
                                            <th>To Assoc.</th>
                                            <th>By User</th>
                                        </tr>
                                    </thead>

                                    <tfoot class="text-uppercase">
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>To Acc.</th>
                                            <th>To Pas.B</th>
                                            <th>To Assoc.</th>
                                            <th>By User</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/accounts/detail.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
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
                                        <span><?= $account->name; ?> (<?= $account->accType->label; ?>)</span>
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
                                <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                                    <div class="widget-number text-danger">Transaction Entries</div>
                                    <div class="tab-subheading">
                                        <span class="pr-2 opactiy-6">
                                            <i class="fa fa-bullhorn"></i>
                                        </span>
                                        Account transaction entries
                                    </div>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                                    <div class="widget-number text-danger">Transaction Entries</div>
                                    <div class="tab-subheading">
                                        <span class="pr-2 opactiy-6">
                                            <i class="fa fa-bullhorn"></i>
                                        </span>
                                        Account transaction entries
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

                                        <h4 class="col-6 input-placeholder <?= $account->balance >= 0 ? 'text-success' : 'text-danger'; ?>">GHS <?= $account->balance < 0 ? '(' . number_format(abs($account->balance), 2) . ')' : $account->balance ?></h4>
                                    </div>
                                    <?php if ($account->ownership === 'individual') { ?>
                                        <div class="row text-uppercase mt-3">
                                            <p class="col-6 text-black-50">Primary Contact</p>
                                            <p class="col-6 input-placeholder text-black  h-5">
                                                <a href="tel:<?= $member->primary_phone ?>"><?= $member->primary_phone; ?></a>
                                            </p>
                                        </div>
                                    <?php } ?>
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
                                    <?php if ($account->ownership === 'individual') { ?>
                                        <div class="row text-uppercase mt-3 border-bottom">
                                            <p class="col-6 text-black-50">Owner's Name</p>
                                            <p class="col-6 input-placeholder text-black h-5">
                                                <?= $member->firstname ?> <?= $member->othername ?> <?= $member->lastname ?>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Association</p>
                                        <p class="col-6 input-placeholder text-black h-5">
                                            <a href="<?= site_url('associations/' . $account->association_id) ?>" class="btn btn-info"><?= $account->association->name ?></a>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Added by</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?php $user = $this->user->find($account->user_id) ?>
                                            <?= $user ? "$user->firstname $user->lastname" : '' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-actions-pane-left actions-icon-btn">
                                <?php if (intval($account->accType->is_loan_acc) === '0') { ?>
                                    <button type="button" data-toggle="modal" data-target="#newCharge" class="btn btn-success btn-lg charge text-uppercase">
                                        <i class="pe-7s-plus btn-icon-wrapper"></i> Add a Charge
                                    </button>
                                    <button type="button" data-toggle="modal" data-target="#newWithdrawal" class="btn btn-warning btn-lg charge text-uppercase">
                                        <i class="pe-7s-cash btn-icon-wrapper"></i> Withdraw
                                    </button>
                                    <button type="button" data-toggle="modal" data-target="#newDeposit" class="btn btn-primary btn-lg charge text-uppercase">
                                        <i class="pe-7s-plus btn-icon-wrapper"></i> Deposit
                                    </button>
                                <?php }else { ?> 
                                    <a href="<?= site_url('loans/create') ?>" class="btn btn-primary text-uppercase">
                                        <i class="pe-7s-plus btn-icon-wrapper"></i>
                                        Request A Loan
                                    </a>
                                    <?php } ?>
                            </div>

                            <div class="btn-actions-pane-right actions-icon-btn">
                                <a href="<?= site_url('bankaccounts/' . $account->id . '/edit') ?>" class="btn btn-primary btn-lg">Modify</a>
                                <button class="btn btn-info btn-lg suspend">Suspend</button>
                                <button class="btn btn-warning btn-lg close-acc">Close</button>
                                <button class="btn btn-danger btn-lg delete" data-url="<?= site_url('bankaccounts') ?>" data-id="<?= $account->id ?>">Delete</button>
                            </div>
                        </div>
                    </div>
                    <?php if (intval($account->accType->is_loan_acc) === 1) { ?>
                        <div class="tab-pane" id="tab-eg9-1" role="tabpanel" style="max-width: calc(100% - 20px);">
                            <div class="card-header">
                                <div class="btn-actions-pane-right actions-icon-btn">
                                    <a href="<?= site_url('loans/create') ?>" class="btn btn-primary text-uppercase">
                                        <i class="pe-7s-plus btn-icon-wrapper"></i>
                                        Request A Loan
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
                                                    <th>Added by</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php } ?>
                    <div class="tab-pane" id="tab-eg9-2" role="tabpanel">
                        <div class="card-header d-none">
                            <div class="btn-actions-pane-right actions-icon-btn">
                                <button type="button" class="btn btn-primary text-uppercase">
                                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                                    New Deposit
                                </button>
                                <button class="btn btn-secondary text-uppercase">
                                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                                    New Withdrawal
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-end row px-3">
                                <div>
                                    <label for="from">From</label>
                                    <div class="form-group">
                                        <input type="date" name="date_from" id="transaction-date-from" class="form-control">
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <label for="from">To</label>
                                    <div class="form-group">
                                        <input type="date" name="date_to" id="transaction-date-to" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 form-group">
                                    <button class="btn btn-primary transaction-filter">
                                        <i class="fa fa-filter"></i>
                                        Filter</button>
                                    <button class="btn btn-warning ml-2 transaction-filter-clear">
                                        <i class="fa fa-times"></i>
                                        Clear</button>
                                </div>
                            </div>
                            <table style="width: 100%;" id="dt-transactions" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Transac. Type</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                        <th>Reconcil. statement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->account->entries($account->id) as $key => $row) {
                                        $transtype = $row->is_credit === '1' ? 'deposits' : 'withdrawals';
                                    ?>
                                        <tr>
                                            <td class="text-uppercase"><?= $key + 1 ?></td>
                                            <td><?= $row->edate ?></td>
                                            <td class="text-uppercase"><?= str_replace('_', ' ', $row->type) ?></td>
                                            <td><?= $row->is_credit === '0' ? $row->amount : '' ?></td>
                                            <td><?= $row->is_credit === '1' ? $row->amount : '' ?></td>
                                            <td><?= $row->balance < 0 ? '(' . number_format(abs($row->balance), 2) . ')' : number_format($row->balance, 2) ?></td>
                                            <td></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="<?= site_url("$transtype/" . $row->ref) ?>" target="_blank" class="btn btn-icon"><i class="fa fa-eye"></i></a>
                                                    <a href="<?= site_url("$transtype/$row->ref/edit") ?>" target="_blank" class="btn btn-icon"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Transac. Type</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                        <th>Reconcil. statement</th>
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
<script src="<?= base_url('assets/js/accounts/detail.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>

<form action="<?= site_url('withdrawals/store') ?>" class="modal fade" id="newCharge" method="post" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">New Charge Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="account_id" value="<?= $account->id ?>">
                <input type="hidden" name="user_id" value="<?= auth()->user()->id ?>">
                <input type="hidden" name="type" value="deduction">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="wdate">Date</label>
                            <input type="date" name="wdate" id="wdate" value="<?= date('Y-m-d') ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="amount">Narration</label>
                            <input type="text" name="withdrawer_name" class="form-control" placeholder="Enter the purpose" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Charge</button>
            </div>
        </div>
    </div>
</form>

<form action="<?= site_url('withdrawals/store') ?>" class="modal fade" id="newWithdrawal" method="post" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">New Withdrawal Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="account_id" value="<?= $account->id ?>">
                <input type="hidden" name="user_id" value="<?= auth()->user()->id ?>">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="wdate">Date</label>
                            <input type="date" name="wdate" id="wdate" value="<?= date('Y-m-d') ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="amount">Withdrawer's Name</label>
                            <input type="text" name="withdrawer_name" class="form-control" value="<?= $account->name; ?>" placeholder="Enter withrawer's name" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Withdraw</button>
            </div>
        </div>
    </div>
</form>

<form action="<?= site_url('deposits/store') ?>" class="modal fade" id="newDeposit" method="post" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">New Deposit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="account_id" value="<?= $account->id ?>">
                <input type="hidden" name="user_id" value="<?= auth()->user()->id ?>">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="wdate">Date</label>
                            <input type="date" name="ddate" id="ddate" value="<?= date('Y-m-d') ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Method</label><br>
                            <select name="type" id="type" class="form-control select2-method" required>
                                <option value=""></option>
                                <option value="cash">Cash</option>
                                <option value="momo">Mobile Money Transfer</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="amount">Depositor's Name</label>
                            <input type="text" name="depositor_name" class="form-control" value="<?= $account->name; ?>" placeholder="Enter depositor's name" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="amount">Depositor's Phone</label>
                            <input type="tel" name="depositor_phone" class="form-control" placeholder="Enter depositor's phone">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Deposit</button>
            </div>
        </div>
    </div>
</form>
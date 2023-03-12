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
                <div>Association Details
                    <div class="page-title-subheading">Association details.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('associations') ?>" class="btn-shadow btn btn-info">
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
                                <div class="widget-number">Association</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <?= $association->name; ?>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                <div class="widget-number">Requested Loans</div>
                                <div class="tab-subheading">Requested loans and details</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-4" class="nav-link">
                                <div class="widget-number">Disbursed Loans</div>
                                <div class="tab-subheading">Disbursed loan and balances.</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                                <div class="widget-number">Transaction Summary</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    transaction of summary
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-3" class="nav-link">
                                <div class="widget-number">Members</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    members and leaders
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-eg9-0" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 p-5">
                                    <div class="row text-uppercase text-center mt-3 border-bottom">
                                        <p class="col-12 text-black-50">Association ID: <span class="text-primary"><?= $association->id ?></span> </p>
                                        <p class="col-12">
                                            <?php
                                            $alerts = [
                                                'open' => 'alert-success',
                                                'close' => 'alert-danger'
                                            ];
                                            ?>
                                            <span class="alert <?= $alerts[$association->status] ?> text-uppercase float-right">
                                                <?= $association->status ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Association Name</p>
                                        <h5 class="col-6 text-info">
                                            <?= $association->name ?>
                                        </h5>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Community</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $association->community ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Assigned Person</p>
                                        <p class="col-6 input-placeholder text-black">
                                            <?= $association->assigned_person_name ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3">
                                        <p class="col-6 text-black-50">Contact</p>
                                        <p class="col-6 input-placeholder text-black">
                                            <a href="tel:<?= $association->assigned_person_phone ?>">
                                                <?= $association->assigned_person_phone ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-5">
                                    <div class="row m-5">
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Created On</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= date('d/m/y', strtotime($association->created_at)) ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Cluster Office Address</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $association->cluster_office_address ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Association Email</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $association->email ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Assigned Staff</p>
                                        <p class="col-6 input-placeholder text-primary">
                                            <?php $user = $this->user->find($association->assigned_user_id) ?>
                                            <?= $user ? "$user->firstname $user->lastname" : 'None assigned' ?>
                                        </p>
                                    </div>

                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Added by</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?php $user = $this->user->find($association->user_id) ?>
                                            <?= $user ? "$user->firstname $user->lastname" : '' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-3">
                                <h5>Association's Group Accounts</h5>
                                <div class="col-md-12">
                                    <table style="width: 100%;" id="dt-related-accounts" class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>#Acc No.</th>
                                                <th>Balance</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $alerts = [
                                                'open' => 'alert-success',
                                                'suspended' => 'alert-warning',
                                                'close' => 'alert-danger',
                                            ];
                                            foreach ($this->association->accounts($association->id) as $key => $row) {
                                                $row->accType = $this->acctype->find($row->acc_type_id);
                                                $row->association = $this->association->find($row->association_id ? $row->association_id : 0);
                                            ?>
                                                <tr>
                                                    <td><?= $row->accType->label ?> (<?= $row->acc_number ?>)</td>
                                                    <td><?= $this->account->calBalance($row->id) ?><p></p>
                                                    </td>
                                                    <td><span class="alert <?= $alerts[$row->status] ?> text-uppercase"><?= $row->status ?></span></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= site_url('bankaccounts/' . $row->id) ?>" class="btn btn-icon"><i class="fa fa-eye"></i></a>
                                                            <button data-id="<?= $row->acc_number ?>" class="btn btn-icon edit" data-toggle="modal" data-target="#editAccount"><i class="fa fa-edit"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-uppercase">
                                                <th>#Acc No.</th>
                                                <th>Balance</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <a href="<?= site_url('associations/' . $association->id . '/edit') ?>" class="btn btn-info btn-lg">Modify</a>
                            <button class="btn btn-warning btn-lg">Close</button>
                            <button class="btn btn-danger btn-lg delete" data-url="<?= site_url('associations') ?>" data-id="<?= $association->id ?>">Delete</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
                        <div class="card-body">
                            <div class="d-flex align-items-end row px-3">
                                <div>
                                    <label for="from">From</label>
                                    <div class="form-group">
                                        <input type="date" id="" class="form-control transaction-date-from">
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <label for="from">To</label>
                                    <div class="form-group">
                                        <input type="date" id="" class="form-control transaction-date-to">
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
                            <table style="width: 100%;" id="dt-related-loans" data-association-id="<?= $association->id ?>" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Request Date</th>
                                        <th>Pas.B No.</th>
                                        <th>Account</th>
                                        <th>Principal Amt.</th>
                                        <th>Interest Amt.</th>
                                        <th>Duration</th>
                                        <th>Rate</th>
                                        <th>Request Status</th>
                                        <th>Disbursement Date</th>
                                        <th>Repay. Date</th>
                                        <th>Repay. Status</th>
                                        <th>Added by</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Request Date</th>
                                        <th>Pas.B No.</th>
                                        <th>Account</th>
                                        <th>Principal Amt.</th>
                                        <th>Interest Amt.</th>
                                        <th>Duration</th>
                                        <th>Rate</th>
                                        <th>Request Status</th>
                                        <th>Disbursement Date</th>
                                        <th>Repay. Date</th>
                                        <th>Repay. Status</th>
                                        <th>Added by</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-4" role="tabpanel">
                        <div class="card-body">

                            <div class="d-flex align-items-end row">
                                <div class="col-md-4">
                                    <label for="from">From</label>
                                    <div class="form-group">
                                        <input type="date" name="date_from" id="date-from" class="form-control">
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <label for="from">To</label>
                                    <div class="form-group">
                                        <input type="date" name="date_to" id="date-to" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 form-group">
                                    <button class="btn btn-primary filter">
                                        <i class="fa fa-filter"></i>
                                        Filter</button>
                                    <button class="btn btn-warning ml-2 filter-clear">
                                        <i class="fa fa-times"></i>
                                        Clear</button>
                                </div>
                            </div>
                            <table style="width: 100%;" id="dt-related-loan-balances" class="table table-hover table-striped table-bordered">
                        <thead class="text-uppercase">
                            <tr>
                                <th>#ID</th>
                                <th>Association</th>
                                <th>Passbook</th>
                                <th>Account</th>
                                <th>Repay. Start</th>
                                <th>Days in Arrears</th>
                                <th>Last Payment</th>
                                <th>Arrears</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($loans as $key => $row) {
                                $loan = $this->loan->updateSettlementStatus($row->id);
                                $row->arrears_days = $loan->arrears_days;
                                $row->total_arrears = $loan->total_arrears;

                                $row->totalPaid = $this->payment->sum(['loan_id' => $row->id])->row('total');
                                $row->totalBalance = $this->loan->sum(['id' => $row->id])->row('total') - $row->totalPaid;
                                $row->account = $this->account->find($row->account_id);
                            ?>
                                <tr>
                                    <td><a href="<?= site_url('loans/' . $row->id) ?>" class="btn btn-link"><?= $row->id ?></a></td>
                                    <td><?= $row->association_name ?></td>
                                    <td><?= $row->passbook ?></td>
                                    <td>
                                        <a href="<?= site_url('bankaccounts/' . $row->account_id) ?>" class="btn btn-link">
                                            <?= $row->name ?><br>(<?= $row->accType ?>)
                                        </a>
                                    </td>
                                    <td><?= date('d/m/y',strtotime($row->payin_start_date)); ?></td>
                                    <td><?= $row->arrears_days; ?></td>
                                    <td><?= $row->last_repayment?date('d/m/y',strtotime($row->last_repayment)):'None'; ?></td>
                                    <td><?= number_format($row->total_arrears, 2) ?></td>
                                    <td><?= number_format($row->totalBalance, 2); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot class="text-uppercase">
                            <tr>
                                <th>#ID</th>
                                <th>Association</th>
                                <th>Passbook</th>
                                <th>Account</th>
                                <th>Repay. Start</th>
                                <th>Days in Arrears</th>
                                <th>Last Payment</th>
                                <th>Arrears</th>
                                <th>Balance</th>
                            </tr>
                        </tfoot>
                    </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-2" role="tabpanel">
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
                                        <th>Date</th>
                                        <th>Cash Deposits</th>
                                        <th>Mobile Money</th>
                                        <th>Internal Transfer</th>
                                        <th>Reconcil. Statement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $where = ['accounts.association_id' => $association->id];
                                    foreach ($this->association->transactions($where)->get()->result() as $key => $row) {
                                        $stat = $this->association->statements(['account_statements.id' => $row->tdate, 'association_id' => $association->id])->get()->row();
                                        $colTotal[0] = $row->cash_deposits;
                                        $colTotal[1] = $row->cash_deposits;
                                        $colTotal[2] = $row->cash_deposits;
                                    ?>
                                        <tr>
                                            <td><?= $row->tdate ?></td>
                                            <td><a href="<?= site_url('deposits') ?>?type=cash&association_id=<?= $association->id ?>&from_date=<?= $row->tdate ?>&to_date=<?= $row->tdate ?>"><?= number_format($row->cash_deposits, 2) ?></a></td>
                                            <td><a href="<?= site_url('deposits') ?>?type=momo&association_id=<?= $association->id ?>&from_date=<?= $row->tdate ?>&to_date=<?= $row->tdate ?>"><?= number_format($row->momo_deposits, 2) ?></a></td>
                                            <td><a href="<?= site_url('deposits') ?>?type=transfer&association_id=<?= $association->id ?>&from_date=<?= $row->tdate ?>&to_date=<?= $row->tdate ?>"><?= number_format($row->transfer_deposits, 2) ?></a></td>
                                            <td>
                                                <a href="<?= site_url('associations/statements') ?><?= $stat ? "?id=$stat->id&association_id=$association->id" : "?id=$row->tdate&association_id=$association->id" ?>" class="btn btn-link"><?= $stat ? $stat->id : '' ?></a>
                                                <a href="<?= site_url('associations/statements') ?><?= $stat ? "?id=$stat->id&association_id=$association->id" : "?id=$row->tdate&association_id=$association->id" ?>" class="btn btn-icon btn-primary">
                                                    <i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>Date</th>
                                        <th>Cash Deposits</th>
                                        <th>Mobile Money</th>
                                        <th>Internal Transfer</th>
                                        <th>Reconcil. Statement</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-3" role="tabpanel">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Passbook NO.</label>
                                            <select name="passbook" id="passbook" class="form-control select2-passbooks2 filter" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">Location/Town/City</label>
                                            <input name="city" id="city" type="text" class="form-control filter" placeholder="Enter a Location/Town/City">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sex">Sex</label>
                                            <select id="sex" name="sex" class="form-control select2 filter" required>
                                                <option value=""></option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="settlement">Settlement</label>
                                            <select id="settlement" name="settlement" class="form-control select2 filter" required>
                                                <option value="">Select a settlement</option>
                                                <option value="rural">Rural Area</option>
                                                <option value="urban">Urban Area</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="education">Education level</label>
                                            <select id="education" name="education" class="form-control select2 filter" required>
                                                <option value="">Select an education level</option>
                                                <option value="none">None</option>
                                                <option value="primary">Primary School</option>
                                                <option value="jhs">Junior High School (JHS)</option>
                                                <option value="shs">Senior High School (SHS)</option>
                                                <option value="tertiary">Tertiary Education</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="marital_status">Marital status</label>
                                            <select id="marital-status" name="marital_status" class="form-control select2 filter" required>
                                                <option value=""></option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="rstate">Status</label>
                                            <select id="rstate" name="rstate" class="form-control select2 filter" required>
                                                <option value=""></option>
                                                <option value="open">Open</option>
                                                <option value="closed">Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex align-items-end row">
                                <div class="col-md-4">
                                    <label for="from">From</label>
                                    <div class="form-group">
                                        <input type="date" name="date_from" id="date-from" class="form-control">
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <label for="from">To</label>
                                    <div class="form-group">
                                        <input type="date" name="date_to" id="date-to" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 form-group">
                                    <button class="btn btn-primary filter">
                                        <i class="fa fa-filter"></i>
                                        Filter</button>
                                    <button class="btn btn-warning ml-2 filter-clear">
                                        <i class="fa fa-times"></i>
                                        Clear</button>
                                </div>
                            </div>
                            <table style="width: 100%;" id="dt-related-customers" data-association-id="<?= $association->id ?>" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Sex</th>
                                        <th>Primary Phone</th>
                                        <th>ID Number</th>
                                        <th>Occupation</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Sex</th>
                                        <th>Primary Phone</th>
                                        <th>ID Number</th>
                                        <th>Occupation</th>
                                        <th>Status</th>
                                        <th>Created On</th>
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
<script src="<?= base_url('assets/js/associations/detail.js?v=21'); ?>" defer></script>
<?php app_end(); ?>


<form action="<?= site_url('bankaccounts/store') ?>" class="modal fade" id="newAccount" method="post" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">New Account Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ownership" value="individual">
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="association_id" value="<?= $association->id ?>">
                <div class="form-group">
                    <label for="name">Account Name</label>
                    <div>
                        <input type="text" class="form-control" name="name" value="<?= $association->name ?>" placeholder="Account name" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="acc_type_id">Account type</label>
                            <select name="acc_type_id" class="form-control select2-account-types" required>
                                <option value=""></option>
                                <?php foreach ($accountTypes as $row) { ?>
                                    <option value="<?= $row->id; ?>" <?= isset($account) ? ($account->acc_type_id === $row->id ? 'selected' : '') : '' ?> data-type="<?= $row->type; ?>"><?= $row->label; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stamp_amount">Amount per stamp</label>
                            <div>
                                <input type="number" class="form-control stamps2" name="stamp_amount" placeholder="Enter amount per stamp" <?= isset($account) ? (empty($account->stamp_amount) ? 'disabled' : '') : 'disabled' ?> />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Account</button>
            </div>
        </div>
    </div>
</form>

<form action="<?= site_url('bankaccounts/update') ?>" class="modal fade" id="editAccount" method="post" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Edit Account Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ownership" value="association">
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="association_id" value="<?= $association->id ?>">
                <div class="form-group">
                    <label for="name">Account Name</label>
                    <div>
                        <input type="text" class="form-control" name="name" value="" placeholder="Account name" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="acc_type_id">Account type</label>
                            <select name="acc_type_id" class="form-control select2-account-types" required>
                                <option value=""></option>
                                <?php foreach ($accountTypes as $row) { ?>
                                    <option value="<?= $row->id; ?>" <?= isset($account) ? ($account->acc_type_id === $row->id ? 'selected' : '') : '' ?> data-type="<?= $row->type; ?>"><?= $row->label; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stamp_amount">Amount per stamp</label>
                            <div>
                                <input type="number" class="form-control stamps2" name="stamp_amount" placeholder="Enter amount per stamp" <?= isset($account) ? (empty($account->stamp_amount) ? 'disabled' : '') : 'disabled' ?> />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</form>
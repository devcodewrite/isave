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
                <div>Reporting Transactions
                    <div class="page-title-subheading">Reporting transactions.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="max-width: calc(100% - 10px);">
            <div class="mb-3 card">
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
                                <th>Time</th>
                                <th>Date</th>
                                <th>Account Name</th>
                                <th>Transac. Type</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Balance</th>
                                <th>Narration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->account->transactions() as $key => $row) {
                                $transtype = $row->is_credit === '1' ? 'deposits' : 'withdrawals';
                                $account = $this->account->find(intval($row->account_id1));
                            ?>
                                <tr>
                                    <td class="text-uppercase"><?=$key+1 ?></td>
                                    <td><?= $row->edate ?></td>
                                    <td><?=$account?$account->name:''; ?></td>
                                    <td class="text-uppercase"><?= str_replace('_', ' ', $row->type) ?></td>
                                    <td><?= $row->is_credit === '0' ? $row->amount : '' ?></td>
                                    <td><?= $row->is_credit === '1' ? $row->amount : '' ?></td>
                                    <td><?= $row->balance < 0 ? '(' . number_format(abs($row->balance), 2) . ')' : number_format($row->balance, 2) ?></td>
                                    <td><?=$row->narration ?></td>
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
                                <th>Time</th>
                                <th>Date</th>
                                <th>Account Name</th>
                                <th>Transac. Type</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Balance</th>
                                <th>Narration</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/reportings/transactions.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
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
                <div>Cashbook Report
                    <div class="page-title-subheading">Reporting transactions and account balance.</div>
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
                                <th>Date</th>
                                <th>Association</th>
                                <th>Deposits</th>
                                <th>Withdrawals</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->account->associationTransactions() as $key => $row) {
                                $row->balance = $this->account->calBalance2(['association_id'=> $row->association_id],$row->edate);
                            ?>
                                <tr>
                                    <td><?= $row->edate ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td><?=number_format($row->deposit_amount,2); ?></td>
                                    <td><?= number_format($row->withdrawal_amount,2); ?></td>
                                    <td><?= $row->balance < 0 ? '(' . number_format(abs($row->balance), 2) . ')' : number_format($row->balance, 2) ?></td>
                                   
                                </tr>
                            <?php  } ?>
                        </tbody>
                        <tfoot class="text-uppercase">
                            <tr>
                                <th>Date</th>
                                <th>Association</th>
                                <th>Deposits</th>
                                <th>Withdrawals</th>
                                <th>Balance</th>
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
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
                <div>Transaction Report
                    <div class="page-title-subheading">Reporting association transactions.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="max-width: calc(100% - 10px);">
            <div class="mb-3 card">
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
                                <th>Cash Deposits</th>
                                <th>Mobile Money</th>
                                <th>Internal Transfer</th>
                                <th>Reconcil. Statement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->association->transactions()->get()->result() as $key => $row) {
                                $stat = $this->association->statements([
                                    'account_statements.id' => $row->tdate,
                                    'association_id' => $row->association_id
                                ])
                                    ->get()
                                    ->row();
                            ?>
                                <tr>
                                    <td><?= $row->tdate ?></td>
                                    <th><a href="<?= site_url('associations/' . $row->association_id); ?>" class="btn btn-link"><?= $row->association_name; ?></a></th>
                                    <td><?= number_format($row->cash_deposits, 2) ?></td>
                                    <td><?= number_format($row->momo_deposits, 2) ?></td>
                                    <td><?= number_format($row->transfer_deposits, 2) ?></td>
                                    <td>
                                        <a href="<?= site_url('associations/statements') ?><?= $stat ? "?id=$stat->id&association_id=$row->association_id" : "?id=$row->tdate&association_id=$row->association_id" ?>" class="btn btn-link"><?= $stat ? $stat->id : '' ?></a>
                                        <a href="<?= site_url('associations/statements') ?><?= $stat ? "?id=$stat->id&association_id=$row->association_id" : "?id=$row->tdate&association_id=$row->association_id" ?>" class="btn btn-icon btn-primary">
                                            <i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                        <tfoot class="text-uppercase">
                            <tr>
                                <th>Date</th>
                                <th>Association</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Reconcil. Statement</th>
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
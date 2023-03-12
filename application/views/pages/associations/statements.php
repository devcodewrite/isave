<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                </div>
                <div>Associations Daily E-cash Statements
                    <div class="page-title-subheading">Table of statements.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= $association_id ? site_url('associations/' . $association_id) : site_url('associations') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
                </a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Statement Form
        </div>
        <div class="card-body px-5">
            <form class="edit-statement" action="<?= site_url('associations/statements') ?>" method="post">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Association</label>
                            <select name="association_id" class="form-control select2-associations1" required>
                                <option value=""></option>
                                <?php if ($association) { ?>
                                    <option value="<?= $association->id ?>" selected><?= $association->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Statement Date</label>
                            <input id="id" type="date" class="form-control" name="id" value="<?= isset($id) ? $id : "" ?>" required />
                        </div>
                    </div>
                </div>
                <?php if ($statement) { ?>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Transaction Amount (Reconciled)</label>
                                <input type="number" class="form-control" value="<?= isset($statement->total_amount) ? number_format($statement->total_amount, 2) : "" ?>" placeholder="0.00" readonly required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">E-cash Received (Reconciled)</label>
                                <input type="number" class="form-control" placeholder="Enter reconcile amount" value="<?= isset($statement->reconcile_amount) ? number_format($statement->reconcile_amount, 2) :  '' ?>" required />
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Transaction Amount</label>
                            <input type="number" class="form-control" name="total_amount" value="<?= isset($tran->cash_deposits) ? number_format($tran->cash_deposits, 2) : "" ?>" placeholder="0.00" readonly required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">E-cash Received</label>
                            <input type="number" class="form-control" name="reconcile_amount" placeholder="Enter reconcile amount" value="<?= isset($tran->momo_deposits) ? number_format($tran->momo_deposits, 2) :  '' ?>" required />
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="amount">Reconcilliation Note</label>
                            <textarea name="reconcile_note" id="" rows="2" class="form-control" placeholder="State the reason here...."><?= isset($statement->reconcile_note) ? $statement->reconcile_note : "" ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-block text-right">
            <a href="<?= site_url('associations/statements')?>" class="btn btn-danger">Cancel</a>
            <button class="btn btn-success btn-lg" onclick="$('.edit-statement').trigger('submit')">Reconcile</button>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            Daily E-cash Statement Table
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Association</label>
                        <select name="association_id" class="form-control select2-associations filter" required>
                            <option value=""></option>
                            <?php if ($association) { ?>
                                <option value="<?= $association->id ?>" selected><?= $association->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Account Statement</label>
                        <input type="date" class="form-control filter" name="id" value="<?= $id ? $id : "" ?>" placeholder="Enter ref statement" />
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-end row px-3">
                <div>
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
            <table style="width: 100%;" id="dt-statements" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#Ref</th>
                        <th>Association</th>
                        <th>Reconcile Amount</th>
                        <th>E-Cash Amount</th>
                        <th>Diff</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th></th>
                        <th class="text-right">Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/associations/statements.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
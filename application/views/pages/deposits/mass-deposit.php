<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="lnr-picture text-danger"></i>
                </div>
                <div>Mass Deposit Form
                    <div class="page-title-subheading">Fill in this form to do mass deposits.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('deposits') ?>" class="btn-shadow btn btn-info">
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
                    <i class="header-icon lnr-enter-down icon-gradient bg-plum-plate"> </i>Deposit Request From
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="association_id">Search an association</label>
                                <select name="association_id" class="form-control select2-associations" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <div class="form-group">
                                <label for="entries">Add Rows</label>
                                <input type="number" name="rows" id="entries" value="1" class="form-control">
                            </div>
                            <div class="form-group ml-2">
                                <button class="btn btn-primary text-uppercase add-rows">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form action="<?= site_url('deposits/stores') ?>" method="post" class="col-12 mass-deposit-form">
                            <input type="hidden" name="is_mass" value="1">
                            <table style="width: 100%;" id="dt-mass-deposits" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>Passbook</th>
                                        <th>Owner</th>
                                        <th>Account</th>
                                        <th>Stamps</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 10; $i++) {
                                    ?>
                                        <tr>
                                            <td class="col-2">
                                                <select name="passbook[]" class="form-control select2-mass-passbooks" data-acc="<?= 'select2-acc' . $i ?>" required>
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                            <td class="col-3 owner">
                                                Not set
                                            </td>
                                            <td class="col-3">
                                                <select name="account_id[]" class="form-control select2-acc<?= $i ?>" data-id="<?= $i ?>" required>
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                            <td class="col-2">
                                                <input type="hidden" min="0" value="10" id="stamp_amt<?= $i ?>">
                                                <input onkeyup="$('td #amount<?= $i ?>').val($(this).prev('input').val()*$(this).val())|updateTotal()" id="stamps<?= $i ?>" onchange="$('td #amount<?= $i ?>').val($(this).prev('input').val()*$(this).val())|updateTotal()" id="stamps<?= $i ?>" type="number" name="stamps[]" min="0" class="form-control" data-id="<?= $i ?>" disabled>
                                            </td>
                                            <td class="col-1">
                                                <input onchange="updateTotal()" onkeyup="updateTotal()" id="amount<?= $i ?>" type="number" name="amount[]" class="form-control" required>
                                            </td>
                                            <td class="col-1">
                                                <button type="button" class="btn btn-icon btn-warning delete-row">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th colspan="3">Totals</th>
                                        <th id="stampTotal">0</th>
                                        <th id="amountTotal">0.00</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="btn btn-success btn-lg deposit">Deposit All</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/deposits/mass.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
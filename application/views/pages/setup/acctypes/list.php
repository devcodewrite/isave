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
                <div>Account Types
                    <div class="page-title-subheading">Table of account types and their details.</div>
                </div>
            </div>

        </div>
    </div>
    <div class="main-card card mb-3">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Account Type Form
        </div>
        <div class="card-body">
            <form class="edit-account-types mx-auto" method="post" action="<?= isset($type) ? site_url('acctypes/update/' . $type->id) : site_url('acctypes/store') ?>" data-redirect-url="<?= site_url('acctypes') ?>">
                <?php if (isset($type)) { ?>
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id" value="<?= $type->id ?>">
                <?php } else { ?>
                    <input type="hidden" name="_method" value="post">
                <?php } ?>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="label">Label</label>
                            <input type="text" class="form-control" name="label" placeholder="Enter label" value="<?= isset($type) ? $type->label : "" ?>" required />
                        </div>
                    </div>
                    <div class="col-md-3 vtype <?=isset($type)?($type->is_loan_acc === '0'?'':'d-none'):'' ?>">
                        <div class="form-group">
                            <label for="type">Value type</label>
                            <select id="actype" name="type" class="form-control" required>
                                <option value="">Select a type</option>
                                <option value="stamp" <?=isset($type)?($type->type==='stamp'?'selected':''):'' ?>>Stamps</option>
                                <option value="amount" <?=isset($type)?($type->type==='amount'?'selected':''):'' ?>>Amount</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 amount <?=isset($type)?($type->type==='amount'&&$type->is_loan_acc === '0'?'':'d-none'):'d-none' ?>">
                        <div class="form-group">
                            <label for="stamp_amount">Stamp Amount</label>
                            <input type="number" class="form-control" id="stamp-amount" name="stamp_amount" placeholder="Enter amount per stamp" value="<?= isset($type) ? $type->stamp_amount : "" ?>" />
                        </div>
                    </div>
                    <div class="col-md-3 rate <?= isset($type) ? ($type->is_investment === '1' ? '' : 'd-none') :'' ?>">
                        <div class="form-group">
                            <label for="interest">Interest Rate</label>
                            <input type="number" class="form-control" id="interest" name="interest_rate" placeholder="Enter the rate" value="<?= isset($type) ? $type->interest_rate : "" ?>" min="0" max="1" />
                        </div>
                    </div>
                    <div class="col-md-3 limit <?= isset($type) ? ($type->is_loan_acc === '1' ? '' : 'd-none') :'d-none' ?>">
                        <div class="form-group">
                            <label for="interest">Lower limit</label>
                            <input type="number" class="form-control" id="lower_limit" name="lower_limit" placeholder="Enter the lower limit" value="<?= isset($type) ? $type->lower_limit : "" ?>" />
                        </div>
                    </div>
                    <div class="col-md-3 limit <?= isset($type) ? ($type->is_loan_acc === '1' ? '' : 'd-none') :'d-none' ?>">
                        <div class="form-group">
                            <label for="interest">Upper limit</label>
                            <input type="number" class="form-control" id="lower_limit" name="upper_limit" placeholder="Enter the upper limit" value="<?= isset($type) ? $type->upper_limit : "" ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" class="" id="is_default" name="is_default" value="1" <?= isset($type) ? ($type->is_default === '1' ? 'checked' : '') : "" ?> />
                            <label for="is_default">Default</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" class="" id="is_investment" name="is_investment" value="1" <?= isset($type) ? ($type->is_investment === '1' ? 'checked' : '') : "checked" ?> />
                            <label for="is_investment">For Investments</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="checkbox" class="" id="is_loan_acc" name="is_loan_acc" value="1" <?= isset($type) ? ($type->is_loan_acc === '1' ? 'checked' : '') : "" ?> />
                            <label for="is_loan_acc">For Loans</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <?php if (isset($type)) { ?>
                <a href="<?= site_url('acctypes') ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                <button type="submit" class="btn btn-primary text-uppercase submit">Save Changes</button>
            <?php } else { ?>
                <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                <button type="submit" class="btn btn-primary text-uppercase submit">Add Type</button>
            <?php } ?>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Account Types Table
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="dt-types" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Label</th>
                        <th>Value Type</th>
                        <th>Rate</th>
                        <th>lower Limit</th>
                        <th>Upper Limit</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($types as $row) {
                    ?>
                        <tr class="text-uppercase">
                            <td><?= $row->id ?></td>
                            <td><?= $row->label ?></td>
                            <td><?= $row->type ?></td>
                            <td><?= $row->interest_rate?($row->interest_rate*100).'%':'' ?></td>
                            <td><?= $row->lower_limit ?></td>
                            <td><?= $row->upper_limit ?></td>
                            <td><?= $row->created_at ?></td>
                            <td>
                                <div class="d-flex">
                                    <form id="change-status-<?=$row->id ?>" action="<?= site_url('acctypes/update/'.$row->id) ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $row->id ?>">

                                        <?php if ($row->status === 'open') { ?>
                                            <input type="hidden" name="status" value="close">
                                        <?php } else { ?>
                                            <input type="hidden" name="status" value="open">
                                        <?php } ?>
                                        <input onchange="changeStatus('change-status-<?=$row->id ?>')" type="checkbox" value="1" <?= $row->status === 'open' ? 'checked' : '' ?>  data-toggle="toggle" data-onstyle="primary">
                                    </form>
                                    <a href="<?= site_url('acctypes/'.$row->id.'/edit') ?>" class="btn btn-info ml-2"><i class="fa fa-edit"></i></a>
                                    <a href="<?=site_url('acctypes/delete/'.$row->id) ?>" class="btn btn-danger ml-2 delete-row"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
                <tfoot class="text-uppercase">
                    <tr> 
                        <th>#ID</th>
                        <th>Label</th>
                        <th>Value Type</th>
                        <th>Rate</th>
                        <th>lower Limit</th>
                        <th>Upper Limit</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/setup/account-types.js?v=5') ?>" defer></script>
<?php app_end(); ?>
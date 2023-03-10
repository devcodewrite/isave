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
                <div>Loan Types
                    <div class="page-title-subheading">Table of account types and their details.</div>
                </div>
            </div>

        </div>
    </div>
    <div class="main-card card mb-3">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Loan Type Form
        </div>
        <div class="card-body">
            <form class="edit-account-types mx-auto" method="post" action="<?= isset($type) ? site_url('loantypes/update/' . $type->id) : site_url('loantypes/store') ?>" data-redirect-url="<?= site_url('loantypes') ?>">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Rate type</label>
                            <select name="rate_type" class="form-control" required>
                                <option value="">Select a type</option>
                                <option value="flat_rate" <?=isset($type)?($type->rate_type==='flat_rate'?'selected':''):'' ?>>Flat Rate</option>
                                <option value="reducing_balance" <?=isset($type)?($type->rate_type==='reducing_balance'?'selected':''):'' ?>>Reducing Balance</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <?php if (isset($type)) { ?>
                <a href="<?= site_url('loantypes') ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                <button type="submit" class="btn btn-primary text-uppercase submit">Save Changes</button>
            <?php } else { ?>
                <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                <button type="submit" class="btn btn-primary text-uppercase submit">Add Type</button>
            <?php } ?>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Loan Types Table
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="dt-types" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Label</th>
                        <th>Rate type</th>
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
                            <td><?= str_replace('_',' ',$row->rate_type) ?></td>
                            <td><?= $row->created_at ?></td>
                            <td>
                                <div class="d-flex">
                                    <form id="change-status-<?=$row->id ?>" action="<?= site_url('loantypes/update/'.$row->id) ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $row->id ?>">

                                        <?php if ($row->status === 'open') { ?>
                                            <input type="hidden" name="action" value="close">
                                            <input type="hidden" name="status" value="close">
                                        <?php } else { ?>
                                            <input type="hidden" name="action" value="open">
                                            <input type="hidden" name="status" value="open">
                                        <?php } ?>
                                        <input onchange="changeStatus('change-status-<?=$row->id ?>')" type="checkbox" <?= $row->status === 'open' ? 'checked' : '' ?> data-toggle="toggle" data-onstyle="primary">
                                    </form>
                                    <a href="<?= site_url('loantypes/'.$row->id.'/edit') ?>" class="btn btn-info ml-2"><i class="fa fa-edit"></i></a>
                                    <a href="<?=site_url('loantypes/delete/'.$row->id) ?>" class="btn btn-danger ml-2 delete-row"><i class="fa fa-trash"></i></a>
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
                        <th>Type</th>
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
<script src="<?= base_url('assets/js/setup/account-types.js?v=1') ?>" defer></script>
<?php app_end(); ?>
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

    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i> Account Types
        </div>
        <div class="card-body">
            <form class="edit-account-type" action="<?=site_url('setup/account-types') ?>">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="label">Label</label>
                            <input type="text" name="label" id="label" placeholder="Enter the account type" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control" required>
                                <option value="">Select a type</option>
                                <option value="stamp">Stamps</option>
                                <option value="amount">Amount</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                    <button type="button" class="btn btn-warning text-uppercase float-right reset ml-3">Cancel</button>
                        <button type="submit" class="btn btn-primary text-uppercase float-right">Create</button>
                    </div>
                </div>

            </form>
            <table style="width: 100%;" id="dt-account-types" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Label</th>
                        <th>Type</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->acctype->all()->get()->result() as $row) {
                    ?>
                        <tr>
                            <td><?= $row->id ?></td>
                            <td><?= $row->label ?></td>
                            <td><?= $row->type ?></td>
                            <td><?= $row->created_at ?></td>
                            <td>
                                <div class="d-flex">
                                    <form class="change-status" action="<?=site_url('setup/account-types') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $row->id ?>">
                                       
                                        <?php if ($row->status === 'open') { ?>
                                            <input type="hidden" name="action" value="close">
                                            <input type="hidden" name="status" value="close">
                                        <?php }else {?> 
                                            <input type="hidden" name="action" value="open">
                                            <input type="hidden" name="status" value="open">
                                            <?php } ?>
                                        <input type="checkbox" onchange="$('.change-status').trigger('submit')" value="1" <?= $row->status === '1' ? 'checked' : '' ?> data-toggle="toggle" data-onstyle="primary">
                                    </form>
                                    <a href="<?= site_url('setup/account-types') ?>" class="btn btn-info ml-2"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger ml-2"><i class="fa fa-trash"></i></button>
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
<script src="<?= base_url('assets/js/setup/account-types.js?v=9') ?>" defer></script>
<?php app_end(); ?>
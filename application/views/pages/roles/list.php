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
                <div>List Roles
                    <div class="page-title-subheading">Table of roles and their details.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Role Table Filter

            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('roles/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New Role
                </a>
            </div>
        </div>
        <div class="card-body px-5">
            <div class="form-row">

            </div>
            <div class="form-row">
                <div class="col-md-3">
                    <div class="position-relative form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control select2 filter" required>
                            <option value="">Select a status</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table style="width: 100%;" id="dt-roles" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $key => $row) {
                    ?>
                        <tr>
                            <td><?= $row->id; ?></td>
                            <td><?= $row->label; ?></td>
                            <td>
                                <form id="change-status-<?= $row->id ?>" action="<?= site_url('roles/update/' . $row->id) ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $row->id ?>">

                                    <?php if ($row->status === 'open') { ?>
                                        <input type="hidden" name="status" value="close">
                                    <?php } else { ?>
                                        <input type="hidden" name="status" value="open">
                                    <?php } ?>
                                    <input onchange="changeStatus('change-status-<?= $row->id ?>')" type="checkbox" value="1" <?= $row->status === 'open' ? 'checked' : '' ?> data-toggle="toggle" data-onstyle="primary">
                                </form>
                            </td>
                            <td><?= $row->created_at; ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
                <tfoot class="text-uppercase">
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created On</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/roles/list.js?v=3') ?>" defer></script>
<?php app_end(); ?>
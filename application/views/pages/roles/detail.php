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
                <div>Role Details
                    <div class="page-title-subheading">Role details.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('roles') ?>" class="btn-shadow btn btn-info">
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
                                <div class="widget-number">Role</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-book"></i>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-3" class="nav-link">
                                <div class="widget-number">Permissions</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    Assigned permissions
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
                                        <p class="col-12 text-black-50">Role ID: <span class="text-primary"><?= $role->id ?></span> </p>
                                        <p class="col-12">
                                            <?php
                                            $alerts = [
                                                'open' => 'alert-success',
                                                'close' => 'alert-danger'
                                            ];
                                            ?>
                                            <span class="alert <?= $alerts[$role->status] ?> text-uppercase float-right">
                                                <?= $role->status ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Label</p>
                                        <p class="col-6 text-black">
                                            <?= $role->label ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-5">
                                    <div class="row m-5">
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Created On</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= date('d/m/y', strtotime($role->created_at)) ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Added by</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?php $user = $this->user->find($role->user_id) ?>
                                            <?= $user ? "$user->firstname $user->lastname" : '' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <a href="<?= site_url('roles/' . $role->id . '/edit') ?>" class="btn btn-warning btn-lg">Modify</a>
                            <button class="btn btn-danger btn-lg delete" data-url="<?= site_url('roles') ?>" data-id="<?= $role->id ?>">Delete</button>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-eg9-3" role="tabpanel">
                        <div class="card-body">
                            <form id="edit-permission" method="post" action="<?= $role->permission ? site_url('permissions/update/' . $role->permission->id) : site_url('permissions/store') ?>" data-redirect-url="<?= site_url('roles/' . $role->id) ?>">
                                <input type="hidden" name="id" value="<?= $role->permission ? $role->permission->id : '' ?>">
                                <input type="hidden" name="role_id" <?= $role->id ?>>
                                <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th class="col-md-3">Module</th>
                                            <th class="col-md-2">Permissions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $perms = ['create', 'view', 'update', 'delete'];
                                        $rowspan = sizeof($perms);

                                        foreach ($this->perm->modules() as $row) {
                                            $rolePerm = explode(',', $role->permission->{$row->name});
                                        ?>
                                            <?php
                                            if ($row->name === 'is_admin' || $row->name === 'is_super_admin') {
                                            ?>
                                                <tr>
                                                    <td class="text-uppercase border"><?= str_replace('_', ' ', $row->name); ?></td>
                                                    <td colspan="2">
                                                        <?php if ($role->permission->is_super_admin === '1') { ?>
                                                            <input type="hidden" name="<?= $row->name; ?>" value="1" <?= $role->permission->{$row->name} === '1' ? 'checked' : '' ?>>
                                                        <?php } ?>
                                                        <input type="checkbox" name="<?= $row->name; ?>" value="1" <?= $role->permission->{$row->name} === '1' ? 'checked' : '' ?> <?= $role->permission->is_super_admin === '1'||$row->name==='is_super_admin' ? 'disabled' : '' ?>>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($perms as $key => $perm) { ?>
                                                    <tr>
                                                        <?php if ($key === 0) { ?>
                                                            <td rowspan="<?= $rowspan ?>" class="text-uppercase border"><?= str_replace('_', ' ', $row->name); ?></td>
                                                        <?php } ?>
                                                        <td class="text-uppercase"><?= $perm ?></td>
                                                        <td>
                                                            <?php
                                                            if (isset($role->permission->is_super_admin))
                                                                if ($role->permission->is_super_admin === '1') { ?>
                                                                <input type="hidden" name="<?= $row->name; ?>[]" value="<?= $perm ?>" <?= in_array($perm, $rolePerm) ? 'checked' : '' ?>>
                                                            <?php } ?>
                                                            <input type="checkbox" name="<?= $row->name; ?>[]" value="<?= $perm ?>" <?= in_array($perm, $rolePerm) ? 'checked' : '' ?> <?= $role->permission->is_super_admin === '1' ? 'disabled' : '' ?>>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        <?php
                                        } ?>
                                    </tbody>
                                    <tr>
                                        <th>Module</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/roles/detail.js?v=3'); ?>" defer></script>
<?php app_end(); ?>
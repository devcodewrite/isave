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
                <div>Role Form
                    <div class="page-title-subheading">Fill in this form to register or update an role.</div>
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
        <div class="col-md-8">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Role Form</h5>
                    <form class="editRoleForm" method="post" action="<?= isset($role)?site_url('roles/update'.$role->id):site_url('roles/store') ?>" data-redirect-url="<?= site_url('roles') ?>">
                        <div class="form-group">
                            <label for="firstname">Label</label>
                            <div>
                                <input type="text" class="form-control" name="label" placeholder="Enter label" required />
                            </div>
                        </div>
                        <div class="form-group">
                        <?php if (isset($role)) { ?>
                        <a href="<?= site_url('roles/' . $role->id) ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                    <?php } else { ?>
                        <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                        <button type="submit" class="btn btn-primary text-uppercase">Create Role</button>
                    <?php } ?>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/roles/edit.js?v=5') ?>" defer></script>
<?php app_end(); ?>
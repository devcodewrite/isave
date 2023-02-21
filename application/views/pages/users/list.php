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
                <div>List Users
                    <div class="page-title-subheading">Table of users and their details.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>User Table Filter

            <div class="btn-actions-pane-right actions-icon-btn">
                <a href="<?= site_url('users/create') ?>" class="btn btn-primary text-uppercase">
                    <i class="pe-7s-plus btn-icon-wrapper"></i>
                    New User
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
            <table style="width: 100%;" id="dt-users" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created On</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
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
<script src="<?= base_url('assets/js/users/list.js?v=2') ?>" defer></script>
<?php app_end(); ?>
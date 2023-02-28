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
                <div>User Details
                    <div class="page-title-subheading">User details.</div>
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
                                <div class="widget-number">User</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-book"></i>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-3" class="nav-link">
                                <div class="widget-number">Associations</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    Assigned associations
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
                                        <p class="col-12 text-black-50">User ID: <span class="text-primary"><?= $role->id ?></span> </p>
                                        <p class="col-12">
                                            <?php
                                            $alerts = [
                                                'open' => 'alert-success',
                                                'close' => 'alert-danger'
                                            ];
                                            ?>
                                            <span class="alert <?= $alerts[$role->rstatus] ?> text-uppercase float-right">
                                                <?= $role->rstatus ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Full Name</p>
                                        <p class="col-6 input-placeholder text-black">
                                            <?= $role->firstname ?> <?= $role->lastname ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Sex</p>
                                        <p class="col-6 input-placeholder text-black">
                                            <?= $role->sex ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Username</p>
                                        <h5 class="col-6 text-info">
                                            <?= $role->rolename ?>
                                        </h5>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Email</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $role->email ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3">
                                        <p class="col-6 text-black-50">Contact</p>
                                        <p class="col-6 input-placeholder text-black">
                                            <a href="tel:<?= $role->phone ?>">
                                                <?= $role->phone ?>
                                            </a>
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
                                        <p class="col-6 text-black-50">User Role</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $role->role?$role->role->label:'' ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Added by</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?php $role = $this->role->find($role->role_id) ?>
                                            <?= $role?"$role->firstname $role->lastname":'' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <button class="btn btn-info btn-lg">Modify</button>
                            <button class="btn btn-warning btn-lg">Close</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
                        <div class="card-body">
                            <table style="width: 100%;" id="dt-related-loans" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>User Number</th>
                                        <th>Amount</th>
                                        <th>Owner</th>
                                        <th>Owner's Phone</th>
                                        <th>Owner's Address</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>User Number</th>
                                        <th>Amount</th>
                                        <th>Owner</th>
                                        <th>Owner's Phone</th>
                                        <th>Owner's Address</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-2" role="tabpanel">
                        <div class="card-body">
                            <table style="width: 100%;" id="dt-related-withdrawals" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Amount</th>
                                        <th>Withdrawn By</th>
                                        <th>Withdrawer's Phone</th>
                                        <th>Withdrawer's Address</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Amount</th>
                                        <th>Withdrawn By</th>
                                        <th>Withdrawer's Phone</th>
                                        <th>Withdrawer's Address</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-eg9-3" role="tabpanel">
                        <div class="card-body">
                            <table style="width: 100%;" id="dt-related-customers" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Sex</th>
                                        <th>Primary Phone</th>
                                        <th>ID Number</th>
                                        <th>Position</th>
                                        <th>Occupation</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Sex</th>
                                        <th>Primary Phone</th>
                                        <th>ID Number</th>
                                        <th>Position</th>
                                        <th>Occupation</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/roles/detail.js?v=1'); ?>" defer></script>
<?php app_end(); ?>
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
                <div>Association Details
                    <div class="page-title-subheading">Association details.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('associations') ?>" class="btn-shadow btn btn-info">
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
                                <div class="widget-number">Association</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-book"></i>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-1" class="nav-link">
                                <div class="widget-number">Loans</div>
                                <div class="tab-subheading">Loan</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-2" class="nav-link">
                                <div class="widget-number">Withdrawals</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    withdrawal
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#tab-eg9-3" class="nav-link">
                                <div class="widget-number">Members</div>
                                <div class="tab-subheading">
                                    <span class="pr-2 opactiy-6">
                                        <i class="fa fa-bullhorn"></i>
                                    </span>
                                    members and leaders
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
                                        <p class="col-12 text-black-50">Association ID: <span class="text-primary"><?= $association->id ?></span> </p>
                                        <p class="col-12">
                                            <?php
                                            $alerts = [
                                                'open' => 'alert-success',
                                                'close' => 'alert-danger'
                                            ];
                                            ?>
                                            <span class="alert <?= $alerts[$association->status] ?> text-uppercase float-right">
                                                <?= $association->status ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Association Name</p>
                                        <h5 class="col-6 text-info">
                                            <?= $association->name ?>
                                        </h5>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Community</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $association->community ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Assigned Person</p>
                                        <p class="col-6 input-placeholder text-black">
                                            <?= $association->assigned_person_name ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3">
                                        <p class="col-6 text-black-50">Contact</p>
                                        <p class="col-6 input-placeholder text-black">
                                            <a href="tel:<?= $association->assigned_person_phone ?>">
                                                <?= $association->assigned_person_phone ?>
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
                                            <?= date('d/m/y', strtotime($association->created_at)) ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Cluster Office Address</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $association->cluster_office_address ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Association Email</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?= $association->email ?>
                                        </p>
                                    </div>
                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Assigned Staff</p>
                                        <p class="col-6 input-placeholder text-primary">
                                            <?php $user = $this->user->find($association->assigned_user_id) ?>
                                            <?= $user ? "$user->firstname $user->lastname" : 'None assigned' ?>
                                        </p>
                                    </div>

                                    <div class="row text-uppercase mt-3 border-bottom">
                                        <p class="col-6 text-black-50">Added by</p>
                                        <p class="col-6 input-placeholder text-blaick">
                                            <?php $user = $this->user->find($association->user_id) ?>
                                            <?= "$user->firstname $user->lastname" ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <a href="<?= site_url('associations/' . $association->id . '/edit') ?>" class="btn btn-info btn-lg">Modify</a>
                            <button class="btn btn-warning btn-lg">Close</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-1" role="tabpanel">
                        <div class="card-body">
                            <div class="row d-none">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="member_id">Search a member</label>
                                    <div>
                                        <select name="member_id" class="form-control select2-members" required>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <table style="width: 100%;" id="dt-related-loans" data-association-id="<?=$association->id ?>" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Request Date</th>
                                        <th>Pas.B No.</th>
                                        <th>Account</th>
                                        <th>Principal Amt.</th>
                                        <th>Interest Amt.</th>
                                        <th>Duration</th>
                                        <th>Rate</th>
                                        <th>Request Status</th>
                                        <th>Disbursement Date</th>
                                        <th>Repay. Date</th>
                                        <th>Repay. Status</th>
                                        <th>Loan Type</th>
                                        <th>Added by</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Request Date</th>
                                        <th>Pas.B No.</th>
                                        <th>Account</th>
                                        <th>Principal Amt.</th>
                                        <th>Interest Amt.</th>
                                        <th>Duration</th>
                                        <th>Rate</th>
                                        <th>Request Status</th>
                                        <th>Disbursement Date</th>
                                        <th>Repay. Date</th>
                                        <th>Repay. Status</th>
                                        <th>Loan Type</th>
                                        <th>Added by</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-2" role="tabpanel">
                        <div class="card-body">
                            <table style="width: 100%;" id="dt-related-withdrawals" data-association-id="<?=$association->id ?>" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Association</th>
                                        <th>Pas.B No.</th>
                                        <th>Account</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Withdrawer's Name</th>
                                        <th>Withdrawer's Phone</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tfoot class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Association</th>
                                        <th>Pas.B No.</th>
                                        <th>Account</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Transferor's Name</th>
                                        <th>Transferor's Phone</th>
                                        <th>Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg9-3" role="tabpanel">
                        <div class="card-body">
                            <table style="width: 100%;" id="dt-related-customers" data-association-id="<?=$association->id ?>" class="table table-hover table-striped table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>#ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Sex</th>
                                        <th>Primary Phone</th>
                                        <th>ID Number</th>
                                        <th>Associations</th>
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
                                        <th>Associations</th>
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
<script src="<?= base_url('assets/js/associations/detail.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
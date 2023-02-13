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
                <div>Customer Details
                    <div class="page-title-subheading"></div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('customers') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Customer Details
                    <div class="btn-actions-pane-right actions-icon-btn">
                        <button class="btn-icon btn-icon-only btn btn-link">
                            <i class="pe-7s-edit btn-icon-wrapper"></i>
                        </button>
                        <div class="btn-group dropdown">
                            <button type="button" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                <i class="pe-7s-menu btn-icon-wrapper"></i>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-shadow dropdown-menu-right dropdown-menu-hover-link dropdown-menu">
                                <h6 tabindex="-1" class="dropdown-header">Actions</h6>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"></i><span>Print</span>
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-book"> </i><span>Modify</span>
                                </button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <div class="p-3 text-right">
                                    <button class="mr-2 btn-shadow btn-sm btn btn-warning">Close</button>
                                    <button class="mr-2 btn-shadow btn-sm btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-5">
                    <div class="text-center">
                        <img id="passport-photo" height="150" width="150" src="<?= empty($member->photo_url) ? base_url('assets/images/photo-placeholder.jpeg') : $member->photo_url; ?>" alt="Passport Photo">
                        <span class="alert alert-success text-uppercase d-absolute float-right">Open</span>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Customer ID</p>
                        <p class="col-6 text-primary"><?= $member->id ?></p>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Full Name</p>
                        <p class="col-6 input-placeholder text-black"><?=$member->firstname ?> <?= $member->othername ?> <?= $member->lastname ?> <?=$member->common_name?"(a.k.a $member->common_name)":'' ?></p>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Sex</p>
                        <p class="col-6 input-placeholder text-black   text-uppercase"><?= $member->sex ?></p>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Primary Phone Number</p>
                        <p class="col-6 input-placeholder text-black  h-5"><?= $member->primary_phone ?></p>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Date of Birth</p>
                        <p class="col-6 input-placeholder text-black"><?= $member->dateofbirth ?></p>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Email</p>
                        <p class="col-6 input-placeholder text-black"><?= $member->email ?></p>
                    </div>

                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Address</p>
                        <p class="col-6 input-placeholder text-primary"><?= $member->address ?></p>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Occupation</p>
                        <p class="col-6 input-placeholder text-black "><?= $member->occupation ?></p>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">Marital Status</p>
                        <p class="col-6 input-placeholder text-black"></p>
                    </div>
                    <div class="row text-uppercase mt-2">
                        <p class="col-6 text-black-50">Other Phone Number</p>
                        <p class="col-6 input-placeholder text-black"><?= $member->other_phone ?></p>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <a href="<?=site_url('customers/'.$member->id.'/edit') ?>" class="btn btn-info btn-lg">Modify</a>
                    <button class="btn btn-warning btn-lg">Close</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Indentity Card Details
                </div>
                <div class="card-body px-5">
                    <?php if (!empty($member->identity_card_url)) { ?>
                        <img height="200" style="object-fit: scale-down;" src="<?= $member->identity_card_url ?>" alt="ID Card Photo">
                    <?php } else { ?>
                        <div style="height: 200px; width:100%;">
                            <?php $this->load->view('templates/svg/id-card'); ?>
                        </div>
                    <?php  }  ?>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">ID Number</p>
                        <p class="col-6 input-placeholder text-black"><?= $member->identity_card_number ?></p>
                    </div>
                    <div class="row text-uppercase mt-2 border-bottom">
                        <p class="col-6 text-black-50">ID Type</p>
                        <p class="col-6 input-placeholder text-black ">
                            <?= $this->member->identityCardType($member->id)->label ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Related Accounts
                </div>
                <div class="card-body px-5">
                    <table style="width: 100%;" id="dt-related-accounts" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr class="text-uppercase">
                                <th>#Acc No.</th>
                                <th>Pas.B</th>
                                <th>Balance</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $alerts = [
                                'open' => 'alert-success',
                                'suspended' => 'alert-warning',
                                'close' => 'alert-danger',
                            ];
                            foreach ($this->member->accounts($member->id) as $key => $row) {
                                $row->accType = $this->acctype->find($row->acc_type_id);
                            ?>
                                <tr>
                                    <td><a href="<?= site_url('bankaccounts/' . $row->id) ?>" class="btn btn-link"><?=$row->accType->label ?> (<?= $row->acc_number ?>)</a></td>
                                    <td><?= $row->passbook ?></td>
                                    <td><?= "0.00" ?></td>
                                    <td class="py-1"><span class="alert <?= $alerts[$row->status] ?> text-uppercase"><?= $row->status ?></span></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-uppercase">
                                <th>#Acc No.</th>
                                <th>Pas.B</th>
                                <th>Balance</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/customers/detail.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
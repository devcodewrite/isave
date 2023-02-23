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
                                    <button class="btn btn-danger btn-lg delete" data-url="<?= site_url('customers') ?>" data-id="<?= $member->id ?>">Delete</button>
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
                        <p class="col-6 input-placeholder text-black"><?= $member->firstname ?> <?= $member->othername ?> <?= $member->lastname ?> <?= $member->common_name ? "(a.k.a $member->common_name)" : '' ?></p>
                    </div>
                    <div class="row text-uppercase mt-3 border-bottom">
                        <p class="col-6 text-black-50">Associations</p>
                        <p class="col-6 input-placeholder text-black h-5">
                            <?php foreach ($member->associations as $row) {
                            ?>
                                <a href="<?= site_url('associations/' . $row->id) ?>" class="btn btn-info"><?= $row->name ?></a>
                            <?php
                            } ?>

                        </p>
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
                    <a href="<?= site_url('customers/' . $member->id . '/edit') ?>" class="btn btn-info btn-lg">Modify</a>
                    <button class="btn btn-warning btn-lg">Close</button>
                    <button class="btn btn-danger btn-lg delete" data-url="<?= site_url('customers') ?>" data-id="<?= $member->id ?>">Delete</button>
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
                            <?php $cardType = $this->member->identityCardType($member->id); ?>
                            <?= $cardType ? $cardType->label : '' ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Related Accounts
                    <div class="btn-actions-pane-right">
                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target="#newAccount">
                            New Account
                        </button>
                    </div>
                </div>
                <div class="card-body px-5">
                    <table style="width: 100%;" id="dt-related-accounts" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr class="text-uppercase">
                                <th>#Acc No.</th>
                                <th>Pas.B</th>
                                <th>Association</th>
                                <th>Action</th>
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
                                $row->association = $this->association->find($row->association_id?$row->association_id:0);
                            ?>
                                <tr>
                                    <td><?= $row->accType->label ?> (<?= $row->acc_number ?>)</td>
                                    <td><?= $row->passbook ?></td>
                                    <td><?= $row->association?$row->association->name:""; ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="<?= site_url('bankaccounts/' . $row->id) ?>" class="btn btn-icon"><i class="fa fa-eye"></i></a>
                                            <button data-id="<?= $row->acc_number ?>" class="btn btn-icon edit" data-toggle="modal" data-target="#editAccount"><i class="fa fa-edit"></i></button>
                                        </div>
                                    </td>
                                    <td><?= $this->account->calBalance($row->id) ?><p></p></td>
                                    <td><span class="alert <?= $alerts[$row->status] ?> text-uppercase"><?= $row->status ?></span></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-uppercase">
                                <th>#Acc No.</th>
                                <th>Pas.B</th>
                                <th>Association</th>
                                <th>Action</th>
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
<script src="<?= site_url('assets/js/customers/detail.js?v=8') ?>" defer></script>
<?php app_end(); ?>

<form action="<?= site_url('bankaccounts/store') ?>" class="modal fade" id="newAccount" method="post" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">New Account Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ownership" value="individual">
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="member_id" value="<?= $member->id ?>">
                <div class="form-group">
                    <label>Member's associations</label>
                    <select name="association_id" class="form-control select2-associations" required>
                        <option value=""></option>
                        <?php foreach ($this->member->associations($member->id) as $key => $row) { ?>
                            <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="passbook">Passbook No.</label>
                    <input name="passbook" id="passbook" placeholder="Enter passbook no." type="number" value="<?= isset($account) ? $account->passbook : "" ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Account Name</label>
                    <div>
                        <input type="text" class="form-control" name="name" value="<?= isset($account) ? $account->name : "" ?>" placeholder="Account name" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="acc_type_id">Account type</label>
                            <select name="acc_type_id" class="form-control select2-account-types" required>
                                <option value=""></option>
                                <?php foreach ($accountTypes as $row) { ?>
                                    <option value="<?= $row->id; ?>" <?= isset($account) ? ($account->acc_type_id === $row->id ? 'selected' : '') : '' ?> data-type="<?= $row->type; ?>"><?= $row->label; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stamp_amount">Amount per stamp</label>
                            <div>
                                <input type="number" class="form-control stamps2" name="stamp_amount" placeholder="Enter amount per stamp" <?= isset($account) ? (empty($account->stamp_amount) ? 'disabled' : '') : 'disabled' ?> />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Account</button>
            </div>
        </div>
    </div>
</form>

<form action="<?= site_url('bankaccounts/update') ?>" class="modal fade" id="editAccount" method="post" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Edit Account Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ownership" value="individual">
                <input type="hidden" name="_method" value="post">
                <input type="hidden" name="member_id" value="<?= $member->id ?>">

                <div class="form-group">
                    <label>Member's associations</label>
                    <select name="association_id" class="form-control select2-associations" required>
                        <option value=""></option>
                        <?php foreach ($this->member->associations($member->id) as $key => $row) { ?>
                            <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="passbook">Passbook No.</label>
                    <input name="passbook" id="passbook" placeholder="Enter passbook no." type="number" value="<?= isset($account) ? $account->passbook : "" ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Account Name</label>
                    <div>
                        <input type="text" class="form-control" name="name" value="<?= isset($account) ? $account->name : "" ?>" placeholder="Account name" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="acc_type_id">Account type</label>
                            <select name="acc_type_id" class="form-control select2-account-types" required>
                                <option value=""></option>
                                <?php foreach ($accountTypes as $row) { ?>
                                    <option value="<?= $row->id; ?>" <?= isset($account) ? ($account->acc_type_id === $row->id ? 'selected' : '') : '' ?> data-type="<?= $row->type; ?>"><?= $row->label; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stamp_amount">Amount per stamp</label>
                            <div>
                                <input type="number" class="form-control stamps2" name="stamp_amount" placeholder="Enter amount per stamp" <?= isset($account) ? (empty($account->stamp_amount) ? 'disabled' : '') : 'disabled' ?> />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</form>
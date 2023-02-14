<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="lnr-user text-info"></i>
                </div>
                <div>Customer Registration Form
                    <div class="page-title-subheading">Register a new <?= $this->setting->get('org_name', 'iSave') ?> customer today.</div>
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div id="smartwizard">

                            <ul class="forms-wizard">
                                <li>
                                    <a class="form-step" href="#step-1">
                                        <em>1</em><span>Personal Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="form-step" href="#step-2">
                                        <em>2</em><span>Account Information</span>
                                    </a>
                                </li>
                                <li class="form-step">
                                    <a href="#step-3">
                                        <em>3</em><span>Finish</span>
                                    </a>
                                </li>
                            </ul>
                            <form class="form-wizard-content" action="<?= isset($member) ? site_url('customers/update/' . $member->id) : site_url('customers/store') ?>" data-redirect-url="<?= site_url('customers') ?>">
                                <?php if (isset($member)) { ?>
                                    <input type="hidden" name="_method" value="put">
                                    <input type="hidden" name="id" value="<?= $member->id ?>">
                                <?php } else { ?>
                                    <input type="hidden" name="_method" value="post">
                                <?php } ?>
                                <div id="step-1">
                                    <div class="form-row">
                                        <div class="col-md-2">
                                            <div class="position-relative form-group">
                                                <label for="title">Title</label>
                                                <select name="title" class="form-control">
                                                    <option value="">Select a title</option>
                                                    <option value="Mr." <?= isset($member) ? ($member->title === 'Mr.' ? 'selected' : '') : '' ?>>Mr.</option>
                                                    <option value="Miss" <?= isset($member) ? ($member->title === 'Miss' ? 'selected' : '') : '' ?>>Miss</option>
                                                    <option value="Master" <?= isset($member) ? ($member->title === 'Master' ? 'selected' : '') : '' ?>>Master</option>
                                                    <option value="Mrs." <?= isset($member) ? ($member->title === 'Mrs.' ? 'selected' : '') : '' ?>>Mrs.</option>
                                                    <option value="Dr." <?= isset($member) ? ($member->title === 'Dr.' ? 'selected' : '') : '' ?>>Dr.</option>
                                                    <option value="Prof." <?= isset($member) ? ($member->title === 'Prof.' ? 'selected' : '') : '' ?>>Prof.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="firstname">First name</label>
                                                <input name="firstname" id="firstname" placeholder="Enter the first name" value="<?= isset($member) ? $member->firstname : "" ?>" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="lastname">Last name</label>
                                                <input name="lastname" id="lastname" placeholder="Enter the last name" value="<?= isset($member) ? $member->lastname : "" ?>" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="othername">Other name</label>
                                                <input name="othername" id="othername" placeholder="Enter the other name" value="<?= isset($member) ? $member->othername : "" ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="common_name">Common name</label>
                                                <input name="common_name" id="common_name" placeholder="Enter the common name" value="<?= isset($member) ? $member->common_name : "" ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="position-relative form-group">
                                                <label for="sex">Sex</label>
                                                <select name="sex" class="form-control select2-sex">
                                                    <option value="">Select a sex</option>
                                                    <option value="male" <?= isset($member) ? ($member->sex === 'male' ? 'selected' : '') : '' ?>>Male</option>
                                                    <option value="female" <?= isset($member) ? ($member->sex === 'female' ? 'selected' : '') : '' ?>>Female</option>
                                                    <option value="other" <?= isset($member) ? ($member->sex === 'other' ? 'selected' : '') : '' ?>>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="position-relative form-group">
                                                <label for="marital_status">Marital status</label>
                                                <select name="marital_status" class="form-control select2-marital-status">
                                                    <option value="">Select a status</option>
                                                    <option value="single" <?= isset($member) ? ($member->marital_status === 'single' ? 'selected' : '') : '' ?>>Single</option>
                                                    <option value="married" <?= isset($member) ? ($member->marital_status === 'married' ? 'selected' : '') : '' ?>>Married</option>
                                                    <option value="divorced" <?= isset($member) ? ($member->marital_status === 'divorced' ? 'selected' : '') : '' ?>>Divorced</option>
                                                    <option value="widowed" <?= isset($member) ? ($member->marital_status === 'widowed' ? 'selected' : '') : '' ?>>Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="education">Education level</label>
                                                <select name="education" class="form-control select2-educations">
                                                    <option value="">Select an education level</option>
                                                    <option value="none" <?= isset($member) ? ($member->education === 'primary' ? 'selected' : '') : '' ?>>None</option>
                                                    <option value="primary" <?= isset($member) ? ($member->education === 'primary' ? 'selected' : '') : '' ?>>Primary School</option>
                                                    <option value="jhs" <?= isset($member) ? ($member->education === 'jhs' ? 'selected' : '') : '' ?>>Junior High School (JHS)</option>
                                                    <option value="shs" <?= isset($member) ? ($member->education === 'shs' ? 'selected' : '') : '' ?>>Senior High School (SHS)</option>
                                                    <option value="tertiary" <?= isset($member) ? ($member->education === 'tertiary' ? 'selected' : '') : '' ?>>Tertiary Education</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="primary_phone">Primary Phone</label>
                                                <input name="primary_phone" placeholder="Ether the phone number" value="<?= isset($member) ? $member->primary_phone : "" ?>" type="tel" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="other_phone">Other Phone</label>
                                                <input name="other_phone" placeholder="Ether the phone number" value="<?= isset($member) ? $member->other_phone : "" ?>" type="tel" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="position-relative form-group">
                                                <label for="dateofbirth">Date of birth</label>
                                                <input name="dateofbirth" placeholder="Date of birth" value="<?= isset($member) ? $member->dateofbirth : "" ?>" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <div class="position-relative form-group">
                                                <label for="city">Location/Town/City</label>
                                                <input name="city" id="city" type="text" class="form-control" value="<?= isset($member) ? $member->city : "" ?>" placeholder="Enter a location/town/city">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="position-relative form-group">
                                                <label for="settlement">Settlement</label>
                                                <select name="settlement" class="form-control">
                                                    <option value="">Select a settlement</option>
                                                    <option value="rural" <?= isset($member) ? ($member->settlement === 'rural' ? 'selected' : '') : '' ?>>Rural Area</option>
                                                    <option value="urban" <?= isset($member) ? ($member->settlement === 'urban' ? 'selected' : '') : '' ?>>Urban Area</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="address">House No./GHPost address</label>
                                                <input name="address" placeholder="House no./GHPost, street name" value="<?= isset($member) ? $member->address : "" ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2">
                                    <div id="accordion" class="accordion-wrapper mb-3">
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <span class="form-heading">Account Information<p>Enter the account informations below</p></span>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne" aria-labelledby="headingOne" class="collapse show">
                                                <div class="card-body">
                                                    <div class="form-row text-center">
                                                        <div style="width: 200px;" class="mx-auto">
                                                            <div class="card">
                                                                <img class="photo-placeholder" height="200" width="200" src="<?= isset($member) ? $this->setting->toAvatar($member->photo_url, $member) : base_url('assets/images/no-image.png') ?>" alt="Passport Photo">
                                                            </div>
                                                            <div class="position-relative form-group">
                                                                <input name="photo" id="photo" data-target="photo-placeholder" placeholder="Choose a photo" onchange="readURL(this)" type="file" class="form-control">
                                                                <label for="photo">Passport Photo</label>
                                                            </div>
                                                        </div>
                                                        <div style="width: 400px;" class="mx-auto">
                                                            <div class="card">
                                                                <img class="card-placeholder" height="200" style="object-fit:scale-down" width="auto" src="<?= isset($member) ? ($member->identity_card_url ? $member->identity_card_url : base_url('assets/images/id-card.png')) : base_url('assets/images/id-card.png') ?>" alt="Card Photo">
                                                            </div>
                                                            <div class="position-relative form-group">
                                                                <input name="card" id="card" data-target="card-placeholder" placeholder="Choose a photo" onchange="readURL(this)" type="file" class="form-control">
                                                                <label for="card">ID Card Photo</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php if (!isset($member)) { ?>
                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="passbook">Passbook No.</label>
                                                                    <input name="passbook" id="passbook" placeholder="Enter passbook no." type="number" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group">
                                                                    <label for="name">Account name</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text p-2 text-center" data-toggle="tooltip" title="Use personal info." data-placement="bottom">
                                                                            <input type="checkbox" id="toggle-use-personal-info">
                                                                        </div>
                                                                        <input name="name" id="account-name" placeholder="Enter account name" type="text" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group">
                                                                    <label for="acc_type_id">Default account</label>
                                                                    <select name="acc_type_id" class="form-control select2-account-types" required>
                                                                        <option value=""></option>
                                                                        <?php foreach ($acc_types as $row) { ?>
                                                                            <option value="<?= $row->id; ?>"><?= $row->label; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="associations[]">Association(s)</label>
                                                                <select name="associations[]" class="form-control select2-associations" multiple required>
                                                                    <option value=""></option>
                                                                    <?php
                                                                    if (isset($member))
                                                                        foreach ($this->member->associations($member->id) as $row) { ?>
                                                                        <option value="<?= $row->id; ?>" selected><?= $row->name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="identity_card_type_id">ID card type</label>
                                                                <select name="identity_card_type_id" class="form-control select2-id-card-types">
                                                                    <option value=""></option>
                                                                    <?php foreach ($id_card_types as $row) { ?>
                                                                        <option value="<?= $row->id; ?>" <?= isset($member) ? ($member->identity_card_type_id === $row->id ? 'selected' : '') : '' ?>><?= $row->label; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="identity_card_number">ID card number</label>
                                                                <input name="identity_card_number" id="identity_card_number" value="<?= isset($member) ? $member->identity_card_number : "" ?>" placeholder="Enter id number" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-3">
                                    <div class="no-results">
                                        <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                            <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                            <span class="swal2-success-line-tip"></span>
                                            <span class="swal2-success-line-long"></span>
                                            <div class="swal2-success-ring"></div>
                                            <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                            <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                        </div>
                                        <div class="results-subtitle mt-4">Finished!</div>
                                        <div class="results-title">You arrived at the last form step!</div>
                                        <div class="mt-3 mb-3"></div>
                                        <div class="text-center">
                                            <button class="btn-shadow btn-wide btn btn-success btn-lg">Submit Form</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="divider"></div>
                        <div class="clearfix">
                            <?php if (isset($member)) { ?>
                                <a href="<?= site_url('customers/' . $member->id) ?>" class="btn btn-shadow float-left btn-link">Cancel</a>
                            <?php } else { ?>
                                <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
                            <?php } ?>

                            <button type="button" id="next-btn" class="form-step btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
                            <button type="button" id="prev-btn" class="form-step btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/customers/edit.js?v=3') ?>" defer></script>
<?php app_end(); ?>
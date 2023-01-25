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
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <button type="button" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
                </button>
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
                                    <a href="#step-1">
                                        <em>1</em><span>Personal Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <em>2</em><span>Account Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <em>3</em><span>Finish Wizard</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="form-wizard-content">
                                <form id="step-1" class="editCustomerForm" onvalidate action="" method="post">
                                    <div class="form-row">
                                        <div class="col-md-2">
                                            <div class="position-relative form-group">
                                                <label for="sex">Title</label>
                                                <select name="sex" class="form-control">
                                                    <option value="">Select a title</option>
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Master">Master</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Prof.">Prof.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="firstname">First name</label>
                                                <input name="firstname" id="firstname" placeholder="Enter the first name" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="lastname">Last name</label>
                                                <input name="lastname" id="lastname" placeholder="Enter the last name" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="othername">Other name</label>
                                                <input name="othername" id="othername" placeholder="Enter the other name" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="position-relative form-group">
                                                <label for="sex">Sex</label>
                                                <select name="sex" class="form-control" required>
                                                    <option value="">Select a sex</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="position-relative form-group">
                                                <label for="sex">Marital status</label>
                                                <select name="sex" class="form-control" required>
                                                    <option value="">Select a status</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="widowed">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="primary_phone">Primary Phone</label>
                                                <input name="primary_phone" placeholder="Ether the phone number" type="tel" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="other_phone">Other Phone</label>
                                                <input name="other_phone" placeholder="Ether the phone number" type="tel" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="position-relative form-group">
                                                <label for="dateofbirth">Date of birth</label>
                                                <input name="dateofbirth" placeholder="Date of birth" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="city">City</label>
                                                <input name="city" id="city" type="text" class="form-control" placeholder="Enter a city">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="exampleAddress">Address</label>
                                                <input name="address" placeholder="e.g. CR123, Main Street" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="step-2" method="post" action="">
                                    <div id="accordion" class="accordion-wrapper mb-3">
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <span class="form-heading">Account Information<p>Enter the account informations below</p></span>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne" aria-labelledby="headingOne" class="collapse show">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="name">Account name</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-text p-2 text-center" data-toggle="tooltip" title="Use personal info." data-placement="bottom">
                                                                        <input type="checkbox" id="toggle-use-personal-info">
                                                                    </div>
                                                                    <input name="name" id="account-name" placeholder="Enter account name" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="acc_type_id">Account type</label>
                                                                <select name="acc_type_id" class="form-control select2-account-types" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="identity_card_type_id">ID card type</label>
                                                                <select name="identity_card_type_id" class="form-control select2-id-card-types" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group">
                                                                <label for="identity_card_number">ID card number</label>
                                                                <input name="identity_card_number" id="identity_card_number" placeholder="Enter id number" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                        <div class="results-title">You arrived at the last form wizard step!</div>
                                        <div class="mt-3 mb-3"></div>
                                        <div class="text-center">
                                            <button class="btn-shadow btn-wide btn btn-success btn-lg">Finish</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="clearfix">
                            <button type="button" id="reset-btn" class="btn-shadow float-left btn btn-link">Reset</button>
                            <button type="button" id="next-btn" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
                            <button type="button" id="prev-btn" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/customers/edit.js') ?>" defer></script>
<?php app_end(); ?>
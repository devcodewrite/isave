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
                <div>List Customers
                    <div class="page-title-subheading">Table of customers and their details.</div>
                </div>
            </div>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Filter Table
        </div>
        <div class="card-body px-5">
            <div class="form-row">
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="sex">Sex</label>
                        <select id="sex" name="sex" class="form-control select2 filter" required>
                            <option value=""></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="marital_status">Marital status</label>
                        <select id="marital-status" name="marital_status" class="form-control select2 filter" required>
                            <option value=""></option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="city">Location/Town/City</label>
                        <input name="city" id="city" type="text" class="form-control filter" placeholder="Enter a city">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="settlement">Settlement</label>
                        <select id="settlement" name="settlement" class="form-control select2 filter" required>
                            <option value="">Select a settlement</option>
                            <option value="rural">Rural Area</option>
                            <option value="urban">Urban Area</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="association_id">Association</label>
                        <select name="association_id" class="form-control select2-associations filter" required>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="education">Education level</label>
                        <select id="education" name="education" class="form-control select2 filter" required>
                            <option value="">Select an education level</option>
                            <option value="none">None</option>
                            <option value="primary">Primary School</option>
                            <option value="jhs">Junior High School (JHS)</option>
                            <option value="shs">Senior High School (SHS)</option>
                            <option value="tertiary">Tertiary Education</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
               
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="rstate">Status</label>
                        <select id="rstate" name="rstate" class="form-control select2 filter" required>
                            <option value=""></option>
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
            <div class="d-flex align-items-end row px-3">
                <div>
                    <label for="from">From</label>
                    <div class="form-group">
                        <input type="date" name="date_from" id="date-from" class="form-control">
                    </div>
                </div>
                <div class="ml-3">
                    <label for="from">To</label>
                    <div class="form-group">
                        <input type="date" name="date_to" id="date-to" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3 form-group">
                    <button class="btn btn-primary filter">
                        <i class="fa fa-filter"></i>
                        Filter</button>
                    <button class="btn btn-warning ml-2 filter-clear">
                        <i class="fa fa-times"></i>
                        Clear</button>
                </div>
            </div>
            <table style="width: 100%;" id="dt-customers" class="table table-hover table-striped table-bordered">
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
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/customers/list.js?v=4') ?>" defer></script>
<?php app_end(); ?>
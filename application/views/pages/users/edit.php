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
                <div>User Registration Form
                    <div class="page-title-subheading">Fill in this form to register or update an user.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">User Form</h5>
                    <form class="editUserForm" method="post" action="<?= site_url('users/store') ?>" data-redirect-url="<?= site_url('users') ?>">
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <div>
                                <input type="text" class="form-control" name="firstname" placeholder="Enter firstname" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <div>
                                <input type="text" class="form-control" name="lastname" placeholder="Enter lastname" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <div>
                                <input type="tel" class="form-control" name="phone" placeholder="Enter phone number" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter the email" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter the username" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter the password" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <div>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm password" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary text-uppercase">Sumbit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/users/edit.js?v=4') ?>" defer></script>
<?php app_end(); ?>
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
                <a href="<?= site_url('users') ?>" class="btn-shadow btn btn-info">
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
                    <h5 class="card-title">User Form</h5>
                    <form autocomplete="off" class="editUserForm" method="post" action="<?= isset($user) ? site_url('users/update/' . $user->id) : site_url('users/store') ?>" data-redirect-url="<?= site_url('users') ?>">
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <div>
                                <input type="text" class="form-control" name="firstname" value="<?= isset($user) ? $user->firstname : '' ?>" placeholder="Enter firstname" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <div>
                                <input type="text" class="form-control" name="lastname" value="<?= isset($user) ? $user->lastname : '' ?>" placeholder="Enter lastname" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <div>
                                <input type="tel" class="form-control" name="phone" value="<?= isset($user) ? $user->phone : '' ?>" placeholder="Enter phone number" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div>
                                <input type="email" class="form-control" id="email" name="email" value="<?= isset($user) ? $user->email : '' ?>" placeholder="Enter the email" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <div>
                                <input type="text" class="form-control" id="username" name="username" value="<?= isset($user) ? $user->username : '' ?>" placeholder="Enter the username" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role_id">User Role</label>
                            <div>
                                <select name="role_id" class="form-control select2-role" required>
                                    <option value=""></option>
                                    <?php foreach ($roles as $row) { ?>
                                        <option value="<?= $row->id ?>" <?= isset($user) ? ($row->id === $user->role_id ? 'selected' : '') : '' ?>><?= $row->label ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div>
                                <input autocomplete="off" id="password" type="password" class="form-control" name="password" placeholder="Enter the password" <?isset($user) ? '':'required' ?> />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <div>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm password" <?isset($user) ? '':'required' ?> />
                            </div>
                        </div>
                        <div class="form-group">
                            <?php if (isset($user)) { ?>
                                <a href="<?= site_url('users/' . $user->id) ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                                <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                            <?php } else { ?>
                                <button class="mr-2 btn btn-link btn-sm reset">Cancel</button>
                                <button type="submit" class="btn btn-primary text-uppercase">Create User</button>
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
<script src="<?= base_url('assets/js/users/edit.js?v=5') ?>" defer></script>
<?php app_end(); ?>
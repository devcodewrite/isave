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
                <div>Account Profile Update
                    <div class="page-title-subheading">Update user profile detail.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('account/profile') ?>" class="btn-shadow btn btn-info">
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
                    <h5 class="card-title">Update Your Profile</h5>
                    <form autocomplete="off" class="editUserForm" method="post" action="<?= site_url('account/update') ?>" data-redirect-url="<?= site_url('users') ?>">
                        <div class="form-group">
                            <label for="firstname">First name</label>
                            <div>
                                <input type="text" class="form-control" name="firstname" value="<?= $user->firstname  ?>" placeholder="Enter firstname" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last name</label>
                            <div>
                                <input type="text" class="form-control" name="lastname" value="<?= $user->lastname  ?>" placeholder="Enter lastname" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <div>
                                <input type="tel" class="form-control" name="phone" value="<?= $user->phone  ?>" placeholder="Enter phone number" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user->email  ?>" placeholder="Enter the email" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <div>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $user->username  ?>" placeholder="Enter the username" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div>
                                <input autocomplete="new-password" aria-autocomplete="new-password" id="password" type="password" class="form-control" name="password" placeholder="Enter the password" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <div>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Confirm password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="<?= site_url('account/profile') ?>" class="mr-2 btn btn-link btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary text-uppercase">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <form autocomplete="off" class="card editUserForm" method="post" action="<?= site_url('account/update') ?>" data-redirect-url="<?= site_url('users') ?>">
                <input type="hidden" name="id" value="<?=$user->id ?>">
            <div class="card-header">
                    <h6> Profile Photo</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center">
                        <div class="avatar-icon-wrapper mr-2">
                            <div class="avatar-image">
                                <img class="photo" width="100" src="<?= $this->setting->toAvatar($user->photo_url, $user); ?>" alt="User Photo">
                            </div>
                        </div>
                        <input type="file" onchange="readURL(this)" data-target="photo" name="photo" class="form-control mt-3" required>
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Upload Photo</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/users/edit.js?v=5') ?>" defer></script>
<?php app_end(); ?>
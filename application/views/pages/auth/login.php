<?php app_start(); ?>
<div class="h-100 bg-plum-plate bg-animation">
    <div class="d-flex h-100 justify-content-center align-items-center">
        <div class="mx-auto app-login-box col-md-8">
            <div class="app-logo-inverse mx-auto mb-5"><img height="70" src="<?= base_url('assets/images/logo.png') ?>" alt=""></div>
            <div class="modal-dialog w-100 mx-auto">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="h5 modal-title text-center">
                            <h4 class="mt-2">
                                <div>Welcome back,</div>
                                <span>Please sign in to your account below.</span>
                            </h4>
                        </div>
                        <form class="login-form" action="<?=site_url('auth/login') ?>">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <input name="username" placeholder="Username or phone here..." type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <input name="password" placeholder="Password here..." type="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative form-check">
                                <input name="rememberme" id="exampleCheck" type="checkbox" class="form-check-input">
                                <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer clearfix">
                        <div class="float-left">
                            <a href="<?= site_url('forgot-password') ?>" class="btn-lg btn btn-link">Recover Password</a>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-primary btn-lg login">Login to Dashboard</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center text-white opacity-8 mt-3">Copyright © <?= $this->config->item('app_name') ?> <?= $this->config->item('app_version') ?> <?= $this->config->item('app_version_year') ?></div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/auth/login.js?v=1'); ?>" defer></script>
<?php app_end(); ?>
<?php app_start(); ?>
<div class="h-100 bg-plum-plate bg-animation">
    <div class="d-flex h-100 justify-content-center align-items-center">
        <div class="mx-auto app-login-box col-md-6">
            <div class="app-logo-inverse mx-auto mb-3"></div>
            <div class="modal-dialog w-100">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="h5 modal-title">Forgot your Password?
                            <h6 class="mt-1 mb-0 opacity-8">
                                <span>Use the form below to recover it.</span>
                            </h6>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form class="">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">Email</label>
                                            <input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="divider"></div>
                        <h6 class="mb-0">
                            <a href="<?= site_url() ?>" class="text-primary">Sign in existing account</a>
                        </h6>
                    </div>
                    <div class="modal-footer clearfix">
                        <div class="float-right">
                            <button class="btn btn-primary btn-lg">Recover Password</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center text-white opacity-8 mt-3">Copyright ?? <?= $this->config->item('app_name') ?> <?= $this->config->item('app_version') ?> <?= $this->config->item('app_version_year') ?></div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/auth/forgot-password.js?v=1'); ?>" defer></script>
<?php app_end(); ?>
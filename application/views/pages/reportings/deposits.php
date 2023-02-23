<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-notebook icon-gradient bg-happy-itmeo"></i>
                </div>
                <div>Reporting
                    <div class="page-title-subheading">Reporting Deposit Summary</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= isset($backtourl) ? $backtourl : site_url('deposits') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Go Back
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-user icon-gradient bg-plum-plate"> </i>Letter Print Out
                </div>
                <div class="card-body">
                    <div style="height: 70%; width: 100%;" class="deposit-slip">
                        <div class="m-5">
                            <div class="row">
                                <div class="col-md-12 d-flex items-center justify-content-between">
                                    <img class="float-right" height="80" src="<?= $this->setting->get('org_logo_url', base_url('assets/images/logo.png')) ?>" alt="">

                                    <div class="text-right">
                                        <h5>
                                            <span>OUR REF#: </span>
                                        </h5>
                                        <div class="text-info">Issue Date : <?= date('d/m/y'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 text-uppercase">
                                    <div class="bg-light p-2">
                                        <h5>
                                            <?= $this->setting->get('org_name', 'iSave') ?>
                                        </h5>
                                        <p><?= $this->setting->get('org_address', 'Atonsu, Kumasi') ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h3 style="text-decoration: underline;" class="text-uppercase text-center">From <?= date('d/m/y', strtotime($from)); ?> to <?= date('d/m/y', strtotime($to)); ?></h3>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <table style="width: 100%;" id="dt-deposits" class="table table-hover table-striped table-bordered">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>#ID</th>
                                                <th>Association</th>
                                                <th>Pas.B No.</th>
                                                <th>Account</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Depositor's Name</th>
                                                <th>Depositor's Phone</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tfoot class="text-uppercase">
                                            <tr>
                                                <th>#ID</th>
                                                <th>Association</th>
                                                <th>Pas.B No.</th>
                                                <th>Account</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Depositor's Name</th>
                                                <th>Depositor's Phone</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <p class="text-warning">Report any issue regarding this report to our office or call: <?= $this->setting->get('org_phone', '0246092155'); ?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="btn btn-primary btn-lg print">Print</button>
                    <a href="<?= isset($backtourl) ? $backtourl : site_url('deposits') ?>" class="btn btn-link btn-lg">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<?php app_end(); ?>
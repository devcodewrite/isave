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
                <div>Loan Letter
                    <div class="page-title-subheading">Loan letter print out.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <a href="<?= site_url('loans') ?>" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-arrow-left fa-w-20"></i>
                    </span>
                    Back to List
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
                                            <span>REF#: <?= $loan->id ?></span>
                                        </h5>
                                        <div class="text-info">Passbook No. : <?= $loan->passbook; ?></div>
                                        <div class="text-info">Account No. : <?= $loan->account->acc_number; ?></div>
                                        <div class="text-info">Issue Date : <?= date('d/m/y', strtotime($loan->created_at)); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6 text-uppercase">
                                    <div class="text-primary">From</div>
                                    <div class="bg-light p-2">
                                        <h5>
                                            <?= $this->setting->get('org_name', 'iSave') ?>
                                        </h5>
                                        <p><?= $this->setting->get('org_address', 'Atonsu, Kumasi') ?></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-primary">To</div>
                                    <div class="border p-2">
                                        <?php if ($loan->account->ownership === 'individual') { ?>
                                            <h6 class=" text-uppercase">
                                                <?= "{$loan->owner->title} {$loan->owner->firstname} {$loan->owner->othername} {$loan->owner->lastname}" ?>
                                            </h6>
                                            <div><?= $loan->owner->address ?></div>
                                            <div><?= $loan->owner->city ?></div>
                                            <br>
                                            <div><?= $loan->owner->primary_phone ?></div>
                                            <div><?= $loan->owner->email ?></div>

                                        <?php } ?>

                                    </div>

                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h3 style="text-decoration: underline;" class="text-uppercase text-center">Letter of Advice</h3>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p> <?php if ($loan->account->ownership === 'individual') { ?>
                                            Dear <?= "{$loan->owner->title} {$loan->owner->firstname} {$loan->owner->othername} {$loan->owner->lastname}" ?>,
                                        <?php } ?>
                                    </p>
                                    <p>
                                        Your requested <i class="text-uppercase"><?= $loan->accType->label ?></i> of <b>GHS <?= number_format($loan->principal_amount, 2) ?></b> has been granted for a
                                        period of <b><?= $loan->duration ?> months</b> at an interest rate of <b><?= $loan->rate * 100 ?>% </b> with repayment starting from <b><?= date('l, jS F, Y', strtotime($loan->payin_start_date)) ?></b>
                                        to <b><?= date('l, jS F, Y', strtotime($loan->payin_start_date . " + $loan->duration month",)) ?></b>.
                                    </p>
                                    <h5>Repayment Terms</h5>
                                    <p class="text-black-50 text-uppercase">Intreset Calaculations for <?= str_replace('_', ' ', $loan->accType->rate_type) ?> in <?=$loan->duration*4 ?> weeks</p>
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Repayment Date</th>
                                            <th>Principal Amount</th>
                                            <th>Interest Amount</th>
                                            <th>Total Repayment</th>
                                        </thead>
                                        <tbody>
                                            <?php 

                                            $interestTotal = 0;
                                            $totalRepayment = 0;
                                            
                                            for ($i = 0; $i < $loan->duration*4; $i++) { ?>
                                                <tr>
                                                    <td><?= date('D, jS M, Y', strtotime($loan->payin_start_date . " + $i week")) ?></td>
                                                    <td><?= number_format($this->loan->calcPrincipal($loan), 2) ?></td>
                                                    <?php if ($loan->accType->rate_type === 'flat_rate') { 
                                                         $interest = $this->loan->calcFlatInterest($loan, $i);
                                                         $interestTotal += $interest;
                                                         $totalAmount = $this->loan->calcPrincipal($loan)+$interest;
                                                         $totalRepayment += $totalAmount;
                                                        ?>
                                                        <td><?= number_format($interest, 2) ?></td>
                                                        <tdh<?= number_format($totalAmount, 2) ?></th>
                                                    <?php } else {
                                                        $interest = $this->loan->calcReduceInterest($loan, $i);
                                                        $interestTotal += $interest;
                                                        $totalAmount = $this->loan->calcPrincipal($loan)+$interest;
                                                        $totalRepayment += $totalAmount;
                                                         ?>
                                                        <td><?= number_format($interest, 2) ?></td>
                                                        <th><?= number_format($totalAmount, 2) ?></th>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <th>Total (GHS)</th>
                                            <th><?=number_format($loan->principal_amount,2) ?></th>
                                            <th><?=number_format($interestTotal,2) ?></th>
                                            <th><?=number_format($totalRepayment,2) ?></th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <p class="text-warning">Report any issue regarding the loan our office or call: <?= $this->setting->get('org_phone', '0246092155'); ?>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="btn btn-primary btn-lg print">Print</button>
                    <a href="<?=site_url('loans/'.$loan->id) ?>" class="btn btn-link btn-lg">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/loans/letter.js?v=' . uniqid()); ?>" defer></script>
<?php app_end(); ?>
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
                <div>Loan Form
                    <div class="page-title-subheading">Fill in this form to register or update an.</div>
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
        <div class="col-md-5">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <i class="header-icon lnr-exit-up icon-gradient bg-plum-plate"> </i>Loan Request

                </div>
                <div class="card-body px-5">
                    <form action="">
                        <div class="form-row mb-3">
                            <div class="col-md-12 border-bottom pb-2">
                                <div class="form-group">
                                    <label for="search-loan-account">Loan ID</label>
                                    <div class="input-group">
                                        <input type="text" name="account_number" id="account_number" class="form-control border-rounded" placeholder="Enter the account number" required>
                                        <button class="ml-2 btn-icon btn-pill btn btn-outline-primary">
                                            <i class="pe-7s-search btn-icon-wrapper"> </i>Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Schedule Date</label>
                                    <input type="date" name="paid_at" id="amount" class="form-control" required>
                                </div>
                            </div>
                        </div>
                      
                    </form>
                </div>
                <div class="d-block text-right card-footer">
                    <button class="mr-2 btn btn-link btn-sm">Cancel</button>
                    <button class="btn btn-success btn-lg">Save Changes</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
        <div class="main-card mb-3 card">
        <div class="card-body">
            <table style="width: 100%;" id="dt-payouts" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>From Acc.</th>
                        <th>To Acc.</th>
                        <th>Amount</th>
                        <th>Schedule Date</th>
                        <th>Owner</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>From Acc.</th>
                        <th>To Acc.</th>
                        <th>Amount</th>
                        <th>Schedule Date</th>
                        <th>Owner</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/loans/payout.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
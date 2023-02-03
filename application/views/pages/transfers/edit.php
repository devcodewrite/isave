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
                <div>Transfer Form
                    <div class="page-title-subheading">Fill in this form to make an internal transfer.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>

            </div>
        </div>
    </div>

    <div class="main-card mb-3 card col-md-8">
        <div class="card-header">
            <i class="header-icon lnr-laptop-phone icon-gradient bg-plum-plate"> </i>Internal Transfer
        </div>
        <div class="card-body">
            <div class="form-row pb-3 border-bottom">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>From Passbook NO.</label>
                        <select name="from_passbook" id="passbook" class="form-control select2-passbooks">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>From Account</label>
                        <select name="from_account_id" id="account_id" class="form-control select2-accounts">
                            <option value=""></option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter the amount" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="amount">Transfer Note</label>
                      <textarea name="note" id="" rows="2" class="form-control" placeholder="State the reason here...."></textarea>
                    </div>
                </div>
            </div>
            <div class="form-row my-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>To Passbook NO.</label>
                        <select name="to_passbook" class="form-control select2-to-passbooks">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>To Account</label>
                        <select name="to_account_id" class="form-control select2-to-accounts">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block text-right card-footer">
            <button class="mr-2 btn btn-warning btn-sm">Cancel</button>
            <button class="btn btn-success btn-lg">Transfer</button>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= site_url('assets/js/transfers/edit.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
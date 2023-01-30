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
                <div>Association Registration Form
                    <div class="page-title-subheading">Fill in this form to register or update an association.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>

            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Association Form</h5>
            <form id="associationForm" class="col-md-10 mx-auto" method="post" action="#">
                <div class="form-group">
                    <label for="firstname">Name</label>
                    <div>
                        <input type="text" class="form-control" name="name" placeholder="Name" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="community">Community</label>
                    <div>
                        <input type="text" class="form-control" list="communityOptions" id="community" name="community" placeholder="Enter the community or select one" />
                        <datalist id="communityOptions">
                            <?php foreach ($communities as $row) { ?>
                                <option value="<?=$row->community ?>">
                                <?php } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Cluster office address</label>
                    <div>
                        <input type="text" class="form-control" id="cluster_office_address" list="clusterOfficeOptions" name="cluster_office_address" placeholder="Enter the address" />
                        <datalist id="clusterOfficeOptions">
                            <?php foreach ($clusterOfficeAddresses as $row) { ?>
                                <option value="<?=$row->cluster_office_address ?>">
                            <?php } ?>
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter an official email" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Assigned person's fullname</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="assigned_person_name" placeholder="Enter the officer's name" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Assigned person's contact</label>
                    <div>
                        <input type="tel" class="form-control" id="phone" name="assigned_person_phone" placeholder="Enter the officer's phone number" />
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary text-uppercase">Sumbit form</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<?php app_end(); ?>
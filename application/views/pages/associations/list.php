<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                </div>
                <div>List Associations
                    <div class="page-title-subheading">Table of associations and their details.</div>
                </div>
            </div>

        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Filter Table
        </div>
        <div class="card-body px-5">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Cluster office address</label>
                        <div>
                            <input type="text" class="form-control" id="cluster_office_address" list="clusterOfficeOptions" name="cluster_office_address" placeholder="Enter the address" />
                            <datalist id="clusterOfficeOptions">
                                <?php foreach ($clusterOfficeAddresses as $row) { ?>
                                    <option value="<?= $row->cluster_office_address ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="community">Community</label>
                        <div>
                            <input type="text" class="form-control" list="communityOptions" id="community" name="community" placeholder="Enter the community or select one" />
                            <datalist id="communityOptions">
                                <?php foreach ($communities as $row) { ?>
                                    <option value="<?= $row->community ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="status">Assigned User</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select a user</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select a status</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table style="width: 100%;" id="dt-associations" class="table table-hover table-striped table-bordered">
                <thead class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Community</th>
                        <th>Cluster Office</th>
                        <th>Assigned To</th>
                        <th>Total Members</th>
                        <th>Status</th>
                        <th>Created On</th>
                    </tr>
                </thead>

                <tfoot class="text-uppercase">
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Community</th>
                        <th>Cluster Office</th>
                        <th>Assigned To</th>
                        <th>Total Members</th>
                        <th>Status</th>
                        <th>Created On</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<script src="<?= base_url('assets/js/associations/list.js?v=' . uniqid()) ?>" defer></script>
<?php app_end(); ?>
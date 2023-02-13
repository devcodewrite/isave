<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<?php
$user = auth()->user();
$role = $user ? $this->role->find($user->role_id) : null;
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-science icon-gradient bg-happy-itmeo"></i>
                </div>
                <div>Profile
                    <div class="page-title-subheading">Update profiles.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span> Inbox</span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span> Book</span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span> Picture</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span> File Disabled</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="card-shadow-primary profile-responsive card-border mb-3 card">
                <div class="dropdown-menu-header">
                    <div class="dropdown-menu-header-inner bg-danger">
                        <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract1.jpg')"></div>
                        <div class="menu-header-content btn-pane-right">
                            <div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
                                <div class="avatar-icon">
                                    <img src="<?= $this->setting->toAvatar($user->photo_url, $user); ?>" alt="User Photo">
                                </div>
                            </div>
                            <div>
                                <h5 class="menu-header-title"><?= $user->firstname ?> <?= $user->lastname ?></h5>
                                <h6 class="menu-header-subtitle"><?= $role ? $role->label : '' ?></h6>
                            </div>
                            <div class="menu-header-btn-pane">
                                <button class="btn-icon mr-2 btn-icon-only btn btn-warning btn-sm">
                                    <i class="pe-7s-config btn-icon-wrapper"></i>
                                </button>
                                <button class="btn-icon btn btn-success btn-sm">View Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading text-uppercase">Username</div>
                                    <div class="widget-subheading"><?= $user ? $user->username : '' ?> </div>
                                </div>
                                <div class="widget-content-right">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading text-uppercase">First name</div>
                                    <div class="widget-subheading"><?= $user ? $user->firstname : '' ?> </div>
                                </div>
                                <div class="widget-content-right">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading text-uppercase">Last name</div>
                                    <div class="widget-subheading"><?= $user ? $user->lastname : '' ?> </div>
                                </div>
                                <div class="widget-content-right">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading text-uppercase">Email</div>
                                    <div class="widget-subheading"><?= $user ? $user->email :'' ?> </div>
                                </div>
                                <div class="widget-content-right">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading text-uppercase">Phone number</div>
                                    <div class="widget-subheading"><?= $user ? $user->phone : '' ?> </div>
                                </div>
                                <div class="widget-content-right">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<?php app_footer() ?>
<?php page_end() ?>
<?php app_end(); ?>
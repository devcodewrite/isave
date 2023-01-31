<?php app_start(); ?>
<?php app_header() ?>
<?php page_start() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-news-paper icon-gradient bg-grow-early"></i>
                </div>
                <div>Toggle Switch
                    <div class="page-title-subheading">Instead of regular checkboxes, use these toggle widgets for a better UX.</div>
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
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Basic</h5>
                    <input id="chkToggle1" type="checkbox" data-toggle="toggle" checked>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Colors</h5>
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary">
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="secondary">
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="danger">
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="warning">
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="info">
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="light">
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="dark">
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Color Mix</h5>
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="warning" data-offstyle="info">
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Custom Content</h5>
                    <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
                    <input type="checkbox" checked data-toggle="toggle" data-on="<i class='fa fa-play'></i>" data-off="<i class='fa fa-pause'></i>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Sizing</h5>
                    <input type="checkbox" checked data-toggle="toggle" data-size="normal">
                    <input type="checkbox" checked data-toggle="toggle" data-size="small">
                    <input type="checkbox" checked data-toggle="toggle" data-size="mini">
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Inline Toggles</h5>
                    <div class="form-check form-check-inline">
                        <input id="inlineCheckbox1" class="form-check-input" type="checkbox" data-toggle="toggle" data-style="mr-1" checked>
                        <label for="inlineCheckbox1" class="form-check-label">Enabled</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="inlineCheckbox2" class="form-check-input" type="checkbox" data-toggle="toggle" data-style="mr-1" disabled>
                        <label for="inlineCheckbox2" class="form-check-label">Disabled</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php app_footer() ?>
<?php page_end() ?>
<?php app_end(); ?>
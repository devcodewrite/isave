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
                                <div>Form Validation
                                    <div class="page-title-subheading">Inline validation is very easy to implement using the Architect Framework.</div>
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
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Bootstrap 4 Form Validation</h5>
                            <form id="signupForm" class="col-md-10 mx-auto" method="post" action="#">
                                <div class="form-group">
                                    <label for="firstname">First name</label>
                                    <div>
                                        <input type="text" class="form-control" name="firstname" placeholder="First name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last name</label>
                                    <div>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <div>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm password</label>
                                    <div>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <div class="form-check">
                                            <input type="checkbox" id="agree" name="agree" value="agree" class="form-check-input" />
                                            <label class="form-check-label">Please agree to our policy</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <?php app_footer() ?>
    <?php page_end() ?>
<?php app_end(); ?>
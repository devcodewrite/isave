<!doctype html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/dashboards-sales.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jan 2023 16:59:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sales Dashboard - Example of a Dashboard page built with Architect.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Example of a Dashboard page built with Architect.">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="main.d810cf0ae7f39f28f336.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-megamenu nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" data-placement="bottom" rel="popover-focus" data-offset="300" data-toggle="popover-custom" class="nav-link">
                                <i class="nav-link-icon pe-7s-gift"> </i> Mega Menu
                                <i class="fa fa-angle-down ml-2 opacity-5"></i>
                            </a>
                            <div class="rm-max-width">
                                <div class="d-none popover-custom-content">
                                    <div class="dropdown-mega-menu">
                                        <div class="grid-menu grid-menu-3col">
                                            <div class="no-gutters row">
                                                <div class="col-sm-6 col-xl-4">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item"> Overview</li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">
                                                                <i class="nav-link-icon lnr-inbox"></i>
                                                                <span> Contacts</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">
                                                                <i class="nav-link-icon lnr-book"></i>
                                                                <span> Incidents</span>
                                                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">
                                                                <i class="nav-link-icon lnr-picture"></i>
                                                                <span> Companies</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a disabled="" href="javascript:void(0);" class="nav-link disabled">
                                                                <i class="nav-link-icon lnr-file-empty"></i>
                                                                <span> Dashboards</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item"> Favourites</li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link"> Reports Conversions </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link"> Quick Start
                                                                <div class="ml-auto badge badge-success">New</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Users &amp; Groups</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Proprieties</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6 col-xl-4">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">Sales &amp; Marketing</li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Queues </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Resource Groups </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Goal Metrics
                                                                <div class="ml-auto badge badge-warning">3</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Campaigns</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="btn-group nav-item">
                            <a class="nav-link" data-toggle="dropdown" aria-expanded="false">
                                <span class="badge badge-pill badge-danger ml-0 mr-2">4</span> Settings
                                <i class="fa fa-angle-down ml-2 opacity-5"></i>
                            </a>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-secondary">
                                        <div class="menu-header-image opacity-5" style="background-image: url('assets/images/dropdown-header/abstract2.jpg');"></div>
                                        <div class="menu-header-content">
                                            <h5 class="menu-header-title">Overview</h5>
                                            <h6 class="menu-header-subtitle">Dropdown menus for everyone</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="scroll-area-xs">
                                    <div class="scrollbar-container">
                                        <h6 tabindex="-1" class="dropdown-header">Key Figures</h6>
                                        <button type="button" tabindex="0" class="dropdown-item">Service Calendar</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Knowledge Base</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Accounts</button>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <button type="button" tabindex="0" class="dropdown-item">Products</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Rollup Queries</button>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider nav-item"></li>
                                    <li class="nav-item-btn nav-item">
                                        <button class="btn-wide btn-shadow btn btn-danger btn-sm">Cancel</button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-item">
                            <a aria-haspopup="true" data-toggle="dropdown" class="nav-link" aria-expanded="false">
                                <i class="nav-link-icon pe-7s-settings"></i> Projects
                                <i class="fa fa-angle-down ml-2 opacity-5"></i>
                            </a>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-rounded dropdown-menu-lg rm-pointers dropdown-menu">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-success">
                                        <div class="menu-header-image opacity-1" style="background-image: url('assets/images/dropdown-header/abstract3.jpg');"></div>
                                        <div class="menu-header-content text-left">
                                            <h5 class="menu-header-title">Overview</h5>
                                            <h6 class="menu-header-subtitle">Unlimited options</h6>
                                            <div class="menu-header-btn-pane">
                                                <button class="mr-2 btn btn-dark btn-sm">Settings</button>
                                                <button class="btn-icon btn-icon-only btn btn-warning btn-sm">
                                                    <i class="pe-7s-config btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"></i>Graphic Design
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"> </i>App Development
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"> </i>Icon Design
                                </button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"></i>Miscellaneous
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <i class="dropdown-icon lnr-file-empty"></i>Frontend Dev
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-dots">
                        <div class="dropdown">
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-primary"></span>
                                    <i class="icon text-primary ion-android-apps"></i>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-plum-plate">
                                        <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract4.jpg');"></div>
                                        <div class="menu-header-content text-white">
                                            <h5 class="menu-header-title">Grid Dashboard</h5>
                                            <h6 class="menu-header-subtitle">Easy grid navigation inside dropdowns</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-menu grid-menu-xl grid-menu-3col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6 col-xl-4">
                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i> Automation
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i class="pe-7s-piggy icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"> </i> Reports
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i class="pe-7s-config icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"> </i> Settings
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i class="pe-7s-browser icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"> </i> Content
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i class="pe-7s-hourglass icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i> Activity
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"> </i> Contacts
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider nav-item"></li>
                                    <li class="nav-item-btn text-center nav-item">
                                        <button class="btn-shadow btn btn-primary btn-sm">Follow-ups</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-danger"></span>
                                    <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
                                    <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header mb-0">
                                    <div class="dropdown-menu-header-inner bg-deep-blue">
                                        <div class="menu-header-image opacity-1" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                        <div class="menu-header-content text-dark">
                                            <h5 class="menu-header-title">Notifications</h5>
                                            <h6 class="menu-header-subtitle">You have <b>21</b> unread messages</h6>
                                        </div>
                                    </div>
                                </div>
                                <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link active" data-toggle="tab" href="#tab-messages-header">
                                            <span>Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" data-toggle="tab" href="#tab-events-header">
                                            <span>Events</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" data-toggle="tab" href="#tab-errors-header">
                                            <span>System Errors</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="p-3">
                                                    <div class="notifications-box">
                                                        <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                            <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">All Hands Meeting</h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Build the production release
                                                                            <span class="badge badge-danger ml-2">NEW</span>
                                                                        </h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Something not important
                                                                            <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/1.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/2.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/3.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/4.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/5.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/9.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/7.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/8.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                    <div class="avatar-icon"><i>+</i></div>
                                                                                </div>
                                                                            </div>
                                                                        </h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">This dot has an info state</h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">All Hands Meeting</h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <p>Yet another one, at <span class="text-success">15:00 PM</span>
                                                                        </p><span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Build the production release
                                                                            <span class="badge badge-danger ml-2">NEW</span>
                                                                        </h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">This dot has a dark state</h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-events-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="p-3">
                                                    <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                    <p>Lorem ipsum dolor sic amet, today at
                                                                        <a href="javascript:void(0);">12:00 PM</a>
                                                                    </p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Build the production release</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                                                        labore et dolore magna elit enim at minim veniam quis nostrud
                                                                    </p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title text-success">Something not important</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                    <p>Lorem ipsum dolor sic amet, today at
                                                                        <a href="javascript:void(0);">12:00 PM</a>
                                                                    </p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Build the production release</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                                                        labore et dolore magna elit enim at minim veniam quis nostrud
                                                                    </p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title text-success">Something not important</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-errors-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="no-results pt-3 pb-0">
                                                    <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                        <span class="swal2-success-line-tip"></span>
                                                        <span class="swal2-success-line-long"></span>
                                                        <div class="swal2-success-ring"></div>
                                                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                    </div>
                                                    <div class="results-subtitle">All caught up!</div>
                                                    <div class="results-title">There are no system errors!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider nav-item"></li>
                                    <li class="nav-item-btn text-center nav-item">
                                        <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">View Latest Changes</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-focus"></span>
                                    <span class="language-icon opacity-8 flag large DE"></span>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner pt-4 pb-4 bg-focus">
                                        <div class="menu-header-image opacity-05" style="background-image: url('assets/images/dropdown-header/city2.jpg');"></div>
                                        <div class="menu-header-content text-center text-white">
                                            <h6 class="menu-header-subtitle mt-0"> Choose Language</h6>
                                        </div>
                                    </div>
                                </div>
                                <h6 tabindex="-1" class="dropdown-header"> Popular Languages</h6>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <span class="mr-3 opacity-8 flag large US"></span> USA
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <span class="mr-3 opacity-8 flag large CH"></span> Switzerland
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <span class="mr-3 opacity-8 flag large FR"></span> France
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <span class="mr-3 opacity-8 flag large ES"></span>Spain
                                </button>
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <h6 tabindex="-1" class="dropdown-header">Others</h6>
                                <button type="button" tabindex="0" class="dropdown-item active">
                                    <span class="mr-3 opacity-8 flag large DE"></span> Germany
                                </button>
                                <button type="button" tabindex="0" class="dropdown-item">
                                    <span class="mr-3 opacity-8 flag large IT"></span> Italy
                                </button>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="p-0 btn btn-link dd-chart-btn">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-success"></span>
                                    <i class="icon text-success ion-ios-analytics"></i>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-premium-dark">
                                        <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract4.jpg');"></div>
                                        <div class="menu-header-content text-white">
                                            <h5 class="menu-header-title">Users Online</h5>
                                            <h6 class="menu-header-subtitle">Recent Account Activity Overview</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-chart">
                                    <div class="widget-chart-content">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-focus"></div>
                                            <i class="lnr-users text-white"></i>
                                        </div>
                                        <div class="widget-numbers">
                                            <span>344k</span>
                                        </div>
                                        <div class="widget-subheading pt-2">
                                            Profile views since last login
                                        </div>
                                        <div class="widget-description text-danger">
                                            <span class="pr-1"><span>176%</span></span>
                                            <i class="fa fa-arrow-left"></i>
                                        </div>
                                    </div>
                                    <div class="widget-chart-wrapper">
                                        <div id="dashboard-sparkline-carousel-3-pop"></div>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider mt-0 nav-item"></li>
                                    <li class="nav-item-btn text-center nav-item">
                                        <button class="btn-shine btn-wide btn-pill btn btn-warning btn-sm">
                                            <i class="fa fa-cog fa-spin mr-2"></i>View Details
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Alina Mcloughlin</div>
                                                                    <div class="widget-subheading opacity-8">A short profile description</div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <button class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-area-xs" style="height: 150px;">
                                                <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">Activity</li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Chat
                                                                <div class="ml-auto badge badge-pill badge-info">8</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Recover Password</a>
                                                        </li>
                                                        <li class="nav-item-header nav-item">My Account
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Settings
                                                                <div class="ml-auto badge badge-success">New</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Messages
                                                                <div class="ml-auto badge badge-warning">512</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Logs</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider mb-0 nav-item"></li>
                                            </ul>
                                            <div class="grid-menu grid-menu-2col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6">
                                                        <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                            <i class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i> Message Inbox
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                            <i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                            <b>Support Tickets</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item">
                                                </li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button class="btn-wide btn btn-primary btn-sm"> Open Messages </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading"> Alina Mclourd </div>
                                    <div class="widget-subheading"> VP People Manager </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-btn-lg">
                        <button type="button" class="hamburger hamburger--elastic open-right-drawer">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Layout Options</h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Header</div>
                                                <div class="widget-subheading">Makes the header top fixed, always visible!</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Sidebar</div>
                                                <div class="widget-subheading">Makes the sidebar left fixed, always visible!</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                    <div class="switch-animate switch-off">
                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Footer</div>
                                                <div class="widget-subheading">Makes the app footer bottom fixed, always visible!</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div> Header Options </div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme</h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light"></div>
                                        <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light"></div>
                                        <div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-light"></div>
                                        <div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-light"></div>
                                        <div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark"></div>
                                        <div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light"></div>
                                        <div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark"></div>
                                        <div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light"></div>
                                        <div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light"></div>
                                        <div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light"></div>
                                        <div class="divider"></div>
                                        <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light"></div>
                                        <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light"></div>
                                        <div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light"></div>
                                        <div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light"></div>
                                        <div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light"></div>
                                        <div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light"></div>
                                        <div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark"></div>
                                        <div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark"></div>
                                        <div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark"></div>
                                        <div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark"></div>
                                        <div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark"></div>
                                        <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark"></div>
                                        <div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark"></div>
                                        <div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light"></div>
                                        <div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark"></div>
                                        <div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light"></div>
                                        <div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light"></div>
                                        <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light"></div>
                                        <div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark"></div>
                                        <div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light"></div>
                                        <div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light"></div>
                                        <div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light"></div>
                                        <div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light"></div>
                                        <div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light"></div>
                                        <div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light"></div>
                                        <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Sidebar Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">

                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme</h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light"></div>
                                        <div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light"></div>
                                        <div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light"></div>
                                        <div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light"></div>
                                        <div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light"></div>
                                        <div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light"></div>
                                        <div class="divider"></div>
                                        <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light"></div>
                                        <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light"></div>
                                        <div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light"></div>
                                        <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light"></div>
                                        <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light"></div>
                                        <div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light"></div>
                                        <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light"></div>
                                        <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light"></div>
                                        <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light"></div>
                                        <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light"></div>
                                        <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark"></div>
                                        <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light"></div>
                                        <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light"></div>
                                        <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light"></div>
                                        <div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light"></div>
                                        <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light"></div>
                                        <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light"></div>
                                        <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light"></div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Main Content Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default</button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">

                                <li class="list-group-item">
                                    <h5 class="pb-2">Page Section Tabs</h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line"> Line</button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow"> Shadow </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="pb-2">Light Color Schemes
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="app-theme-white"> White Theme</button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="app-theme-gray"> Gray Theme</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            <li class="mm-active">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-rocket"></i>Dashboards
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul class="mm-show">
                                    <li>
                                        <a href="index-2.html">
                                            <i class="metismenu-icon"></i>Analytics
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-commerce.html">
                                            <i class="metismenu-icon"></i>Commerce
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-sales.html" class="mm-active">
                                            <i class="metismenu-icon">
                                            </i>Sales
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i> Minimal
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="dashboards-minimal-1.html">
                                                    <i class="metismenu-icon"></i>Variation 1
                                                </a>
                                            </li>
                                            <li>
                                                <a href="dashboards-minimal-2.html">
                                                    <i class="metismenu-icon"></i>Variation 2
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="dashboards-crm.html">
                                            <i class="metismenu-icon"></i> CRM
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-browser"></i>Pages
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="pages-login.html">
                                            <i class="metismenu-icon"></i> Login
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-login-boxed.html">
                                            <i class="metismenu-icon"></i>Login Boxed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-register.html">
                                            <i class="metismenu-icon"></i>Register
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-register-boxed.html">
                                            <i class="metismenu-icon"></i>Register Boxed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-forgot-password.html">
                                            <i class="metismenu-icon"></i>Forgot Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-forgot-password-boxed.html">
                                            <i class="metismenu-icon"></i>Forgot Password Boxed
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-plugin"></i>Applications
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="apps-mailbox.html">
                                            <i class="metismenu-icon"></i>Mailbox
                                        </a>
                                    </li>
                                    <li>
                                        <a href="apps-chat.html">
                                            <i class="metismenu-icon"></i>Chat
                                        </a>
                                    </li>
                                    <li>
                                        <a href="apps-faq-section.html">
                                            <i class="metismenu-icon"></i>FAQ Section
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>Forums
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="apps-forum-list.html">
                                                    <i class="metismenu-icon"></i>Forum Listing
                                                </a>
                                            </li>
                                            <li>
                                                <a href="apps-forum-threads.html">
                                                    <i class="metismenu-icon"></i>Forum Threads
                                                </a>
                                            </li>
                                            <li>
                                                <a href="apps-forum-discussion.html">
                                                    <i class="metismenu-icon"></i>Forum Discussion
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar__heading">UI Components</li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i> Elements
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i> Buttons
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="elements-buttons-standard.html">
                                                    <i class="metismenu-icon"></i>Standard
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-buttons-pills.html">
                                                    <i class="metismenu-icon"></i>Pills
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-buttons-square.html">
                                                    <i class="metismenu-icon"></i>Square
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-buttons-shadow.html">
                                                    <i class="metismenu-icon"></i>Shadow
                                                </a>
                                            </li>
                                            <li>
                                                <a href="elements-buttons-icons.html">
                                                    <i class="metismenu-icon"></i>With Icons
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="elements-dropdowns.html">
                                            <i class="metismenu-icon"></i>Dropdowns
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-icons.html">
                                            <i class="metismenu-icon"></i>Icons
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-badges-labels.html">
                                            <i class="metismenu-icon"></i>Badges
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-cards.html">
                                            <i class="metismenu-icon"></i>Cards
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-loaders.html">
                                            <i class="metismenu-icon"></i>Loading Indicators
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-list-group.html">
                                            <i class="metismenu-icon"></i>List Groups
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-navigation.html">
                                            <i class="metismenu-icon"></i>Navigation Menus
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-timelines.html">
                                            <i class="metismenu-icon"></i>Timeline
                                        </a>
                                    </li>
                                    <li>
                                        <a href="elements-utilities.html">
                                            <i class="metismenu-icon"></i>Utilities
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-car"></i> Components
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="metismenu-icon"></i>Tabs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-accordions.html">
                                            <i class="metismenu-icon"></i>Accordions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-notifications.html">
                                            <i class="metismenu-icon"></i>Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-modals.html">
                                            <i class="metismenu-icon"></i>Modals
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-loading-blocks.html">
                                            <i class="metismenu-icon"></i>Loading Blockers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-progress-bar.html">
                                            <i class="metismenu-icon"></i>Progress Bar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tooltips-popovers.html">
                                            <i class="metismenu-icon"> </i>Tooltips &amp; Popovers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-carousel.html">
                                            <i class="metismenu-icon"></i>Carousel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-calendar.html">
                                            <i class="metismenu-icon"></i>Calendar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-pagination.html">
                                            <i class="metismenu-icon"></i>Pagination
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-count-up.html">
                                            <i class="metismenu-icon"></i>Count Up
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-scrollable-elements.html">
                                            <i class="metismenu-icon"></i>Scrollable
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tree-view.html">
                                            <i class="metismenu-icon"></i>Tree View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-maps.html">
                                            <i class="metismenu-icon"></i>Maps
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-ratings.html">
                                            <i class="metismenu-icon"></i>Ratings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-image-crop.html">
                                            <i class="metismenu-icon"></i>Image Crop
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-guided-tours.html">
                                            <i class="metismenu-icon"></i>Guided Tours
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-display2"></i> Tables
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="tables-data-tables.html">
                                            <i class="metismenu-icon"> </i>Data Tables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-regular.html">
                                            <i class="metismenu-icon"></i>Regular Tables
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-grid.html">
                                            <i class="metismenu-icon"></i>Grid Tables
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar__heading">Dashboard Widgets</li>
                            <li>
                                <a href="widgets-chart-boxes.html">
                                    <i class="metismenu-icon pe-7s-graph"></i>Chart Boxes 1
                                </a>
                            </li>
                            <li>
                                <a href="widgets-chart-boxes-2.html">
                                    <i class="metismenu-icon pe-7s-way"></i>Chart Boxes 2
                                </a>
                            </li>
                            <li>
                                <a href="widgets-chart-boxes-3.html">
                                    <i class="metismenu-icon pe-7s-ball"></i>Chart Boxes 3
                                </a>
                            </li>
                            <li>
                                <a href="widgets-profile-boxes.html">
                                    <i class="metismenu-icon pe-7s-id"></i>Profile Boxes
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Forms</li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-light"></i> Elements
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="forms-controls.html">
                                            <i class="metismenu-icon"></i>Controls
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-layouts.html">
                                            <i class="metismenu-icon"></i>Layouts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-validation.html">
                                            <i class="metismenu-icon"></i>Validation
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-wizard.html">
                                            <i class="metismenu-icon"></i>Wizard
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-joy"></i> Widgets
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="forms-datepicker.html">
                                            <i class="metismenu-icon"></i>Datepicker
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-range-slider.html">
                                            <i class="metismenu-icon"></i>Range Slider
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-input-selects.html">
                                            <i class="metismenu-icon"></i>Input Selects
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-toggle-switch.html">
                                            <i class="metismenu-icon"></i>Toggle Switch
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-wysiwyg-editor.html">
                                            <i class="metismenu-icon"></i>WYSIWYG Editor
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-input-mask.html">
                                            <i class="metismenu-icon"></i>Input Mask
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-clipboard.html">
                                            <i class="metismenu-icon"></i>Clipboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-textarea-autosize.html">
                                            <i class="metismenu-icon"></i>Textarea Autosize
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="app-sidebar__heading">Charts</li>
                            <li>
                                <a href="charts-chartjs.html">
                                    <i class="metismenu-icon pe-7s-graph2"></i>ChartJS
                                </a>
                            </li>
                            <li>
                                <a href="charts-apexcharts.html">
                                    <i class="metismenu-icon pe-7s-graph"></i>Apex Charts
                                </a>
                            </li>
                            <li>
                                <a href="charts-sparklines.html">
                                    <i class="metismenu-icon pe-7s-graph1"></i>Chart Sparklines
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-inner-layout">
                        <div class="app-inner-layout__header-boxed p-0">
                            <div class="app-inner-layout__header page-title-icon-rounded text-white bg-premium-dark mb-4">
                                <div class="app-page-title">
                                    <div class="page-title-wrapper">
                                        <div class="page-title-heading">
                                            <div class="page-title-icon"><i class="pe-7s-umbrella icon-gradient bg-sunny-morning"></i></div>
                                            <div>
                                                Sales Dashboard
                                                <div class="page-title-subheading">Example of a Dashboard page built with Architect.</div>
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
                            </div>
                        </div>
                        <div class="container">
                            <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-rounded-lg">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active show" href="javascript:void(0);" aria-selected="true">
                                        <span>Sales</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" href="javascript:void(0);" aria-selected="false">
                                        <span>Activity</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" href="javascript:void(0);" aria-selected="false">
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" href="javascript:void(0);" aria-selected="false">
                                        <span>Accounts</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-4">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                            <i class="header-icon lnr-shirt mr-3 text-muted opacity-6"> </i>
                                            Top Sellers
                                        </div>
                                        <div class="btn-actions-pane-right actions-icon-btn">
                                            <div class="btn-group dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                                    <i class="pe-7s-menu btn-icon-wrapper"></i>
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-inbox"> </i><span>Menus</span>
                                                    </button>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span>
                                                    </button>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-book"> </i><span>Actions</span>
                                                    </button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <div class="p-1 text-right">
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-chart widget-chart2 text-left p-0">
                                        <div class="widget-chat-wrapper-outer">
                                            <div class="widget-chart-content widget-chart-content-lg">
                                                <div class="widget-chart-flex">
                                                    <div class="widget-title opacity-5 text-muted text-uppercase">New accounts since 2018</div>
                                                </div>
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div>
                                                            <span class="opacity-10 text-success pr-2">
                                                                <i class="fa fa-angle-up"></i>
                                                            </span>
                                                            <span>9</span>
                                                            <small class="opacity-5 pl-1">%</small>
                                                        </div>
                                                        <div class="widget-title ml-2 font-size-lg font-weight-normal text-muted">
                                                            <span class="text-danger pl-2">+14% failed</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-chart-wrapper widget-chart-wrapper-xlg opacity-10 m-0">
                                                <div id="dashboard-sparkline-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2 pb-0 card-body">
                                        <h6 class="text-muted text-uppercase font-size-md opacity-9 mb-2 font-weight-normal">Authors</h6>
                                        <div class="scroll-area-md shadow-overflow">
                                            <div class="scrollbar-container">
                                                <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Viktor Martin</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$152</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        <span>752</span>
                                                                        <small class="text-warning pl-2">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Denis Delgado</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$53</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        <span>587</span>
                                                                        <small class="text-danger pl-2">
                                                                            <i class="fa fa-angle-up"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Shawn Galloway</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$239</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        <span>163</span>
                                                                        <small class="text-muted pl-2">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Latisha Allison</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$21</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        653
                                                                        <small class="text-primary pl-2">
                                                                            <i class="fa fa-angle-up"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/5.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Lilly-Mae White</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$381</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small> 629
                                                                        <small class="text-muted pl-2">
                                                                            <i class="fa fa-angle-up"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/8.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Julie Prosser</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$74</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>462
                                                                        <small class="text-muted pl-2">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="border-bottom-0 list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/8.jpg" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Amin Hamer</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$7</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        956
                                                                        <small class="text-success pl-2">
                                                                            <i class="fa fa-angle-up"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-block text-center rm-border card-footer">
                                        <button class="btn btn-primary">
                                            View complete report
                                            <span class="text-white pl-2 opacity-3">
                                                <i class="fa fa-arrow-right"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-4">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                            <i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Best Selling Products
                                        </div>
                                        <div class="btn-actions-pane-right actions-icon-btn">
                                            <div class="btn-group dropdown">
                                                <button data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                                    <i class="pe-7s-menu btn-icon-wrapper"></i></button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-inbox"> </i><span>Menus</span>
                                                    </button>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span>
                                                    </button>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-book"> </i><span>Actions</span>
                                                    </button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <div class="p-1 text-right">
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-chart widget-chart2 text-left p-0">
                                        <div class="widget-chat-wrapper-outer">
                                            <div class="widget-chart-content widget-chart-content-lg">
                                                <div class="widget-chart-flex">
                                                    <div class="widget-title opacity-5 text-muted text-uppercase">Toshiba Laptops
                                                    </div>
                                                </div>
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div>
                                                            <span class="opacity-10 text-warning pr-2">
                                                                <i class="fa fa-dot-circle"></i>
                                                            </span>
                                                            <span>$984</span>
                                                        </div>
                                                        <div class="widget-title ml-2 font-size-lg font-weight-normal text-muted">
                                                            <span class="text-success pl-2">+14</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-chart-wrapper widget-chart-wrapper-xlg opacity-10 m-0">
                                                <div id="dashboard-sparkline-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2 pb-0 card-body">
                                        <h6 class="text-muted text-uppercase font-size-md opacity-9 mb-2 font-weight-normal">Top
                                            Performing</h6>
                                        <div class="scroll-area-md shadow-overflow">
                                            <div class="scrollbar-container">
                                                <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="icon-wrapper m-0">
                                                                        <div class="progress-circle-wrapper">
                                                                            <div class="progress-circle-wrapper">
                                                                                <div class="circle-progress circle-progress-gradient">
                                                                                    <small></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Asus Laptop</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$152</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        <span>752</span>
                                                                        <small class="text-warning pl-2">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="icon-wrapper m-0">
                                                                        <div class="progress-circle-wrapper">
                                                                            <div class="progress-circle-wrapper">
                                                                                <div class="circle-progress circle-progress-danger">
                                                                                    <small></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Dell Inspire</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$53</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        <span>587</span>
                                                                        <small class="text-danger pl-2">
                                                                            <i class="fa fa-angle-up"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="icon-wrapper m-0">
                                                                        <div class="progress-circle-wrapper">
                                                                            <div class="progress-circle-wrapper">
                                                                                <div class="circle-progress circle-progress-primary">
                                                                                    <small></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Lenovo IdeaPad</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$239</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        <span>163</span>
                                                                        <small class="text-muted pl-2">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="icon-wrapper m-0">
                                                                        <div class="progress-circle-wrapper">
                                                                            <div class="progress-circle-wrapper">
                                                                                <div class="circle-progress circle-progress-info">
                                                                                    <small></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Asus Vivobook</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$21</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        653
                                                                        <small class="text-primary pl-2">
                                                                            <i class="fa fa-angle-up"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="icon-wrapper m-0">
                                                                        <div class="progress-circle-wrapper">
                                                                            <div class="progress-circle-wrapper">
                                                                                <div class="circle-progress circle-progress-warning">
                                                                                    <small></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Apple Macbook</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$381</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        629
                                                                        <small class="text-muted pl-2">
                                                                            <i class="fa fa-angle-up"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="icon-wrapper m-0">
                                                                        <div class="progress-circle-wrapper">
                                                                            <div class="progress-circle-wrapper">
                                                                                <div class="circle-progress circle-progress-dark">
                                                                                    <small></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">HP Envy 13"</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$74</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        462
                                                                        <small class="text-muted pl-2">
                                                                            <i class="fa fa-angle-down"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="border-bottom-0 list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="icon-wrapper m-0">
                                                                        <div class="progress-circle-wrapper">
                                                                            <div class="progress-circle-wrapper">
                                                                                <div class="circle-progress circle-progress-alternate">
                                                                                    <small></small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Gaming Laptop HP</div>
                                                                    <div class="widget-subheading mt-1 opacity-10">
                                                                        <div class="badge badge-pill badge-dark">$7</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="fsize-1 text-focus">
                                                                        <small class="opacity-5 pr-1">$</small>
                                                                        956
                                                                        <small class="text-success pl-2">
                                                                            <i class="fa fa-angle-up"></i>
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-block text-center rm-border card-footer">
                                        <button class="btn btn-primary">
                                            View all participants
                                            <span class="text-white pl-2 opacity-3">
                                                <i class="fa fa-arrow-right"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-4">
                                <div class="mb-3 card">
                                    <div class="rm-border pb-0 responsive-center card-header">
                                        <div>
                                            <h5 class="menu-header-title text-capitalize">Portfolio Performance</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-12">
                                            <div class="no-shadow rm-border bg-transparent widget-chart text-left card">
                                                <div class="progress-circle-wrapper">
                                                    <div class="circle-progress circle-progress-gradient-lg">
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <div class="widget-chart-content">
                                                    <div class="widget-subheading">Capital Gains</div>
                                                    <div class="widget-numbers text-success"><span>$563</span></div>
                                                    <div class="widget-description text-focus">
                                                        Increased by
                                                        <span class="text-warning pl-1">
                                                            <i class="fa fa-angle-up"></i>
                                                            <span class="pl-1">7.35%</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-12">
                                            <div class="card no-shadow rm-border bg-transparent widget-chart text-left mt-2">
                                                <div class="progress-circle-wrapper">
                                                    <div class="circle-progress circle-progress-gradient-alt-lg">
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <div class="widget-chart-content">
                                                    <div class="widget-subheading">Withdrawals</div>
                                                    <div class="widget-numbers text-danger"><span>$194</span></div>
                                                    <div class="widget-description opacity-8 text-focus">
                                                        Down by
                                                        <span class="text-success pl-1 pr-1">
                                                            <i class="fa fa-angle-down"></i>
                                                            <span class="pl-1">21.8%</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mx-auto mt-3">
                                        <div role="group" class="btn-group-sm btn-group nav">
                                            <a class="btn-shadow pl-3 pr-3 active btn btn-primary" data-toggle="tab" href="#sales-tab-1">Income</a>
                                            <a class="btn-shadow pr-3 pl-3  btn btn-primary" data-toggle="tab" href="#sales-tab-2">Expenses</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="sales-tab-1">
                                                <div class="text-center">
                                                    <h5 class="menu-header-title">Target Sales</h5>
                                                    <h6 class="menu-header-subtitle opacity-6">Total performance for this month</h6>
                                                </div>
                                                <div id="dashboard-sparklines-primary"></div>
                                            </div>
                                            <div class="tab-pane fade" id="sales-tab-2">
                                                <div class="text-center">
                                                    <h5 class="menu-header-title">Tabbed Content</h5>
                                                    <h6 class="menu-header-subtitle opacity-6">Example of various options built with ArchitectUI</h6>
                                                </div>
                                                <div class="card-hover-shadow-2x widget-chart widget-chart2 bg-premium-dark text-left mt-3 card">
                                                    <div class="widget-chart-content text-white">
                                                        <div class="widget-chart-flex">
                                                            <div class="widget-title">Sales</div>
                                                            <div class="widget-subtitle opacity-7">Monthly Goals</div>
                                                        </div>
                                                        <div class="widget-chart-flex">
                                                            <div class="widget-numbers text-success">
                                                                <small>$</small>
                                                                <span>976</span>
                                                                <small class="opacity-8 pl-2">
                                                                    <i class="fa fa-angle-up"></i>
                                                                </small>
                                                            </div>
                                                            <div class="widget-description ml-auto opacity-7">
                                                                <i class="fa fa-angle-up"></i>
                                                                <span class="pl-1">175%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-success btn-lg">
                                                        <span class="mr-2 opacity-7">
                                                            <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                                        </span>
                                                        <span class="mr-1">View Complete Report</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-8">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                            <i class="header-icon lnr-dice mr-3 text-muted opacity-6"> </i>
                                            Easy Dynamic Tables
                                        </div>
                                        <div class="btn-actions-pane-right actions-icon-btn">
                                            <div class="btn-group dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                                    <i class="pe-7s-menu btn-icon-wrapper"></i>
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-inbox"> </i><span>Menus</span>
                                                    </button>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span>
                                                    </button>
                                                    <button type="button" tabindex="0" class="dropdown-item">
                                                        <i class="dropdown-icon lnr-book"> </i><span>Actions</span>
                                                    </button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <div class="p-3 text-right">
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table style="width: 100%;" id="example2" class="table table-hover table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    <td>$170,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2009/01/12</td>
                                                    <td>$86,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Cedric Kelly</td>
                                                    <td>Senior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2012/03/29</td>
                                                    <td>$433,060</td>
                                                </tr>
                                                <tr>
                                                    <td>Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>
                                                    <td>$162,700</td>
                                                </tr>
                                                <tr>
                                                    <td>Brielle Williamson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2012/12/02</td>
                                                    <td>$372,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Herrod Chandler</td>
                                                    <td>Sales Assistant</td>
                                                    <td>San Francisco</td>
                                                    <td>59</td>
                                                    <td>2012/08/06</td>
                                                    <td>$137,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Rhona Davidson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>Tokyo</td>
                                                    <td>55</td>
                                                    <td>2010/10/14</td>
                                                    <td>$327,900</td>
                                                </tr>
                                                <tr>
                                                    <td>Colleen Hurst</td>
                                                    <td>Javascript Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>39</td>
                                                    <td>2009/09/15</td>
                                                    <td>$205,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Sonya Frost</td>
                                                    <td>Software Engineer</td>
                                                    <td>Edinburgh</td>
                                                    <td>23</td>
                                                    <td>2008/12/13</td>
                                                    <td>$103,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Jena Gaines</td>
                                                    <td>Office Manager</td>
                                                    <td>London</td>
                                                    <td>30</td>
                                                    <td>2008/12/19</td>
                                                    <td>$90,560</td>
                                                </tr>
                                                <tr>
                                                    <td>Quinn Flynn</td>
                                                    <td>Support Lead</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2013/03/03</td>
                                                    <td>$342,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Charde Marshall</td>
                                                    <td>Regional Director</td>
                                                    <td>San Francisco</td>
                                                    <td>36</td>
                                                    <td>2008/10/16</td>
                                                    <td>$470,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Haley Kennedy</td>
                                                    <td>Senior Marketing Designer</td>
                                                    <td>London</td>
                                                    <td>43</td>
                                                    <td>2012/12/18</td>
                                                    <td>$313,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Tatyana Fitzpatrick</td>
                                                    <td>Regional Director</td>
                                                    <td>London</td>
                                                    <td>19</td>
                                                    <td>2010/03/17</td>
                                                    <td>$385,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Silva</td>
                                                    <td>Marketing Designer</td>
                                                    <td>London</td>
                                                    <td>66</td>
                                                    <td>2012/11/27</td>
                                                    <td>$198,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Paul Byrd</td>
                                                    <td>Chief Financial Officer (CFO)</td>
                                                    <td>New York</td>
                                                    <td>64</td>
                                                    <td>2010/06/09</td>
                                                    <td>$725,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Gloria Little</td>
                                                    <td>Systems Administrator</td>
                                                    <td>New York</td>
                                                    <td>59</td>
                                                    <td>2009/04/10</td>
                                                    <td>$237,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Bradley Greer</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>41</td>
                                                    <td>2012/10/13</td>
                                                    <td>$132,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Dai Rios</td>
                                                    <td>Personnel Lead</td>
                                                    <td>Edinburgh</td>
                                                    <td>35</td>
                                                    <td>2012/09/26</td>
                                                    <td>$217,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenette Caldwell</td>
                                                    <td>Development Lead</td>
                                                    <td>New York</td>
                                                    <td>30</td>
                                                    <td>2011/09/03</td>
                                                    <td>$345,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Yuri Berry</td>
                                                    <td>Chief Marketing Officer (CMO)</td>
                                                    <td>New York</td>
                                                    <td>40</td>
                                                    <td>2009/06/25</td>
                                                    <td>$675,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Caesar Vance</td>
                                                    <td>Pre-Sales Support</td>
                                                    <td>New York</td>
                                                    <td>21</td>
                                                    <td>2011/12/12</td>
                                                    <td>$106,450</td>
                                                </tr>
                                                <tr>
                                                    <td>Doris Wilder</td>
                                                    <td>Sales Assistant</td>
                                                    <td>Sidney</td>
                                                    <td>23</td>
                                                    <td>2010/09/20</td>
                                                    <td>$85,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Angelica Ramos</td>
                                                    <td>Chief Executive Officer (CEO)</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2009/10/09</td>
                                                    <td>$1,200,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Gavin Joyce</td>
                                                    <td>Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>42</td>
                                                    <td>2010/12/22</td>
                                                    <td>$92,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer Chang</td>
                                                    <td>Regional Director</td>
                                                    <td>Singapore</td>
                                                    <td>28</td>
                                                    <td>2010/11/14</td>
                                                    <td>$357,650</td>
                                                </tr>
                                                <tr>
                                                    <td>Brenden Wagner</td>
                                                    <td>Software Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>28</td>
                                                    <td>2011/06/07</td>
                                                    <td>$206,850</td>
                                                </tr>
                                                <tr>
                                                    <td>Fiona Green</td>
                                                    <td>Chief Operating Officer (COO)</td>
                                                    <td>San Francisco</td>
                                                    <td>48</td>
                                                    <td>2010/03/11</td>
                                                    <td>$850,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Shou Itou</td>
                                                    <td>Regional Marketing</td>
                                                    <td>Tokyo</td>
                                                    <td>20</td>
                                                    <td>2011/08/14</td>
                                                    <td>$163,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michelle House</td>
                                                    <td>Integration Specialist</td>
                                                    <td>Sidney</td>
                                                    <td>37</td>
                                                    <td>2011/06/02</td>
                                                    <td>$95,400</td>
                                                </tr>
                                                <tr>
                                                    <td>Suki Burks</td>
                                                    <td>Developer</td>
                                                    <td>London</td>
                                                    <td>53</td>
                                                    <td>2009/10/22</td>
                                                    <td>$114,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Prescott Bartlett</td>
                                                    <td>Technical Author</td>
                                                    <td>London</td>
                                                    <td>27</td>
                                                    <td>2011/05/07</td>
                                                    <td>$145,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Gavin Cortez</td>
                                                    <td>Team Leader</td>
                                                    <td>San Francisco</td>
                                                    <td>22</td>
                                                    <td>2008/10/26</td>
                                                    <td>$235,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Martena Mccray</td>
                                                    <td>Post-Sales support</td>
                                                    <td>Edinburgh</td>
                                                    <td>46</td>
                                                    <td>2011/03/09</td>
                                                    <td>$324,050</td>
                                                </tr>
                                                <tr>
                                                    <td>Unity Butler</td>
                                                    <td>Marketing Designer</td>
                                                    <td>San Francisco</td>
                                                    <td>47</td>
                                                    <td>2009/12/09</td>
                                                    <td>$85,675</td>
                                                </tr>
                                                <tr>
                                                    <td>Howard Hatfield</td>
                                                    <td>Office Manager</td>
                                                    <td>San Francisco</td>
                                                    <td>51</td>
                                                    <td>2008/12/16</td>
                                                    <td>$164,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Hope Fuentes</td>
                                                    <td>Secretary</td>
                                                    <td>San Francisco</td>
                                                    <td>41</td>
                                                    <td>2010/02/12</td>
                                                    <td>$109,850</td>
                                                </tr>
                                                <tr>
                                                    <td>Vivian Harrell</td>
                                                    <td>Financial Controller</td>
                                                    <td>San Francisco</td>
                                                    <td>62</td>
                                                    <td>2009/02/14</td>
                                                    <td>$452,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Timothy Mooney</td>
                                                    <td>Office Manager</td>
                                                    <td>London</td>
                                                    <td>37</td>
                                                    <td>2008/12/11</td>
                                                    <td>$136,200</td>
                                                </tr>
                                                <tr>
                                                    <td>Jackson Bradshaw</td>
                                                    <td>Director</td>
                                                    <td>New York</td>
                                                    <td>65</td>
                                                    <td>2008/09/26</td>
                                                    <td>$645,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Olivia Liang</td>
                                                    <td>Support Engineer</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2011/02/03</td>
                                                    <td>$234,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Bruno Nash</td>
                                                    <td>Software Engineer</td>
                                                    <td>London</td>
                                                    <td>38</td>
                                                    <td>2011/05/03</td>
                                                    <td>$163,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Sakura Yamamoto</td>
                                                    <td>Support Engineer</td>
                                                    <td>Tokyo</td>
                                                    <td>37</td>
                                                    <td>2009/08/19</td>
                                                    <td>$139,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Thor Walton</td>
                                                    <td>Developer</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2013/08/11</td>
                                                    <td>$98,540</td>
                                                </tr>
                                                <tr>
                                                    <td>Finn Camacho</td>
                                                    <td>Support Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>47</td>
                                                    <td>2009/07/07</td>
                                                    <td>$87,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Serge Baldwin</td>
                                                    <td>Data Coordinator</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>2012/04/09</td>
                                                    <td>$138,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Zenaida Frank</td>
                                                    <td>Software Engineer</td>
                                                    <td>New York</td>
                                                    <td>63</td>
                                                    <td>2010/01/04</td>
                                                    <td>$125,250</td>
                                                </tr>
                                                <tr>
                                                    <td>Zorita Serrano</td>
                                                    <td>Software Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>56</td>
                                                    <td>2012/06/01</td>
                                                    <td>$115,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer Acosta</td>
                                                    <td>Junior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>43</td>
                                                    <td>2013/02/01</td>
                                                    <td>$75,650</td>
                                                </tr>
                                                <tr>
                                                    <td>Cara Stevens</td>
                                                    <td>Sales Assistant</td>
                                                    <td>New York</td>
                                                    <td>46</td>
                                                    <td>2011/12/06</td>
                                                    <td>$145,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Hermione Butler</td>
                                                    <td>Regional Director</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2011/03/21</td>
                                                    <td>$356,250</td>
                                                </tr>
                                                <tr>
                                                    <td>Lael Greer</td>
                                                    <td>Systems Administrator</td>
                                                    <td>London</td>
                                                    <td>21</td>
                                                    <td>2009/02/27</td>
                                                    <td>$103,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Jonas Alexander</td>
                                                    <td>Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>30</td>
                                                    <td>2010/07/14</td>
                                                    <td>$86,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Shad Decker</td>
                                                    <td>Regional Director</td>
                                                    <td>Edinburgh</td>
                                                    <td>51</td>
                                                    <td>2008/11/13</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Javascript Developer</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>2011/06/27</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Customer Support</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>2011/01/25</td>
                                                    <td>$112,000</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                            <i class="header-icon lnr-cloud-download icon-gradient bg-happy-itmeo"> </i>
                                            Technical Support
                                        </div>
                                    </div>
                                    <div class="p-0 card-body">
                                        <div class="dropdown-menu-header mt-0 mb-0">
                                            <div class="dropdown-menu-header-inner bg-heavy-rain">
                                                <div class="menu-header-image opacity-1" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                <div class="menu-header-content text-dark">
                                                    <h5 class="menu-header-title">Notifications</h5>
                                                    <h6 class="menu-header-subtitle">
                                                        You have
                                                        <b class="text-danger">21 </b>
                                                        unread messages
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#tab-animated-0">
                                                    <span>Messages</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#tab-animated-1">
                                                    <span>Events</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#tab-animated-2">
                                                    <span>System Errors</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-animated-0" role="tabpanel">
                                                <div class="scroll-area-sm">
                                                    <div class="scrollbar-container">
                                                        <div class="p-3">
                                                            <div class="notifications-box">
                                                                <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                                    <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <p> Yet another one, at<span class="text-success">15:00 PM</span></p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                        <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the production
                                                                                    release
                                                                                    <span class="badge badge-danger ml-2">NEW</span>
                                                                                </h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Something not important
                                                                                    <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                            <div class="avatar-icon">
                                                                                                <img src="assets/images/avatars/1.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                            <div class="avatar-icon">
                                                                                                <imgsrc="assets images avatars 2.jpg"alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                            <div class="avatar-icon">
                                                                                                <img src="assets/images/avatars/3.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                            <div class="avatar-icon">
                                                                                                <img src="assets/images/avatars/4.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                            <div class="avatar-icon">
                                                                                                <img src="assets/images/avatars/5.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                            <div class="avatar-icon">
                                                                                                <img src="assets/images/avatars/9.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                            <div class="avatar-icon">
                                                                                                <img src="assets/images/avatars/7.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                            <div class="avatar-icon">
                                                                                                <img src="assets/images/avatars/8.jpg" alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                            <div class="avatar-icon"><i>+</i></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">This dot has an info state</h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the production release
                                                                                    <span class="badge badge-danger ml-2">NEW</span>
                                                                                </h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">This dot has a dark state</h4>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab-animated-1" role="tabpanel">
                                                <div class="scroll-area-sm">
                                                    <div class="scrollbar-container">
                                                        <div class="p-3">
                                                            <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                                        </span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">All Hands Meeting</h4>
                                                                            <p>Lorem ipsum dolor sic amet, today at
                                                                                <a href="javascript:void(0);">12:00 PM</a>
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                                            <i class="badge badge-dot badge-dot-xl badge-warning"></i>
                                                                        </span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <p>Another meeting today, at
                                                                                <b class="text-danger">12:00 PM</b>
                                                                            </p>
                                                                            <p>Yet another one, at
                                                                                <span class="text-success">15:00 PM</span>
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                                            <i class="badge badge-dot badge-dot-xl badge-danger"></i>
                                                                        </span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">Build the production release</h4>
                                                                            <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                                                incididunt ut labore et dolore magna elit enim at
                                                                                minim veniam quis nostrud
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                                            <i class="badge badge-dot badge-dot-xl badge-primary"></i>
                                                                        </span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title text-success">Something not important</h4>
                                                                            <p>Lorem ipsum dolor sit amit,consectetur elit enim at
                                                                                minim veniam quis nostrud
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                                            <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                                        </span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">All Hands Meeting</h4>
                                                                            <p>Lorem ipsum dolor sic amet, today at
                                                                                <a href="javascript:void(0);">12:00 PM</a>
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                                            <i class="badge badge-dot badge-dot-xl badge-warning"></i>
                                                                        </span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <p>Another meeting today, at
                                                                                <b class="text-danger">12:00 PM</b>
                                                                            </p>
                                                                            <p>Yet another one, at
                                                                                <span class="text-success">15:00 PM</span>
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                                            <i class="badge badge-dot badge-dot-xl badge-danger"></i>
                                                                        </span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title">Build the production release</h4>
                                                                            <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                                                incididunt ut labore et dolore magna elit enim at
                                                                                minim veniam quis nostrud
                                                                            </p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                                    <div>
                                                                        <span class="vertical-timeline-element-icon bounce-in">
                                                                            <i class="badge badge-dot badge-dot-xl badge-primary"></i>
                                                                        </span>
                                                                        <div class="vertical-timeline-element-content bounce-in">
                                                                            <h4 class="timeline-title text-success">Something not important</h4>
                                                                            <p>Lorem ipsum dolor sit amit,consectetur elit enim at
                                                                                minim veniam quis nostrud</p>
                                                                            <span class="vertical-timeline-element-date"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab-animated-2" role="tabpanel">
                                                <div class="scroll-area-sm">
                                                    <div class="scrollbar-container">
                                                        <div class="no-results pt-3 pb-0">
                                                            <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                                <span class="swal2-success-line-tip"></span>
                                                                <span class="swal2-success-line-long"></span>
                                                                <div class="swal2-success-ring"></div>
                                                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                            </div>
                                                            <div class="results-subtitle">All caught up!</div>
                                                            <div class="results-title">There are no system errors!</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav flex-column">
                                            <li class="nav-item-btn text-center pt-4 pb-3 nav-item">
                                                <button class="btn-shadow btn-wide btn-pill btn btn-dark">
                                                    <span class="badge badge-dot badge-dot-lg badge-warning badge-pulse">Badge</span>
                                                    View All Messages
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mb-3 card">
                            <div class="no-gutters row">
                                <div class="col-md-6 col-xl-4">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-right ml-0 mr-3">
                                                <div class="widget-numbers text-success">1896</div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Orders</div>
                                                <div class="widget-subheading">Last year expenses</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-right ml-0 mr-3">
                                                <div class="widget-numbers text-warning">$ 14M</div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Products Sold</div>
                                                <div class="widget-subheading">Total revenue streams</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-right ml-0 mr-3">
                                                <div class="widget-numbers text-danger">45.9%</div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Followers</div>
                                                <div class="widget-subheading">People Interested</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-xl-none d-md-block col-md-6 col-xl-4">
                                    <div class="widget-content">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-right ml-0 mr-3">
                                                <div class="widget-numbers text-danger">45.9%</div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Followers</div>
                                                <div class="widget-subheading">People Interested</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <div class="footer-dots">
                                    <div class="dropdown">
                                        <a aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dot-btn-wrapper">
                                            <i class="dot-btn-icon lnr-bullhorn icon-gradient bg-mean-fruit"></i>
                                            <div class="badge badge-dot badge-abs badge-dot-sm badge-danger">Notifications</div>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu">
                                            <div class="dropdown-menu-header mb-0">
                                                <div class="dropdown-menu-header-inner bg-deep-blue">
                                                    <div class="menu-header-image opacity-1" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                    <div class="menu-header-content text-dark">
                                                        <h5 class="menu-header-title">Notifications</h5>
                                                        <h6 class="menu-header-subtitle">You have <b>21</b> unread messages</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link active" data-toggle="tab" href="#tab-messages-header1">
                                                        <span>Messages</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" data-toggle="tab" href="#tab-events-header1">
                                                        <span>Events</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a role="tab" class="nav-link" data-toggle="tab" href="#tab-errors-header1">
                                                        <span>System Errors</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-messages-header1" role="tabpanel">
                                                    <div class="scroll-area-sm">
                                                        <div class="scrollbar-container">
                                                            <div class="p-3">
                                                                <div class="notifications-box">
                                                                    <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                                        <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <p>Yet another one, at
                                                                                        <span class="text-success">15:00 PM</span>
                                                                                    </p>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">Build the production release
                                                                                        <span class="badge badge-danger ml-2">NEW</span>
                                                                                    </h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">Something not important
                                                                                        <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/1.jpg" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/2.jpg" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/3.jpg" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/4.jpg" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/5.jpg" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/9.jpg" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/7.jpg" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                                <div class="avatar-icon">
                                                                                                    <img src="assets/images/avatars/8.jpg" alt="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                                <div class="avatar-icon"><i>+</i></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">This dot has an info state</h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <p>Yet another one, at
                                                                                        <span class="text-success">15:00 PM</span>
                                                                                    </p>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">Build the production release
                                                                                        <span class="badge badge-danger ml-2">NEW</span>
                                                                                    </h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                                            <div>
                                                                                <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                                    <h4 class="timeline-title">This dot has a dark state</h4>
                                                                                    <span class="vertical-timeline-element-date"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-events-header1" role="tabpanel">
                                                    <div class="scroll-area-sm">
                                                        <div class="scrollbar-container">
                                                            <div class="p-3">
                                                                <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                <p>Lorem ipsum dolor sic amet, today at
                                                                                    <a href="javascript:void(0);">12:00 PM</a>
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-warning"></i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <p>Another meeting today, at
                                                                                    <b class="text-danger">12:00 PM</b>
                                                                                </p>
                                                                                <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-danger"></i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the production release</h4>
                                                                                <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                                                    incididunt ut labore et dolore magna elit enim at
                                                                                    minim veniam quis nostrud
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-primary"></i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title text-success">Something not important</h4>
                                                                                <p>Lorem ipsum dolor sit amit,consectetur elit enim at
                                                                                    minim veniam quis nostrud</p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-success"></i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">All Hands Meeting</h4>
                                                                                <p>Lorem ipsum dolor sic amet, today at
                                                                                    <a href="javascript:void(0);">12:00 PM</a>
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-warning"></i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <p>Another meeting today, at
                                                                                    <b class="text-danger">12:00 PM</b>
                                                                                </p>
                                                                                <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-danger"></i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title">Build the production release</h4>
                                                                                <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                                                    incididunt ut labore et dolore magna elit enim at
                                                                                    minim veniam quis nostrud
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vertical-timeline-item vertical-timeline-element">
                                                                        <div>
                                                                            <span class="vertical-timeline-element-icon bounce-in">
                                                                                <i class="badge badge-dot badge-dot-xl badge-primary"></i>
                                                                            </span>
                                                                            <div class="vertical-timeline-element-content bounce-in">
                                                                                <h4 class="timeline-title text-success">Something not important</h4>
                                                                                <p>Lorem ipsum dolor sit amit,consectetur elit enim at
                                                                                    minim veniam quis nostrud
                                                                                </p>
                                                                                <span class="vertical-timeline-element-date"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-errors-header1" role="tabpanel">
                                                    <div class="scroll-area-sm">
                                                        <div class="scrollbar-container">
                                                            <div class="no-results pt-3 pb-0">
                                                                <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                                    <span class="swal2-success-line-tip"></span>
                                                                    <span class="swal2-success-line-long"></span>
                                                                    <div class="swal2-success-ring"></div>
                                                                    <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                                </div>
                                                                <div class="results-subtitle">All caught up!</div>
                                                                <div class="results-title">There are no system errors!</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item"></li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">View Latest Changes</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dots-separator"></div>
                                    <div class="dropdown">
                                        <a class="dot-btn-wrapper" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dot-btn-icon lnr-earth icon-gradient bg-happy-itmeo"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner pt-4 pb-4 bg-focus">
                                                    <div class="menu-header-image opacity-05" style="background-image: url('assets/images/dropdown-header/city2.jpg');"></div>
                                                    <div class="menu-header-content text-center text-white">
                                                        <h6 class="menu-header-subtitle mt-0"> Choose Language</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 tabindex="-1" class="dropdown-header"> Popular Languages</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <span class="mr-3 opacity-8 flag large US"></span> USA
                                            </button>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <span class="mr-3 opacity-8 flag large CH"></span> Switzerland
                                            </button>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <span class="mr-3 opacity-8 flag large FR"></span>France
                                            </button>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <span class="mr-3 opacity-8 flag large ES"></span>Spain
                                            </button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <h6 tabindex="-1" class="dropdown-header">Others</h6>
                                            <button type="button" tabindex="0" class="dropdown-item active">
                                                <span class="mr-3 opacity-8 flag large DE"></span>Germany
                                            </button>
                                            <button type="button" tabindex="0" class="dropdown-item">
                                                <span class="mr-3 opacity-8 flag large IT"></span> Italy
                                            </button>
                                        </div>
                                    </div>
                                    <div class="dots-separator"></div>
                                    <div class="dropdown">
                                        <a class="dot-btn-wrapper dd-chart-btn-2" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dot-btn-icon lnr-pie-chart icon-gradient bg-love-kiss"></i>
                                            <div class="badge badge-dot badge-abs badge-dot-sm badge-warning">Notifications</div>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-premium-dark">
                                                    <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract4.jpg');"></div>
                                                    <div class="menu-header-content text-white">
                                                        <h5 class="menu-header-title">Users Online</h5>
                                                        <h6 class="menu-header-subtitle">Recent Account Activity Overview</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-chart">
                                                <div class="widget-chart-content">
                                                    <div class="icon-wrapper rounded-circle">
                                                        <div class="icon-wrapper-bg opacity-9 bg-focus"></div>
                                                        <i class="lnr-users text-white"></i>
                                                    </div>
                                                    <div class="widget-numbers">
                                                        <span>344k</span>
                                                    </div>
                                                    <div class="widget-subheading pt-2"> Profile views since last login</div>
                                                    <div class="widget-description text-danger">
                                                        <span class="pr-1"> <span>176%</span></span>
                                                        <i class="fa fa-arrow-left"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-chart-wrapper">
                                                    <div id="dashboard-sparkline-carousel-4-pop"></div>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider mt-0 nav-item"></li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button class="btn-shine btn-wide btn-pill btn btn-warning btn-sm">
                                                        <i class="fa fa-cog fa-spin mr-2"></i> View Details
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="app-footer-right">
                                <ul class="header-megamenu nav">
                                    <li class="nav-item">
                                        <a data-placement="top" rel="popover-focus" data-offset="300" data-toggle="popover-custom" class="nav-link">
                                            Footer Menu
                                            <i class="fa fa-angle-up ml-2 opacity-8"></i>
                                        </a>
                                        <div class="rm-max-width rm-pointers">
                                            <div class="d-none popover-custom-content">
                                                <div class="dropdown-mega-menu dropdown-mega-menu-sm">
                                                    <div class="grid-menu grid-menu-2col">
                                                        <div class="no-gutters row">
                                                            <div class="col-sm-6 col-xl-6">
                                                                <ul class="nav flex-column">
                                                                    <li class="nav-item-header nav-item">Overview</li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link">
                                                                            <i class="nav-link-icon lnr-inbox"></i>
                                                                            <span>Contacts</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link">
                                                                            <i class="nav-link-icon lnr-book"></i>
                                                                            <span>Incidents</span>
                                                                            <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link">
                                                                            <i class="nav-link-icon lnr-picture"></i>
                                                                            <span>Companies</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a disabled="" class="nav-link disabled">
                                                                            <i class="nav-link-icon lnr-file-empty"></i>
                                                                            <span>Dashboards</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-sm-6 col-xl-6">
                                                                <ul class="nav flex-column">
                                                                    <li class="nav-item-header nav-item">Sales &amp; Marketing</li>
                                                                    <li class="nav-item"><a class="nav-link">Queues</a></li>
                                                                    <li class="nav-item"><a class="nav-link">Resource Groups</a></li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link">Goal Metrics
                                                                            <div class="ml-auto badge badge-warning">3</div>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item"><a class="nav-link">Campaigns</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a data-placement="top" rel="popover-focus" data-offset="300" data-toggle="popover-custom" class="nav-link">
                                            Grid Menu
                                            <div class="badge badge-dark ml-0 ml-1">
                                                <small>NEW</small>
                                            </div>
                                            <i class="fa fa-angle-up ml-2 opacity-8"></i>
                                        </a>
                                        <div class="rm-max-width rm-pointers">
                                            <div class="d-none popover-custom-content">
                                                <div class="dropdown-menu-header">
                                                    <div class="dropdown-menu-header-inner bg-tempting-azure">
                                                        <div class="menu-header-image opacity-1" style="background-image: url('assets/images/dropdown-header/city5.jpg');"></div>
                                                        <div class="menu-header-content text-dark">
                                                            <h5 class="menu-header-title">Two Column Grid</h5>
                                                            <h6 class="menu-header-subtitle">Easy grid navigation inside popovers</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-menu grid-menu-2col">
                                                    <div class="no-gutters row">
                                                        <div class="col-sm-6">
                                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                                                <i class="lnr-lighter text-dark opacity-7 btn-icon-wrapper mb-2"></i>Automation
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                                <i class="lnr-construction text-danger opacity-7 btn-icon-wrapper mb-2"></i>Reports
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                                                <i class="lnr-bus text-success opacity-7 btn-icon-wrapper mb-2"></i>Activity
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-focus">
                                                                <i class="lnr-gift text-focus opacity-7 btn-icon-wrapper mb-2"></i>Settings
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nav flex-column">
                                                    <li class="nav-item-divider nav-item"></li>
                                                    <li class="nav-item-btn clearfix nav-item">
                                                        <div class="float-left">
                                                            <button class="btn btn-link btn-sm">Link Button</button>
                                                        </div>
                                                        <div class="float-right">
                                                            <button class="btn-shadow btn btn-info btn-sm">Info Button</button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-drawer-wrapper">
        <div class="drawer-nav-btn">
            <button type="button" class="hamburger hamburger--elastic is-active">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>
        </div>
        <div class="drawer-content-wrapper">
            <div class="scrollbar-container">
                <h3 class="drawer-heading">Servers Status</h3>
                <div class="drawer-section">
                    <div class="row">
                        <div class="col">
                            <div class="progress-box">
                                <h4>Server Load 1</h4>
                                <div class="circle-progress circle-progress-gradient-xl mx-auto">
                                    <small></small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress-box">
                                <h4>Server Load 2</h4>
                                <div class="circle-progress circle-progress-success-xl mx-auto">
                                    <small></small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress-box">
                                <h4>Server Load 3</h4>
                                <div class="circle-progress circle-progress-danger-xl mx-auto">
                                    <small></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="mt-3">
                        <h5 class="text-center card-title">Live Statistics</h5>
                        <div id="sparkline-carousel-3"></div>
                        <div class="row">
                            <div class="col">
                                <div class="widget-chart p-0">
                                    <div class="widget-chart-content">
                                        <div class="widget-numbers text-warning fsize-3">43</div>
                                        <div class="widget-subheading pt-1">Packages</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="widget-chart p-0">
                                    <div class="widget-chart-content">
                                        <div class="widget-numbers text-danger fsize-3">65</div>
                                        <div class="widget-subheading pt-1">Dropped</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="widget-chart p-0">
                                    <div class="widget-chart-content">
                                        <div class="widget-numbers text-success fsize-3">18</div>
                                        <div class="widget-subheading pt-1">Invalid</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="text-center mt-2 d-block">
                            <button class="mr-2 border-0 btn-transition btn btn-outline-danger">Escalate Issue</button>
                            <button class="border-0 btn-transition btn btn-outline-success">Support Center</button>
                        </div>
                    </div>
                </div>
                <h3 class="drawer-heading">File Transfers</h3>
                <div class="drawer-section p-0">
                    <div class="files-box">
                        <ul class="list-group list-group-flush">
                            <li class="pt-2 pb-2 pr-2 list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left opacity-6 fsize-2 mr-3 text-primary center-elem">
                                            <i class="fa fa-file-alt"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading font-weight-normal">TPSReport.docx</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pt-2 pb-2 pr-2 list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left opacity-6 fsize-2 mr-3 text-warning center-elem">
                                            <i class="fa fa-file-archive"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading font-weight-normal">Latest_photos.zip</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pt-2 pb-2 pr-2 list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left opacity-6 fsize-2 mr-3 text-danger center-elem">
                                            <i class="fa fa-file-pdf"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading font-weight-normal">Annual Revenue.pdf</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="pt-2 pb-2 pr-2 list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left opacity-6 fsize-2 mr-3 text-success center-elem">
                                            <i class="fa fa-file-excel"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading font-weight-normal">Analytics_GrowthReport.xls</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="btn-icon btn-icon-only btn btn-link btn-sm">
                                                <i class="fa fa-cloud-download-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h3 class="drawer-heading">Tasks in Progress</h3>
                <div class="drawer-section p-0">
                    <div class="todo-box">
                        <ul class="todo-list-wrapper list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="todo-indicator bg-warning"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox1266" class="custom-control-input">
                                                <label class="custom-control-label" for="exampleCustomCheckbox1266">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Wash the car
                                                <div class="badge badge-danger ml-2">Rejected</div>
                                            </div>
                                            <div class="widget-subheading"><i>Written by Bob</i></div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="border-0 btn-transition btn btn-outline-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="border-0 btn-transition btn btn-outline-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="todo-indicator bg-focus"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox1666" class="custom-control-input">
                                                <label class="custom-control-label" for="exampleCustomCheckbox1666">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Task with hover dropdown menu</div>
                                            <div class="widget-subheading">
                                                <div>By Johnny
                                                    <div class="badge badge-pill badge-info ml-2">NEW</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <div class="d-inline-block dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                    <button type="button" disabled="" tabindex="-1" class="disabled dropdown-item">Action</button>
                                                    <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="todo-indicator bg-primary"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox4777" class="custom-control-input">
                                                <label class="custom-control-label" for="exampleCustomCheckbox4777">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Badge on the right task</div>
                                            <div class="widget-subheading">This task has show on hover actions!</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="border-0 btn-transition btn btn-outline-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="widget-content-right ml-3">
                                            <div class="badge badge-pill badge-success">Latest Task</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="todo-indicator bg-info"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox2444" class="custom-control-input">
                                                <label class="custom-control-label" for="exampleCustomCheckbox2444">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img width="42" class="rounded" src="assets/images/avatars/1.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Go grocery shopping</div>
                                            <div class="widget-subheading">A short description ...</div>
                                        </div>
                                        <div class="widget-content-right widget-content-actions">
                                            <button class="border-0 btn-transition btn btn-sm btn-outline-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="border-0 btn-transition btn btn-sm btn-outline-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="todo-indicator bg-success"></div>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox3222" class="custom-control-input">
                                                <label class="custom-control-label" for="exampleCustomCheckbox3222">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">Development Task</div>
                                            <div class="widget-subheading">Finish React ToDo List App</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="badge badge-warning mr-2">69</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <button class="border-0 btn-transition btn btn-outline-success">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="border-0 btn-transition btn btn-outline-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <h3 class="drawer-heading">Urgent Notifications</h3>
                <div class="drawer-section">
                    <div class="notifications-box">
                        <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                            <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">All Hands Meeting</h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">Build the production release
                                            <div class="badge badge-danger ml-2">NEW</div>
                                        </h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">Something not important
                                            <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="assets/images/avatars/1.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="assets/images/avatars/2.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="assets/images/avatars/3.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="assets/images/avatars/4.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="assets/images/avatars/5.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="assets/images/avatars/6.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="assets/images/avatars/7.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                    <div class="avatar-icon">
                                                        <img src="assets/images/avatars/8.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                    <div class="avatar-icon"><i>+</i></div>
                                                </div>
                                            </div>
                                        </h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                    <div class="vertical-timeline-element-content bounce-in">
                                        <h4 class="timeline-title">This dot has an info state</h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                                <div>
                                    <span class="vertical-timeline-element-icon is-hidden"></span>
                                    <div class="vertical-timeline-element-content is-hidden">
                                        <h4 class="timeline-title">This dot has a dark state</h4>
                                        <span class="vertical-timeline-element-date"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/dashboards-sales.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jan 2023 16:59:50 GMT -->

</html>
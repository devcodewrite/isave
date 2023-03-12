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
                <li class="app-sidebar__heading">Home</li>
                <li>
                    <a href="<?= site_url('dashboard') ?>" class="<?= get_nav_status('dashboard') ?>">
                        <i class="metismenu-icon pe-7s-rocket"></i>Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Banking</li>
                <?php
                if (auth()->canAny(['viewAny', 'create'], 'account')->allowed()) { ?>
                    <li class="<?= get_nav_status('bankaccounts') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-notebook"></i>Accounts
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'account')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('bankaccounts/create') ?>" class="<?= get_nav_status1('bankaccounts/create') ?>">
                                        <i class="metismenu-icon"></i> New Account
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('view', 'account')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('bankaccounts') ?>" class="<?= get_nav_status1('bankaccounts') ?>">
                                        <i class="metismenu-icon"></i>List Accounts
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('view', 'account')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('bankaccounts/passbooks') ?>" class="<?= get_nav_status1('bankaccounts/passbooks') ?>">
                                        <i class="metismenu-icon"></i>List Passbooks
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (auth()->canAny(['viewAny', 'create'], 'deposit')->allowed()) { ?>
                    <li class="<?= get_nav_status('deposits') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-piggy"></i>Manage Deposits
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'deposit')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('deposits/create') ?>" class="<?= get_nav_status1('deposits/create') ?>">
                                        <i class="metismenu-icon"></i> New Deposit
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('create', 'deposit')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('deposits/mass-create') ?>" class="<?= get_nav_status1('deposits/mass-create') ?>">
                                        <i class="metismenu-icon"></i> Mass Deposits
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('viewAny', 'deposit')->allowed()) { ?>
                                <li>
                                <li>
                                    <a href="<?= site_url('deposits') ?>" class="<?= get_nav_status1('deposits') ?>">
                                        <i class="metismenu-icon"></i> Deposit Transactions
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (auth()->canAny(['viewAny', 'create'], 'withdrawal')->allowed()) { ?>
                    <li class="<?= get_nav_status('withdrawals') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-credit"></i> Manage Withdrawals
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'withdrawal')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('withdrawals/create') ?>" class="<?= get_nav_status1('withdrawals/create') ?>">
                                        <i class="metismenu-icon"></i> New Withdrawal
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('viewAny', 'withdrawal')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('withdrawals') ?>" class="<?= get_nav_status1('withdrawals') ?>">
                                        <i class="metismenu-icon"></i> Withdrawal Transactions
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (auth()->canAny(['viewAny', 'create'], 'transfer')->allowed()) { ?>
                    <li class="<?= get_nav_status('transfers') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-next-2"></i>Internal Transfers
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'transfer')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('transfers/create') ?>" class="<?= get_nav_status1('transfers/create') ?>">
                                        <i class="metismenu-icon"></i> New Internal Transfer
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('viewAny', 'transfer')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('transfers') ?>" class="<?= get_nav_status1('transfers') ?>">
                                        <i class="metismenu-icon"></i> Transfers Transactions
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (auth()->canAny(['viewAny', 'create'], 'loan')->allowed()) { ?>
                    <li class="<?= get_nav_status('loans') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-cash"></i>Manage Loans
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'loan')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('loans/create') ?>" class="<?= get_nav_status1('loans/create') ?>">
                                        <i class="metismenu-icon"></i> New Loan Request
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('viewAny', 'loan')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('loans') ?>" class="<?= get_nav_status1('loans') ?>">
                                        <i class="metismenu-icon"></i>List Loan Requests
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= site_url('loans/in-arrears') ?>" class="<?= get_nav_status1('loans/in-arrears') ?>">
                                        <i class="metismenu-icon"></i>Loans in Arrears
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= site_url('loans/defaults') ?>" class="<?= get_nav_status1('loans/defaults') ?>">
                                        <i class="metismenu-icon"></i>Defaulted Loans
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('disburse', 'loan')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('loans/disbursements') ?>" class="<?= get_nav_status1('loans/disbursements') ?>">
                                        <i class="metismenu-icon"></i>Disbursement Schedule
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <li class="app-sidebar__heading">Customers & Associations</li>
                <?php if (auth()->canAny(['viewAny', 'create'], 'member')->allowed()) { ?>
                    <li class="<?= get_nav_status('customers') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-users"></i>Manage Customers
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'member')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('customers/create') ?>" class="<?= get_nav_status1('customers/create') ?>">
                                        <i class="metismenu-icon"></i> New Customer
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('viewAny', 'member')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('customers') ?>" class="<?= get_nav_status1('customers') ?>">
                                        <i class="metismenu-icon"></i>List Customers
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (auth()->canAny(['viewAny', 'create'], 'association')->allowed()) { ?>
                    <li class="<?= get_nav_status('associations') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-network"></i>Manage Associations
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'association')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('associations/create') ?>" class="<?= get_nav_status1('associations/create') ?>">
                                        <i class="metismenu-icon"></i> New Association
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('viewAny', 'association')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('associations') ?>" class="<?= get_nav_status1('associations') ?>">
                                        <i class="metismenu-icon"></i>List Associations
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('create', 'accstatement')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('associations/statements') ?>" class="<?= get_nav_status1('associations/statements') ?>">
                                        <i class="metismenu-icon"></i>E-Cash Statements
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <li class="app-sidebar__heading">Reportings</li>
                <li class="app-sidebar__heading d-none">Reporting</li>
                <li class="<?= get_nav_status('reporting') ?>">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-piggy"></i>Reporting
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= site_url('reporting/cashbook') ?>" class="<?= get_nav_status1('reporting/cashbook') ?>">
                                <i class="metismenu-icon"></i>Cashbook Report
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('reporting/transactions') ?>" class="<?= get_nav_status1('reporting/transactions') ?>">
                                <i class="metismenu-icon"></i>Transaction Report
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('reporting/loan-transactions') ?>" class="<?= get_nav_status1('reporting/loan-transactions') ?>">
                                <i class="metismenu-icon"></i>Loan Transac. Report
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('reporting/member-refundable-balances') ?>" class="<?= get_nav_status1('reporting/member-refundable-balances') ?>">
                                <i class="metismenu-icon"></i>Refundable Balance
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (auth()->canAny(['viewAny', 'create'], 'user')->allowed()) { ?>
                    <li class="app-sidebar__heading">Users & Permissions</li>
                    <li class="<?= get_nav_status('users') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-key"></i>Manage Users
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'user')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('users/create') ?>" class="<?= get_nav_status1('users/create') ?>">
                                        <i class="metismenu-icon"></i> New User
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('viewAny', 'user')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('users') ?>" class="<?= get_nav_status1('users') ?>">
                                        <i class="metismenu-icon"></i>List User
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (auth()->canAny(['viewAny', 'create'], 'role')->allowed()) { ?>
                    <li class="<?= get_nav_status('roles') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-key"></i>Roles & Permissions
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <?php
                            if (auth()->can('create', 'role')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('roles/create') ?>" class="<?= get_nav_status1('roles/create') ?>">
                                        <i class="metismenu-icon"></i> New Role
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                            if (auth()->can('viewAny', 'role')->allowed()) { ?>
                                <li>
                                    <a href="<?= site_url('roles') ?>" class="<?= get_nav_status1('roles') ?>">
                                        <i class="metismenu-icon"></i>List Roles
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if (auth()->canAny(['viewAny', 'update'], 'setting')->allowed()) { ?>
                    <li class="app-sidebar__heading">Setup & Settings</li>
                    <li class="<?= get_nav_status('setup') ?>">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-box2"></i>Setup
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li class="<?= get_nav_status('setup') ?>">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-box2"></i>Attributes
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= site_url('acctypes') ?>" class="<?= get_nav_status1('acctypes') ?>">
                                            <i class="metismenu-icon"></i> Account Types
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="<?= site_url('settings') ?>" class="<?= get_nav_status('settings') ?>">
                                    <i class="metismenu-icon pe-7s-config"></i>Settings
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
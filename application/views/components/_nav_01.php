<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('') ?>"><?= APP_NAME ?>&nbsp;<span class="d-none d-md-inline">Dashboard</span></a>
        <!-- <a class="navbar-brand" href="<?= base_url('trl-admin') ?>">Dashboard</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between w-100" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="<?= base_url('') ?>">Home</a>
                <button type="button" class="nav-link search" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    &nbsp;
                    Search in Dashboard
                </button>
            </div>
            <div class="navbar-nav">
                <?php if ($this->session->user['role'] == "admin") : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('register') ?>">Register New User</a>
                    </li>
                <?php endif ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Notifications
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </li>


                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 with-avatar p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)">PK</span>
                        <div class="d-none d-xl-block ps-2">
                            <div><?= $this->session->user['username'] ?></div>
                            <div class="mt-1 small text-secondary"><?= $this->session->user['role'] ?></div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="#" class="dropdown-item">Status</a>
                        <a href="./profile.html" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Feedback</a>
                        <div class="dropdown-divider"></div>
                        <a href="./settings.html" class="dropdown-item">Settings</a>
                        <a href="./sign-in.html" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>
</nav>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php load_menu($menu['pages'], $menu['pages']['type'], $menu['pages']['enable']) ?>
                <?php load_menu($menu['categories'], $menu['categories']['type'], $menu['categories']['enable']) ?>
                <?php load_menu($menu['products'], $menu['products']['type'], $menu['products']['enable']) ?>
                <?php load_menu($menu['orders-invoices'], $menu['orders-invoices']['type'], $menu['orders-invoices']['enable']) ?>
                <?php load_menu($menu['reviews'], $menu['reviews']['type'], $menu['reviews']['enable']) ?>
                <?php load_menu($menu['brands'], $menu['brands']['type'], $menu['brands']['enable']) ?>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="search" method="get">
                    <div class="row m-0">
                        <div class="col-md col-12">
                            <input type="search" class="form-control" name="s" id="inputSearch">
                        </div>
                        <div class="col-md-auto col-12">
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
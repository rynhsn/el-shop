<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= SITE_NAME ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $this->uri->segment(2) == '' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item <?= $this->uri->segment(2) == 'users' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/users'); ?>">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item <?= $this->uri->segment(2) == 'accounts' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/accounts'); ?>">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Accounts</span></a>
    </li>

    <li class="nav-item <?= $this->uri->segment(2) == 'categories' || $this->uri->segment(2) == 'products' ? 'active' : ''; ?>">
        <a class="nav-link <?= $this->uri->segment(2) == 'categories' || $this->uri->segment(2) == 'products' ? '' : 'collapsed'; ?>" href="" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="<?= $this->uri->segment(2) == 'categories' || $this->uri->segment(2) == 'products' ? 'true' : 'false'; ?>" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse <?= $this->uri->segment(2) == 'categories' || $this->uri->segment(2) == 'products' ? 'show' : ''; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products</h6>
                <a class="collapse-item <?= $this->uri->segment(2) == 'products' ? 'active' : ''; ?>" href="<?= base_url('admin/products'); ?>">Product</a>
                <a class="collapse-item <?= $this->uri->segment(2) == 'categories' ? 'active' : ''; ?>" href="<?= base_url('admin/categories'); ?>">Product Category</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?= $this->uri->segment(2) == 'transactions' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/transactions'); ?>">
            <i class="fas fa-fw fa-people-carry"></i>
            <span>Transactions</span>
        </a>
    </li>


    <li class="nav-item <?= $this->uri->segment(2) == 'config' ? 'active' : ''; ?>">
        <a class="nav-link <?= $this->uri->segment(2) == 'config' ? '' : 'collapsed'; ?>" href="" data-toggle="collapse" data-target="#collapseConfig" aria-expanded="<?= $this->uri->segment(2) == 'config' ? 'true' : 'false'; ?>" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configuration</span>
        </a>
        <div id="collapseConfig" class="collapse <?= $this->uri->segment(2) == 'config' ? 'show' : ''; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Configuration</h6>
                <a class="collapse-item <?= $this->uri->segment(2) == 'config' ? 'active' : ''; ?>" href="<?= base_url('admin/config'); ?>">Basic</a>
                <a class="collapse-item <?= $this->uri->segment(3) == 'logo' ? 'active' : ''; ?>" href="<?= base_url('admin/config/logo'); ?>">Logo</a>
                <a class="collapse-item <?= $this->uri->segment(3) == 'icon' ? 'active' : ''; ?>" href="<?= base_url('admin/config/icon'); ?>">Icon</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?= $this->uri->segment(2) == 'reports' ? 'active' : ''; ?>">
        <a class="nav-link <?= $this->uri->segment(2) == 'reports' ? '' : 'collapsed'; ?>" href="" data-toggle="collapse" data-target="#collapseReports" aria-expanded="<?= $this->uri->segment(2) == 'reports' ? 'true' : 'false'; ?>" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-book"></i>
            <span>Reports</span>
        </a>
        <div id="collapseReports" class="collapse <?= $this->uri->segment(2) == 'reports' ? 'show' : ''; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reports</h6>
                <a class="collapse-item <?= $this->uri->segment(2) == 'reports' ? 'active' : ''; ?>" href="<?= base_url('admin/reports/transactions'); ?>">Transactions</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
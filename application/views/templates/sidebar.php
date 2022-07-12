<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:#9932CC;" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fa fw"><img src="<?= base_url('images/brand/Logo kotak putih1.png'); ?>" style="width:55px;"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Orchidku</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item Master Data -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kecamatan') ?>">
            <i class="fas fa-fw fa-solid fa-location-dot"></i>
            <span>Data Kecamatan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/anggota') ?>">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Data Anggota</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-tags"></i>
            <span>Data Produk</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Produk:</h6>
                <a class="collapse-item" href="<?= base_url('produk') ?>">Data Produk</a>
                <a class="collapse-item" href="<?= base_url('kategori') ?>">Kategori Produk</a>
            </div>
        </div>
    </li>

    <!-- Nav Item Master Data -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('bank') ?>">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Metode Pembayaran</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('transaksi') ?>">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span>Kelola Pesanan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan Transaksi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Logout
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
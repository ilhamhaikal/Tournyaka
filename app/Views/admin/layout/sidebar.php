<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-orange accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url('assets/img/tournyaka/logo.png') ?>" alt="" class="img-fluid" width="40" height="40">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi
    </div>

    <!-- Nav Item - Review -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-grin-stars"></i>
            <span>Review</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Data Pangandaran -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="far fa-newspaper"></i>
            <span>Pangandaran News</span></a>
    </li>

    <!-- Nav Item - Event -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/admin/events'); ?>">
            <i class="fas fa-calendar-alt"></i>
            <span>Events</span></a>
    </li>

    <!-- Nav Item - Data Wisata -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWisata" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-map-marker-alt"></i>
            <span>Wisata</span>
        </a>
        <div id="collapseWisata" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Wisata:</h6>
                <a class="collapse-item" href="<?= base_url('/admin/destinasi'); ?>">Destinasi Wisata</a>
                <a class="collapse-item" href="">Hotel</a>
                <a class="collapse-item" href="">Itinerary</a>
                <a class="collapse-item" href="">Paket Wisata</a>
                <a class="collapse-item" href="">Transport</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Landing Page -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-window-maximize"></i>
            <span>Landing Page</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
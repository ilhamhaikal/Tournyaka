<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light sticky-top bg-white shadow-sm">
    <div class="container-lg py-1 px-lg-0 font-viga">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/events_berlangsung') ?>">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>

        <div class="px-2 p-md-0 ps-sm-4">
            <a class="navbar-brand mb-0 fs-4 font-libre" href="<?= base_url('/'); ?>">Tournyaka</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                <?php
                $uri = service('uri');
                if ($uri->getSegment(1) == 'login' || $uri->getSegment(1) == 'register' || $uri->getSegment(1) == 'forgot' || $uri->getSegment(1) == 'reset-password') : ?>
                    <a></a>
                <?php else : ?>
                    <?php if (logged_in()) : ?>
                        <li class="nav-item me-2 dropdown">
                            <a class="dropdown-toggle text-decoration-none text-secondary" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if (!filter_var(user()->user_img, FILTER_VALIDATE_URL) === false) : ?>
                                    <img src="<?= user()->user_img; ?>" height="40" width="40" class="img-fluid rounded-circle" alt="">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/img/user/' . user()->user_img); ?>" height="40" width="40" class="img-fluid" alt="">
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item"><?= user()->fullname; ?></a></li>
                                <li><a class="dropdown-item" href="/pembayaran">Pembayaran</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item me-3">
                            <a class="btn btn-warning" href="<?= base_url('/login'); ?>">Login</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="btn btn-warning" href="<?= base_url('/register'); ?>">Daftar</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>

        <div class="px-2 p-md-0 ps-sm-4">
            <button class="btn btn-link text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fas fa-list fa-lg"></i>
            </button>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Sidebar -->
<div class="offcanvas offcanvas-end bg-gray font-kanit" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header mt-1">
        <h5 class="offcanvas-title text-warning ls-1" id="offcanvasExampleLabel">NAVIGASI</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 mx-4">
            <?php
            $uri = service('uri');
            if ($uri->getSegment(1) == 'login' || $uri->getSegment(1) == 'register' || $uri->getSegment(1) == 'forgot' || $uri->getSegment(1) == 'reset-password') : ?>
                <a></a>
            <?php else : ?>
                <?php if (logged_in()) : ?>
                    <div class="row hide-md mb-3">
                        <div class="col-3 d-flex align-items-center">
                            <?php if (!filter_var(user()->user_img, FILTER_VALIDATE_URL) === false) : ?>
                                <img src="<?= user()->user_img; ?>" class="img-fluid rounded-circle" alt="">
                            <?php else : ?>
                                <img src="<?= base_url('assets/img/user/' . user()->user_img); ?>" class="img-fluid" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="col d-flex flex-column">
                            <a class="text-decoration-none text-orange mb-2 fw-bold fs-6 ls-0 lh-1"><?= user()->username; ?></a>
                            <a class="text-decoration-none text-orange mb-2 fw-bold fs-6 ls-0 lh-1">Pembayaran</a>
                            <a class="text-decoration-none text-orange fw-bold fs-6 ls-0 lh-1" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                        </div>
                    </div>
                    <?php if (in_groups('admin')) : ?>
                        <li class="nav-item mb-3">
                            <a class="text-decoration-none text-white fw-bold fs-5 ls-0 lh-1" href="<?= base_url('/admin'); ?>">Dashboard Admin</a>
                        </li>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="row hide-md">
                        <div class="col text-center">
                            <a class="text-decoration-none text-orange fw-bold fs-5 ls-0 lh-1" href="<?= base_url('/login'); ?>">
                                <i class="fas fa-user fa-2x"></i>
                                <p class="text-white">Login</p>
                            </a>
                        </div>
                        <div class="col text-center">
                            <a class="text-decoration-none text-orange fw-bold fs-5 ls-0 lh-1" href="<?= base_url('/register'); ?>">
                                <i class="fas fa-user-edit fa-2x"></i>
                                <p class="text-white">Daftar</p>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <li class="nav-item mb-3">
                <a class="text-decoration-none text-white fw-bold fs-5 ls-0 lh-1" href="<?= base_url('/tentang_kami'); ?>">Tentang Kami</a>
            </li>
            <li class="nav-item mb-3">
                <a class="text-decoration-none text-white fw-bold fs-5 ls-0 lh-1" href="<?= base_url('/destinasi'); ?>">Destinasi Wisata</a>
            </li>
            <li class="nav-item mb-3">
                <a class="text-decoration-none text-white fw-bold fs-5 ls-0 lh-1" href="<?= base_url('/pangandaran’s_trivia'); ?>">Pangandaran's Trivia</a>
            </li>
            <li class="nav-item mb-3">
                <a class="text-decoration-none text-white fw-bold fs-5 ls-0 lh-1" href="<?= base_url('/wuop'); ?>">What Unique On Pangandaran?</a>
            </li>
            <li class="nav-item mb-1">
                <a class="text-decoration-none text-white fw-bold fs-5 ls-0 lh-1" href="<?= base_url('/get_to_know'); ?>">Get to Know Pangandaran</a>
            </li>
        </ul>

        <div class="text-white mx-md-4 text-justify fw-bold fs-7  mt-md-5 pt-4">
            <a>Tournyaka adalah platform yang berorientasi kepada kualitas pelayanan terbaik kepada konsumen yang bergerak dalam bidang pelayanan jasa pariwisata.</a>
        </div>

        <div class="d-flex justify-content-evenly mx-4 mt-4">
            <div class="bg-secondary rounded-circle align-items-center justify-content-center d-flex" style="height: 43px; width: 43px;">
                <a class="text-decoration-none text-white-50 fs-3" href="http://instagram.com/tournyaka"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="bg-secondary rounded-circle align-items-center justify-content-center d-flex" style="height: 43px; width: 43px;">
                <a class="text-decoration-none text-white-50 fs-3" href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="bg-secondary rounded-circle align-items-center justify-content-center d-flex" style="height: 43px; width: 43px;">
                <a class="text-decoration-none text-white-50 fs-3" href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar -->

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm font-viga">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Yakin Logout?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-danger" href="<?= base_url('/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Logout -->
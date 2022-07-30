<?= $this->extend('auth/layout/template') ?>

<?= $this->section('content') ?>

<!-- Login with Header -->
<div class="text-justify" style="background-image: url('<?= base_url('/assets/img/tournyaka/header.jpg'); ?>'); background-size: cover; background-position: center center;">
    <div class="bg-dark bg-opacity-50 py-5" style="background-size: cover;">
        <div class="container-lg py-4 pb-5 px-3 px-sm-4 px-lg-0">
            <div class="row">
                <div class="col-lg-6 my-3 pt-md-5 text-white hide">
                    <h1 class="display-1 ls-0 fw-bold font-libre">tournyaka</h1>
                    <p class="lead mb-4 text-warning font-viga">Tournyaka merupakan sebuah platform pariwisata berbasis digital dengan konsep smart tourism yang memudahkan wisatawan untuk mendapatkan layanan jasa pariwisata di Pangandaran</p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="container">
                                <h5 class="card-title display-6 font-libre">Masuk</h5>
                                <p>Mulai menjelajah lebih jauh dari sini.</p>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <div class="d-grid gap-2 mx-auto login-google">
                                    <a href="<?= $_SESSION['link_google']; ?>" class="btn btn-outline-danger rounded-pill">
                                        <i class="fab fa-google"></i>
                                        Masuk dengan Google
                                    </a>
                                </div>
                                <div class="row mt-1 my-sm-2">
                                    <div class="col">
                                        <hr>
                                    </div>
                                    <div class="col col-auto">
                                        Atau masuk dengan
                                    </div>
                                    <div class="col">
                                        <hr>
                                    </div>
                                </div>

                                <form action="<?= route_to('login') ?>" method="post" class="font-viga">
                                    <?= csrf_field() ?>
                                    <?php if ($config->validFields === ['email']) : ?>
                                        <div class="form-group mb-2">
                                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>

                                    <div class="form-group text-end mb-3">
                                        <a class="text-decoration-none text-warning" href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                    </div>

                                    <div class="form-group mb-1">
                                        <button type="submit" class="btn btn-warning rounded-pill btn-block">&emsp;Masuk&emsp;</button>
                                    </div>
                                </form>
                                <p>Belum memiliki akun? <a class="text-decoration-none font-viga text-warning" href="<?= route_to('register') ?>">Daftar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login with Header -->

<?= $this->endSection() ?>
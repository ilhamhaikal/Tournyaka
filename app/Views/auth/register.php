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
                <div class="col-md-10 mx-auto col-lg-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="container">
                                <h5 class="card-title display-6 font-libre">Daftar</h5>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form action="<?= route_to('register') ?>" method="post" class="font-viga">
                                    <?= csrf_field() ?>

                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" name="fullname" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="<?= old('fullname') ?>">
                                    </div>

                                    <div class="form-group mb-2">
                                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                        <!-- <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small> -->
                                    </div>

                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                    </div>

                                    <div class="form-group mb-2">
                                        <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    </div>

                                    <br>

                                    <button type="submit" class="btn btn-warning rounded-pill btn-block">&emsp;Daftar&emsp;</button>

                                    <p class="mt-2">Sudah memiliki akun? <a class="text-decoration-none font-viga text-warning" href="<?= route_to('login') ?>">Masuk</a></p>
                                </form>
                                <p class="hide">Dengan mendaftar sebagai member <strong>Tournyaka</strong> saya setuju dengan
                                    <a class="text-decoration-none fw-bold text-warning">Kebijakan Privasi</a> & <a class="text-decoration-none fw-bold text-warning">Ketentuan Penggunaan</a> <strong>Tournyaka</strong>
                                </p>
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
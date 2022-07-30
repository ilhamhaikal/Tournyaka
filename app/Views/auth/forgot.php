<?= $this->extend('auth/layout/template') ?>

<?= $this->section('content') ?>

<!-- Forgot with Header -->
<div class="text-justify" style="background-image: url('<?= base_url('/assets/img/tournyaka/header.jpg'); ?>'); background-size: cover; background-position: center center;">
    <div class="bg-dark bg-opacity-50 py-5" style="background-size: cover;">
        <div class="container-lg py-4 pb-5 px-3 px-sm-4 px-lg-0">
            <div class="row">
                <div class="col-lg-6 my-3 pt-md-5 text-white hide">
                    <h1 class="display-1 ls-0 fw-bold font-libre">tournyaka</h1>
                    <p class="lead mb-4 text-warning font-viga">Tournyaka merupakan sebuah platform pariwisata berbasis digital dengan konsep smart tourism yang memudahkan wisatawan untuk mendapatkan layanan jasa pariwisata di Pangandaran</p>
                </div>
                <div class="col-md-10 mx-auto my-auto col-lg-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="container">
                                <h5 class="card-title display-6 font-libre mb-5">Lupa Password</h5>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form action="<?= route_to('forgot') ?>" method="post" class="font-viga">
                                    <?= csrf_field() ?>

                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mx-auto">
                                        <button type="submit" class="btn btn-warning rounded-pill btn-block">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Forgot with Header -->

<?= $this->endSection() ?>
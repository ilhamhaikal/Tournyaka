<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Header -->
<div class="text-justify" style="background-image: url('<?= base_url('/assets/img/tournyaka/header.jpg'); ?>'); background-size: cover; background-position: center center;">
    <div class="bg-dark bg-opacity-50 py-5" style="background-size: cover;">
        <div class="container-lg py-4 mb-5 pb-5 px-3 px-sm-4 px-lg-0">
            <div class="col-lg-6 my-3 pt-md-5 text-white font-libre">
                <h1 class="display-1 ls-0 fw-bold">tournyaka</h1>
            </div>
            <div class="col-md-8 col-lg-6 font-viga">
                <div class="row">
                    <div class="col">
                        <p class="lead mb-4 text-warning"><?= $landing['desc_cover']; ?></p>
                    </div>
                    <?php if (in_groups('admin')) : ?>
                        <div class="col col-2 col-md-1 ps-0">
                            <a href="#" class="btn btn-success btn-sm edit-konten" data-id="1" data-konten="<?= $landing['desc_cover']; ?>"><i class="fas fa-edit"></i></a>
                        </div>
                    <?php endif; ?>
                </div>
                <a href="<?= base_url('/ayo_berangkat'); ?>" type="button" class="btn btn-warning btn-md rounded-4 fw-bolder">Ayo Berangkat!</a>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->

<!-- Content 1 -->
<div class="py-1 text-center bg-orange">
    <div class="container-lg mt-5 mb-5 px-3 px-sm-4 px-lg-0">
        <div class="mt-md-4 pt-md-4 font-poppins">
            <p class="lead fs-text">
                <?= $landing['desc_tournyaka']; ?>
            </p>
            <?php if (in_groups('admin')) : ?>
                <div class="">
                    <a href="#" class="btn btn-success btn-sm edit-konten" data-id="2" data-konten="<?= $landing['desc_tournyaka']; ?>"><i class="fas fa-edit"></i></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="mt-4 mt-md-5 col-3 col-md-2 mx-auto">
            <img class="img-fluid" src="<?= base_url('/assets/img/tournyaka/logo.png'); ?>" height="135" width="135" alt="">
        </div>
    </div>
</div>
<!-- End Content 1 -->

<!-- Content 2 -->
<div class="py-1 font-poppins">
    <div class="container-lg my-5 px-3 px-sm-4 px-lg-0">
        <div class="mt-md-4 pt-md-4 text-center col-lg-4 col-md-6 col-9 mx-auto">
            <h1 class="display-6 fw-bold">Mengapa harus tournyaka?</h1>
        </div>
        <div class="row mt-3 pt-3 mt-md-5">
            <div class="col-1 my-auto">
                <a class="rounded-icon"></a>
            </div>
            <div class="col-5 ps-4 ps-md-5 my-auto navbar-expand-md">
                <h4 class="fs-text fs-text-sm fw-bold my-auto mb-md-2">Liburan sesuai mood kamu</h4>
                <div class="collapse navbar-collapse pe-4 text-justify">
                    <p>Tournyaka akan memberikan rekomendasi tempat wisata dan suasana liburan yang sesuai dengan suasana hati kamu.</p>
                </div>
            </div>
            <div class="col-1 my-auto">
                <a class="rounded-icon"></a>
            </div>
            <div class="col-5 ps-4 ps-md-5 my-auto navbar-expand-md">
                <h4 class="fs-text fs-text-sm fw-bold my-auto mb-md-2">Bikin nyesel</h4>
                <div class="collapse navbar-collapse pe-4 text-justify">
                    <p>Kamu akan auto nyesel deh kalo ke pangandaran tanpa ditemani Tournyaka.</p>
                </div>
            </div>
        </div>
        <div class="row mt-3 pt-3 mt-md-5">
            <div class="col-1 my-auto">
                <a class="rounded-icon"></a>
            </div>
            <div class="col-5 ps-4 ps-md-5 my-auto navbar-expand-md">
                <h4 class="fs-text fs-text-sm fw-bold my-auto mb-md-2">Banyak Pilihan dan gak ribet</h4>
                <div class="collapse navbar-collapse pe-4 text-justify">
                    <p>Tournyaka menyediakan beragam trip ke berbagai tempat wisata di Pangandaran yang bisa kamu custom sesuai keinginan kamu.</p>
                </div>
            </div>
            <div class="col-1 my-auto">
                <a class="rounded-icon"></a>
            </div>
            <div class="col-5 ps-4 ps-md-5 my-auto navbar-expand-md">
                <h4 class="fs-text fs-text-sm fw-bold my-auto mb-md-2">Pengalaman liburan yang lebih personal</h4>
                <div class="collapse navbar-collapse pe-4 text-justify">
                    <p>Rencana perjalanan diberikan sesuai dengan keinginan kamu, pastinya kamu akan mendapatkan pengalaman liburan yang lebih personal.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content 2 -->

<!-- Content 3 -->
<div class="py-1 font-poppins">
    <div class="container-lg my-5 px-3 px-sm-4 px-lg-0">
        <div class="mt-md-4 pt-md-4 col-md-6 mx-2 text-justify">
            <h1 class="display-6 fw-bold">Destinasi Terbaik</h1>
            <p>Di Pangandaran banyak loh destinasi yang bisa bikin kamu nyaman dan ngelupain masalah yang lagi kamu hadapin.</p>
        </div>
        <div class="row mt-md-5">
            <div class="owl-carousel owl-theme">
                <?php foreach ($destinasi as $d) : ?>
                    <div class="col">
                        <div class="card mx-2 h-100 border-0">
                            <img src="<?= base_url('/assets/img/destinasi/' . $d['img_destinasi']); ?>" height="200" class="card-img-top rounded-4" alt="...">
                            <div class="card-body px-1 text-justify">
                                <div id="title">
                                    <h5 class="card-title text-start collapse"><?= $d['nm_destinasi']; ?></h5>
                                </div>
                                <div id="summary">
                                    <p class="card-text collapse"><?= $d['desc_destinasi']; ?></p>
                                </div>
                                <div class="text-end">
                                    <span class="bg-warning rounded-pill px-3">
                                        <a href="<?= base_url('/destinasi#' . $d['nm_destinasi']); ?>" class=" text-decoration-none text-black fw-bold">Read more</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Content 3 -->

<?= $this->endSection() ?>
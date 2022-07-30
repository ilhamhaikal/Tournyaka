<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="py-1 mb-5 text-center font-poppins">
    <div class="container-lg mt-4 mb-5 px-3 px-sm-4 px-lg-0">
        <div class="pt-md-4 text-center col-lg-4 col-md-6 col-9 mx-auto">
            <h1 class="display-6 fw-bold">Destinasi Wisata di Pangandaran</h1>
        </div>
        <?php foreach ($destinasi as $d) : ?>
            <div class="row mt-3 pt-md-4 text-justify justify-content-center" id="<?= $d['nm_destinasi']; ?>">
                <h3 class="text-center fs-4 fw-bold"><?= $d['nm_destinasi']; ?></h3>
                <div class="col col-12 col-md-8">
                    <img src="<?= base_url('/assets/img/destinasi/' . $d['img_destinasi']); ?>" class="img-fluid rounded-4" alt="">
                </div>
                <div class="mt-md-5 mt-3">
                    <p class="lead fs-text"><?= $d['desc_destinasi']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- End Content -->

<?= $this->endSection() ?>
<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content -->
<div class="py-1 mb-5 text-center font-poppins">
    <div class="container-lg mt-4 mb-5 px-3 px-sm-4 px-lg-0">
        <div class="pt-md-4 text-center col-lg-4 col-md-6 col-9 mx-auto">
            <h1 class="display-6 fw-bold">Pangandaran’s Trivia</h1>
        </div>
        <div class="row mt-3 pt-md-4 text-justify justify-content-center">
            <div class="col col-12 col-md-8">
                <img src="<?= base_url('/assets/img/destinasi/1O2A9989.jpg') ?>" class="img-fluid rounded-4" alt="">
            </div>
            <h3 class="text-center mt-5 display-6 fw-bold">Tahukah Kamu?</h3>
            <div class="mt-3">
                <p class="lead fs-text">Di Pasir putih Pangandaran terdapat bangkai kapal yang ditenggelamkan oleh Bu Susi Pudjiastuti. Rencananya kapal tersebut akan dipindahkan ke museum dengan cara dipotong dan mengeluarkan biaya operasional sekitar Rp 1 Milyar. Pangandaran juga mempunyai tempat pacuan kuda loh yang berlokasi di Legokjawa, Cimerak Kabupaten Pangandaran. Disini juga pernah PORDASI (Persatuan Olahraga Berkuda Seluruh Indonesia) melaksanakan latihan bersama. Di Pangandaran terdapat dua situs Goa Jepang, pertama berlokasi di kawasan hutan lindung (Cagar Alam), dan yang kedua terletak di kawasan rancakalong, desa putra pinggan. Kedua Goa tersebut memiliki fungsi yang sama yaitu sebagai bunker dan benteng pertahanan tentara DAI NIPPON pada masa perang dunia 2.</p>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<?= $this->endSection() ?>
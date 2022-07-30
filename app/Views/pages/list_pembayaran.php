<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content 1 -->
<div class="py-1 mb-5 font-poppins">
    <div class="container-lg mt-4 mb-5 px-3 px-sm-4 px-lg-0">
        <div class="pt-md-4 text-center col-9 mx-auto">
            <h1 class="display-6 fw-bold">List Pembayaran</h1>
            <?php foreach ($pembayaran as $d) : ?>
                <div class="row mt-3 pt-md-4 text-justify">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center text-center">
                                <div class="col">
                                    <h5 class="card-text"><?= $event['nm_event'] ?></h5>
                                </div>
                                <div class="col">
                                    <p class="card-text">VA : <?= $d['va_number'] ?></p>
                                </div>
                                <div class="col">
                                    <p class="card-text"><?= $d['transaction_status'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End Content 1 -->

<?= $this->endSection() ?>
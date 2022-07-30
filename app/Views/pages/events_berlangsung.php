<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Header -->
<div class="text-justify" style="background-image: url('<?= base_url('/assets/img/tournyaka/header.jpg'); ?>'); background-size: cover; background-position: center center;">
    <div class="bg-dark bg-opacity-50 py-5" style="background-size: cover;">
        <div class="container-lg py-4 mb-5 pb-5 px-3 px-sm-4 px-lg-0 text-white text-center">
            <div class="col-lg-6 my-3 pt-md-5 font-libre mx-auto">
                <h1 class="display-1 ls-0 fw-bold">tournyaka</h1>
            </div>
            <hr class="mx-auto" width="10%" size="4%" style=" opacity: 1;">
            <div class="col-md-8 col-lg-6 font-artifika mx-auto">
                <p class="lead mb-4"><?= $landing['desc_event']; ?></p>
                <?php if (in_groups('admin')) : ?>
                    <a href="#" class="btn btn-success btn-sm edit-konten" data-id="3" data-konten="<?= $landing['desc_event']; ?>"><i class="fas fa-edit"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->

<!-- Content 1 -->
<div class="py-1 text-center">
    <div class="container-lg px-3 px-sm-4 px-lg-0">
        <div class="mt-md-2 pt-md-2 pt-3 font-poppins text-md-start">
            <p class="lead fs-text">
                <a class="btn btn-middle btn-outline-warning mb-2">Paket Wisata</a>
                <a class="btn btn-middle btn-outline-warning mb-2">Hotel</a>
                <a class="btn btn-middle btn-outline-warning mb-2">Tourguide</a>
                <a class="btn btn-middle btn-outline-warning mb-2">Transportasi</a>
                <a class="btn btn-middle btn-outline-warning mb-2">itenerary</a>
            </p>
        </div>
    </div>
    <hr>
</div>
<!-- End Content 1 -->

<!-- Content 2-->
<div class="py-1">
    <div class="container-lg px-3 px-sm-4 px-lg-0">
        <div class="mt-md-2 pt-md-2 pt-3 font-poppins">
            <div class="row align-items-center text-center">
                <div class="col">
                    <hr>
                </div>
                <div class="col col-md-5 col-lg-4 text-secondary">
                    <h3 class="display-7">Event Berlangsung</h3>
                </div>
                <div class="col">
                    <hr>
                </div>
            </div>
        </div>

        <!-- event berlangsung -->
        <?php foreach ($events as $e) : ?>
            <div class="mt-md-2 pt-md-2 pt-3 font-poppins">
                <div class="row row-cols-1 row-cols-md-2 mt-3 mt-md-4 justify-content-between">
                    <div class="col">
                        <div class="row">
                            <h2><?= $e['nm_event']; ?></h2>
                            <p><?= $e['desc_event']; ?></p>
                        </div>
                        <div class="row mb-2 mx-auto mt-md-5 pt-md-5 align-items-center">
                            <div class="col col-auto">
                                <i class="far fa-calendar text-danger fa-2x"></i>
                            </div>
                            <div class="col col-auto">
                                <?php
                                $date = $e['date_event'];
                                $tgl_event = date("d, F Y", strtotime($date));
                                ?>
                                <h5 class="fs-text mt-2"><?= $tgl_event; ?></h5>
                                <p>Rp.<del><?= number_format($e['harga_event'], 2, ',', '.'); ?></del> / Rp.<?= number_format($e['harga_diskon'], 2, ',', '.'); ?></p>
                            </div>
                            <div class="col col-auto">
                                <input type="hidden" class="id" value="<?= $e['id'] ?>">
                                <div class="btn-pay">

                                    <!-- <button type="button" class="btn btn-warning btn-sm rounded-pill" id="pay-button">
                                        JOIN HERE
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <img src="<?= base_url('/assets/img/event/' . $e['img_event']); ?>" class="img-fluid">
                    </div>
                    <div class="col">
                        <hr>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Event Berlangsung -->

        <div class="mt-md-2 mb-4 pt-md-2 pt-3 font-poppins text-center">
            <a href="<?php echo base_url('/events_terlaksana') ?>" class="btn btn-footer btn-warning rounded-pill">Lihat Event Lainnya</a>
        </div>
    </div>
</div>
<!-- End Content 2 -->

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script type="text/javascript">
    $(document).ready(function() {
        transaksi();
    });

    function transaksi() {
        const id = $('.id').val();
        $.ajax({
            type: "POST",
            url: "event/pembayaran",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.btn-pay').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection() ?>
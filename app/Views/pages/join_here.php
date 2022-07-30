<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Header -->
<div class="py-1 text-center bg-orange">
    <div class="container-lg mt-5 mb-5 px-3 px-sm-4 px-lg-0">
        <div class="mt-md-4 pt-md-4 font-poppins">
            <div class="row justify-content-center g-2 g-md-4">
                <div class="col col-12 col-md-8">
                    <div class="ratio" style="--bs-aspect-ratio: 50%;">
                        <iframe src="https://tournyaka.com/<?= $join_here['video'] ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col col-10 col-md-4 bg-quiz">
                    <div class="row h-100 align-items-center">
                        <div class="col">
                            <!-- Btn Mulai Quiz -->
                            <div class="btn_start">
                                <button class="btn btn-primary" id="btnMulai" disabled>Mulai Quiz</button>
                            </div>

                            <!-- Rules Quiz -->
                            <div class="bg-white border border-top-0 rounded-3 rules" style="display: none;">
                                <div class="row pt-2 mx-auto bg-primary rounded-top align-items-center">
                                    <div class="col">
                                        <h5 class="card-title text-orange">Rules Quiz</h5>
                                    </div>
                                </div>
                                <div class="row mx-auto align-items-center">
                                    <div class="col my-2">
                                        <ol class="text-start">
                                            <li>Rule 1</li>
                                            <li>Rule 2</li>
                                            <li>Rule 3</li>
                                        </ol>
                                        <div class="btn_lanjut">
                                            <button class="btn btn-primary">Mulai Quiz</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Rules Quiz -->

                            <!-- Soal Quiz -->
                            <div class="bg-white border border-top-0 rounded-3 soal" style="display: none;">
                                <div class="row pt-2 mx-auto bg-primary rounded-top align-items-center justify-content-end">
                                    <div class="col-6">
                                        <h5 class="card-title text-orange">Soal Quiz</h5>
                                    </div>
                                    <div class="col-3 text-end">
                                        <h4><span class="badge text-primary rounded-pill bg-orange timer w-100"><i class="fas fa-spinner fa-spin"></i></span></h4>
                                    </div>
                                </div>
                                <div class="row my-2 text-start mx-auto align-items-center">
                                    <div class="col">
                                        <div class="soal_text">
                                            <!-- <h5>1. Soal 1</h5> -->
                                        </div>
                                        <div class="option_text">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2 bg-light mx-auto align-items-center border-top">
                                    <div class="col m-2 mb-0">
                                        <div class="total_soal">
                                            <!-- <span>
                                                <p><strong>2</strong> dari <strong>5</strong> Soal</p>
                                            </span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Soal Quiz -->

                            <!-- Modal Selesai -->
                            <div class="modal fade result" id="selesaiModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <h3 class="text-primary"><i class="fas fa-crown fa-3x"></i></h3>
                                            </div>
                                            <h4 class="fw-bold">Selesai</h4>
                                            <div class="score-text">

                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center border-0">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Selesai -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->

<!--conten virtual tour-->
<div class="py-1 mb-5 text-center font-poppins">
    <div class="py-1 text-center bg-shadow">
        <div class="container-lg mt-4 mb-5 px-3 px-sm-4 px-lg-0">
            <div class="pt-md-4 text-center col-lg-4 col-md-6 col-9 mx-auto">
                <h1 class=" "><?= $join_here['Judul']; ?></h1>
            </div>
            <div class="mt-3 pt-md-4 text-justify">
                <p class="lead fs-text"><?= $join_here['konten']; ?></p>
            </div>
        </div>
    </div>
</div>
<!--end conten-->

<?= $this->endSection() ?>
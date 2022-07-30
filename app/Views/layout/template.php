<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/tournyaka/logo.png') ?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Google Fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Artifika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">

    <!-- MY CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

    <!-- CSS Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/owl.theme.default.min.css') ?>">

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title><?= $title; ?></title>
</head>

<body>
    <?= $this->include('layout/navbar') ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('layout/footer') ?>

    <!-- Modal Edit Konten -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Konten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/konten/update" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="konten_id" class="konten-id">
                        <textarea class="form-control konten" name="konten" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Script JS -->
    <script src="<?php echo base_url('/assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('/assets/js/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('/assets/js/scripts.js') ?>"></script>
    <script src="<?php echo base_url('/assets/js/soal_quiz.js') ?>"></script>

    <!-- Plugins sweet alerts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>
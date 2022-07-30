<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/tournyaka/logo.png') ?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('/assets/admin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/admin/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/admin/css/styles.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/admin/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">



    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/assets/admin/vendor/jquery/jquery.min.js') ?>"></script>
    <title><?= $title; ?></title>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?= $this->include('admin/layout/sidebar') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?= $this->include('admin/layout/topbar') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?= $this->renderSection('content'); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; <?= date('Y'); ?> Tournyaka</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/assets/admin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>


    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/assets/admin/js/sb-admin-2.min.js') ?>"></script>

    <!-- CRUD scripts -->
    <script src="<?= base_url('/assets/admin/js/admin.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('/assets/admin/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/admin/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Plugins sweet alerts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- plugins date time picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="<?= base_url('/assets/admin/js/bootstrap-datetimepicker.min.js'); ?>"></script>
</body>

</html>
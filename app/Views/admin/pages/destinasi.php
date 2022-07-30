<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-orange"><?= $heading; ?></h1>
</div>

<!-- DataTables Destinasi -->
<div class="card shadow mb-4">
    <div class="d-sm-flex align-items-center text-center card-header py-3 justify-content-between">
        <h6 class="font-weight-bold">Data Destinasi Wisata</h6>
        <button type="button" class="btn btn-sm btn-primary shadow-sm btn-plus-destinasi"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
    </div>
    <div class="card-body">
        <div class="table-responsive view-data">

        </div>
    </div>
</div>

<div class="modal-destinasi" style="display: none;"></div>

<script>
    $(document).ready(function() {
        // Panggil fungsi get data destinasi
        dataDestinasi();

        // Tambah data destinasi
        $('.btn-plus-destinasi').on('click', function() {
            $.ajax({
                type: "GET",
                url: "destinasi/form_tambah",
                dataType: "json",
                success: function(response) {
                    $('.modal-destinasi').html(response.data).show();
                    $('#tambahDestinasiModal').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-orange"><?= $heading; ?></h1>
</div>

<!-- DataTables events -->
<div class="card shadow mb-4">
    <div class="d-sm-flex align-items-center text-center card-header py-3 justify-content-between">
        <h6 class="font-weight-bold">Data Events</h6>
        <button type="button" class="btn btn-sm btn-primary shadow-sm btn-plus-events"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
    </div>
    <div class="card-body">
        <div class="table-responsive view-data">

        </div>
    </div>
</div>

<div class="modal-events" style="display: none;"></div>

<script>
    $(document).ready(function() {
        // Panggil fungsi get data events
        dataEvents();

        // Tambah data events
        $('.btn-plus-events').on('click', function() {
            $.ajax({
                type: "GET",
                url: "events/form_tambah",
                dataType: "json",
                success: function(response) {
                    $('.modal-events').html(response.data).show();
                    $('#tambahEventsModal').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
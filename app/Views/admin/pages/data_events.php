<table class="table table-bordered" id="dataTableEvents" width="100%" cellspacing="0">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Events</th>
            <th>Waktu Events</th>
            <th>Status Events</th>
            <th>Harga Events (Diskon)</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach ($events as $d) :
            $no++;
            $date = $d['date_event'];
            $tgl_event = date("d, M Y", strtotime($date));
        ?>
            <tr>
                <td class="text-center align-middle"><?= $no; ?></td>
                <td class="align-middle"><?= $d['nm_event']; ?></td>
                <td class="align-middle text-center"><?= $tgl_event . " " . $d['time_event'];; ?></td>
                <td class="align-middle text-center">
                    <?php if ($d['terlaksana'] == 0) : ?>
                        <span class="badge rounded-pill bg-warning text-dark">Berlangsung</span>
                    <?php else : ?>
                        <span class="badge rounded-pill bg-success">Terlaksana</span>
                    <?php endif; ?>
                </td>
                <td class="align-middle text-center">
                    Rp.<?= number_format($d['harga_event'], 2, ',', '.'); ?> (Rp.<?= number_format($d['harga_diskon'], 2, ',', '.'); ?>)
                </td>
                <td class="text-center">
                    <!-- btn detail -->
                    <button type="button" class="btn btn-success btn-sm mb-1" style="width: 35px;" onclick="view_event('<?= $d['id']; ?>')">
                        <i class="fas fa-eye"></i>
                    </button>

                    <!-- btn edit -->
                    <button type="button" class="btn btn-primary btn-sm mb-1" style="width: 35px;" onclick="edit_event('<?= $d['id']; ?>')">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- btn delete -->
                    <button type="button" class="btn btn-danger btn-sm mb-1" style="width: 35px;" onclick="hapus_event('<?= $d['id']; ?>','<?= $d['nm_event']; ?>')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#dataTableEvents').DataTable();
    });

    function view_event(id) {
        $.ajax({
            type: "post",
            url: "events/form_edit",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.modal-events').html(response.data).show();
                $('#viewEventsModal').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function edit_event(id) {
        $.ajax({
            type: "post",
            url: "events/form_edit",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.modal-events').html(response.data).show();
                $('#editEventsModal').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus_event(id, nm_event) {
        Swal.fire({
            title: 'Hapus',
            text: `Yakin akan menghapus data destinasi ${nm_event}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "events/delete",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        // alert(response.sukses);
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.sukses
                        });
                        dataEvents();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        })
    }
</script>
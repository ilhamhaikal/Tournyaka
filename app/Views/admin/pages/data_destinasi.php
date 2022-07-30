<table class="table table-bordered" id="dataTableDestinasi" width="100%" cellspacing="0">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Destinasi</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach ($destinasi as $d) :
            $no++;
        ?>
            <tr>
                <td class="text-center align-middle"><?= $no; ?></td>
                <td class="align-middle"><?= $d['nm_destinasi']; ?></td>
                <td class="text-center">
                    <!-- btn detail -->
                    <button type="button" class="btn btn-success btn-sm mb-1" style="width: 35px;" onclick="view_destinasi('<?= $d['id']; ?>')">
                        <i class="fas fa-eye"></i>
                    </button>

                    <!-- btn edit -->
                    <button type="button" class="btn btn-primary btn-sm mb-1" style="width: 35px;" onclick="edit_destinasi('<?= $d['id']; ?>')">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- btn delete -->
                    <button type="button" class="btn btn-danger btn-sm mb-1" style="width: 35px;" onclick="hapus_destinasi('<?= $d['id']; ?>','<?= $d['nm_destinasi']; ?>')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#dataTableDestinasi').DataTable();
    });

    function edit_destinasi(id) {
        $.ajax({
            type: "post",
            url: "destinasi/form_edit",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.modal-destinasi').html(response.data).show();
                $('#editDestinasiModal').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function view_destinasi(id) {
        $.ajax({
            type: "post",
            url: "destinasi/form_edit",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.modal-destinasi').html(response.data).show();
                $('#viewDestinasiModal').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus_destinasi(id, nm_destinasi) {
        Swal.fire({
            title: 'Hapus',
            text: `Yakin akan menghapus data destinasi ${nm_destinasi}?`,
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
                    url: "destinasi/delete",
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
                        dataDestinasi();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        })
    }
</script>
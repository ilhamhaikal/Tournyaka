<!-- Modal Tambah Destinasi -->
<div class="modal fade" id="tambahDestinasiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="destinasi/tambah_data" class="form-tmbh-destinasi" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="nm_destinasi" class="form-label">Destinasi</label>
                        <input type="text" class="form-control" id="nm_destinasi" name="nm_destinasi" placeholder="Masukan Destinasi">
                        <div class="ms-2 invalid-feedback error-nm-destinasi">

                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="img_destinasi" class="form-label">Gambar Destinasi</label>
                        <input type="file" class="form-control" id="img_destinasi" name="img_destinasi">
                        <div class="ms-2 invalid-feedback error-img-destinasi">

                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="desc_destinasi" class="form-label">Deskripsi Destinasi</label>
                        <textarea class="form-control" id="desc_destinasi" name="desc_destinasi" placeholder="Masukan Deskripsi Destinasi" style="height: 200px"></textarea>
                        <div class="ms-2 invalid-feedback error-desc-destinasi">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-plus">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-plus').click(function(e) {
            e.preventDefault();

            let form = $('.form-tmbh-destinasi')[0];

            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "destinasi/tambah_data",
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-plus').attr('disable', 'disabled');
                    $('.btn-plus').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.btn-plus').removeAttr('disable');
                    $('.btn-plus').html('Tambah');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nm_destinasi) {
                            $('#nm_destinasi').addClass('is-invalid');
                            $('.error-nm-destinasi').html(response.error.nm_destinasi);
                        } else {
                            $('#nm_destinasi').removeClass('is-invalid');
                            $('#nm_destinasi').addClass('is-valid');
                            $('.error-nm-destinasi').html('');
                        }

                        if (response.error.desc_destinasi) {
                            $('#desc_destinasi').addClass('is-invalid');
                            $('.error-desc-destinasi').html(response.error.desc_destinasi);
                        } else {
                            $('#desc_destinasi').removeClass('is-invalid');
                            $('.error-desc-destinasi').html('');
                        }

                        if (response.error.img_destinasi) {
                            $('#img_destinasi').addClass('is-invalid');
                            $('.error-img-destinasi').html(response.error.img_destinasi);
                        } else {
                            $('#img_destinasi').removeClass('is-invalid');
                            $('.error-img-destinasi').html('');
                        }
                    } else {
                        // alert(response.sukses);
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.sukses
                        });
                        $('#tambahDestinasiModal').modal('hide');
                        dataDestinasi();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>
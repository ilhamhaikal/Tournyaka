<!-- Modal Edit Destinasi -->
<div class="modal fade" id="editDestinasiModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="destinasi/update_data" class="form-edit-destinasi" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                    <input type="hidden" class="form-control" id="old_img" name="old_img" value="<?= $img_destinasi; ?>">
                    <div class="mb-2">
                        <label for="nm_destinasi" class="form-label">Destinasi</label>
                        <input type="text" class="form-control" id="nm_destinasi" name="nm_destinasi" placeholder="Masukan Destinasi" value="<?= $nm_destinasi; ?>">
                        <div class="ms-2 invalid-feedback error-nm-destinasi">

                        </div>
                    </div>
                    <label for="img_destinasi">Gambar Destinasi</label>
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="/assets/img/destinasi/<?= $img_destinasi; ?>" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-10">
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="img_destinasi" name="img_destinasi" onchange="previewImg()">
                                <label class="custom-file-label" for="img_destinasi"><?= $img_destinasi; ?></label>
                                <div class="ms-2 invalid-feedback error-img-destinasi">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="desc_destinasi" class="form-label">Deskripsi Destinasi</label>
                        <textarea class="form-control" id="desc_destinasi" name="desc_destinasi" placeholder="Masukan Deskripsi Destinasi" style="height: 200px"><?= $desc_destinasi; ?></textarea>
                        <div class="ms-2 invalid-feedback error-desc-destinasi">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal View Destinasi -->
<div class="modal fade" id="viewDestinasiModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"><?= $nm_destinasi; ?></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <img src="<?= base_url('/assets/img/destinasi/' . $img_destinasi); ?>" class="img-fluid" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImg() {
        const image = document.querySelector('#img_destinasi');
        const image_label = document.querySelector('.custom-file-label');
        const img_preview = document.querySelector('.img-preview');

        image_label.textContent = image.files[0].name;

        const file_image = new FileReader();
        file_image.readAsDataURL(image.files[0]);

        file_image.onload = function(e) {
            img_preview.src = e.target.result;
        }
    }

    $(document).ready(function() {
        $('.btn-update').click(function(e) {
            e.preventDefault();

            let form = $('.form-edit-destinasi')[0];

            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "destinasi/update_data",
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
                    $('.btn-plus').html('Update');
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
                        $('#editDestinasiModal').modal('hide');
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
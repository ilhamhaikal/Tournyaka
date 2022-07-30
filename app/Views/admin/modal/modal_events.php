<!-- Modal Edit event -->
<div class="modal fade" id="editEventsModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="events/update_data" class="form-edit-event" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                    <input type="hidden" class="form-control" id="old_img" name="old_img" value="<?= $img_event; ?>">
                    <div class="mb-2">
                        <label for="nm_event" class="form-label">Event</label>
                        <input type="text" class="form-control" id="nm_event" name="nm_event" placeholder="Masukan Event" value="<?= $nm_event; ?>">
                        <div class="ms-2 invalid-feedback error-nm-event">

                        </div>
                    </div>
                    <label for="img_event">Gambar Event</label>
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="/assets/img/event/<?= $img_event; ?>" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-10">
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="img_event" name="img_event" onchange="previewImg()">
                                <label class="custom-file-label" for="img_event"><?= $img_event; ?></label>
                                <div class="ms-2 invalid-feedback error-img-event">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="date_event" class="form-label">Tanggal Event</label>
                        <input type='text' class="form-control" id='date_event' name="date_event">
                        <div class="ms-2 invalid-feedback error-date-event">

                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col">
                                <label for="harga_event" class="form-label">Harga Event</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type='text' class="form-control" id='harga_event' name="harga_event" placeholder="0" value="<?= $harga_event; ?>">
                                    <div class="ms-2 invalid-feedback error-harga-event">

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="harga_diskon" class="form-label">Harga Diskon</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type='text' class="form-control" id='harga_diskon' name="harga_diskon" placeholder="0" value="<?= $harga_diskon; ?>">
                                </div>
                                <div class="ms-2 invalid-feedback error-harga-diskon">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="desc_event" class="form-label">Deskripsi event</label>
                        <textarea class="form-control" id="desc_event" name="desc_event" placeholder="Masukan Deskripsi Event" style="height: 200px"><?= $desc_event; ?></textarea>
                        <div class="ms-2 invalid-feedback error-desc-event">

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

<!-- Modal View event -->
<div class="modal fade" id="viewEventsModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"><?= $nm_event; ?></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <img src="<?= base_url('/assets/img/event/' . $img_event); ?>" class="img-fluid" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#date_event').datetimepicker();

        const y = <?= date("Y", strtotime($date_event)) ?>;
        const m = <?= date("m", strtotime($date_event)) ?>;
        const d = <?= date("d", strtotime($date_event)) ?>;
        const h = <?= date("H", strtotime($date_event)) ?>;
        const i = <?= date("i", strtotime($date_event)) ?>;
        $('#date_event').data("DateTimePicker").date(new Date(y, m - 1, d, h, i));
        $('#date_event').data("DateTimePicker").minDate(new Date());
    });

    function previewImg() {
        const image = document.querySelector('#img_event');
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

            let form = $('.form-edit-event')[0];

            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "events/update_data",
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
                        if (response.error.nm_event) {
                            $('#nm_event').addClass('is-invalid');
                            $('.error-nm-event').html(response.error.nm_event);
                        } else {
                            $('#nm_event').removeClass('is-invalid');
                            $('#nm_event').addClass('is-valid');
                            $('.error-nm-event').html('');
                        }

                        if (response.error.desc_event) {
                            $('#desc_event').addClass('is-invalid');
                            $('.error-desc-event').html(response.error.desc_event);
                        } else {
                            $('#desc_event').removeClass('is-invalid');
                            $('.error-desc-event').html('');
                        }

                        if (response.error.img_event) {
                            $('#img_event').addClass('is-invalid');
                            $('.error-img-event').html(response.error.img_event);
                        } else {
                            $('#img_event').removeClass('is-invalid');
                            $('.error-img-event').html('');
                        }

                        if (response.error.date_event) {
                            $('#date_event').addClass('is-invalid');
                            $('.error-date-event').html(response.error.date_event);
                        } else {
                            $('#date_event').removeClass('is-invalid');
                            $('.error-date-event').html('');
                        }

                        if (response.error.harga_event) {
                            $('#harga_event').addClass('is-invalid');
                            $('.error-harga-event').html(response.error.harga_event);
                        } else {
                            $('#harga_event').removeClass('is-invalid');
                            $('.error-harga-event').html('');
                        }
                    } else {
                        // alert(response.sukses);
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.sukses
                        });
                        $('#editEventsModal').modal('hide');
                        dataEvents();
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
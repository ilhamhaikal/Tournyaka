<!-- Modal Tambah Events -->
<div class="modal fade" id="tambahEventsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="events/tambah_data" class="form-tmbh-event" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="nm_event" class="form-label">Event</label>
                        <input type="text" class="form-control" id="nm_event" name="nm_event" placeholder="Masukan Event">
                        <div class="ms-2 invalid-feedback error-nm-event">

                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="img_event" class="form-label">Gambar Event</label>
                        <input type="file" class="form-control" id="img_event" name="img_event">
                        <div class="ms-2 invalid-feedback error-img-event">

                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="date_event" class="form-label">Tanggal Event</label>
                        <input type='text' class="form-control" id='date_event' name="date_event" placeholder="Pilih Tanggal">
                        <div class="ms-2 invalid-feedback error-date-event">

                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="row">
                            <div class="col">
                                <label for="harga_event" class="form-label">Harga Event</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type='text' class="form-control" id='harga_event' name="harga_event" placeholder="0">
                                    <div class="ms-2 invalid-feedback error-harga-event">

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="harga_diskon" class="form-label">Harga Diskon</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type='text' class="form-control" id='harga_diskon' name="harga_diskon" placeholder="0">
                                </div>
                                <div class="ms-2 invalid-feedback error-harga-diskon">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="desc_event" class="form-label">Deskripsi event</label>
                        <textarea class="form-control" id="desc_event" name="desc_event" placeholder="Masukan Deskripsi Event" style="height: 200px"></textarea>
                        <div class="ms-2 invalid-feedback error-desc-event">

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
    $(function() {
        $('#date_event').datetimepicker();

        $('#date_event').data("DateTimePicker").minDate(new Date());
    });

    $(document).ready(function() {
        $('.btn-plus').click(function(e) {
            e.preventDefault();

            let form = $('.form-tmbh-event')[0];

            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "events/tambah_data",
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
                        $('#tambahEventsModal').modal('hide');
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
<button type="button" class="btn btn-warning btn-sm rounded-pill" id="pay-button">
    JOIN HERE
</button>

<?php if (logged_in()) : ?>
    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $client_key ?>"></script>
    <script>
        function success() {
            $.ajax({
                type: "post",
                url: "event/finish",
                data: {
                    id_event: "<?php echo $id_event ?>"
                },
                dataType: "json",
                success: function(response) {

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
        $(document).ready(function() {
            success();
            document.getElementById('pay-button').onclick = function() {
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data, token) {
                    $.ajax({
                        type: "post",
                        url: "event/proses",
                        data: {
                            result: data,
                            token: token,
                            id_event: "<?php echo $id_event ?>",
                            status: type
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.data == "200") {
                                Swal.fire({
                                    title: 'Pembayaran Berhasil',
                                    text: "Silahkan Cek Email",
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                })
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                }

                // SnapToken acquired from previous step
                snap.pay('<?php echo $snapToken ?>', {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        changeResult('success', result, '<?php echo $snapToken ?>');
                        location.reload();
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        changeResult('pending', result, '<?php echo $snapToken ?>');

                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        changeResult('error', result, '<?php echo $snapToken ?>');
                    }
                });
            };
        });
    </script>
<?php else : ?>
    <script>
        $(document).ready(function() {
            document.getElementById('pay-button').onclick = function() {
                window.location.replace("/login");
            }
        });
    </script>
<?php endif; ?>
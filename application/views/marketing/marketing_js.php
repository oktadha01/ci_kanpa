<script>
    $("#marketperum").select2({
        placeholder: "Select a programming language",
        allowClear: true
    });
    load_data_perum();
    form_default();
    $('#btn-add-marketing').click(function(e) {
        $('#add-marketing, #btn-simpan-marketing, #btn-batal-marketing').show();
        $('#btn-add-marketing').hide();
        $('#btn-simpan-marketing').val('marketing');
    });
    $('#btn-batal-marketing').click(function(e) {
        form_default();
    });

    $('#btn-simpan-marketing').click(function(e) {
        var action = $('#btn-simpan-marketing').val();
        if (action == 'marketing') {
            const marketing = $('#file-foto-marketing').prop('files')[0];
            let formData = new FormData();
            formData.append('nm-marketing', $('#nm-marketing').val());
            formData.append('foto-marketing', marketing);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/simpan_data_marketing'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert('berhasil')
                    form_default();
                    load_data_perum();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });


        } else if (action == 'marketperum') {
            var perum = $("#marketperum").find(':selected').val();
            // alert(perum);
            let formData = new FormData();
            formData.append('id-marketing', $('#id-marketing').val());
            formData.append('bitly', $('#bitly').val());
            formData.append('id-perum', perum);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/simpan_data_marketperum'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert('berhasil')
                    form_default();
                    load_data_perum();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else if (action == 'edit') {
            const marketing = $('#file-foto-marketing').prop('files')[0];
            let formData = new FormData();
            formData.append('id-marketing', $('#id-marketing').val());
            formData.append('nm-marketing', $('#nm-marketing').val());
            formData.append('foto-marketing', marketing);
            formData.append('ceklis-ubah-foto-marketing', $('#ceklis-ubah-foto-marketing').val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('marketing/edit_data_marketing'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert('berhasil')
                    form_default();
                    load_data_perum();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }

    });
    $('#file-foto-marketing').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-marketing").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-marketing").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $(document).on("click", ".pilih-marketing", function() {
        var file = $(this).parents().find(".file-marketing");
        file.trigger("click");
    });
    $('#ceklis-ubah-foto-marketing').click(function(e) {
        if ($(this).is(":checked")) {
            $('#ceklis-ubah-foto-marketing').val('change-foto-marketing');
        } else {
            $('#ceklis-ubah-foto-marketing').val('');
        }
    });

    function form_default() {
        $('.btn-simpan-marketing').val('simpan');
        $('#add-marketing, #add-marketperum, #btn-simpan-marketing, #btn-batal-marketing').removeAttr('hidden', true).hide();
        $('#btn-add-marketing').show();

        $('#id-marketing,#nm-marketing').val('');
        $('#preview-foto-marketing').attr({
            src: ''
        });
        $('#ceklis-ubah-foto-marketing').prop('checked', false);
        $('.btn-batal-marketing').attr('hidden', true);
        $('#ceklis-ubah-marketing').attr('hidden', true);
    }

    function load_data_perum() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('Marketing/data_marketing'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-perum').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>
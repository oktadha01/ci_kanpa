<script>
    load_data_berita();
    $('#file-foto-berita').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-berita").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-berita").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $('#ceklis-ubah-foto-berita').click(function(e) {
        if ($(this).is(":checked")) {
            $('#ceklis-ubah-foto-berita').val('change-foto-berita');
        } else {
            $('#ceklis-ubah-foto-berita').val('');
        }
    });
    $('.btn-simpan-berita').click(function(e) {
        var action = $('.btn-simpan-berita').val();
        const foto_berita = $('#file-foto-berita').prop('files')[0];
        let formData = new FormData();
        formData.append('id-berita', $('#id-berita').val());
        formData.append('ceklis-ubah-foto-berita', $('#ceklis-ubah-foto-berita').val());
        formData.append('judul-berita', $('#judul-berita').val());
        formData.append('tgl-berita', $('#tgl-berita').val());
        formData.append('desk-berita', $('#desk-berita').val());
        formData.append('foto-berita', foto_berita);
        if (action == 'simpan') {
            alert('ya'); 
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('berita/simpan_data_berita'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert('berhasil')
                    // form_default();
                    load_data_berita();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('berita/edit_data_berita'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert('berhasil')
                    form_default();
                    load_data_berita();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });

        }
    });
    $('.btn-batal-berita').click(function(e) {

        form_default()
    });
    $(function() {
        $('#tgl-berita').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'DD MMMM YYYY'
            }
        })
    });

    function form_default() {
        $('.btn-simpan-berita').val('simpan');
        $('#id-berita,#judul-berita,#tgl-berita,#desk-berita,#file-foto-berita,#nm-foto-berita').val('');
        $('#preview-foto-berita').attr({
            src: ''
        });
        $('#ceklis-ubah-foto-berita').prop('checked', false);
        $('.btn-batal-berita').attr('hidden', true);
        $('#ceklis-ubah-berita').attr('hidden', true);
    }

    function load_data_berita() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('berita/data_berita'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-berita').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>
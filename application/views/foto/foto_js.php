<script>
    $('.data-tipe').click(function() {
        $('.data-foto').hide();
        $('.data-foto').hide().html('0');
        $('.data').removeClass('data-foto')
        $('#data' + $(this).data('id-foto-tipe')).addClass('data-foto');
        $('#id-foto-tipe').val($(this).data('id-foto-tipe'));
        let formData = new FormData();
        formData.append('id-foto-tipe', $('#id-foto-tipe').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Foto/data_foto_perum'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.data-foto').html(data).show();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    })
</script>
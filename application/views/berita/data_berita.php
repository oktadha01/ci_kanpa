<div class="faq">
    <div class="" data-aos="fade-up">
        <div class="row">
            <div class="accordion accordion-flush" id="faqlist">
                <table class="table">
                    <thead class="table__thead">
                        <tr>
                            <th class="table__th">Berita</th>
                            <th class="table__th">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="table__tbody">
                        <?php
                        foreach ($data_berita as $data) :
                        ?>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name"><?php echo $data->judul_berita; ?></p>
                                    </div>
                                </td>
                                <td class="table-row__td">
                                    <?php echo $data->tgl_berita; ?>
                                </td>
                               
                                <td class="row-td-action">
                                    <a href="#" class="btn-edit" data-id-berita="<?php echo $data->id_berita; ?>" data-judul-berita="<?php echo $data->judul_berita; ?>" data-tgl-berita="<?php echo $data->tgl_berita; ?>" data-desk-berita="<?php echo $data->desk_berita; ?>" data-foto-berita="<?php echo $data->foto_berita; ?>">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete" data-id-berita="<?php echo $data->id_berita; ?>" data-foto-berita="<?php echo $data->foto_berita; ?>">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <input type="text" id="id-berita" value="" hidden>
            </div>
        </div>
    </div>
</div>
<script>
    $('.btn-delete').click(function(e) {
        var el = this;
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-berita', $(this).data('id-berita'));
            formData.append('foto-berita', $(this).data('foto-berita'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('berita/delete_data_berita') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert('berhasil');
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                    });
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('.btn-edit').click(function(e) {
        $('.btn-batal-berita').removeAttr('hidden', true);
        $(' #ceklis-ubah-berita').removeAttr('hidden', true);
        $('.btn-simpan-berita').val('edit');
        $('#id-berita').val($(this).data('id-berita'));
        $('#judul-berita').val($(this).data('judul-berita'));
        $('#tgl-berita').val($(this).data('tgl-berita'));
        $('#desk-berita').val($(this).data('desk-berita'));
        $('#foto-berita').val($(this).data('foto-berita'));
        $('#foto-lama').val($(this).data('foto-berita'));
        $('#preview-foto-berita').attr({
            src: '<?php echo base_url('upload'); ?>/' + $(this).data('foto-berita')
        });
    });
</script>
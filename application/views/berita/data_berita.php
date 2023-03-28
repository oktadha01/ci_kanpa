<div class="faq">
    <div class="" data-aos="fade-up">
        <div class="accordion accordion-flush" id="faqlist">
            <?php
            foreach ($data_berita as $data) :
            ?>
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed data-berita" type="button" data-id-berita="<?php echo $data->id_berita; ?>" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $data->id_berita; ?>">
                            <i class="bi bi-question-circle question-icon"></i>
                            <?php echo $data->judul_berita; ?>
                        </button>
                    </h3>
                    <div id="faq-content-<?php echo $data->id_berita; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            <!-- <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>" alt="" class="img-fluid"> -->
                            <div class="row mb-2 mt-3">
                                <div class="col">
                                    <button type="button" class="btn-edit-berita col-12 btn btn-sm btn-outline-warning" data-id-berita="<?php echo $data->id_berita; ?>" data-judul-berita="<?php echo $data->judul_berita; ?>" data-tgl-berita="<?php echo $data->tgl_berita; ?>" data-tag-berita="<?php echo $data->tag_berita; ?>" data-foto-berita="<?php echo $data->foto_berita; ?>"><i class="fa-regular fa-pen-to-square fa-beat"></i> Edit Berita</button>
                                </div>
                            </div>
                            <div id="berita-data<?php echo $data->id_berita; ?>" class="berita"></div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
<!-- <div class="faq">
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
</div> -->
<script>
    $('.data-berita').click(function() {
        $('.berita').hide().html('0');
        // alert('yaaa')
        var id_berita = $(this).data('id-berita');
        // alert(id_berita);
        let formData = new FormData();
        formData.append('id-berita', $(this).data('id-berita'));

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Berita/data_artikel_berita'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#berita-data' + id_berita).html(data).show();
                $('#id-berita').val(id_berita);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    })
    $('.btn-edit-berita').click(function() {
        form_default();
        $('.btn-tambah-berita').attr('hidden', true);
        $('.btn-simpan-berita, .btn-batal-berita').removeAttr('hidden', true);
        $('#form-berita').removeAttr('hidden', true);
        $(' #ceklis-ubah-berita').removeAttr('hidden', true);
        $('.btn-simpan-berita').val('edit');
        $('#id-berita').val($(this).data('id-berita'));
        $('#judul-berita').val($(this).data('judul-berita'));
        $('#tgl-berita').val($(this).data('tgl-berita'));
        $('#foto-berita').val($(this).data('foto-berita'));
        $('#foto-lama').val($(this).data('foto-berita'));
        $('#select-tag').val($(this).data('tag-berita'));
        $('#select-tag').select2().trigger('change');
        $('#preview-foto-berita').attr({
            src: '<?php echo base_url('upload'); ?>/' + $(this).data('foto-berita')
        });
    });

    // $('.btn-delete').click(function(e) {
    //     var el = this;
    //     var confirmalert = confirm("Are you sure?");
    //     if (confirmalert == true) {
    //         let formData = new FormData();
    //         formData.append('id-berita', $(this).data('id-berita'));
    //         formData.append('foto-berita', $(this).data('foto-berita'));
    //         $.ajax({
    //             type: 'POST',
    //             url: "<?php echo site_url('berita/delete_data_berita') ?>",
    //             data: formData,
    //             cache: false,
    //             processData: false,
    //             contentType: false,
    //             success: function(msg) {
    //                 // alert('berhasil');
    //                 $(el).closest('tr').css('background', 'tomato');
    //                 $(el).closest('tr').fadeOut(300, function() {
    //                     $(this).remove();
    //                 });
    //             },
    //             error: function() {
    //                 alert("Data Gagal Diupload");
    //             }
    //         });
    //     }
    // });
    // $('.btn-edit').click(function(e) {
    //     $('.btn-batal-berita').removeAttr('hidden', true);
    //     $(' #ceklis-ubah-berita').removeAttr('hidden', true);
    //     $('.btn-simpan-berita').val('edit');
    //     $('#id-berita').val($(this).data('id-berita'));
    //     $('#judul-berita').val($(this).data('judul-berita'));
    //     $('#tgl-berita').val($(this).data('tgl-berita'));
    //     $('#desk-berita').val($(this).data('desk-berita'));
    //     $('#foto-berita').val($(this).data('foto-berita'));
    //     $('#foto-lama').val($(this).data('foto-berita'));
    //     $('#preview-foto-berita').attr({
    //         src: '<?php echo base_url('upload'); ?>/' + $(this).data('foto-berita')
    //     });
    // });
</script>
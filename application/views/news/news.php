<section class="pt-5 mt-3" id="berita">
    <div class="section-header">

        <span><span class="font-auto size-50px">N</span><span class="font-auto size-30px">ews</span></span>
    </div>
    <div class="row">
        <?php
        $no = 3;
        foreach ($data_berita as $data) {
        ?>
            <div class="col-lg-6 col-12 " data-aos="zoom-in" data-aos-delay="<?php echo $no++; ?>00">
                <!-- <section class="content"> -->
                <div class="container-fluid">
                    <div class="border-radius">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="form-group">
                                    <!-- <div class="card"> -->
                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>" class="img-fluid p-1 border-radius img-berita" data-id-berita="<?php echo $data->id_berita; ?>" alt="red sample">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-12 p-3">
                                <h6 class="text-publishing"><?php echo $data->tgl_berita; ?></h6>
                                <h3 id="tittle-berita<?php echo $data->id_berita; ?>" data-id-berita="<?php echo $data->id_berita; ?>" class="tittle-news tittle<?php echo $data->id_berita; ?>"><?php echo $data->judul_berita; ?></h3>
                                <div id="konten-berita<?php echo $data->id_berita; ?>" class="mt-1 p-1 konten<?php echo $data->id_berita; ?> konten" hidden>
                                    <p class="text-konten-news"><?php echo $data->desk_berita; ?></p>
                                </div>
                                <h6 class="font-text-port"><?php echo $data->view_berita; ?> views</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </section> -->
            </div>
        <?php
        }
        ?>
    </div>
</section>
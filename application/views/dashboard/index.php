<style>
    .wafixed {
        position: fixed;
        margin-left: 1rem;
        bottom: 0px;
        z-index: 999;
    }

    .cards .card-user {
        background: #ffffff;
        width: -webkit-fill-available;
        display: inline-flex;
        align-items: center;
        padding: 0px 5px;
        /* opacity: 0; */
        /* pointer-events: none; */
        position: relative;
        justify-content: space-between;
        border-radius: 100px 45px 45px 100px;
        /* animation: animate 15s linear infinite; */
        /* animation-delay: calc(3s * var(--delay)); */
        margin: 19px 7px;
        box-shadow: 0px 0px 5px rgb(0 0 0 / 20%);

    }



    .card-user .content {
        display: flex;
        align-items: center;
        margin-right: 6px;
    }

    .cards .card-user .img {
        height: 59px;
        width: 59px;
        position: absolute;
        left: -5px;
        background: #fff;
        border-radius: 50%;
        padding: 5px;
        box-shadow: 0px 0px 5px rgb(0 0 0 / 20%);
    }

    .card-user .img img {
        height: 100%;
        width: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .card-user .details {
        margin: 1px 59px;
    }

    @media (max-width: 425px) {
        .card-user .details {
            margin: 12px 47px 0px 88px !important;
        }
    }

    @media (max-width: 768px) {
        .card-user .details {
            margin: 1px 59px !important;
        }
    }


    .details span {
        font-weight: bold;
        font-size: 15px;
    }

    .card-user a {
        text-decoration: none;
        padding: 2px 5px;
        border-radius: 9px;
        color: #fff;
        background: linear-gradient(to bottom, #92ff86 0%, #44edd4 100%);
        /* transition: all 0.3s ease; */
    }

    .card-user a:hover {
        transform: scale(0.94);
    }

    .font-marketing {
        z-index: 999;
        position: relative;
        display: block;
        top: 15rem;
    }

    .font-serif {
        font-family: serif;
        font-size: 1rem;
        margin-bottom: 0;
    }
</style>

<main id="main">
    <section id="home" class="pb-4 pt-5rem d-flex align-items-center">
        <div class="" >

            <div class="testimonials-slider swiper">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($data_foto_slide as $data) {
                    ?>

                        <div class="swiper-slide">
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_tipe; ?>" class="img-fluid" alt="">
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section id="about" class=" p-0">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <span><span class="font-auto size-50px">A</span><span class="font-auto size-30px">bout us</span></span>
                <p class="font-desk-service font-initial text-dark">PT Kanzu Permai Abadi merupakan perushaan yang bergerak di bidang perumahan.
                    Bermula pada tahun 2002 kami membuat kavling yang siap bangun dengan nama Bukit Asri 1 seluas 2 hektar yang terletak di Kec.
                    Ungaran Barat Kab. Semarang. Kemudian pada tahun 2006 usaha menjadi rumah pesan bangundi Bukit Asri 2 seluas 3 hektar.
                    Pada tahun 2018 kami melakukan pengembangan usaha perumahan Bukit Asri 4. Pada 2020 kami berkembang menjadi PT Kanzu Permai Abadi
                    untuk membuat perumahan yang berfokus di area Kabupaten Semarang.
                </p>
            </div>

        </div>
    </section><!-- End About Section -->
    <!-- ======= About Section ======= -->
    <section id="produk" class="pt-0">
        <div class="container" data-aos="fade-up">
            <div class="section-header pb-0">
                <span><span class="font-auto size-50px">P</span><span class="font-auto size-30px">roduct</span></span>
            </div>
            <div class="row gy-1">
                <?php
                foreach ($data_perum as $data) :
                    $id_perum = $data->id_perum;
                    $nm_perum = $data->nm_perum;
                    $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_perum);
                    // echo $tittle;
                    $nm = preg_replace("![^a-z0-9]+!i", " ", $tittle);
                ?>
                    <div class="col-lg-4 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item" style="background: #d3d3d317;border-radius: 6px;">
                            <?php
                            $sql = "SELECT foto_tipe, id_tipe, promo, luas_bangunan, luas_tanah FROM foto, tipe WHERE foto.id_foto_tipe=tipe.id_tipe AND tipe.id_tipe_perum = $id_perum AND foto.label_foto='display' ORDER BY  RAND() limit 1";
                            $query = $this->db->query($sql);
                            if ($query->num_rows() > 0) {
                                foreach ($query->result() as $foto) :
                            ?>
                                    <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?>">
                                        <div class="img border-r-0px" style="position: relative;">
                                            <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->foto_tipe; ?>" class=" size-img-dash img-fluid" alt="">

                                            <div class="bottom-right promo"><?php echo $foto->promo; ?></div>
                                        </div>
                                    </a>
                            <?php
                                endforeach;
                            }
                            ?>
                            <div class="m-2">
                                <span class="mb-0 font-text-port">Mulai</span>
                                <?php
                                $total_view = 0;
                                foreach ($data_tipe as $tipe) {
                                ?>
                                    <?php
                                    if ($data->id_perum == $tipe->id_tipe_perum) {
                                        $hasil = $tipe->view_tipe;
                                        $total_view += $hasil;
                                    ?>

                                <?php
                                    }
                                }
                                ?>
                                <span class="mb-0 font-text-port float-right"><?php echo $total_view; ?> views</span>
                                <br>
                                <?php
                                $sql = "SELECT hrg, satuan_hrg, id_tipe, luas_bangunan, luas_tanah  FROM tipe WHERE id_tipe_perum = $id_perum ORDER BY hrg ASC limit 1";
                                $query = $this->db->query($sql);
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $data_hrg) {
                                ?>
                                        <a class="btn-hrg-dash" href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data_hrg->luas_bangunan; ?>/<?php echo $data_hrg->luas_tanah; ?>">Rp <?php echo $data_hrg->hrg; ?> <sub><?php echo $data_hrg->satuan_hrg; ?></sub></a>
                                <?php
                                    }
                                }
                                ?>
                                <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?>" style="color:black;">
                                    <h4 class="text-nm-perum mb-0"><?php echo $data->nm_perum; ?> - Tipe mulai</h4>
                                </a>
                                <?php
                                foreach ($data_tipe as $tipe) {
                                ?>
                                    <?php
                                    if ($data->id_perum == $tipe->id_tipe_perum) {
                                    ?>
                                        <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $tipe->luas_bangunan; ?>/<?php echo $tipe->luas_tanah; ?>">
                                            <button type="button" id="" class="btn btn-sm mb-2 btn-outline-info"><?php echo $tipe->luas_bangunan; ?>/<?php echo $tipe->luas_tanah; ?></button>
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                                <br>
                                <span class="mb-0 font-text-port"> <?php echo $data->alamat; ?></span>
                                <!-- <br> -->
                                <div style="text-align-last: justify;">
                                    <?php
                                    foreach ($data_tipe as $tipe) {
                                    ?>
                                        <?php
                                        if ($tipe->id_tipe == $foto->id_tipe) {
                                        ?>
                                            <div class="figure">
                                                <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ru-tamu.png" class="size-ikon-dash img-fluid" alt="">
                                                <h6><?php echo $tipe->r_tamu; ?></h6>
                                            </div>
                                            <div class="figure">
                                                <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-tidur.png" class="size-ikon-dash img-fluid" alt="">
                                                <h6><?php echo $tipe->k_tidur; ?></h6>
                                            </div>
                                            <div class="figure">
                                                <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-mandi.png" class="size-ikon-dash img-fluid" alt="">
                                                <h6><?php echo $tipe->k_mandi; ?></h6>
                                            </div>
                                            <div class="figure">
                                                <img src="<?php echo base_url('assets'); ?>/img/ikon-display/dapur.png" class="size-ikon-dash img-fluid" alt="">
                                                <h6><?php echo $tipe->dapur; ?></h6>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <center class="mt-2">
                                    <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?>">
                                        <button type="button" id="" class="btn btn-sm mb-2 btn-outline-dark"> More info >></button>
                                    </a>
                                </center>
                            </div>

                        </div>
                    </div>
                <?php
                endforeach
                ?>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <center>
                        <a href="<?php echo base_url('Produk'); ?>#produk">
                            <button type="button" id="" class="btn btn-sm btn-outline-info" style="font-size: 18px;">
                                <i class="fa-brands fa-product-hunt"></i> Lihat Produk Lainnya >>
                            </button>
                        </a>
                    </center>
                </div>
            </div>
            <hr>
        </div>
    </section><!-- End Services Section -->

    <section class="pt-0" id="berita">
        <div class="section-header">

            <span><span class="font-auto size-50px">N</span><span class="font-auto size-30px">ews</span></span>
        </div>
        <div class="row">
            <?php
            foreach ($data_berita as $data) {
            ?>
                <div class="col-lg-6 col-12">
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
        <div class="row mt-3">
            <div class="col">
                <center>
                    <a href="<?php echo base_url('News'); ?>#news">
                        <button type="button" id="" class="btn btn-sm btn-outline-info" style="font-size: 18px;">
                            <i class="fa-regular fa-newspaper"></i> Lihat Berita Lainnya >>
                        </button>
                    </a>
                </center>
            </div>
        </div>
    </section>
    <section id="" class="contact p-0">
        <div class="" data-aos="fade-up">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.0907201097357!2d110.39826681509645!3d-7.115485094861684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7089a95628a559%3A0x2f5966fe8e2eb5eb!2sPT%20Kanpa%20(%20Kanzu%20Permai%20Abadi%20)!5e0!3m2!1sid!2sid!4v1672375026580!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
            </div><!-- End Google Maps -->
        </div>
    </section><!-- End About Section -->
    <!-- <div class="wafixed cards">
        <div class="card-user">
            <div class="content">
                <?php
                foreach ($detail_marketing as $data) {
                ?>

                    <div class="img"><img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_marketing; ?>"></div>
                    <div class="details">
                        <span class="name font-serif">Contac Us</span>
                        <p class="font-serif"><?php echo $data->nm_marketing; ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
            <a href="#" class="wa">
                <i class="fa-brands fa-whatsapp" style="font-size: 33px;"></i>
            </a>
        </div>
    </div> -->
</main>
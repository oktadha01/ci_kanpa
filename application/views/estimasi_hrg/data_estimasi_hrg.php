
<div class="row p-2 gy-1">
    <?php
    foreach ($data_perum as $data) :
        $id_perum = $data->id_perum;
        $id_tipe = $data->id_tipe;
        $nm_perum = $data->nm_perum;
        $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_perum);
        $nm = preg_replace("![^a-z0-9]+!i", " ", $tittle);
        // if ($data_perum->num_rows() > 0) {
        //     echo 'ya';
        // }
    ?>
        <div class="col-xxl-3 col-lg-4 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item" style="background: #d3d3d317;border-radius: 6px;">
                <?php
                $sql = "SELECT * FROM foto WHERE id_foto_tipe = $id_tipe AND label_foto='display' ORDER BY  RAND() limit 1";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $foto) :
                ?>
                        <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">
                            <div class="img border-r-0px" style="position: relative;">
                                <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->foto_tipe; ?>" class=" size-img-dash img-fluid" alt="">

                                <div class="bottom-right promo"><?php echo $data->promo; ?></div>
                            </div>
                        </a>
                <?php
                    endforeach;
                }
                ?>
                <div class="m-2">
                    <span class="mb-0 font-text-port">Mulai</span>
                    <span class="mb-0 font-text-port float-right"> views</span>
                    <br>
                    <a class="btn-hrg-dash" href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">Rp <?php echo $data->hrg; ?> <sub><?php echo $data->satuan_hrg; ?></sub></a>

                    <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>" style="color:black;">
                        <h4 class="text-nm-perum mb-0"><?php echo $data->nm_perum; ?> - Tipe mulai</h4>
                    </a>
                    <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">
                        <button type="button" id="" class="btn btn-sm mb-2 btn-outline-info"><?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?></button>
                    </a>
                    <br>
                    <span class="mb-0 font-text-port"> <?php echo $data->alamat; ?></span>
                    <div style="text-align-last: justify;">
                        <div class="figure">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ru-tamu.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->r_tamu; ?></h6>
                        </div>
                        <div class="figure">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-tidur.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->k_tidur; ?></h6>
                        </div>
                        <div class="figure">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-mandi.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->k_mandi; ?></h6>
                        </div>
                        <div class="figure">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-display/dapur.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->dapur; ?></h6>
                        </div>
                    </div>
                    <center class="mt-2">
                        <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">
                            <button type="button" id="" class="btn btn-sm mb-2 btn-outline-dark"> More info >></button>
                        </a>
                    </center>
                </div>

            </div>
        </div>
        <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item" style="background: #d3d3d317;border-radius: 6px;">
                <?php
                $sql = "SELECT * FROM foto WHERE id_foto_tipe = $id_tipe AND label_foto='display' ORDER BY  RAND() limit 1";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $foto) :
                ?>
                        <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">
                            <div class="img border-r-0px" style="position: relative;">
                                <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->foto_tipe; ?>" class=" size-img-dash img-fluid" alt="">

                                <div class="bottom-right promo"><?php echo $data->promo; ?></div>
                            </div>
                        </a>
                <?php
                    endforeach;
                }
                ?>
                <div class="m-2">
                    <span class="mb-0 font-text-port">Mulai</span>
                    <span class="mb-0 font-text-port float-right"> views</span>
                    <br>
                    <a class="btn-hrg-dash" href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">Rp <?php echo $data->hrg; ?> <sub><?php echo $data->satuan_hrg; ?></sub></a>

                    <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>" style="color:black;">
                        <h4 class="text-nm-perum mb-0"><?php echo $data->nm_perum; ?> - Tipe mulai</h4>
                    </a>
                    <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">
                        <button type="button" id="" class="btn btn-sm mb-2 btn-outline-info"><?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?></button>
                    </a>
                    <br>
                    <span class="mb-0 font-text-port"> <?php echo $data->alamat; ?></span>
                    <div style="text-align-last: justify;">
                        <div class="figure">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ru-tamu.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->r_tamu; ?></h6>
                        </div>
                        <div class="figure">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-tidur.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->k_tidur; ?></h6>
                        </div>
                        <div class="figure">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-mandi.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->k_mandi; ?></h6>
                        </div>
                        <div class="figure">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-display/dapur.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->dapur; ?></h6>
                        </div>
                    </div>
                    <center class="mt-2">
                        <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">
                            <button type="button" id="" class="btn btn-sm mb-2 btn-outline-dark"> More info >></button>
                        </a>
                    </center>
                </div>

            </div>
        </div> -->
    <?php
    endforeach
    ?>
</div>
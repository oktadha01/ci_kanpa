<main id="main" class="pt-5rem">
    <div class="faq">
        <div class="" data-aos="fade-up">
            <div class="accordion accordion-flush" id="faqlist">
                <?php
                foreach ($data_perum as $data) :
                ?>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $data->id_perum; ?>">
                                <i class="bi bi-question-circle question-icon"></i>
                                <?php echo $data->nm_perum; ?>
                            </button>
                        </h3>
                        <div id="faq-content-<?php echo $data->id_perum; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="accordion-body">
                                    <section id="features" class="features">
                                        <div class="container" data-aos="fade-up">

                                            <ul class="nav nav-tabs row gy-4 d-flex">
                                                <?php
                                                foreach ($data_tipe as $tipe_data) {
                                                    if ($tipe_data->id_tipe_perum == $data->id_perum) {
                                                        $no = 1;
                                                ?>
                                                        <li class="nav-item col">
                                                            <a class="nav-link data-tipe" data-id-foto-tipe="<?php echo $tipe_data->id_tipe; ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo $tipe_data->id_tipe; ?>">
                                                                <i class="bi bi-house color-cyan"></i>
                                                                <h4>Tipe.<?php echo $tipe_data->luas_bangunan; ?>/<?php echo $tipe_data->luas_tanah; ?></h4>
                                                            </a>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </ul>
                                            <div class="tab-content">
                                                <?php
                                                foreach ($data_tipe as $tipe_data) {
                                                    if ($tipe_data->id_tipe_perum == $data->id_perum) {
                                                        $no = 1;
                                                ?>
                                                        <div class="tab-pane" id="tab-<?php echo $tipe_data->id_tipe; ?>">
                                                            <div class="row gy-4">
                                                                <div id="data<?php echo $tipe_data->id_tipe; ?>" class="data"></div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </section><!-- End Features Section -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <input type="text" id="id-foto" hidden>
    <input type="text" id="id-foto-tipe" hidden>
    <input type="text" id="label-foto" hidden>
    <input type="text" id="ubah-foto" hidden>
</main>
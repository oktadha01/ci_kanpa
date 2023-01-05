<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div id="add-marketing" class="row" hidden>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label for="nm-marketing">Nama</label>
                        <div class="form-group">

                            <input type="text" id="nm-marketing" class="form-control" placeholder="Nama ..." autocomplete="off" required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label for="pilih-foto-marketing">Foto marketing</label>
                            <div class="input-group">
                                <input type="file" id="file-foto-marketing" class="file-marketing" value="" hidden>
                                <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="nm-foto-marketing">
                                <div class="input-group-append">
                                    <button type="button" id="" class="pilih-marketing browse btn btn-dark">Pilih Gambar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pt-4">
                <div class="form-group">
                    <img src="" id="preview-foto-marketing" class="pilih-marketing img-thumbnail img-fluid">
                    <input type="text" id="foto-lama" hidden>
                </div>
                <div id="ceklis-ubah-marketing" class="form-group" hidden>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="ceklis-ubah-foto-marketing" value="">
                        <label for="ceklis-ubah-foto-marketing" class="custom-control-label">Cheklis untuk mengubah foto</label>
                    </div>
                </div>
            </div>
        </div>
        <div id="add-marketperum" class="row">
            <div class="col">
                <label>Pilih Perumahan</label>
                <select id="marketperum" class="js-states form-control">
                    <?php
                    foreach ($data_perum as $data) :
                    ?>
                        <option value="<?php echo $data->id_perum; ?>"><?php echo $data->nm_perum; ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
                <label for="bitly">Url Bitly</label>
                <div class="form-group">
                    <input type="text" id="bitly" class="form-control" placeholder="Url Bitly ..." autocomplete="off" required="true">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <a href="#main">
                    <button type="button" id="btn-batal-marketing" class="btn btn-sm btn-outline-danger" hidden><i class="fa-regular fa-pen-to-square"></i> Batal</button>
                </a>
            </div>
            <div class="col-6">
                <a id="herf-simpan" href="#main">
                    <button type="button" id="btn-add-marketing" class="btn btn-sm float-right btn-outline-info"><i class="fa-regular fa-pen-to-square"></i> Add data marketing</button>
                    <button type="button" id="btn-simpan-marketing" class="btn btn-sm float-right btn-outline-success" value="simpan" hidden><i class="fa-regular fa-pen-to-square"></i> Simpan data perum</button>
                </a>
            </div>
        </div>
        <hr>
        <div id="data-perum"></div>
    </div>
</main>
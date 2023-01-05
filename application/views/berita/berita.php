<main id="main" class="pt-5rem">
    <div class="m-3 mt-4" style="height:100vh;">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label for="nm-perum">Judul Berita</label>
                        <div class="form-group">

                            <input type="text" id="judul-berita" class="form-control" placeholder="Judul Berita ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label>Tgl terbit Berita</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 10px;">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="tgl-berita" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-2">
                        <label for="desk-berita">Deskripsi</label>
                        <div class="form-group">
                            <textarea type="text" id="desk-berita" class="form-control" rows="2" placeholder="Deskripsi  ..." autocomplete="off" required value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label for="pilih-foto-berita">Foto berita</label>
                            <div class="input-group">
                                <input type="file" id="file-foto-berita" name="berita" class="file-berita" value="" hidden>
                                <input type="text" class="form-control pilih-berita" placeholder="Upload Foto" id="nm-foto-berita">
                                <div class="input-group-append">
                                    <button type="button" id="" class="pilih-berita browse btn btn-dark">Pilih Foto</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pt-4">
                <div class="form-group">
                    <img src="" id="preview-foto-berita" class=" img-thumbnail img-fluid">
                    <input type="text" id="foto-lama" hidden>
                </div>
                <div id="ceklis-ubah-berita" class="form-group" hidden>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="ceklis-ubah-foto-berita" value="">
                        <label for="ceklis-ubah-foto-berita" class="custom-control-label">Cheklis untuk mengubah foto</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <!-- <a href="#main" hidden> -->
                <button type="button" class="btn-batal-berita btn btn-sm btn-outline-danger" hidden><i class="fa-regular fa-pen-to-square"></i> Batal</button>
                <!-- </a> -->
            </div>
            <div class="col-6">
                <button type="button" class="btn-simpan-berita btn btn-sm float-right btn-outline-success" value="simpan"><i class="fa-regular fa-pen-to-square"></i> Simpan data berita</button>
            </div>
        </div>
        <hr>
        <div id="data-berita"></div>
    </div>
</main>
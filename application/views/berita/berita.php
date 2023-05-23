<style>
    .note-editor {
        margin-bottom: 5rem !important;
    }

    .btn-group-sm>.btn,
    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }

    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }

    .active {
        color: #333;
        background-color: #e6e6e6;
        border-color: #adadad;
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
    }

    .open>.dropdown-menu {
        display: block;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 14px;
        text-align: left;
        list-style: none;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    }

    .btn-toolbar .btn-group,
    .btn-toolbar .input-group {
        float: left;
    }

    .btn-group,
    .btn-group-vertical {
        position: relative;
        display: inline-block;
        vertical-align: middle;
    }

    .btn-group-vertical>.btn-group:after,
    .btn-toolbar:after,
    .clearfix:after,
    .container-fluid:after,
    .container:after,
    .dl-horizontal dd:after,
    .form-horizontal .form-group:after,
    .modal-footer:after,
    .nav:after,
    .navbar-collapse:after,
    .navbar-header:after,
    .navbar:after,
    .pager:after,
    .panel-body:after,
    .row:after {
        clear: both;
    }

    .btn-group-vertical>.btn-group:after,
    .btn-group-vertical>.btn-group:before,
    .btn-toolbar:after,
    .btn-toolbar:before,
    .clearfix:after,
    .clearfix:before,
    .container-fluid:after,
    .container-fluid:before,
    .container:after,
    .container:before,
    .dl-horizontal dd:after,
    .dl-horizontal dd:before,
    .form-horizontal .form-group:after,
    .form-horizontal .form-group:before,
    .modal-footer:after,
    .modal-footer:before,
    .nav:after,
    .nav:before,
    .navbar-collapse:after,
    .navbar-collapse:before,
    .navbar-header:after,
    .navbar-header:before,
    .navbar:after,
    .navbar:before,
    .pager:after,
    .pager:before,
    .panel-body:after,
    .panel-body:before,
    .row:after,
    .row:before {
        display: table;
        content: " ";
    }

    :after,
    :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .dropdown-menu>li>a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: 400;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
    }

    .dropdown-menu>li>a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: 400;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
    }

    .select2-container {
        width: -webkit-fill-available !important;
    }
</style>
<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div id="form-berita" class="row" hidden>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="nm-perum">Judul Berita</label>
                <div class="form-group">
                    <input type="text" id="judul-berita" class="form-control" placeholder="Judul Berita ..." autocomplete="off" required="true">
                </div>

                <label for="nm-perum">Meta deskripsi</label>
                <div class="form-group">
                    <input type="text" id="meta-desk" class="form-control" placeholder="Deskripsi ..." autocomplete="off" required="true">
                </div>

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
                <label for="select-kota">Supplier</label>
                <div class="form-group">
                    <select id="select-tag" class="js-states form-control col-12">
                    </select>
                </div>
                <div class="input-group input-tag">
                    <input type="text" id="tag-berita" class="form-control " placeholder="...">
                </div>
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
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <div class="form-group">
                    <img src="" id="preview-foto-berita" class=" img-thumbnail img-fluid">
                    <input type="text" id="foto-lama" >
                    <input type="text" id="meta-foto-lama" >
                </div>
                <div id="ceklis-ubah-berita" class="form-group" hidden>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="ceklis-ubah-foto-berita" value="">
                        <label for="ceklis-ubah-foto-berita" class="custom-control-label">Cheklis untuk mengubah foto</label>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-berita" class="row" hidden>
            <!-- <div class="col mt-2"> -->
            <div id="content-row">
                <div class="form-group">
                    <label class="">Page Content</label>
                    <div class="">
                        <textarea class="form-control" id="code_preview0" name="" style="height: 300px;"></textarea>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
        <div id="foto-berita" class="row" hidden>
            <div class="col-12 mt-2">

            </div>
            <div class="col-lg-3 pt-4">

            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <button type="button" class="btn-batal-berita btn btn-sm btn-outline-danger" hidden><i class="fa-regular fa-pen-to-square"></i> Batal</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn-tambah-berita btn btn-sm float-right btn-outline-info"><i class="fa-solid fa-plus fa-beat"></i> Tambah artikel / Berita</button>
                <button type="button" class="btn-simpan-berita btn btn-sm float-right btn-outline-success" value="simpan" hidden><i class="fa-regular fa-pen-to-square"></i> Simpan data berita</button>
            </div>
        </div>
        <input type="text" id="id-berita">
        <input type="text" id="id-data-berita" hidden>
        <input type="text" id="id-foto-berita" hidden>
    </div>


    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
    <hr>
    <div id="data-berita"></div>
    </div>
</main>
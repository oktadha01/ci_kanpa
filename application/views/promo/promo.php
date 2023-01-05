<style>
    .bg-sertifikat {
        background-image: url('<?php echo base_url('assets'); ?>/img/sertifikat-01.jpg');
        height: 100%;

        background-repeat: no-repeat;
        background-size: cover;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 0mm auto;
        /* border: 1px #D3D3D3 solid; */
        border-radius: 5px;
        /* background: white; */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm 4px;
        /* border: 5px red solid; */
        height: 257mm;
        /* outline: 2cm #FFEAEA solid; */
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 297mm;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }

    .qr-code {
        max-width: 200px;
        float: right;
    }
</style>
<main id="main" class="">
    <div class="m-2">
        <div class="card">
            <div class="card-header">
                <h3 style="font-family: fantasy;"><i class="fa-solid fa-percent"></i> AMBIL PROMO</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="perum">PERUMAHAN</label>
                        <div class="form-group">
                            <select id="perum" class="form-control">
                                <option disabled selected>Pilih Perumahan</option>
                                <?php
                                foreach ($data_perum as $data) {
                                ?>
                                    <option><?php echo $data->nm_perum; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="nm-promo">PROMO</label>
                        <div class="form-group">
                            <input type="text" id="nm_promo" class="form-control" name="nm_perum" placeholder="PROMO ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="nik">NIK</label>
                        <div class="form-group">
                            <input type="number" id="nik" class="form-control" placeholder="NIK ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="nama">NAMA</label>
                        <div class="form-group">
                            <input type="text" id="nama" class="form-control" placeholder="NAMA LENGKAP ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="tempat-lahir">TEMPAT LAHIR</label>
                        <div class="form-group">
                            <input type="text" id="tempat-lahir" class="form-control" placeholder="TEMPAT LAHIR ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <div class="form-group">
                            <label class="desk" for="tgl-lahir">TANGGAL</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="tgl-lahir" placeholder="TANGGAL LAHIR ...">
                                <span class="input-group-text" style="padding: 11px;">
                                    <i class="fa-regular fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="alamat">ALAMAT</label>
                        <div class="form-group">
                            <textarea type="text" id="alamat" class="form-control" placeholder="ALAMAT LENGKAP ..." rows="5" autocomplete="off" required="true"> </textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="">FOTO KTP</label>
                        <div id="upload-ktp" class="form-group" style="min-height: 135px;max-width: fit-content;text-align: -webkit-center;place-self: center;border: 1px;border-color: black;border-style: dashed;cursor: pointer;">
                            <div class="icon-foto">
                                <i class="fa-solid fa-camera" style="height: 3rem;padding: 26px 80px;"></i>
                                <center>
                                    <span style="padding: 0px 44px;">Upload Foto KTP</span>
                                </center>
                            </div>
                            <img src="" id="preview-foto-ktp" class="img-thumbnail img-fluid" hidden style="max-width: 13rem;max-height: 9rem;">
                        </div>
                        <input type="file" id="file-ktp" class="data-file-ktp" value="" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="desk" for="nm-marketing">MARKETING</label>
                        <div class="form-group">
                            <input type="text" id="nm-marketing" class="form-control" placeholder="AN. MARKETING ..." autocomplete="off" required="true">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <a id="simpan-data-promo" href="#">
                            <button type="button" class="btn btn-sm btn-outline-success float-right"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="element-to-print" class="book">
        <div class="page bg-sertifikat">
            <div class="subpage pl-2 pr-2">
                <center>
                    <span style="font-family: fantasy;font-size: xx-large;">PT. KANZU PERMAIN ABADI.</span>
                    <br>
                    <span style="font-family: -webkit-body;font-size: small;">NO :/GKK/PROMO/001/2022</span>
                </center>
                <hr class="mt-0" style="height: 2px;">
                <center>
                    <span>Selamat anda mendapatkan promo diskon 0% perumahan GRIA KANZU KELATEN</span>
                </center>
                <div class="row mt-3" style="margin:auto;">
                    <div class="col-3">
                        <span>PERUMAHAN</span>
                        <br>
                        <span>NAMA</span>
                        <br>
                        <span>TEMPAT/TGL/LAHIR</span>
                        <br>
                        <span>ALAMAT</span>
                    </div>
                    <div class="col-9">
                        <span>: GRIYA KANZU KELATEN</span>
                        <br>
                        <span>: OKTADHA NURDIANSYAH</span>
                        <br>
                        <span>: BANDAR LAMPUNG,04-10-1996</span>
                        <br>
                        <span>: PER SAMBIROTO BARU BLOK T-7 KEL. SAMBIROTO KEC. TEMBALANG, KOTA SEMARANG, JAWA TENGAH</span>
                    </div>
                </div>
                <div class="row" style="margin:auto;">
                    <div class="col-3">
                        <span>KONTAK</span>
                    </div>
                    <div class="col-9">
                        <span>: KONTAK</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <img src="<?php echo base_url('assets'); ?>/img/ktp.jpg" class="img-thumbnail img-fluid" style="max-width: 13rem;max-height: 9rem;">
                    </div>
                    <div class="col-6">
                        <img src="" class="qr-code img-thumbnail img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" class="html2PdfConverter" onclick="createPDF()">html to PDF </button>
</main>
<div class="container-fluid">
    <div class="text-center">
        <img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0" class="qr-code img-thumbnail img-responsive">
    </div>

    <div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="content">Content:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="content" placeholder="Enter content">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default" id="generate">Generate</button>
            </div>
        </div>
    </div>
</div>
<div id="toast" class="toast" ></div>

<div class="convert">
    <h1>Convert image to base64</h1>
    <form>
        <div class="form-group">
            <input type="text" name="url-image" id="url-image" placeholder="URL image">
            <button class="btn-primary" type="submit" id="convert">Convert</button>
        </div>
        <span class="message message-erro">Add image url</span>
    </form>
    <div id="result-area">
        <div class="result">
            <label>Result</label>
            <input type="text" name="result-convert" id="result-convert" readonly>
            <button class="btn-secundary" id="copy-btn">Copy</button>
        </div>
    </div>
</div>
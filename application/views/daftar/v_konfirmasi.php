<div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url(../assets/img/bg_pattern.svg);">
    <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
            <div class="col-lg-8">
                <h2 class="mb-4" id="posisi">Konfirmasi Pendaftaran Anda</h2>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h5>Anda akan melakukan pendaftaran untuk :</h5>
                </div>
                <div class="row text-center align-items-center">
                    <div class="col-lg-3 py-3 widget-box" style="height: 180px;">
                        <div class="display-4 text-center text-primary">
                            <span class="fa fa-hospital-o" style="font-size: 45px;min-height: 55px;"></span>
                            <p class="mb-3 font-weight-medium text-md" style="max-height: 30px;">KLINIK <br><?php echo $klinik->nama_klinik ?></p>
                            <p class="mb-0 text-secondary" style="font-size: 12px;"><?php echo $klinik->alamat ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 py-3 widget-box" style="height: 180px;">
                        <div class="display-4 text-center text-primary">
                            <span class="fa fa-medkit" style="font-size: 45px;min-height: 55px;"></span>
                            <p class="mb-3 font-weight-medium text-md" style="max-height: 30px;">LAYANAN <br> <?php echo $layanan->nama_layanan ?></p>
                            <p class="mb-0 text-secondary" style="font-size: 12px;"><?php echo $layanan->keterangan ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 py-3 widget-box" style="height: 180px;">
                        <div class="display-4 text-center text-primary">
                            <span class="fa fa-user-md" style="font-size: 45px;min-height: 55px;"></span>
                            <p class="mb-3 font-weight-medium text-md" style="max-height: 30px;">DOKTER <br> <?php echo $dokter->nama ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 py-3 widget-box" style="height: 180px;">
                        <div class="display-4 text-center text-primary">
                            <span class="fa fa-calendar" style="font-size: 45px;min-height: 55px;"></span>
                            <p class="mb-3 font-weight-medium text-md" style="max-height: 30px;">JADWAL <br> Tanggal : <?php echo $jadwal->tanggal ?> <br> Pukul : <?php echo $jam ?> WIB</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="widget-box" style="width:100%">
                <form class="kt-form kt-form--label-right" id="form_registrasi">
                        <div class="box-layanan">
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Pilih Kategori Pasien</label>
                                <select name="kpx" id="pasien" class="form-control">
                                    <option value="hidden">- Pilih Kategori - </option>
                                    <option value="1">Pasien Lama</option>
                                    <option value="2">Pasien Baru</option>
                                </select>
                            </div>
                        </div>
                        
                        <input type="hidden" name="id_pegawai" value="<?php echo $jadwal->id_dokter ?>">
                        <input type="hidden" name="id_klinik" value="<?php echo $jadwal->id_klinik ?>">
                        <input type="hidden" name="id_layanan" value="<?php echo $layanan->id_layanan ?>">
                        <input type="hidden" name="tanggal" value="<?php echo $jadwal->tanggal ?>">
                        <input type="hidden" name="jam" value="<?php echo $jam ?>">

                        <div id="pasien1" style="display:none">
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <label class="text-black" for="fname">Cari Pasien</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" name="nik" id="nik" class="form-control" placeholder="masukkan NIK anda...">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" style="height: calc(1.5em + 1.375rem + 2px);" class="btn btn-block btn-success" id="btn-search"><span class="fa fa-search"></span> Cari</button> <span id="loading">Mencari data...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="no_rm" class="form-control" value="" id="no_rm" placeholder="No. RM">
                                            <input type="hidden" name="id_pasien" value="" id="id_pasien" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="nama" class="form-control" value="" id="nama" placeholder="Nama">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="" placeholder="tgl Lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="" placeholder="Jenis Kelamin" >
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="kerja" class="form-control" id="kerja" value="" placeholder="Pekerjaan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="alamat_rumah" id="alamat_rumah" placeholder="Alamat Rumah" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="telp" id="telp" value="" class="form-control" placeholder="Telp Rumah">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="alamat_kantor" id="alamat_kantor" placeholder="alamat kantor" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="hp" id="hp" value="" placeholder="No. Hp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="pasien2" style="display:none">
                        <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <label class="text-black" for="fname">Data Pasien</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" name="nik2" class="form-control" placeholder="masukkan NIK anda...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="nama2" class="form-control" value="" placeholder="Nama">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="suku2" class="form-control" value="" placeholder="Suku">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="tempat_lahir2" class="form-control" value="" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" name="tgl_lahir2" class="form-control" value="" placeholder="tgl Lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <select name="jenis_kelamin2" class="form-control">
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="kerja2" class="form-control" value="" placeholder="Pekerjaan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="alamat_rumah2" placeholder="Alamat Rumah" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="telp2" value="" class="form-control" placeholder="Telp Rumah">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="alamat_kantor2" placeholder="alamat kantor" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="hp2" value="" placeholder="No. Hp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="button" class="btn btn-success" onclick="save()">Simpan</button>
                        <a type="button" class="btn btn-secondary" href="<?= base_url($this->uri->segment(1))?>">Batal</a>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg" style="margin-top: 35px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Konfirmasi Pendaftaran Anda</h2>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 v_cari" style="margin-bottom: 10px;">
                <div class="icon-box">
                    <div class="icon">
                        <img src="<?php echo base_url() . 'assets/dist/icon/klinik.svg'; ?>" style="width: 100%;background: #fff;" alt="">
                    </div>
                    <center>
                        <h5 style="color: #314d97;"><b>KLINIK</b></h5>
                        <p><?php echo $klinik->nama_klinik ?><br><?php echo $klinik->alamat ?></p>
                    </center>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 v_cari" style="margin-bottom: 10px;">
                <div class="icon-box">
                    <div class="icon">
                        <img src="<?php echo base_url() . 'assets/dist/icon/' . $layanan->icon . '.svg'; ?>" style="width: 100%;background: #fff;" alt="">
                    </div>
                    <center>
                        <h5 style="color: #314d97;"><b>LAYANAN</b></h5>
                        <p><?php echo $layanan->nama_layanan ?></p>
                    </center>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 v_cari" style="margin-bottom: 10px;">
                <div class="icon-box">
                    <div class="icon">
                        <img src="<?php echo base_url() . "admin/files/img/user_img/" . $user->foto ?>" style="width: 100%;background: #fff;" alt="">
                    </div>
                    <center>
                        <h5 style="color: #314d97;"><b>DOKTER</b></h5>
                        <p><?php echo $dokter->nama ?></p>
                    </center>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 v_cari" style="margin-bottom: 10px;">
                <div class="icon-box">
                    <div class="icon">
                        <img src="<?php echo base_url() . 'assets/img/calendar.svg'; ?>" style="width: 100%;background: #fff;" alt="">
                    </div>
                    <center>
                        <h5 style="color: #314d97;"><b>JADWAL</b></h5>
                        <p><?php echo $hari ?>, <?php echo $tanggalindo ?> <br> Pukul : <?php echo $jam ?> WIB</p>
                    </center>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="icon-box" style="height: auto;transition: none;transform: none;">
                <form class="kt-form kt-form--label-right" id="form_registrasi">
                    <div class="box-layanan">
                        <div class="row form-group">
                            <div class="col-md-6 mb-3">
                                <label class="text-black" for="fname">Pilih Kategori Pasien</label>
                                <select name="kpx" id="pasien" class="form-control">
                                    <option value="hidden">- Pilih Kategori - </option>
                                    <option value="1">Pasien Lama</option>
                                    <option value="2">Pasien Baru</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="id_pegawai" value="<?php echo $dokter->id ?>">
                        <input type="hidden" name="id_klinik" value="<?php echo $klinik->id ?>">
                        <input type="hidden" name="id_layanan" value="<?php echo $layanan->id_layanan ?>">
                        <input type="hidden" name="tanggal" value="<?php echo $tanggal ?>">
                        <input type="hidden" name="jam" value="<?php echo $jam ?>">
                        <input type="hidden" name="estimasi" value="<?php echo $estimasi ?>">

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
                                        <div class="col-md-4">
                                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="" placeholder="tgl Lahir">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="" placeholder="Jenis Kelamin">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="alamat_rumah" id="alamat_rumah" placeholder="Alamat KTP" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="alamat_kantor" id="alamat_kantor" placeholder="Alamat Domisili" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="hp" id="hp" value="" placeholder="No. Hp (WA)" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="alamat_kantor" id="alamat_kantor" placeholder="alamat kantor" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="hp" id="hp" value="" placeholder="No. Hp" class="form-control">
                                        </div>
                                    </div>
                                </div> -->
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
                                        <div class="col-md-8">
                                            <input type="text" name="nama2" class="form-control" value="" placeholder="Nama">
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <input type="text" name="suku2" class="form-control" value="" placeholder="Suku">
                                        </div> -->
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
                                        <!-- <div class="col-md-6">
                                            <input type="text" name="kerja2" class="form-control" value="" placeholder="Pekerjaan">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="alamat_rumah2" placeholder="Alamat KTP" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="alamat_kantor2" placeholder="Alamat Domisili" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="hp2" value="" placeholder="No. Hp (WA)" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12 mb-3 mb-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea name="alamat_kantor2" placeholder="alamat kantor" class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="hp2" value="" placeholder="No. Hp" class="form-control">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div id="medis" style="display:none">
                            <hr>
                            <p>*Mohon perbarui data medis anda...</p>
                            <hr>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3">
                                    <label class="text-black" for="fname">Apakah Anda Sedang Hamil</label>
                                    <select name="hamil" id="hamil" class="form-control">
                                        <option value="0">TIDAK</option>
                                        <option value="1">YA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-1 col-form-label">Penyakit Jantung:</label>
                                <div class="col-lg-3">
                                    <select class="form-control required" name="penyakit_jantung" id="penyakit_jantung">
                                        <option value="0"> Tidak Ada </option>
                                        <option value="1"> Ada </option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-lg-1 col-form-label">Diabetes:</label>
                                <div class="col-lg-3">
                                    <select class="form-control required" name="diabetes" id="diabetes">
                                        <option value="0"> Tidak Ada </option>
                                        <option value="1">> Ada </option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-lg-1 col-form-label">Haemopilia:</label>
                                <div class="col-lg-3">
                                    <select class="form-control required" name="haemopilia" id="haemopilia">
                                        <option value="0"> Tidak Ada </option>
                                        <option value="1"> Ada </option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit"></div>
                            <div class="form-group row">
                                <label class="col-lg-1 col-form-label">Hepatitis:</label>
                                <div class="col-lg-3">
                                    <select class="form-control required" name="hepatitis" id="hepatitis">
                                        <option value="0"> Tidak Ada </option>
                                        <option value="1"> Ada </option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-lg-1 col-form-label">Gastring:</label>
                                <div class="col-lg-3">
                                    <select class="form-control required" name="gastring" id="gastring">
                                        <option value="0"> Tidak Ada </option>
                                        <option value="1"> Ada </option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                                <label class="col-lg-1 col-form-label">Penyakit Lainnya:</label>
                                <div class="col-lg-3">
                                    <select class="form-control required" name="penyakit_lainnya" id="penyakit_lainnya">
                                        <option value="0"> Tidak Ada </option>
                                        <option value="1"> Ada </option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-success" onclick="save()">Simpan</button>
                    <a type="button" class="btn btn-secondary" href="<?= base_url($this->uri->segment(1)) ?>">Batal</a>
                </form>
            </div>
        </div>
    </div>
</section><!-- End Services Section -->
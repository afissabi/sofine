<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg" style="margin-top: 35px;">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Konfirmasi Pendaftaran Anda</h2>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 v_cari" style="margin-bottom: 10px;">
            <div class="icon-box" style="height: 300px;">
                <div class="icon">
                <img src="<?php echo base_url().'assets/dist/icon/klinik.svg';?>" style="width: 100%;background: #fff;" alt="">
                </div>
                <center><h5 style="color: #314d97;"><b>KLINIK</b></h5>
                <p><?php echo $klinik->nama_klinik ?><br><?php echo $klinik->alamat ?></p></center>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 v_cari" style="margin-bottom: 10px;">
            <div class="icon-box" style="height: 300px;">
                <div class="icon">
                <img src="<?php echo base_url().'assets/dist/icon/'.$layanan->icon.'.svg';?>" style="width: 100%;background: #fff;" alt="">
                </div>
                <center><h5 style="color: #314d97;"><b>LAYANAN</b></h5>
                <p><?php echo $layanan->nama_layanan ?></p></center>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 v_cari" style="margin-bottom: 10px;">
            <div class="icon-box" style="height: 300px;">
                <div class="icon">
                <img src="<?php echo base_url().'assets/dist/icon/dokter.svg';?>" style="width: 100%;background: #fff;" alt="">
                </div>
                <center><h5 style="color: #314d97;"><b>DOKTER</b></h5>
                <p><?php echo $dokter->nama ?></p></center>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 v_cari" style="margin-bottom: 10px;">
            <div class="icon-box" style="height: 300px;">
                <div class="icon">
                <img src="<?php echo base_url().'assets/dist/icon/dokter.svg';?>" style="width: 100%;background: #fff;" alt="">
                </div>
                <center><h5 style="color: #314d97;"><b>JADWAL</b></h5>
                <p>Tanggal : <?php echo $jadwal->tanggal ?> <br> Pukul : <?php echo $jam ?> WIB</p></center>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="icon-box" style="height: auto;">
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
        <br>
        <button type="button" class="btn btn-success" onclick="save()">Simpan</button>
        <a type="button" class="btn btn-secondary" href="<?= base_url($this->uri->segment(1))?>">Batal</a>
    </form>
    </div>
    </div>
  </div>
</section><!-- End Services Section -->
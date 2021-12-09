<div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Pilih <em>Layanan Terbaik</em> Untuk Anda</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>Dapatkan Dokter pengalaman terbaik bagi kesehatan gigi anda disini</p>
          </div>
        </div>

        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
            <div class="timeline-step">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                    <a href="#pilihlayanan">
                        <div class="inner-circle tab_active"></div>
                    </a>
                    <p class="h6 text-muted mb-0 mb-lg-0">Pilih Layanan <br> <div style="color:#f00;"><?php echo $layanan->nama_layanan ?></div> </p>
                </div>
            </div>
            <div class="timeline-step">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                    <a href="#pilihdokter">
                        <div class="inner-circle tab_active"></div>
                    </a>
                    <p class="h6 text-muted mb-0 mb-lg-0">Pilih Dokter <br> <div style="color:#f00;"><?php echo $dokter->nama ?></div></p>
                </div>
            </div>
            <div class="timeline-step">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                    <a href="#pilihdokter">
                        <div class="inner-circle tab_active"></div>
                    </a>
                    <p class="h6 text-muted mb-0 mb-lg-0">Pilih Jadwal <br> <div style="color:#f00;"><?php echo $spam->tanggal ?></div>
                    <br> <div style="color:#f00;"><?php echo $spam->jam ?> WIB</div></p>
                </div>
            </div>
            <div class="timeline-step">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                    <a href="#pilihdokter">
                        <div class="inner-circle"></div>
                    </a>
                    <p class="h6 text-muted mb-0 mb-lg-0">Konfirmasi Pendaftaran 
                    </p>
                </div>
            </div>
        </div>
            <form class="kt-form kt-form--label-right" id="form_registrasi">
            <div class="col-lg-4">
                <div class="box-layanan">
                    <select name="kpx" id="pasien" class="form-control">
                        <option value="hidden">- Pilih Kategori - </option>
                        <option value="1">Pasien Lama</option>
                        <option value="2">Pasien Baru</option>
                    </select>
                    <input type="hidden" name="id_spam" value="<?php echo $spam->id_t_spam ?>">
                    <input type="hidden" name="id_pegawai" value="<?php echo $spam->id_pegawai ?>">
                    <input type="hidden" name="id_layanan" value="<?php echo $spam->id_layanan ?>">
                    <input type="hidden" name="tanggal" value="<?php echo $spam->tanggal ?>">
                    <input type="hidden" name="jam" value="<?php echo $spam->jam ?>">

                    <div id="pasien1" style="display:none">
                        <input type="text" name="nik" id="nik" class="form-control"><button type="button" id="btn-search">Cari</button> <span id="loading">Mencari data...</span>
                        <br><input type="text" name="no_rm" value="" id="no_rm" placeholder="no RM">
                        <input type="text" name="id_pasien" value="" id="id_pasien" placeholder="">
                        <input type="text" name="nama" value="" id="nama" placeholder="nama">
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="" placeholder="Tempat Lahir">
                        <input type="date" name="tgl_lahir" id="tgl_lahir"  value="" placeholder="tgl Lahir">
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="" >
                        <input type="text" name="suku" id="suku" value="" placeholder="suku">
                        <input type="text" name="kerja" id="kerja" value="" placeholder="pekerjaan">
                        <textarea name="alamat_rumah" id="alamat_rumah" placeholder="alamatrumah"></textarea>
                        <input type="text" name="telp" id="telp" value="" placeholder="telp rumah">
                        <textarea name="alamat_kantor" id="alamat_kantor" placeholder="alamat kantor"></textarea>
                        <input type="text" name="hp" id="hp" value="" placeholder="hp">
                    </div>
                    <div id="pasien2" style="display:none">
                        <input type="text" name="nik2" value="" placeholder="nik baru">
                        <input type="text" name="nama2" value="" placeholder="nama">
                        <input type="text" name="tempat_lahir2" value="" placeholder="Tempat Lahir">
                        <input type="date" name="tgl_lahir2" value="" placeholder="tgl Lahir">
                        <select name="jenis_kelamin2">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <input type="text" name="suku2" value="" placeholder="suku">
                        <input type="text" name="kerja2" value="" placeholder="pekerjaan">
                        <textarea name="alamat_rumah2" placeholder="alamatrumah"></textarea>
                        <input type="text" name="telp2" value="" placeholder="telp rumah">
                        <textarea name="alamat_kantor2" placeholder="alamat kantor"></textarea>
                        <input type="text" name="hp2" value="" placeholder="hp">
                    </div>
                </div>
                <button type="button" class="btn btn-brand" onclick="save()">Simpan</button>
                <a type="button" class="btn btn-secondary" href="<?= base_url($this->uri->segment(1))?>">Batal</a>
            </div>
            </form>
      </div>
    </div>
  </div>

  
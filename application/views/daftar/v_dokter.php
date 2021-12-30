<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg" style="margin-top: 35px;background-image: url(<?php echo base_url() . 'assets/img/bg_dokter.svg'; ?>);background-repeat-y: no-repeat;background-size: cover;">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Pilih Dokter</h2>
      <p>Kami memiliki dokter yang siap memberikan pelayanan terbaik bagi kesehatan gigi anda. </p><br>
      <input type="text" id="s_klinik" class="form-control" placeholder="Cari di sini . ." style="border-radius: 20px;">
    </div>

    <div class="row">
      <?php foreach ($dokter_list as $value) : ?>
        <?php
          $dokter  = $this->m_pegawai->getById($value);
          if ($dokter != null) {
            $e_id  = $this->secure->encrypt_url($dokter->id);
            $user  = $this->m_user->getUserId($dokter->id);
            ?>
          <div class="col-xl-3 col-md-6 v_cari" data-filter-name="<?php echo strtolower($dokter->nama) ?>">
            <div class="icon-box">
              <div class="icon">
                <img src="<?php echo base_url() . "admin/files/img/user_img/" . $user->foto ?>" style="width: 100%;background: #fff;" alt="">
              </div>
              <center>
                <h4 style="min-height: 10px;"><?php echo $dokter->nama ?></h4>
                <a href="<?= base_url() . "pendaftaran/jadwal/" . $klinik . "/" . $layanan . "/" . $e_id ?>" class="btn btn-primary" style="background: #4c879a;border-color: #4c879a;">Pilih Dokter <img src="<?php echo base_url() . 'assets/dist/icon/dokter.svg'; ?>" style="width: 25px;" alt=""></a>
              </center>
            </div>
          </div>
        <?php } ?>
      <?php endforeach; ?>
    </div>

  </div>
</section><!-- End Services Section -->
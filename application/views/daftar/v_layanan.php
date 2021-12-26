<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg" style="margin-top: 35px;background-image: url(<?php echo base_url() . 'assets/img/bg_layanan.svg'; ?>);background-repeat-y: repeat;background-size: cover;background-position: center;">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Pilih Layanan</h2>
      <p>Kami memiliki beberapa jenis layanan terbaik bagi kesehatan gigi anda. </p><br>
      <input type="text" id="s_klinik" class="form-control" placeholder="Cari di sini . ." style="border-radius: 20px;">
    </div>

    <div class="row">
      <?php foreach ($layanan as $value) : ?>
        <div class="col-xl-3 col-md-6 v_cari" data-filter-name="<?php echo strtolower($value->nama_layanan) ?>">
          <div class="icon-box">
            <div class="icon">
              <center><img src="<?php echo base_url() . 'assets/dist/icon/' . $value->icon . '.svg'; ?>" style="background: #fff;" alt=""></center>
            </div>
            <center>
              <h5 style="min-height:36px;font-size: 15px;"><?php echo $value->nama_layanan ?></h5>
              <a href="<?= base_url() . "pendaftaran/dokter/" . $klinik->id . "/" . $value->id_layanan ?>" class="btn btn-primary" style="background: #4c879a;border-color: #4c879a;">Pilih Layanan <img src="<?php echo base_url() . 'assets/img/12.svg'; ?>" style="width: 25px;" alt=""></a>
            </center>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section><!-- End Services Section -->
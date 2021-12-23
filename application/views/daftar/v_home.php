<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background-image: url(assets/img/background.svg);background-repeat: no-repeat;background-size: cover;">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
      <h1>Dental Care & Beauty Studio</h1>
      <h2>Temukan layanan terbaik kami disini...</h2>
      <div class="d-flex justify-content-center justify-content-lg-start">
        <a href="#services" class="btn-get-started scrollto">Daftar Sekarang</a>
      </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
      <img src="assets/img/clinic.svg" class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg" style="background-image: url(assets/img/bg_klinik.svg);background-size: cover;background-repeat-y: repeat;">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Pilih Klinik</h2>
      <p>Kami memiliki beberapa cabang klinik yang siap memberikan pelayanan terbaik bagi kesehatan gigi anda. </p><br>
      <input type="text" id="s_klinik" class="form-control" placeholder="Cari di sini . . ." style="border-radius: 20px;">
    </div>
    
    <div class="row">
    
      <?php foreach ($klinik as $value): ?>
        <div class="col-xl-3 col-md-6 v_cari" data-filter-name="<?php echo strtolower($value->nama_klinik) ?>">
          <div class="icon-box">
            <div class="icon">
              <img src="<?php echo base_url().'assets/dist/icon/klinik.svg';?>" style="width: 100%;background: #fff;" alt="">
            </div>
            <center><h4><?php echo $value->nama_klinik ?></h4>
            <p><?php echo $value->alamat ?><br><?php echo $value->telp ?></p>
            <a href="<?= base_url()."pendaftaran/layanan/" . $value->id ?>" class="btn btn-primary" style="background: #4c879a;border-color: #4c879a;">Daftar <img src="<?php echo base_url().'assets/img/18.svg';?>" style="width: 25px;" alt=""></a></center>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section><!-- End Services Section -->
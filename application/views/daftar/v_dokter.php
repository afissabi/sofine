<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg" style="margin-top: 35px;">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Pilih Dokter</h2>
      <input type="text" id="s_klinik" class="form-control" placeholder="Cari di sini . ." style="border-radius: 20px;">
    </div>

    <div class="row">
      <?php foreach ($dokter_list as $value): ?>
        <?php $dokter  = $this->m_pegawai->getById($value); ?>
        <div class="col-xl-4 col-md-6 v_cari" data-filter-name="<?php echo strtolower($dokter->nama) ?>" style="margin-bottom: 10px;">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="<?php echo base_url().'assets/dist/icon/dokter1.svg';?>" style="width: 100%;background: #fff;" alt="">
              </div>
            </div>
            <div class="body" style="font-family: monospace;background:#fff;height: 110px;">
              <center><h5 class="text-secondary" style="height: 45px;"><?php echo $dokter->nama ?></h5>
              <a href="<?= base_url()."pendaftaran/jadwal/" . $klinik->id . "/" . $layanan->id_layanan . "/" . $value ?>" class="btn btn-primary" style="background:#b4945b">Pilih Dokter <span class="fa fa-heart"></span></a></center>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section><!-- End Services Section -->
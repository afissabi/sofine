<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg" style="margin-top: 35px;">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Pilih Layanan</h2>
      <input type="text" id="s_klinik" class="form-control" placeholder="Cari di sini . ." style="border-radius: 20px;">
    </div>

    <div class="row">
      <?php foreach ($layanan as $value): ?>
        <div class="col-xl-4 col-md-6 v_cari" data-filter-name="<?php echo strtolower($value->nama_layanan) ?>" style="margin-bottom: 10px;">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="<?php echo base_url().'assets/dist/icon/'.$value->icon.'.svg';?>" style="width: 100%;background: #fff;" alt="">
              </div>
            </div>
            <div class="body" style="font-family: monospace;background:#fff;height: 160px;">
              <center><h5 class="text-secondary" style="height: 45px;"><?php echo $value->nama_layanan ?></h5>
              <p style="font-size: 10pt;color:#000;"><?php echo $value->keterangan ?></p>
              <a href="<?= base_url()."pendaftaran/dokter/" . $klinik->id . "/" . $value->id_layanan ?>" class="btn btn-primary" style="background:#b4945b">Pilih Layanan <span class="fa fa-heart"></span></a></center>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section><!-- End Services Section -->
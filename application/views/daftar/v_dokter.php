<div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url(../assets/img/bg_pattern.svg);">
    <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
        <div class="col-lg-8">
            <h2 class="mb-4" id="posisi">Pilih Dokter</h2>
            <form action="#">
            <input data-kt-search-element="input" id="s_layanan" type="text" class="form-control" placeholder="Cari di sini . ." style="border-radius: 20px;">
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="page-section">
    <div class="container">
      <div class="row" id="content">      
        <?php foreach ($dokter_list as $value): ?>
          <?php $dokter  = $this->m_pegawai->getById($value); ?>
          <div class="col-lg-4 py-3 wow fadeInUp v_cari" data-filter-name="<?php echo strtolower($dokter->nama) ?>">
            <div class="card-blog">
              <div class="header">
                <div class="post-thumb">
                  <img src="<?php echo base_url().'assets/dist/icon/dokter1.svg';?>" style="width: 100%;background: #cfb17b;" alt="">
                </div>
              </div>
              <div class="body" style="font-family: monospace;background:#fff;">
                <center><h5 class="text-secondary" style="height: 45px;"><?php echo $dokter->nama ?></h5>
                <a href="<?= base_url()."pendaftaran/jadwal/" . $klinik->id . "/" . $layanan->id_layanan . "/" . $value ?>" class="btn btn-primary" style="background:#b4945b">Pilih <span class="fa fa-heart"></span></a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
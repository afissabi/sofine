<div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url(assets/img/bg_pattern.svg);">
    <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
        <div class="col-lg-8">
            <h3 class="mb-4" id="posisi">Pilih Klinik</h3>
            
            <input type="text" data-kt-search-element="input" id="s_klinik" class="form-control" placeholder="Cari di sini . ." style="border-radius: 20px;">
            <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                data-kt-search-element="spinner">
                <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
            </span>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Banner info -->
<div class="page-section banner-info">
    <div class="wrap bg-image" style="background-image: url(assets/img/bg_pattern.svg);">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8 py-3 pr-lg-5 wow fadeInUp">
            <!-- <h2 class="title-section">Cabang Kami <br></h2> -->
            <div class="row" id="content">
              <?php foreach ($klinik as $value): ?>
              <div class="col-lg-4 v_cari" data-filter-name="<?php echo strtolower($value->nama_klinik) ?>">
                <div class="card-service wow fadeInUp" style="min-height: 225px;background:#fff;">
                  <div class="body" style="font-family: monospace;">
                      <img src="<?php echo base_url().'assets/dist/icon/klinik.svg';?>" width="100" height="100" alt="">
                      <br>
                      <h5 class="text-secondary" style="height: 45px;"><?php echo $value->nama_klinik ?></h5>
                      <p style="font-size: 10pt;"><?php echo $value->alamat ?><br><?php echo $value->telp ?></p>
                      <a href="<?= base_url()."pendaftaran/layanan/" . $value->id ?>" class="btn btn-primary" style="background:#b4945b">Daftar <span class="fa fa-heart"></span></a>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-lg-4 py-3 wow fadeInRight">
            <div class="img-fluid">
              <img src="assets/img/banner_image_2.svg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .wrap -->
  </div> <!-- .page-section -->

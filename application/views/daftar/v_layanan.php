<div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url(../assets/img/bg_pattern.svg);">
    <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
        <div class="col-lg-8">
            <h2 class="mb-4" id="posisi">Pilih Layanan</h2>
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
        <?php foreach ($layanan as $value): ?>
        <div class="col-lg-3 v_cari" data-filter-name="<?php echo strtolower($value->nama_layanan) ?>">
          <div class="card-service wow fadeInUp" style="min-height: 280px;">
            <div class="body" style="font-family: monospace;">
                <span class="fa fa-medkit" style="font-size: 40px;color: burlywood;"></span><br>
                <h5 class="text-secondary" style="height: 45px;"><?php echo $value->nama_layanan ?></h5>
                <p style="font-size: 10pt;height: 50px;"><?php echo $value->keterangan ?></p>
                <a href="<?= base_url()."pendaftaran/dokter/" . $klinik->id . "/" . $value->id_layanan ?>" class="btn btn-primary" style="background:#b4945b">Pilih <span class="fa fa-heart"></span></a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
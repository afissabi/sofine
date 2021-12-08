<div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Pilih <em>Layanan Terbaik</em> Untuk Anda</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>Dapatkan pengalaman terbaik bagi kesehatan gigi anda disini</p>
          </div>
        </div>

        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
            <div class="timeline-step">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                    <a href="#pilihlayanan">
                        <div class="inner-circle tab_active"></div>
                    </a>
                    <p class="h6 text-muted mb-0 mb-lg-0">Pilih Layanan</p>
                </div>
            </div>
            <div class="timeline-step">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                    <a href="#pilihdokter">
                        <div class="inner-circle"></div>
                    </a>
                    <p class="h6 text-muted mb-0 mb-lg-0">Pilih Dokter</p>
                </div>
            </div>
            <div class="timeline-step">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                    <a href="#pilihdokter">
                        <div class="inner-circle"></div>
                    </a>
                    <p class="h6 text-muted mb-0 mb-lg-0">Pilih Jadwal</p>
                </div>
            </div>
            <div class="timeline-step">
                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                    <a href="#pilihdokter">
                        <div class="inner-circle"></div>
                    </a>
                    <p class="h6 text-muted mb-0 mb-lg-0">Konfirmasi Pendaftaran</p>
                </div>
            </div>
        </div>

        <?php foreach ($layanan as $value): ?>
            <form action="<?php echo site_url('home/save_layanan') ?>" method="post" enctype="multipart/form-data" >
            <div class="col-lg-4">
                <div class="box-layanan">
                    <h4><?php echo $value->nama_layanan ?></h4>
                    <input type="hidden" name="id_layanan" value="<?php echo $value->id_layanan ?>">
                    <input class="btn btn-success" type="submit" name="btn" value="Pilih Layanan" />
                </div>
            </div>
            </form>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
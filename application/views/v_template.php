<!DOCTYPE html>
<html lang="id, in">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sofine Dental Care</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.cssassets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.cssassets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">SOFINE</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo base_url(); ?>">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <?php
        if (isset($content)) {
            $this->load->view($content);
        }
    ?>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top" style="background-image: url(<?php echo base_url().'assets/img/footer.svg';?>);background-repeat: repeat;">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>SOFINE</h3>
            <p>
              Jl. Simo Jawar No.35D <br>
              Simomulyo, Kec. Sukomanunggal<br>
              Kota SBY, Jawa Timur 60281<br><br>
              <strong>Phone:</strong> 0822-2823-2675<br>
              <strong>Web:</strong> sofineclinic.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Layanan Kami</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#"></a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Temukan kami di media sosial</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>SOFINE</span></strong> dental care
      </div>
      <div class="credits">
        Designed by <a href="">Melek Aplikasi</a>
      </div>

    
    
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo base_url(); ?>assets/js1/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js1/jquery.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/js1/moment.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js1/bootstrap.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script> 

  <!-- Template Main JS File -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    var get_data        = '<?php echo $get_data; ?>';
    var backend_url     = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil(event);
                },
                events: JSON.parse(get_data)
            });

    });

    function deteil(event)
    {    
        $.ajax({
            url : "<?= base_url()."pendaftaran/pilihjam/" .  $layanan->id_layanan?>",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data    : 'id='+event.id,
            async: false,
            success: function (response) {
                $('#pilihjam').html(response);
                
            },
            error: function(){
            }
        });
    }

    </script>
    <!-- Search Klinik -->
    <script>
        $("#s_klinik").bind('keyup', function() {
			var term = $(this).val().toLowerCase();
			$('.v_cari').each(function(){
                if ($(this).filter(`[data-filter-name*="${term}"]`).length > 0 || term.length < 1) {
                    $(this).show(500);
                } else {
                    $(this).hide(500);
                }
            });
		});
        

        $("#s_layanan").bind('keyup', function() {
			var term = $(this).val().toLowerCase();
			$('.v_cari').each(function(){
                if ($(this).filter(`[data-filter-name*="${term}"]`).length > 0 || term.length < 1) {
                    $(this).show(500);
                } else {
                    $(this).hide(500);
                }
            });
		});

    </script>

<script type="text/javascript">
    function search(){
      $("#loading").show(); // Tampilkan loadingnya
      
      $.ajax({
            url : "<?= base_url()."pendaftaran/search/"?>",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {nik : $("#nik").val()}, // data yang akan dikirim ke file proses
            dataType: "json",
            beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
                
          if(response.status == "success"){ // Jika isi dari array status adalah success
            $("#no_rm").val(response.no_rm); // set textbox dengan id nama
            $("#id_pasien").val(response.id_pasien); // set textbox dengan id nama
            $("#nama").val(response.nama); // set textbox dengan id nama
            $("#tempat_lahir").val(response.tempat_lahir);
            $("#tgl_lahir").val(response.tanggal_lahir);
            $("#jenis_kelamin").val(response.jenis_kelamin);
            $("#suku").val(response.suku);
            $("#kerja").val(response.pekerjaan);
            $("#alamat_rumah").val(response.alamat_rumah);
            $("#telp").val(response.telp_rumah);
            $("#alamat_kantor").val(response.alamat_kantor);
            $("#hp").val(response.hp);
          }else{ // Jika isi dari array status adalah failed
            alert("Data Tidak Ditemukan");
          }
        },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.responseText);
            }
        });
    }
    $(document).ready(function(){
      $("#loading").hide(); // Sembunyikan loadingnya
      
        $("#btn-search").click(function(){ // Ketika user mengklik tombol Cari
            search(); // Panggil function search
        });
        
        $("#nik").keyup(function(){ // Ketika user menekan tombol di keyboard
        if(event.keyCode == 13){ // Jika user menekan tombol ENTER
          search(); // Panggil function search
        }
      });
    });
  </script>


  <script>
    $("#pasien").change(function() { 
      
      if ( $(this).val() == "1") {

          $("#pasien1").show();

      }else{
        
            $("#pasien1").hide();
        }
      
        if ( $(this).val() == "2") {

      $("#pasien2").show();

      }else{

        $("#pasien2").hide();
      }
    });
</script>

<script>
  var save_method, txtAksi, table, table2;

    function reset_form(a) {
      $(":input", "#" + a).not(":button, :submit, :reset, :hidden").val("").prop("checked", !1).prop("selected", !1)
    }

    function save() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })

      Swal.fire({
        title: "Konfirmasi Pendaftaran ?",
        text: "Data Akan Disimpan",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, Lakukan Pendaftaran !",
        cancelButtonText: "Tidak, Batalkan!",
        reverseButtons: !1
      }).then(a => {
        var e;
        a.value ? (e = $("#form_registrasi")[0],
          e = new FormData(e),
          $("#btnSave").prop("disabled", !0),
          $("#btnSave").text("Menyimpan Data"),
          $.ajax({
            url : "<?= base_url()."pendaftaran/simpan_data"?>",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: e,
            dataType: "JSON",
            processData: !1,
            contentType: !1,
            cache: !1,
            timeout: 6e5,
            success: function(a) {
              if (a.status) Swal.fire("Sukses!!", a.pesan, "success"),
              $("#btnSave").prop("disabled", !1),
              $("#btnSave").text("Simpan"), 
              window.location.href = "<?= base_url()."pendaftaran/thanks"?>";
              else {
                for (var e = 0; e < a.inputerror.length; e++) 0 == a.is_select2[e] ? ($('[name="' + a.inputerror[e] + '"]').addClass("is-invalid"),
                $('[name="' + a.inputerror[e] + '"]').next().text(a.error_string[e])
                .addClass("invalid-feedback")) : $('[name="' + a.inputerror[e] + '"]')
                .next().next()
                .text(a.error_string[e])
                .addClass("invalid-feedback-select");
                $("#btnSave").prop("disabled", !1), $("#btnSave").text("Simpan")
              }
            },
          error: function(a) {
            console.log("ERROR : ", a), $("#btnSave").prop("disabled", !1), $("#btnSave").text("Simpan")
          }
        })) : a.dismiss === Swal.DismissReason.cancel && Swal.fire("Dibatalkan", "Aksi Dibatalakan", "error")
      })
    }

    function handle_boolean(a) {
      return "1" == a ? "Ya" : "Tidak"
    }

    function time_now() {
      var a = new Date;
      return a.getHours() + ":" + a.getMinutes() + ":" + a.getSeconds()
    }

    function get_uri_segment(a) {
      return window.location.pathname.split("/")[a]
    }
</script>
</body>

</html>
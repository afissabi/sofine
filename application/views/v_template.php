
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Chain App Dev - App Landing Page HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="<?php echo base_url();?>assets/css/templatemo-chain-app-dev.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animated.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/owl.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-calendar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">
    <script>
      var baseurl = "<?php echo base_url("index.php/"); ?>";
    </script>
      <!-- Scripts -->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/owl-carousel.js"></script>
  <script src="<?php echo base_url();?>assets/js/animation.js"></script>
  <script src="<?php echo base_url();?>assets/js/imagesloaded.js"></script>
  <script src="<?php echo base_url();?>assets/js/popup.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
      
      .timeline-steps {
          display: flex;
          justify-content: center;
          flex-wrap: wrap
      }

      .timeline-steps .timeline-step {
          align-items: center;
          display: flex;
          flex-direction: column;
          position: relative;
          margin: 1rem
      }

      @media (min-width:768px) {
          .timeline-steps .timeline-step:not(:last-child):after {
              content: "";
              display: block;
              border-top: .25rem dotted #3b82f6;
              width: 3.46rem;
              position: absolute;
              left: 7.5rem;
              top: .3125rem
          }
          .timeline-steps .timeline-step:not(:first-child):before {
              content: "";
              display: block;
              border-top: .25rem dotted #3b82f6;
              width: 3.8125rem;
              position: absolute;
              right: 7.5rem;
              top: .3125rem
          }
      }

      .timeline-steps .timeline-content {
          width: 10rem;
          text-align: center
      }

      .timeline-steps .timeline-content .inner-circle {
          border-radius: 1.5rem;
          height: 1rem;
          width: 1rem;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          background-color: #3b82f6
      }

      .tab_active {
        background-color: #ff0303 !important;
      }

      .timeline-steps .timeline-content .inner-circle:before {
          content: "";
          background-color: #5cc700;
          display: inline-block;
          height: 3rem;
          width: 3rem;
          min-width: 3rem;
          border-radius: 6.25rem;
          opacity: .5
      }

    </style>
  </head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php $this->load->view('v_header'); ?>
  <!-- ***** Header Area End ***** -->

  <?php
        if (isset($content)) {
            
            $this->load->view($content); 
        }
    ?>
  
  <?php $this->load->view('v_footer'); ?>




  <script type="text/javascript">
    function search(){
      $("#loading").show(); // Tampilkan loadingnya
      
      $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: baseurl + "home/search", // Isi dengan url/path file php yang dituju
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
            type: "POST",
            enctype: "multipart/form-data",
            url: baseurl + "home/simpan_data",
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
              window.location.href = baseurl + "home/thanks";
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

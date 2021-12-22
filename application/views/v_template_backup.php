<!DOCTYPE html>
<html lang="id, in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sofine Clinic</title>

    <link href="<?php echo base_url(); ?>assets/css/maicons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/animate/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">

    <style>
        @font-face /*perintah untuk memanggil font eksternal*/
        {
            font-family: 'Popins'; /*memberikan nama bebas untuk font*/
            src: url('Poppins/Poppins-Light.ttf');/*memanggil file font eksternalnya di folder nexa*/
        }

    </style>

</head>

<body>
    <!-- Back to top button -->
    <div class="back-to-top"></div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" style="max-height: 75px;background-color: #ffffff !important;box-shadow: 0px 0px 5px 0px #504126;">
            <div class="container">
                <a href="#" class="navbar-brand"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo"></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php
    if (isset($content)) {

        $this->load->view($content);
    }
    ?>

    <footer class="page-footer bg-image" style="background-image: url(assets/img/dental.png);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 py-3">
                    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo" style="background: antiquewhite;border-radius: 10px;">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero amet, repellendus eius blanditiis in iusto eligendi iure.</p>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Contact Us</h5>
                    <p>203 Fake St. Mountain View, San Francisco, California, USA</p>
                    <a href="#" class="footer-link">+00 1122 3344 5566</a>
                    <a href="#" class="footer-link">seogram@temporary.com</a>
                </div>
                <div class="col-lg-3 py-3">
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Cabang Kami</h5>
                    <p>Get updates, news or events on your mail.</p>
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Enter your email..">
                        <button type="submit" class="btn btn-success btn-block mt-2">Subscribe</button>
                    </form>
                </div>
            </div>

            <p class="text-center" id="copyright">Copyright &copy; 2021. Developed by <a href="" target="_blank">Melek Aplikasi</a></p>
        </div>
    </footer>

    <script src="<?php echo base_url(); ?>assets/js1/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js1/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js1/google-maps.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor1/wow/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js1/theme.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js1/jquery.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/js1/moment.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js1/bootstrap.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script> 
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
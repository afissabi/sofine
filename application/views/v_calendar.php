<style>
    @media (min-width:1024px) {
        .datepicker.datepicker-inline th{
            font-size: 20px;
        }

        /*.pilihanjam{
            font-size: 18px !important;
        }*/
    }


    .blink {
        animation: blink-animation 1s steps(5, start) infinite;
        -webkit-animation: blink-animation 1s steps(5, start) infinite;
    }
    @keyframes blink-animation {
        to {
        visibility: hidden;
        }
    }
    @-webkit-keyframes blink-animation {
        to {
        visibility: hidden;
        }
    }

    .tersedia{
        background-color: #8ec549;
        color: #fff;
        font-weight: bold;
    }
    .penuh{
        background-color: red;
        color: #fff;
        font-weight: bold;

    }
    .dipilih{
        background-color: #ff7508 !important;
        color: #fff;
        font-weight: bold;
    }

    .tele{
        color: #fff;
        background-color:#379bf1;
        font-weight: bold;
    }

</style>
<div id="pricing" class="pricing-tables">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Pilih <em>Layanan Terbaik</em> Untuk Anda</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>Dapatkan Dokter pengalaman terbaik bagi kesehatan gigi anda disini</p>
          </div>
        </div>
        <!-- calendar asli -->
        <!-- <div id="body-overlay"><div></div></div> -->
        <div class="table-responsive">
            <div id="calendar">
            </div>
        </div>
        <!-- calendar asli -->

        <!-- calendar contoh -->
        <div class="col-md-12" style="background-color: #fff; border-radius: 20px;">
				<div class="form-group add_bottom_45">
				
					<div class="row" style="padding: 20px 0 10px 20px; font-size: 20px; font-weight: bold;">Pilih Jam :
					</div>
					<div id="gif_jam" class="col-md-12 text-center" style="display: none">
						<img class="" src="http://pendaftaran.phc.co.id/assets/template/img/gif_jam.gif" alt="">
					</div>
					<div class="row" id="v_jadwal_jam">
						
					</div>
					
					
					<ul class="legend" style="padding-top:10px; border-top: 1px solid #eee;">
						<li><strong></strong>konsultasi on site (Rawat Jalan)</li>
						<li><strong class="litele"></strong>Telemedicine (Konsultasi online)</li>
						<li><strong></strong>Tidak Tersedia</li>
						<li><strong></strong>Penuh</li>
					</ul>
				</div>
				<div id="v_pengganti" class="row blink" style="display:none;">
					<div class="col-md-12 text-center" style="font-size: large;">
						<span id="ket_pengganti" style="color: #ff1010;"></span>
					</div>
				</div>
				<div id="pilih_dulu" style="text-align: center; font-size: 20px; padding: 0 0 20px 0">Silahkan pilih tanggal dan jam berobat terlebih dahulu (Klik tanggal dan jam)</div>
				<div id="info_habis" class="row blink" style="display: none; font-size: 20px;">
					<div class="col-md-12 text-center">
						Kuota telah HABIS, <br>pilih tanggal lainnya
					</div>
				</div>
				<div class="row v_pilih_tgl">
					<div id="ket_jam_praktek" class="col-md-12 text-center" style="font-size: 20px;">

					</div>

					<div id="ket_kuota" class="col-md-6 text-center" style="font-size: 20px; display: none">

					</div>
				</div>
				<div class="row v_pilih_tgl" style="background-color: #3f4079; color: #fff; padding: 10px; border-radius: 10px; font-size: 23px; margin: 0 10px; display: none">
					<div class="col-md-6 text-center blink">
						<span id="pilih_tgl"></span>
						<span id="pilih_jam"></span>
					</div>
					<div class="col-md-6 text-center">
						<button id="btn_next" type="button" class="btn btn_1 col-md-12" onclick="pilih_tanggal()" style="padding: 10px 0">Selanjutnya <i class="icon-angle-right"></i></button>
					</div>
				</div>
			</div>
        <!-- calendar contoh -->

      </div>
    </div>
  </div>

<script>
$(document).ready(function(){
    console.log('tes tes');
    $.ajax({
		url: "<?php echo base_url('calendar/load_view'); ?>",
		type: "POST",
		// data:'month='+month+'&year='+year,
		success: function(response){
			setInterval(function() {$("#body-overlay").hide(); },500);
			$("#calendar").html(response);	
		},
		error: function(){} 
	});
	$(document).on("click", '.prev', function(event) { 
		var month =  $(this).data("prev-month");
		var year =  $(this).data("prev-year");
		getCalendar(month,year);
	});
	$(document).on("click", '.next', function(event) { 
		var month =  $(this).data("next-month");
		var year =  $(this).data("next-year");
		getCalendar(month,year);
	});
	$(document).on("blur", '#currentYear', function(event) { 
		var month =  $('#currentMonth').text();
		var year = $('#currentYear').text();
		getCalendar(month,year);
	});
});
function getCalendar(month,year){
	$("#body-overlay").show();
	$.ajax({
		url: "<?php echo base_url('calendar/load_view'); ?>",
		type: "POST",
		data:'month='+month+'&year='+year,
		success: function(response){
			setInterval(function() {$("#body-overlay").hide(); },500);
			$("#calendar").html(response);	
		},
		error: function(){} 
	});
	
}
</script>
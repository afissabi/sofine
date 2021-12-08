
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <title>-</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/templatemo-seo-dream.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animated.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Widget -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/widget.css" />

    <!-- Mfb -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mfb.css" />
    <script src="<?php echo base_url();?>assets/vendor/jquery/mfb.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery/modernizr.touch.js"></script>
    <!--

TemplateMo 563 SEO Dream

https://templatemo.com/tm-563-seo-dream

-->

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

  <div>
      <ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
          <li class="mfb-component__wrap">
            <a href="#" class="mfb-component__button--main">
              <!-- <i class="mfb-component__main-icon--resting ion-plus-round"></i>
              <i class="mfb-component__main-icon--active ion-close-round"></i> -->
              <i class="mfb-component__child-icon ion-social-whatsapp"></i>
            </a>
            <ul class="mfb-component__list">
              <li>
                <a href="https://api.whatsapp.com/send?phone=6289617413960&text=Halo%21+Berokah+Teknik%2C+saya+ingin+memperbaiki..." target="blank" data-mfb-label="Whatsapp 1" class="mfb-component__button--child">
                  <i class="mfb-component__child-icon ion-ios-telephone"></i>
                </a>
              </li>
    
              <!-- <li>
                <a href="#"
                target="blank" data-mfb-label="Whatsapp 2" class="mfb-component__button--child">
                  <i class="mfb-component__child-icon ion-ios-telephone"></i>
                </a>
              </li> -->
            </ul>
          </li>
        </ul>
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


  <!-- Scripts -->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/owl-carousel.js"></script>
  <script src="<?php echo base_url();?>assets/js/animation.js"></script>
  <script src="<?php echo base_url();?>assets/js/imagesloaded.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>

</body>
</html>
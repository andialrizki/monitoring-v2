<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Monitoring LPG Malang</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/fave.png" />
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"> 
  <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/lightbox.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
  <link id="css-preset" href="<?php echo base_url(); ?>assets/css/presets/preset1.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/owl-carousel/owl.theme.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/bootstrap-switch.css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-switch.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>


  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  
</head><!--/head-->

<body>
  <?php $type_admin = $this->session->userdata(APP_PREFIX.'type_admin'); ?>
  <!--.preloader-->
  <!--/.preloader-->
  <!-- nav bar -->
  <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url(); ?>">
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo2.png" alt="logo" style="height:40px;">
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll <?php echo ($active == 'home')?'active':''; ?>"><a href="<?php echo site_url(); ?>">Home</a></li>
            <?php echo isset($navbar) ? $navbar:''; ?>
            <?php if ($this->session->userdata(APP_PREFIX.'is_login')): ?>
                <?php if ($this->session->userdata(APP_PREFIX.'type_admin') == 0 || $this->session->userdata(APP_PREFIX.'type_admin') == 1): ?>
                    <li class="scroll"><a href="<?php echo site_url('sign-out'); ?>">Logout</a></li>
                <?php else: ?>
                <li class="dropdown">
                  <a class="btn btn-primary btn-lpg dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                    Profile <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="scroll <?php echo ($active == 'profile')?'active':''; ?>">
                          <a href="<?php echo site_url('profile'); ?>">Profile</a>
                      </li> 
                      <li class="scroll"><a href="<?php echo site_url('sign-out'); ?>">Logout</a></li>
                  </ul>
                </li>
                <?php endif ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->

  <!-- end navbar -->

  <!-- main content -->
  <?php echo $content ?>
  <!-- end main content -->
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="index.html"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>
        </div>
        <div class="social-icons">
          <ul>
            <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; Monitoring LPG</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Designed by YFDev</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <!-- // <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mousescroll.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/smoothscroll.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.countTo.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
  <script href="<?php echo base_url(); ?>assets/js/responsive.js" rel="stylesheet"></script>
  <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.dataTables').DataTable();
    } );
    $(document).ready(function() {
      var owl = $("#owl-demo");
      owl.owlCarousel({
          navigation : false, // Show next and prev buttons
          slideSpeed : 300,
          pagination : false,
          singleItem:true,
      });

      $(".next_owl").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev_owl").click(function(){
        owl.trigger('owl.prev');
      })
    });

    $('[data-tooltip="tooltip"]').tooltip(); 
    var tang = $(".datepicker").datepicker({
      format: "mm-yyyy",
      viewMode: "months", 
      minViewMode: "months"
    }).on('changeDate', function(ev) {
        tang.hide();
    }).data('datepicker');
  </script>

</body>
</html>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Login | Monitoring</title>
    <!--link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico"> -->
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/base/assets/css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/vendor/waves/waves.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/base/assets/examples/css/pages/login.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/fonts/brand-icons/brand-icons.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
    <style type="text/css">
        .page-login:before {
          background-image: url("<?php echo base_url() ?>assets/images/6.jpg");
        }
    </style>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="<?php echo base_url(); ?>assets/global/vendor/media-match/media.match.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/global/vendor/modernizr/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="page-login layout-full page-dark">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
     data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
        <div class="brand">
            <img class="brand-img" src="<?php echo base_url(); ?>assets/images/logo64.png" alt="...">
            <h2 class="brand-text">Monitoring LPG</h2>
        </div>
        <?php if (isset($error)): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
      <?php endif ?>
        <p>Sign into your pages account</p>
        <form method="post" action="<?php echo site_url('sign-in/auth'); ?>">
            <div class="form-group form-material floating">
                <input type="text" class="form-control empty" id="inputName" name="username">
                <label class="floating-label" for="inputName">Username</label>
            </div>
            <div class="form-group form-material floating">
                <input type="password" class="form-control empty" id="inputPassword" name="password">
                <label class="floating-label" for="inputPassword">Password</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
        <footer class="page-copyright page-copyright-inverse">
            <p>WEBSITE BY semicolon;</p>
            <p>© <?php echo date('Y') ?>. All RIGHT RESERVED.</p>
            <div class="social">
                <a href="javascript:void(0)">
                    <i class="icon bd-twitter" aria-hidden="true"></i>
                </a>
                <a href="javascript:void(0)">
                    <i class="icon bd-facebook" aria-hidden="true"></i>
                </a>
                <a href="javascript:void(0)">
                    <i class="icon bd-dribbble" aria-hidden="true"></i>
                </a>
            </div>
        </footer>
    </div>
</div>
<!-- End Page -->
<!-- Core  -->
<script src="<?php echo base_url(); ?>assets/global/vendor/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/animsition/animsition.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/asscroll/jquery-asScroll.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/asscrollable/jquery.asScrollable.all.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/waves/waves.js"></script>
<!-- Plugins -->
<script src="<?php echo base_url(); ?>assets/global/vendor/switchery/switchery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/intro-js/intro.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/screenfull/screenfull.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="<?php echo base_url(); ?>assets/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<!-- Scripts -->
<script src="<?php echo base_url(); ?>assets/global/js/core.js"></script>
<script src="<?php echo base_url(); ?>assets/base/assets/js/site.js"></script>
<script src="<?php echo base_url(); ?>assets/base/assets/js/sections/menu.js"></script>
<script src="<?php echo base_url(); ?>assets/base/assets/js/sections/menubar.js"></script>
<script src="<?php echo base_url(); ?>assets/base/assets/js/sections/gridmenu.js"></script>
<script src="<?php echo base_url(); ?>assets/base/assets/js/sections/sidebar.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/configs/config-colors.js"></script>
<script src="<?php echo base_url(); ?>assets/base/assets/js/configs/config-tour.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/components/asscrollable.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/components/animsition.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/components/slidepanel.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/components/switchery.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/components/tabs.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/components/jquery-placeholder.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/components/material.js"></script>
<script>
    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>
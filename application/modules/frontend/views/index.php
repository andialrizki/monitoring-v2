<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>MonitoringLPG | semicolon;</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/base/assets/css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/waves/waves.css">

    <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/global/vendor/datatables-bootstrap/dataTables.bootstrap.css">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/global/vendor/datatables-fixedheader/dataTables.fixedHeader.css">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/global/vendor/datatables-responsive/dataTables.responsive.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/base/assets/examples/css/dashboard/v1.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/base/assets/skins/green.min.css">
    <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="<?php echo base_url() ?>assets/global/vendor/modernizr/modernizr.js"></script>
    <script src="<?php echo base_url() ?>assets/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
    <script src="<?php echo base_url() ?>assets/global/vendor/chart-js/Chart.js"></script>
    <script src="<?php echo base_url() ?>assets/global/vendor/chart-js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/global/vendor/chart-js/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/global/vendor/jquery/jquery.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <style type="text/css">
        .btn-action a {
            text-decoration: none;
        }
        .no-js #loader { display: none;  }
          .js #loader { display: block; position: absolute; left: 100px; top: 0; }
          .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('<?php echo base_url() ?>assets/images/loader.gif') center no-repeat #fff;
          }

    </style>
</head>
<body class="dashboard">
<div class="se-pre-con"></div>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <img class="navbar-brand-logo" src="<?php echo base_url(); ?>assets/images/logo-circle.png" title="Remark">
            <span class="navbar-brand-text"> MonitoringLPG</span>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon md-search" aria-hidden="true"></i>
        </button>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="hidden-float" id="toggleMenubar">
                    <a data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="hidden-xs" id="toggleFullscreen">
                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                        <span><i class="icon md-account-circle"
                                 aria-hidden="true"></i> &nbsp; <?php $name = $this->session->userdata(APP_PREFIX . 'name');
                            echo $name; ?></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="<?php echo site_url('profile'); ?>" role="menuitem"><i class="icon md-account"
                                                                                            aria-hidden="true"></i>
                                Profile</a>
                        </li>
                        <li role="presentation">
                            <a href="<?php echo site_url('sign-out') ?>" role="menuitem"><i class="icon md-power"
                                                                                            aria-hidden="true"></i>
                                Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon md-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category">General</li>
                    <li class="site-menu-item <?php echo ($active == 'home') ? 'active' : ''; ?>">
                        <a class="animsition-link" href="<?php echo site_url('home') ?>">
                            <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                    <?php echo isset($navbar) ? $navbar : ''; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="site-menubar-footer">
        <a href="<?php echo site_url('profile'); ?>" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Atur Profil">
            <span class="icon md-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon md-eye-off" aria-hidden="true"></span>
        </a>
        <a href="<?php echo site_url('sign-out') ?>" data-placement="top" data-toggle="tooltip"
           data-original-title="Logout">
            <span class="icon md-power" aria-hidden="true"></span>
        </a>
    </div>
</div>
<div class="site-gridmenu">
    <?php echo isset($grid) ? $grid : ''; ?>
</div>
<!-- Page -->
<!-- <div class="page animsition">
    <div class="page-content padding-30 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true"> -->
<!-- main content -->
<?php echo $content ?>
<!-- end main content --><!--
        </div>
    </div>
</div> -->
<!-- End Page -->
<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© 2015 <a
            href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
    <div class="site-footer-right">
        Crafted with <i class="red-600 icon md-favorite"></i> by <a href="http://themeforest.net/user/amazingSurge">amazingSurge</a>
    </div>
</footer>
<!-- Core  -->
<script src="<?php echo base_url() ?>assets/global/vendor/bootstrap/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/animsition/animsition.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/asscroll/jquery-asScroll.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/asscrollable/jquery.asScrollable.all.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/waves/waves.js"></script>
<!-- Plugins -->
<script src="<?php echo base_url() ?>assets/global/vendor/switchery/switchery.min.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/intro-js/intro.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/screenfull/screenfull.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/matchheight/jquery.matchHeight-min.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/peity/jquery.peity.min.js"></script>


<script src="<?php echo base_url() ?>assets/global/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/datatables-bootstrap/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?php echo base_url() ?>assets/global/vendor/datatables-tabletools/dataTables.tableTools.js"></script>

<!-- Scripts -->
<script src="<?php echo base_url() ?>assets/global/js/core.js"></script>
<script src="<?php echo base_url() ?>assets/base/assets/js/site.js"></script>
<script src="<?php echo base_url() ?>assets/base/assets/js/sections/menu.js"></script>
<script src="<?php echo base_url() ?>assets/base/assets/js/sections/menubar.js"></script>
<script src="<?php echo base_url() ?>assets/base/assets/js/sections/gridmenu.js"></script>
<script src="<?php echo base_url() ?>assets/base/assets/js/sections/sidebar.js"></script>
<script src="<?php echo base_url() ?>assets/global/js/configs/config-colors.js"></script>
<script src="<?php echo base_url() ?>assets/base/assets/js/configs/config-tour.js"></script>
<script src="<?php echo base_url() ?>assets/global/js/components/asscrollable.js"></script>
<script src="<?php echo base_url() ?>assets/global/js/components/animsition.js"></script>
<script src="<?php echo base_url() ?>assets/global/js/components/slidepanel.js"></script>
<script src="<?php echo base_url() ?>assets/global/js/components/switchery.js"></script>
<script src="<?php echo base_url() ?>assets/global/js/components/tabs.js"></script>
<script src="<?php echo base_url() ?>assets/global/js/components/matchheight.js"></script>
<script src="<?php echo base_url() ?>assets/global/js/components/peity.js"></script>

<script src="<?php echo base_url() ?>assets/global/js/components/datatables.js"></script>
<script src="<?php echo base_url() ?>assets/base/assets/examples/js/tables/datatable.js"></script>
<script src="<?php echo base_url() ?>assets/base/assets/examples/js/dashboard/v1.js"></script>
<script type="text/javascript">
        $(window).load(function() {
          // Animate loader off screen
          $(".se-pre-con").fadeOut("slow");;
        });
        function clearFill(element) {
            for(i=0; i<element.length; i++){
                $(element[i]).val('');
            }
        }
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
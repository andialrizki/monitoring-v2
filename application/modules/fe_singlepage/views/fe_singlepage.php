<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring LPG</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/creative/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/creative/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?php echo base_url() ?>assets/creative/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url() ?>assets/creative/css/creative.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .modal {
            overflow: auto !important; 
        }
    </style>

</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">MonitoringLPG</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#about">Fitur</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Pengguna</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Hubungi Kami</a>
                </li>
                <?php if ($this->session->userdata(APP_PREFIX . 'is_login')): ?>
                    <li>
                        <a class="" href="<?php echo site_url('home') ?>">Dashboard</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a class="" href="<?php echo site_url('sign-in') ?>">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1 id="homeHeading">Monitoring LPG</h1>
            <hr>
            <p>MonitoringLPG memberikan solusi keberhasilan implementasi sistem distribusi tertutup LPG 3 Kg di Indonesia, MonitoringLPG hadir dalam <i> platform web </i> dan <i> mobile apps </i></p>
            <a href="#about" class="btn btn-primary btn-xl page-scroll">Selengkapnya</a>
        </div>
    </div>
</header>

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Fitur Kami</h2>
                <hr class="light">
                <ol class="text-justify">
                    <li class="text-faded">Menyediakan Sistem transaksi cashless terintegrasi di semua level dengan Tbank bagi SPPBE, Agen, dan Pangkalan</li>
                    <li class="text-faded">Menyediakan Sistem monitoring distribusi tertutup LPG 3 Kg untuk konsumen rumah tangga dan usaha mikro bagi PT. Pertamina dan Pemerintah Daerah Setempat</li>
                    <li class="text-faded">Menyediakan layanan pencarian LPG 3 Kg bagi konsumen beserta berbagai fitur lainnya</li>
                </ol>
                <button class="page-scroll btn btn-default btn-xl sr-button" type="button" data-toggle="modal" data-target="#modal-mulai">Ayo Mulai Gunakan!</button> 
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Pengguna Sistem Kami</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-truck text-primary sr-icons"></i>
                    <h4>SPPBE, Agen dan Pangkalan</h4>
                    <p class="text-muted">MonitoringLPG digunakan oleh penyalur LPG 3 Kg</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-globe text-primary sr-icons"></i>
                    <h4>PT. Pertamina dan PEMDA</h4>
                    <p class="text-muted">MonitoringLPG digunakan oleh pemangku kebijakan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-bank text-primary sr-icons"></i>
                    <h4>PT. Bank Rakyat Indonesia</h4>
                    <p class="text-muted">MonitoringLPG digunakan oleh perbankan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-users text-primary sr-icons"></i>
                    <h4>Konsumen LPG 3 Kg</h4>
                    <p class="text-muted">MonitoringLPG digunakan oleh konsumen LPG 3 Kg</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Hubungi Kami Sekarang!</h2>
                <hr class="primary">
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x sr-contact"></i>
                <p>+6282142582102</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                <p><a href="mailto:admin@monitoringlpg.com">admin@monitoringlpg.com</a></p>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-mulai" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Mulai Sekarang
                </h4>
            </div>
            <div class="modal-body">
                Sudah punya akun? <a href="<?php echo site_url('home') ?>"><button class="btn btn-primary" type="button">Login Disini</button></a><br>
                atau ingin mendaftar sebagai konsumen? <button class="btn btn-warning" type="button" id="btnDaftar">Daftar Disini</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-daftar" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Regstrasi Konsumen
                </h4>
            </div>
            <form action="<?php echo site_url('registrasi-konsumen') ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">ID Pelanggan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="dt[id_pengecer]" required=""
                                   value="">
                            <br>
                            <small>Lihat dikartu kendali</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Pangkalan</label>
                        <div class="col-sm-7">
                            <div id="loading" style="display: none">
                                <i class="fa fa-spin fa-refresh"></i> Memuat Data Pangkalan...
                            </div>
                            <select class="form-control" name="dt[id_pangkalan]" id="id_pangkalan" required="" style="width: 100%">
                                <option value="">-- Pilih --</option>
                            </select>
                            <input type="hidden" name="pangkalan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Lengkap</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="dt[name]" required=""
                                   value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">No. Telepon</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="dt[phone]" required=""
                                   value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="dt[password]" required=""
                                   value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Alamat Lengkap</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="4" cols="20" name="dt[address]"
                                      required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Verifikasi</label>
                        <div class="col-sm-7">
                            <b style="color: red"><?php $var = mt_rand(111111,999999); echo $var ?></b><br>
                            <input type="text" class="form-control" name="verifikasi" required=""
                                   value="" style="max-width: 100px;">
                            <input type="hidden" name="verifikasi_valid" value="<?php echo $var ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-primary" type="submit">Daftar</button>
                   <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button> 
                </div>
            </form>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/creative/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/creative/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url() ?>assets/creative/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="<?php echo base_url() ?>assets/creative/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Theme JavaScript -->
<script src="<?php echo base_url() ?>assets/creative/js/creative.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.min.js"></script>

<script type="text/javascript">
    $("#btnDaftar").click(function() {
        $("#modal-mulai").modal('toggle');
        $("#modal-daftar").modal('toggle');
        $("#id_pangkalan").html('<option value="">-- Pilih --</option>');
        $.ajax({
            url: "<?php echo site_url('getdata-pangkalan') ?>",
            dataType: "json",
            beforeSend: function(){
                $("#loading").show();
            },
            success: function(data){
                $.each(data, function(i, v){
                    $("#id_pangkalan").append('<option value="'+v.id_pangkalan+'">'+v.name+' ('+v.id_pangkalan+')</option>');
                });
                $("#loading").hide();
                $("#id_pangkalan").select2();
            }
        });
    });
</script>
</body>

</html>

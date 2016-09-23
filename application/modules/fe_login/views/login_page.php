<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Monitoring LPG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/fave.png" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <style type="text/css">
        .form-login{
            display: table; 
            margin: 0 auto; 
            border: 5px solid #fff;
            background: rgb(109, 181, 47) none repeat scroll 0% 0%;
            border-radius: 5px;
            padding: 15px;
        }
    </style>
</head>
<body style="background: rgb(109, 181, 47) none repeat scroll 0% 0%">

<div class="container">

<!-- Simple Login - START -->
  <div class="col-xs-12" style="margin-top: 100px;">
      <?php if (isset($error)): ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
      <?php endif ?>
      <div class="form-login">
          <form class="col-xs-12" action="<?php echo site_url('sign-in/auth'); ?>" method="post">
              <img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive" style="margin: 10px auto;">
              <div class="form-group">
                  <input type="text" class="form-control input-lg" placeholder="Username" name="username" required="">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control input-lg" placeholder="Password" name="password" required="">
              </div>
              <div class="form-group">
                  <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              </div>
          </form>
      </div>
  </div>
<!-- Simple Login - END -->

</div>

</body>
</html>
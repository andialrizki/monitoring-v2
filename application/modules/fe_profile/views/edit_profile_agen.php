<?php  
  $type_admin = $this->session->userdata(APP_PREFIX.'type_admin');
?>
<section id="services">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo site_url('profile'); ?>"><i class="fa fa-minus-circle"></i> Profile</a></li>
          <li class="active"><i class="fa fa-plus-circle"></i> Edit Profile</li>
      </ol>
      <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
      <?php endif ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            FORM TAMBAH/EDIT AGEN
          </div>
          <div id="panel-element-belum" class="panel-collapse collapse in">
            <div class="panel-body">
              <form class="form-horizontal" action="<?php echo site_url('profile/submit'); ?>" method="post">
                  <div class="form-group">
                      <label class="control-label col-sm-3">Username</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control username" name="username" required="" value="<?php echo isset($data['username']) ? $data['username']:''; ?>" <?php echo $type_admin=='3' ? '':'readonly'; ?>>
                          <span class="text-danger hidden span_user">*username sudah digunakan</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Nama</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="name" required="" value="<?php echo isset($data['name']) ? $data['name']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Provinsi</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="provinsi" required="" value="<?php echo isset($data['provinsi']) ? $data['provinsi']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Kota</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="city" required="" value="<?php echo isset($data['city']) ? $data['city']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Alamat</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="address" required="" value="<?php echo isset($data['address']) ? $data['address']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Latitude</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="latitude" required="" value="<?php echo isset($data['latitude']) ? $data['latitude']:''; ?>">
                          <span><a href="http://www.latlong.net" target="_blank">Cari Disini</a></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Longitude</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="longitude" required="" value="<?php echo isset($data['longitude']) ? $data['longitude']:''; ?>">
                          <span><a href="http://www.latlong.net" target="_blank">Cari Disini</a></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-3 col-sm-offset-3">
                          <button type="submit" class="btn btn-primary submit">Submit</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
    </div>
  </section>
  <script type="text/javascript">
    $('.username').keyup(function() {
      var username = $(this).val();
      var dataPost = "username="+username;
      $.ajax({
          url : '<?php echo site_url("request-username") ?>',
          data : dataPost,
          dataType : 'text',
          type : 'POST',
          success:function (result) {
            if (result == 'ok') {
              $('.submit').removeAttr('disabled', '');
              $('.username').removeClass('error');
              $('.span_user').addClass('hidden');
            }else{
              $('.username').focus();
              $('.submit').attr('disabled', '');
              $('.span_user').removeClass('hidden');
              $('.username').addClass('error');
            }
          }
      });
    });
  </script>
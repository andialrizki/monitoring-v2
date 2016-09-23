<?php  
  $id_admin = isset($data['id_admin']) ? $data['id_admin']:'';
  $current_admin = $this->session->userdata(APP_PREFIX.'id_admin');
  $readonly = ($id_admin != $current_admin) ? 'readonly':'';
  $readonly = ($this->session->userdata(APP_PREFIX.'type') == 0) ? '':$readonly;
?>
<section id="services">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo site_url('manage-admin'); ?>"><i class="fa fa-minus-circle"></i> Manage Admin</a></li>
          <li class="active"><i class="fa fa-plus-circle"></i> Tambah/Edit Admin</li>
      </ol>
      <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
      <?php endif ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            FORM TAMBAH/EDIT ADMINISTRATOR
          </div>
          <div id="panel-element-belum" class="panel-collapse collapse in">
            <div class="panel-body">
              <form class="form-horizontal" action="<?php echo site_url('manage-admin/submit'); ?>" method="post">
                  <input type="hidden" name="action" value="<?php echo isset($data['id_admin']) ? 'edit':'add'; ?>">
                  <input type="hidden" name="id_admin" value="<?php echo isset($data['id_admin']) ? $data['id_admin']:''; ?>">
                  <div class="form-group">
                      <label class="control-label col-sm-3">Nama</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="name" required="" value="<?php echo isset($data['name']) ? $data['name']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Username</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="username" required="" value="<?php echo isset($data['username']) ? $data['username']:''; ?>" <?php echo $readonly ?>>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Password</label>
                      <div class="col-sm-7">
                          <input type="password" class="form-control" name="password" required="" value="<?php echo isset($data['password']) ? $data['password']:''; ?>" <?php echo $readonly ?>>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-3 col-sm-offset-3">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
    </div>
  </section>
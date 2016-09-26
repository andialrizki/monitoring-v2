<?php  
  $id_admin = isset($data['id_admin']) ? $data['id_admin']:'';
  $current_admin = $this->session->userdata(APP_PREFIX.'id_admin');
  $readonly = ($id_admin != $current_admin) ? 'readonly':'';
  $readonly = ($this->session->userdata(APP_PREFIX.'type') == 0) ? '':$readonly;
?>
<!-- page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Kelola Pengguna</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url() ?>">Home</a></li>
        <li class="active">Kelola Pengguna</li>
      </ol>
      <div class="page-header-actions">
        <!-- for right button like add, post, etc -->
        <a href="<?php echo site_url('manage-admin'); ?>" style="margin-bottom: 15px;">
          <button class="btn btn-warning"><i class='icon fa-arrow-left'></i> Kembali</button>
        </a>
      </div>
    </div>
    <?php if (isset($error)): ?>
      <div class="alert alert-success alert-dismissible" role="alert">
          <center><strong><?php echo $error; ?></strong></center>
      </div>
    <?php endif ?>
    <div class="page-content">
      <!-- Panel Form Elements -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Form Tambah/Edit Pengguna</h3>
        </div>
        <div class="panel-body container-fluid">
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
  </div>
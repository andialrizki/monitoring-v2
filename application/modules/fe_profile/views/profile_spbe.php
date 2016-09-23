<section id="services">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li class="active"><i class="fa fa-plus-circle"></i> Profile</a></li>
      </ol>
      <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
      <?php endif ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            DATA PRIBADI
            <a href="<?php echo site_url('profile/password'); ?>" type="button" class="btn btn-info btn-xs pull-right">
                <i class="fa fa-gear"></i> Ganti Password
            </a>
            <a href="<?php echo site_url('profile/edit/1'); ?>" type="button" class="btn btn-primary btn-xs pull-right" style="margin-right: 15px;">
                <i class="fa fa-edit"></i> Edit
            </a>
          </div>
          <div id="panel-element-belum" class="panel-collapse collapse in">
            <div class="panel-body">
              <form class="form-horizontal" action="<?php echo site_url('pelanggan/submit'); ?>" method="post">
                  <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'edit':'add'; ?>">
                  <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id']:''; ?>">
                  <div class="col-xs-12">
                      <div class="row">
                          <div class="col-sm-9">
                              <div class="form-group">
                                  <label class="control-label col-sm-3">Nama</label>
                                  <div class="col-sm-7">
                                    <label class="control-label">: <?php echo isset($data['name']) ? $data['name']:''; ?></label>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-3">Username</label>
                                  <div class="col-sm-7">
                                      <label class="control-label">: <?php echo isset($data['username']) ? $data['username']:''; ?></label>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-3">Lokasi</label>
                                  <div class="col-sm-7">
                                      <label class="control-label">: <?php echo isset($data['lokasi_spbe']) ? $data['lokasi_spbe']:''; ?></label>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
            </div>
          </div>
    </div>
  </section>
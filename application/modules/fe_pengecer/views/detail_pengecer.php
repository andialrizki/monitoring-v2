<head>
<?php echo $map['js']; ?>
</head>
<section id="services">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo site_url('pelanggan'); ?>"><i class="fa fa-minus-circle"></i> Pelanggan</a></li>
          <li class="active"><i class="fa fa-plus-circle"></i> Detail Pelanggan</li>
      </ol>
      <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
      <?php endif ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            FORM TAMBAH/EDIT PELANGGAN
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
                                  <label class="control-label col-sm-3">NO Pelanggan</label>
                                  <div class="col-sm-7">
                                      <label class="control-label">: <?php echo isset($data['id_pengecer']) ? $data['id_pengecer']:''; ?></label>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-3">Nama</label>
                                  <div class="col-sm-7">
                                    <label class="control-label">: <?php echo isset($data['name']) ? $data['name']:''; ?></label>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-3">Telepon</label>
                                  <div class="col-sm-7">
                                      <label class="control-label">: <?php echo isset($data['phone']) ? $data['phone']:''; ?></label>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-3">Alamat</label>
                                  <div class="col-sm-7">
                                      <label class="control-label">: <?php echo isset($data['address']) ? $data['address']:''; ?></label>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-3">
                              <img src="<?php echo base_url('assets/images'); ?>/qr_bkma_pengecer.png" class="img-responsive">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-12">
                          <?php echo $map['html']; ?>
                      </div>
                  </div>
              </form>
            </div>
          </div>
    </div>
  </section>
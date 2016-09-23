<head>
<?php echo $map['js']; ?>
</head>
<section id="services">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo site_url('agen'); ?>"><i class="fa fa-minus-circle"></i> Data Agen</a></li>
          <li class="active"><i class="fa fa-plus-circle"></i> Detail Agen</li>
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
                                  <label class="control-label col-sm-3">Kota</label>
                                  <div class="col-sm-7">
                                      <label class="control-label">: <?php echo isset($data['city']) ? $data['city']:''; ?></label>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-3">Provinsi</label>
                                  <div class="col-sm-7">
                                      <label class="control-label">: <?php echo isset($data['provinsi']) ? $data['provinsi']:''; ?></label>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-3">Alamat</label>
                                  <div class="col-sm-7">
                                      <label class="control-label">: <?php echo isset($data['address']) ? $data['address']:''; ?></label>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-3">SPBE Pemasok</label>
                                  <div class="col-sm-7">
                                    <label class="control-label">:</label>
                                    <ul>
                                        <?php if ($data['spbe']): ?>
                                            <?php foreach ($data['spbe'] as $key => $val): ?>
                                                <li>
                                                    <label class="control-label">
                                                        <a href="<?php echo site_url('spbe/edit/'.$val['id_spbe']); ?>" target="_blank">
                                                            <?php echo $val['name']; ?>
                                                        </a>
                                                    </label>
                                                </li>
                                            <?php endforeach ?>
                                        <?php endif ?>

                                    </ul>
                                  </div>
                              </div>
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
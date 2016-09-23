<section id="services">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo site_url('pelanggan'); ?>"><i class="fa fa-minus-circle"></i> Pelanggan</a></li>
          <li class="active"><i class="fa fa-plus-circle"></i> Tambah/Edit Pelanggan</li>
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
                  <div class="form-group">
                      <label class="control-label col-sm-3">NO Pelanggan</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="id_pengecer" required="" value="<?php echo isset($data['id_pengecer']) ? $data['id_pengecer']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Pangkalan</label>
                      <div class="col-sm-7">
                          <?php if ($this->session->userdata(APP_PREFIX.'type_admin') == 2): 
                                $id_admin = isset($data['id_pangkalan']) ? $data['id_pangkalan'] : $this->session->userdata(APP_PREFIX.'id_admin');
                                $pangkalan = Modules::run('myhelper/get_data_table', 'tbl_pangkalan', 'name, id_pangkalan', array('id_pangkalan' => $id_admin));
                          ?>
                              <input type="hidden" name="id_pangkalan" required="" value="<?php echo isset($pangkalan['id_pangkalan']) ? $pangkalan['id_pangkalan']:''; ?>">
                              <input type="text" class="form-control" readonly="" value="<?php echo isset($pangkalan['name']) ? $pangkalan['name']:''; ?>">
                          <?php else: ?>
                            <select class="form-control" name="id_pangkalan">
                              <?php if (isset($pangkalan) && $pangkalan): ?>
                                  <?php foreach ($pangkalan as $key): ?>
                                      <option value="<?php echo isset($key['id_pangkalan']) ? $key['id_pangkalan']:''; ?>" <?php echo (isset($data['id_pangkalan']) && $data['id_pangkalan']==$key['id_pangkalan']) ? 'selected':''; ?>>
                                        <?php echo isset($key['name']) ? $key['name']:''; ?> <?php echo isset($key['id_pangkalan']) ? "(".$key['id_pangkalan'].")":''; ?>
                                      </option>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                              <option></option>
                            </select>
                          <?php endif ?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Nama</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="name" required="" value="<?php echo isset($data['name']) ? $data['name']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Telepon</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="phone" required="" value="<?php echo isset($data['phone']) ? $data['phone']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Alamat</label>
                      <div class="col-sm-7">
                          <textarea class="form-control" rows="4" cols="20" name="address" required=""><?php echo isset($data['address']) ? $data['address']:''; ?></textarea>
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
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
    </div>
  </section>
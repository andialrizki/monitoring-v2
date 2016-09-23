<section id="services">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo site_url('spbe'); ?>"><i class="fa fa-minus-circle"></i> Data SPBE</a></li>
          <li class="active"><i class="fa fa-plus-circle"></i> Tambah/Edit SPBE</li>
      </ol>
      <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
      <?php endif ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            FORM TAMBAH/EDIT SPBE
          </div>
          <div id="panel-element-belum" class="panel-collapse collapse in">
            <div class="panel-body">
              <form class="form-horizontal" action="<?php echo site_url('spbe/submit'); ?>" method="post">
                  <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'edit':'add'; ?>">
                  <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id']:''; ?>">
                  <div class="form-group">
                      <label class="control-label col-sm-3">Nama</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="name" required="" value="<?php echo isset($data['name']) ? $data['name']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Lokasi</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="lokasi_spbe" required="" value="<?php echo isset($data['lokasi_spbe']) ? $data['lokasi_spbe']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Kapasitas</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="kapasitas" value="<?php echo isset($data['kapasitas']) ? $data['kapasitas']:''; ?>">
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
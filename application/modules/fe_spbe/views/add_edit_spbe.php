<!-- page -->
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Form Tambah/Edit SPPBE</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo site_url('spbe'); ?>"><i class="fa fa-minus-circle"></i> Data SPPBE</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Tambah/Edit SPPBE</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('spbe'); ?>" style="margin-bottom: 15px;">
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
                <h3 class="panel-title">Form Tambah/Edit SPPBE</h3>
            </div>
            <div class="panel-body container-fluid">
                <form class="form-horizontal" action="<?php echo site_url('spbe/submit'); ?>" method="post">
                    <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'edit' : 'add'; ?>">
                    <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" required=""
                                   value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Lokasi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="lokasi_spbe" required=""
                                   value="<?php echo isset($data['lokasi_spbe']) ? $data['lokasi_spbe'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kapasitas</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kapasitas"
                                   value="<?php echo isset($data['kapasitas']) ? $data['kapasitas'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Latitude</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="latitude" required=""
                                   value="<?php echo isset($data['latitude']) ? $data['latitude'] : ''; ?>">
                            <span><a href="http://www.latlong.net" target="_blank">Cari Disini</a></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Longitude</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="longitude" required=""
                                   value="<?php echo isset($data['longitude']) ? $data['longitude'] : ''; ?>">
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
</div>
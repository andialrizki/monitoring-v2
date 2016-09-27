<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Edit Profil</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo site_url('profile'); ?>"><i class="fa fa-minus-circle"></i>Profil</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i>Edit Profil</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('profile'); ?>" style="margin-bottom: 15px;">
                <button class="btn btn-warning"><i class='icon fa-arrow-left'></i>Kembali</button>
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
                <h3 class="panel-title">Edit Profile Pangkalan</h3>
            </div>
            <div class="panel-body container-fluid">
                <form class="form-horizontal" action="<?php echo site_url('profile/submit'); ?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3">No. Reg.</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="no_registrasi" required=""
                                   value="<?php echo isset($data['no_registrasi']) ? $data['no_registrasi'] : ''; ?>"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" required=""
                                   value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nama Pemilik</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="pemilik" required=""
                                   value="<?php echo isset($data['pemilik']) ? $data['pemilik'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">KTP Pemilik</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="ktp_pemilik" required=""
                                   value="<?php echo isset($data['ktp_pemilik']) ? $data['ktp_pemilik'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Telepon</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="telepon" required=""
                                   value="<?php echo isset($data['telepon']) ? $data['telepon'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">HP Pemilik</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="hp_pemilik" required=""
                                   value="<?php echo isset($data['hp_pemilik']) ? $data['hp_pemilik'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tipe</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="type" required=""
                                   value="<?php echo isset($data['type']) ? $data['type'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Qty Kontrak</label>
                        <div class="col-sm-7">
                            <input type="number" min="1" class="form-control" name="qty_kontrak" required=""
                                   value="<?php echo isset($data['qty_kontrak']) ? $data['qty_kontrak'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">SP Agen</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="sp_agen" required=""
                                   value="<?php echo isset($data['sp_agen']) ? $data['sp_agen'] : ''; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Sales Eksekutif</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="sales_eksekutif" required=""
                                   value="<?php echo isset($data['sales_eksekutif']) ? $data['sales_eksekutif'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Alamat</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" rows="4" cols="20" name="address"
                                      required=""><?php echo isset($data['address']) ? $data['address'] : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Provinsi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="provinsi" required=""
                                   value="<?php echo isset($data['provinsi']) ? $data['provinsi'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kota / Kab.</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kabupaten" required=""
                                   value="<?php echo isset($data['kabupaten']) ? $data['kabupaten'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kecamatan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kecamatan" required=""
                                   value="<?php echo isset($data['kecamatan']) ? $data['kecamatan'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kelurahan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kelurahan" required=""
                                   value="<?php echo isset($data['kelurahan']) ? $data['kelurahan'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Kode Pos</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="kode_pos" required=""
                                   value="<?php echo isset($data['kode_pos']) ? $data['kode_pos'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Latitude</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="lat" required=""
                                   value="<?php echo isset($data['lat']) ? $data['lat'] : ''; ?>">
                            <span><a href="http://www.latlong.net" target="_blank">Cari Disini</a></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Longitude</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="lon" required=""
                                   value="<?php echo isset($data['lon']) ? $data['lon'] : ''; ?>">
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
<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo site_url('agen'); ?>"><i class="fa fa-minus-circle"></i> Data Agen</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Tambah/Edit Agen</li>
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
                    <form class="form-horizontal" action="<?php echo site_url('agen/submit'); ?>" method="post">
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
                            <label class="control-label col-sm-3">Provinsi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="provinsi" required=""
                                       value="<?php echo isset($data['provinsi']) ? $data['provinsi'] : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Kota</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="city" required=""
                                       value="<?php echo isset($data['city']) ? $data['city'] : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Alamat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="address" required=""
                                       value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>">
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
                        <!--div class="form-group">
                            <label class="control-label col-sm-3">Pemasok</label>
                            <div class="col-sm-7">

                                <div class="row">
                                    <?php /*
                                    $spbe = Modules::run('fe_spbe/get_all_spbe');
                                    if ($spbe) :
                                        foreach ($spbe as $key) :
                                            $check = 0;
                                            foreach ($data['spbe'] as $keys => $val):
                                                if ($val['id_spbe'] == $key['id']):
                                                    $check = $val['id_spbe'];
                                                endif;
                                            endforeach;
                                            ?>
                                            <div class="col-sm-6">
                                                <label><?php ?>
                                                    <input type="checkbox" class="" name="spbe[]"
                                                           value="<?php echo isset($key['id']) ? $key['id'] : ''; ?>" <?php echo ($check) ? 'checked' : ''; ?>>
                                                    <?php echo isset($key['name']) ? $key['name'] : ''; ?>
                                                </label>
                                            </div>
                                        <?php endforeach; endif; */?>
                                </div>
                            </div>
                        </div-->
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
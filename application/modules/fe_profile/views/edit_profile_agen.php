<?php
$type_admin = $this->session->userdata(APP_PREFIX . 'type_admin');
?>
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
                <h3 class="panel-title">Edit Profile Agen</h3>
            </div>
            <div class="panel-body container-fluid">
                <form class="form-horizontal" action="<?php echo site_url('profile/submit'); ?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Username</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control username" name="username" required=""
                                   value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" <?php echo $type_admin == '3' ? '' : 'readonly'; ?>>
                            <span class="text-danger hidden span_user">*username sudah digunakan</span>
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
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.username').keyup(function () {
        var username = $(this).val();
        var dataPost = "username=" + username;
        $.ajax({
            url: '<?php echo site_url("request-username") ?>',
            data: dataPost,
            dataType: 'text',
            type: 'POST',
            success: function (result) {
                if (result == 'ok') {
                    $('.submit').removeAttr('disabled', '');
                    $('.username').removeClass('error');
                    $('.span_user').addClass('hidden');
                } else {
                    $('.username').focus();
                    $('.submit').attr('disabled', '');
                    $('.span_user').removeClass('hidden');
                    $('.username').addClass('error');
                }
            }
        });
    });
</script>
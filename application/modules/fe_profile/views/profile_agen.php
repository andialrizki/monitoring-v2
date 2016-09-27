<head>
    <?php echo $map['js']; ?>
</head>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Edit Profil</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i>Profil</a></li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('profile/password'); ?>" type="button" style="margin-bottom: 15px;">
                <button class="btn btn-danger"><i class="fa fa-gear"></i> Ganti Password</button>
            </a>
            <a href="<?php echo site_url('profile/edit/1'); ?>" type="button" style="margin-bottom: 15px;">
                <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
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
                <h3 class="panel-title">Profil Agen</h3>
            </div>
            <div class="panel-body container-fluid">
                <form class="form-horizontal" action="<?php echo site_url('pelanggan/submit'); ?>" method="post">
                    <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'edit' : 'add'; ?>">
                    <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['name']) ? $data['name'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Username</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['username']) ? $data['username'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Provinsi</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['provinsi']) ? $data['provinsi'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kota</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['city']) ? $data['city'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Alamat</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['address']) ? $data['address'] : ''; ?></label>
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
</div>
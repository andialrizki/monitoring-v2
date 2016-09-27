<head>
    <?php echo $map['js']; ?>
</head>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Profil Pangkalan</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Profil</a></li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('profile/password'); ?>" type="button" style="margin-bottom: 15px;">
                <button class="btn btn-danger"><i class="fa fa-gear"></i> Ganti Password</button>
            </a>
            <a href="<?php echo site_url('profile/edit/1'); ?>" type="button" style="margin-bottom: 15px;">
                <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
            </a>
            <span style="margin-bottom: 15px;">
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modal-ganti-harga"><i class="fa fa-money"></i>Ubah Harga</button>
            </span>
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
                <h3 class="panel-title">Profil Pangkalan</h3>
            </div>
            <div class="panel-body container-fluid">
                <form class="form-horizontal" action="<?php echo site_url('pelanggan/submit'); ?>" method="post">
                    <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'edit' : 'add'; ?>">
                    <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">No Reg.</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['no_registrasi']) ? $data['no_registrasi'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['name']) ? $data['name'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Pemilik</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['pemilik']) ? $data['pemilik'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">KTP Pemilik</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['ktp_pemilik']) ? $data['ktp_pemilik'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Telepon</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['telepon']) ? $data['telepon'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">No HP</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['hp_pemilik']) ? $data['hp_pemilik'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tipe</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['type']) ? $data['type'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Qty Kontrak</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['qty_kontrak']) ? $data['qty_kontrak'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">SP Agen</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['sp_agen']) ? $data['sp_agen'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Sales Eksekutif</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['sales_eksekutif']) ? $data['sales_eksekutif'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Alamat</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['address']) ? $data['address'] : ''; ?></label>
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
                                    <label class="control-label col-sm-3">Kota / Kab.</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['kabupaten']) ? $data['kabupaten'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kecamatan</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['kecamatan']) ? $data['kecamatan'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kelurahan</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['kelurahan']) ? $data['kelurahan'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kode Pos</label>
                                    <div class="col-sm-7">
                                        <label
                                            class="control-label">: <?php echo isset($data['kode_pos']) ? $data['kode_pos'] : ''; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <?php echo $map['html']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-ganti-harga" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Ganti Harga Eceran LPG
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-xs-4">Harga</label>
                    <div class="col-xs-8">
                        <input type="number" class="form-control" min="1000" step="500" id="jml-harga"
                               value="<?php echo isset($data['harga_eceran']) ? $data['harga_eceran'] : ''; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-harga">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.btn-harga').click(function () {
        var harga = $('#jml-harga').val();
        var dataPost = 'harga=' + harga;
        if (harga == '') {
            $('#jml-harga').focus();
        } else {
            $(this).attr('disabled', '');
            $(this).html('Waiting...');
            $.ajax({
                url: '<?php echo site_url("request-harga"); ?>',
                type: 'POST',
                dataType: 'text',
                data: dataPost,
                success: function (resquest) {
                    $('.btn-harga').removeAttr('disabled', '');
                    $('.btn-harga').html('Submit');
                    location.reload();
                }
            });
        }
    });
</script>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Detail Transaksi Pelanggan</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo site_url('transaksi'); ?>"><i class="fa fa-minus-circle"></i> Pelanggan</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Detail Transaksi Pelanggan</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('transaksi'); ?>" style="margin-bottom: 15px;">
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
                <h3 class="panel-title">Detail Transaksi Pelanggan</h3>
            </div>
            <div class="panel-body container-fluid">
                <form class="form-horizontal" action="<?php echo site_url('pelanggan/submit'); ?>" method="post">
                    <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'edit' : 'add'; ?>">
                    <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                    <div class="col-xs-12">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="control-label col-sm-3">NO Pelanggan</label>
                                <div class="col-sm-7">
                                    <label
                                        class="control-label">: <?php echo isset($pelanggan['id_pengecer']) ? $pelanggan['id_pengecer'] : ''; ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Nama</label>
                                <div class="col-sm-7">
                                    <label
                                        class="control-label">: <?php echo isset($pelanggan['name']) ? $pelanggan['name'] : ''; ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Telepon</label>
                                <div class="col-sm-7">
                                    <label
                                        class="control-label">: <?php echo isset($pelanggan['phone']) ? $pelanggan['phone'] : ''; ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Alamat</label>
                                <div class="col-sm-7">
                                    <label>: <?php echo isset($pelanggan['address']) ? $pelanggan['address'] : ''; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <img src="<?php echo base_url('assets/images'); ?>/qr_bkma_transaksi.png"
                                 class="img-responsive">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <table class="table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Qty</th>
                                    <th>Jumlah</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $num = 1;
                                if (isset($data) && $data) :
                                    $data = isset($data[0]) ? $data : array('0' => $data);
                                    foreach ($data as $key) :
                                        ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo isset($key['tgl']) ? Modules::run('myhelper/format_date', $key['tgl']) : ''; ?></td>
                                            <td><?php echo isset($key['qty']) ? $key['qty'] : ''; ?></td>
                                            <td><?php echo isset($key['jml_uang']) ? $key['jml_uang'] : ''; ?></td>
                                        </tr>
                                        <?php
                                        $num++;
                                    endforeach;
                                endif;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
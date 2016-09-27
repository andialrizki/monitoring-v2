<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Form Tambah/Edit Transaksi SPPBE</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo site_url('realisasi-spbe'); ?>"><i class="fa fa-minus-circle"></i> Transaksi
                    SPPBE</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Tambah/Edit Transaksi SPPBE</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('realisasi-spbe'); ?>" style="margin-bottom: 15px;">
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
                <h3 class="panel-title">Form Tambah/Edit Transaksi SPPBE</h3>
            </div>
            <div class="panel-body container-fluid">
                <form class="form-horizontal" action="<?php echo site_url('realisasi-spbe/submit'); ?>" method="post">
                    <input type="hidden" name="action" value="<?php echo isset($data['id']) ? 'edit' : 'add'; ?>">
                    <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Plant</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="plant" required=""
                                   value="<?php echo isset($data['plant']) ? $data['plant'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Wilayah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="sales_district" required=""
                                   value="<?php echo isset($data['sales_district']) ? $data['sales_district'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control datepicker" name="tanggal" required=""
                                   value="<?php echo isset($data['tanggal']) ? $data['tanggal'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Material</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="material" required=""
                                   value="<?php echo isset($data['material']) ? $data['material'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tabung</label>
                        <div class="col-sm-7">
                            <input type="number" min="1" class="form-control" name="qty_tabung" required=""
                                   value="<?php echo isset($data['qty_tabung']) ? $data['qty_tabung'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Berat</label>
                        <div class="col-sm-7">
                            <input type="number" min="1" class="form-control" name="berat" required=""
                                   value="<?php echo isset($data['berat']) ? $data['berat'] : ''; ?>">
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
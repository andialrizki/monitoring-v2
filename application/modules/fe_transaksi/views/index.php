<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Transaksi Pelanggan</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Transaksi</li>
        </ol>
        <?php if ($this->session->userdata(APP_PREFIX.'type_admin') == 2) { ?>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('transaksi/add'); ?>" style="margin-bottom: 15px;">
                <button class="btn btn-primary"><i class='icon fa-plus-circle'></i> Tambah</button>
            </a>
        </div>
        <?php } ?>
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
                <h3 class="panel-title">Daftar Transaksi Pelanggan</h3>
            </div>
            <div class="panel-body container-fluid">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Qty</th>
                        <th>Pembayaran</th>
                        <th>Pangkalan</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $num = 1;
                    if (isset($data) && $data) :
                        foreach ($data as $key) :
                            $id = $key['id'];
                            $tgl = isset($key['tgl']) ? Modules::run('myhelper/format_date', $key['tgl']) : '';
                            $pelanggan = Modules::run('myhelper/get_data_table', 'tbl_pengecer', '*', array('id_pengecer' => $key['id_pengecer']));
                            $id_pengecer = str_replace('.', '-', $pelanggan['id_pengecer']);
                            ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo isset($key['id_pengecer']) ? $key['id_pengecer'] : ''; ?></td>
                                <td><?php echo isset($pelanggan['name']) ? $pelanggan['name'] : ''; ?></td>
                                <td><?php echo isset($pelanggan['phone']) ? $pelanggan['phone'] : ''; ?></td>
                                <td><?php echo isset($key['qty']) ? $key['qty'] : ''; ?></td>
                                <td>Rp. <?php echo isset($key['jml_uang']) ? number_format($key['jml_uang']) : ''; ?> <span class="pull-right">| <?php echo jenis_pembayaran($key['jenis_pembayaran']) ?></span></td>
                                <td><?php echo $key['pangkalan'] ?></td>
                                <td><?php echo $tgl; ?></td>
                                <td class="btn-action">
                                    <a href="<?php echo site_url('transaksi/detail/' . $id_pengecer); ?>"
                                       data-tooltip="tooltip" data-placement="top" title="Detail">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="javascript:;" data-tooltip="tooltip" data-placement="top" title="Delete"
                                       data-id="<?php echo $id; ?>" class="modal-del">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
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
    </div>
</div>
<div class="modal fade" id="modal-delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    Delete Data
                </h4>
            </div>
            <div class="modal-body">
                Anda Yakin ??
            </div>
            <div class="modal-footer">
                <form action="<?php echo site_url('transaksi/del'); ?>" method="post">
                    <a type="button" class="btn btn-primary" data-dismiss="modal">
                        Close
                    </a>
                    <input type="hidden" name="id" id="id-transaksi">
                    <button class="btn btn-danger" type="submit">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.modal-del').click(function () {
        $('#modal-delete').modal('show');
        $('#id-transaksi').val($(this).attr('data-id'));
    });
</script>
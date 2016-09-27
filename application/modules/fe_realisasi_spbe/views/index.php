<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Transaksi SPPBE</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Realisasi Spbe</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('realisasi-spbe/add'); ?>" style="margin-bottom: 15px;">
                <button class="btn btn-primary"><i class='icon fa-plus-circle'></i>Tambah</button>
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
                <h3 class="panel-title">Daftar Transaksi SPPBE</h3>
            </div>
            <div class="panel-body container-fluid">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Plant</th>
                        <th>Tanggal</th>
                        <th>Wilayah</th>
                        <th>Material</th>
                        <th>Tabung</th>
                        <th>Berat</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $num = 1;
                    if (isset($data) && $data) :
                        foreach ($data as $key) :
                            $id = isset($key['id']) ? $key['id'] : '';
                            ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo isset($key['plant']) ? $key['plant'] : ''; ?></td>
                                <td><?php echo isset($key['tanggal']) ? $key['tanggal'] : ''; ?></td>
                                <td><?php echo isset($key['sales_district']) ? $key['sales_district'] : ''; ?></td>
                                <td><?php echo isset($key['material']) ? $key['material'] : ''; ?></td>
                                <td><?php echo isset($key['qty_tabung']) ? $key['qty_tabung'] : ''; ?></td>
                                <td><?php echo isset($key['berat']) ? $key['berat'] : ''; ?></td>
                                <td class="btn-action">
                                    <a href="<?php echo site_url('realisasi-spbe/edit/' . $id); ?>"
                                       data-tooltip="tooltip" data-placement="top" title="Edit">
                                        <i class='fa fa-edit'></i>
                                    </a>
                                    <a href="javascript:;" class="modal-del" data-id="<?php echo $id; ?>"
                                       data-toggle="modal" data-tooltip="tooltip" data-placement="top" title="Delete">
                                        <i class='fa fa-trash'></i>
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
                <form action="<?php echo site_url('realisasi-spbe/del'); ?>" method="post">
                    <a type="button" class="btn btn-primary" data-dismiss="modal">
                        Close
                    </a>
                    <input type="hidden" name="id" id="id-admin">
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
        $('#id-admin').val($(this).attr('data-id'));
    });
</script>
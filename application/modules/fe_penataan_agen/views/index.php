<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Penataan Agen</li>
        </ol>
        <?php if (isset($error)): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <center><strong><?php echo $error; ?></strong></center>
            </div>
        <?php endif ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>KRITERIA PENATAAN</strong>
                <p><input type="checkbox" name="my-checkbox" checked data-size="mini"></p>
            </div>
            <div id="panel-element" class="panel-collapse collapse in">
                <div class="panel-body table-responsive">
                    <table class="table dataTables_scrollBody" cellspacing="0" width="50%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>SPBE-Agent</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rata - Rata Jarak (Km)</td>
                            <td><?php echo(isset($val) ? $val : ''); ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jarak Maksimum (Km)</td>
                            <td><?php echo(isset($max['jarak']) ? $max['jarak'] : ''); ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Jarak Minimum (Km)</td>
                            <td><?php echo(isset($min['jarak']) ? $min['jarak'] : ''); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>JARAK AGEN - SPPBE</strong>
                <a href="<?php echo site_url('penataan-agen/edit/1'); ?>"
                   class="btn btn-primary btn-xs pull-right" style="margin-bottom: 15px;">
                    <i class='fa fa-plus-circle'></i> Hitung Jarak
                </a>

            </div>
            <div id="panel-element" class="panel-coll
                <div class="panel-body table-responsive">
                    <table class="table dataTables" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Agen</th>
                            <th>Nama SPPBE</th>
                            <th>Jarak (Km)</th>
                            <th>Aksi</th>
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
                                    <td><?php echo strtoupper(isset($key['name_agen']) ? $key['name_agen'] : ''); ?></td>
                                    <td><?php echo strtoupper(isset($key['name_spbe']) ? $key['name_spbe'] : ''); ?></td>
                                    <td><?php echo(isset($key['jarak']) ? $key['jarak'] : ''); ?></td>
                                    <td class="btn-action">
                                        <a href="javascript:;" class="modal-del" data-id="<?php echo $id; ?>" data-toggle="modal" data-tooltip="tooltip" data-placement="top" title="Delete">
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
</section>
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
                <form action="<?php echo site_url('penataan-agen/del'); ?>" method="post">
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
    $("[name='my-checkbox']").bootstrapSwitch();
</script>
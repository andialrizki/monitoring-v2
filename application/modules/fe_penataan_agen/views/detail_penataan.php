<!-- page -->
<div class="page animsition">
    <div class="page-header">
        <h1>Penataan Jarak</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Penataan Jarak SPPBE - Agen</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
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
                <h3 class="panel-title">Jarak Seluruh SPPBE - Agen</h3>
            </div>
            <div class="panel-body container-fluid">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Agen</th>
                        <th>Nama SPPBE</th>
                        <th>Jarak (Km)</th>
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
<script type="text/javascript">
    $('.modal-del').click(function () {
        $('#modal-delete').modal('show');
        $('#id-admin').val($(this).attr('data-id'));
    });
</script>
<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Penataan Jarak SPPBE - Agen</li>
        </ol>
        <?php if (isset($error)): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <center><strong><?php echo $error; ?></strong></center>
            </div>
        <?php endif ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <strong>JARAK SELURUH AGEN - SPPBE</strong>
            </div>
            <div id="panel-element" class="panel-collapse collapse in">
                <div class="panel-body table-responsive">
                    <table class="table dataTables" cellspacing="0" width="100%">
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
</section>
<script type="text/javascript">
    $('.modal-del').click(function () {
        $('#modal-delete').modal('show');
        $('#id-admin').val($(this).attr('data-id'));
    });
</script>
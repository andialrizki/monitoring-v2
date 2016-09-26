<!-- page -->
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Kelola Pengguna</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li class="active">Kelola Pengguna</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('manage-admin/add'); ?>" style="margin-bottom: 15px;">
                <button class="btn btn-primary"><i class='icon fa-plus-circle'></i> Tambah</button>
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
                <h3 class="panel-title">Daftar Pengguna</h3>
            </div>
            <div class="panel-body container-fluid">
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Login Terakhir</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $num = 1;
                    if (isset($data) && $data) :
                        foreach ($data as $key) :
                            $id_admin = $key['id_admin'];
                            ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo isset($key['name']) ? $key['name'] : ''; ?></td>
                                <td><?php echo isset($key['tgl_login']) ? Modules::run('myhelper/format_date', $key['tgl_login']) : ''; ?></td>
                                <td><?php echo isset($key['username']) ? $key['username'] : ''; ?></td>
                                <td class="btn-action">
                                    <a href="<?php echo site_url('manage-admin/edit/' . $id_admin); ?>"
                                       data-tooltip="tooltip" data-placement="top" title="Edit">
                                        <i class='fa fa-edit'></i>
                                    </a>
                                    <?php if ($id_admin != $this->session->userdata(APP_PREFIX . 'id_admin')): ?>
                                        <a href="javascript:;" class="modal-del" data-id="<?php echo $id_admin; ?>"
                                           data-toggle="modal" data-tooltip="tooltip" data-placement="top"
                                           title="Delete">
                                            <i class='fa fa-trash'></i>
                                        </a>
                                    <?php endif ?>
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
                <form action="<?php echo site_url('manage-admin/del'); ?>" method="post">
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
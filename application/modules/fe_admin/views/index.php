<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Manage Admin</li>
        </ol>
        <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
        <?php endif ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            <strong>DATA ADMINISTRATOR</strong>
            <a href="<?php echo site_url('manage-admin/add'); ?>" class="btn btn-primary btn-xs pull-right" style="margin-bottom: 15px;">
              <i class='fa fa-plus-circle'></i> Tambah
            </a>
          </div>
          <div id="panel-element" class="panel-collapse collapse in">
            <div class="panel-body table-responsive">
                <table class="table dataTables" cellspacing="0" width="100%">
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
                              <td><?php echo isset($key['name']) ? $key['name']:''; ?></td>
                              <td><?php echo isset($key['tgl_login']) ? Modules::run('myhelper/format_date', $key['tgl_login']):''; ?></td>
                              <td><?php echo isset($key['username']) ? $key['username']:''; ?></td>
                              <td class="btn-action">
                                  <a href="<?php echo site_url('manage-admin/edit/'.$id_admin); ?>" data-tooltip="tooltip" data-placement="top" title="Edit">
                                    <i class='fa fa-edit'></i>
                                  </a>
                                  <?php if ($id_admin != $this->session->userdata(APP_PREFIX.'id_admin')): ?>
                                  <a href="javascript:;" class="modal-del" data-id="<?php echo $id_admin; ?>" data-toggle="modal" data-tooltip="tooltip" data-placement="top" title="Delete">
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
<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Pelanggan</li>
        </ol>
        <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
        <?php endif ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            <strong>DATA PELANGGAN</strong>
            <a href="<?php echo site_url('pelanggan/add'); ?>" class="btn btn-primary btn-xs pull-right" style="margin-bottom: 15px;">
                  <i class='fa fa-plus-circle'></i> Tambah
            </a>
          </div>
          <div id="panel-element" class="panel-collapse collapse in">
            <div class="panel-body table-responsive">
                <table class="table dataTables" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>ID</th>
                          <th>Pangkalan</th>
                          <th>Nama</th>
                          <th>Telepon</th>
                          <th>Alamat</th>
                          <th>Action</th>
                      </tr>
                  </thead>
               
                  <tbody>
                    <?php 
                      $num = 1;
                        if (isset($data) && $data) :
                          foreach ($data as $key) :
                            $id = $key['id'];
                            $pangkalan = Modules::run('myHelper/get_data_table', 'tbl_pangkalan', 'name', array('id_pangkalan' => $key['id_pangkalan']));
                    ?>
                            <tr>
                              <td><?php echo $num; ?></td>
                              <td><?php echo isset($key['id_pengecer']) ? $key['id_pengecer']:''; ?></td>
                              <td><?php echo $pangkalan['name'] ?></td>
                              <td><?php echo isset($key['name']) ? $key['name']:''; ?></td>
                              <td><?php echo isset($key['phone']) ? $key['phone']:''; ?></td>
                              <td><?php echo isset($key['address']) ? substr($key['address'], 0,60).'...':''; ?></td>
                              <td class="btn-action">
                                  <a href="<?php echo site_url('pelanggan/detail/'.$id); ?>" data-tooltip="tooltip" data-placement="top" title="Detail">
                                    <i class="fa fa-search"></i>
                                  </a>
                                  <a href="<?php echo site_url('pelanggan/edit/'.$id); ?>" data-tooltip="tooltip" data-placement="top" title="Edit">
                                    <i class='fa fa-edit'></i>
                                  </a>
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
          <form action="<?php echo site_url('pelanggan/del'); ?>" method="post">
            <a type="button" class="btn btn-primary" data-dismiss="modal">
              Close
            </a> 
            <input type="hidden" name="id" id="id-pelanggan">
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
    $('#id-pelanggan').val($(this).attr('data-id'));
  });
  </script>
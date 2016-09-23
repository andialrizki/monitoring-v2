<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Data Agen</li>
        </ol>
        <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
        <?php endif ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            <strong>DATA AGEN</strong>
            <a href="<?php echo site_url('agen/add'); ?>" class="btn btn-primary btn-xs pull-right" style="margin-bottom: 15px;">
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
                          <th>Username</th>
                          <th>Kota</th>
                          <th>SPBE</th>
                          <th>Action</th>
                      </tr>
                  </thead>
               
                  <tbody>
                    <?php 
                      $num = 1;
                        if (isset($data) && $data) :
                          foreach ($data as $key) :
                            $id = isset($key['id']) ? $key['id']:'';
                            //$spbe = Modules::run('myhelper/get_data_table', 'tbl_spbe', '*', array('id' => $key['id_spbe']));
                            $id_spbe = str_replace('-', '', $key['id_spbe']);
                            $arr_spbe = str_split($id_spbe);
                    ?>
                            <tr>
                              <td><?php echo $num; ?></td>
                              <td><?php echo isset($key['name']) ? $key['name']:''; ?></td>
                              <td><?php echo isset($key['username']) ? $key['username']:''; ?></td>
                              <td><?php echo isset($key['city']) ? $key['city']:''; ?></td>
                              <!--td><?php //echo isset($key['id_spbe']) ? $key['id_spbe']:''; ?></td-->
                              <td><?php
                                        foreach ($arr_spbe as $item):
                                            $spbe = Modules::run('myhelper/get_data_table', 'tbl_spbe', '*', array('id' => $item)); ?>
                                            <ul>
                                            <li><?php echo isset($spbe['name']) ? $spbe['name']:''; ?></li>
                                            </ul>
                                   <?php endforeach; ?>
                                  </td>
                              <td class="btn-action">
                                  <a href="<?php echo site_url('agen/detail/'.$id); ?>" data-tooltip="tooltip" data-placement="top" title="Detail">
                                    <i class="fa fa-search"></i>
                                  </a>
                                  <a href="<?php echo site_url('agen/edit/'.$id); ?>" data-tooltip="tooltip" data-placement="top" title="Edit">
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
          <form action="<?php echo site_url('agen/del'); ?>" method="post">
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
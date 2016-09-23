<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Realisasi Spbe</li>
        </ol>
        <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
        <?php endif ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            <strong>DATA SPBE</strong>
            <a href="<?php echo site_url('realisasi-spbe/add'); ?>" class="btn btn-primary btn-xs pull-right" style="margin-bottom: 15px;">
              <i class='fa fa-plus-circle'></i> Tambah
            </a>
          </div>
          <div id="panel-element" class="panel-collapse collapse in">
            <div class="panel-body table-responsive">
                <table class="table dataTables" cellspacing="0" width="100%">
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
                            $id = isset($key['id']) ? $key['id']:'';
                    ?>
                            <tr>
                              <td><?php echo $num; ?></td>
                              <td><?php echo isset($key['plant']) ? $key['plant']:''; ?></td>
                              <td><?php echo isset($key['tanggal']) ? $key['tanggal']:''; ?></td>
                              <td><?php echo isset($key['sales_district']) ? $key['sales_district']:''; ?></td>
                              <td><?php echo isset($key['material']) ? $key['material']:''; ?></td>
                              <td><?php echo isset($key['qty_tabung']) ? $key['qty_tabung']:''; ?></td>
                              <td><?php echo isset($key['berat']) ? $key['berat']:''; ?></td>
                              <td class="btn-action">
                                  <a href="<?php echo site_url('realisasi-spbe/edit/'.$id); ?>" data-tooltip="tooltip" data-placement="top" title="Edit">
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
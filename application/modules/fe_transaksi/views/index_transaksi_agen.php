<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Transaksi Agen</li>
        </ol>
        <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
        <?php endif ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            <strong>DATA TRANSAKSI PANGKALAN</strong>
          </div>
          <div id="panel-element" class="panel-collapse collapse in">
            <div class="panel-body table-responsive">
                <table class="table dataTables" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>ID</th>
                          <th>Pelanggan</th>
                          <th>Pangkalan</th>
                          <th>Qty</th>
                          <th>Jumlah Pembayaran</th>
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
                            $tgl = isset($key['tgl']) ? Modules::run('myhelper/format_date', $key['tgl']):'';
                            $pelanggan = Modules::run('myhelper/get_data_table', 'tbl_pengecer', '*', array('id_pengecer' => $key['id_pengecer']));
                            $id_pengecer = str_replace('.', '-', $pelanggan['id_pengecer']);
                    ?>
                            <tr>
                              <td><?php echo $num; ?></td>
                              <td><?php echo isset($key['id_pengecer']) ? $key['id_pengecer']:''; ?></td>
                              <td><?php echo isset($pelanggan['name']) ? $pelanggan['name']:''; ?></td>
                              <td><?php echo isset($key['name']) ? $key['name']:''; ?></td>
                              <td><?php echo isset($key['qty']) ? $key['qty']:''; ?></td>
                              <td><?php echo isset($key['jml_uang']) ? $key['jml_uang']:''; ?></td>
                              <td><?php echo $tgl; ?></td>
                              <td class="btn-action">
                                  <a href="<?php echo site_url('transaksi/detail/'.$id_pengecer); ?>" data-tooltip="tooltip" data-placement="top" title="Detail">
                                    <i class="fa fa-search"></i>
                                  </a>
                                  <a href="javascript:;" data-tooltip="tooltip" data-placement="top" title="Delete" data-id="<?php echo $id; ?>" class="modal-del">
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
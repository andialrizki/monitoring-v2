<style type="text/css">
  td{
    padding: 0 0 0 5px; 
  }
</style>
<section id="services">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Data Pangkalan Perubahan</li>
        </ol>
        <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
        <?php endif ?>
        <div class="panel panel-info">
          <div class="panel-heading">
            <strong>DATA PANGKALAN PERUBAHAN</strong>
          </div>
          <div id="panel-element" class="panel-collapse collapse in">
            <div class="panel-body table-responsive">
                <table class="table dataTables" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Tipe</th>
                          <th>Alamat</th>
                          <th>No Reg</th>
                      </tr>
                  </thead>
               
                  <tbody>
                    <?php 
                      $num = 1;
                        if (isset($data) && $data) :
                          foreach ($data as $key) :
                            $id = isset($key['id_pangkalan']) ? $key['id_pangkalan']:'';
                    ?>
                            <tr>
                              <td><?php echo $num; ?></td>
                              <td><?php echo isset($key['name']) ? $key['name']:''; ?></td>
                              <td><?php echo isset($key['type']) ? $key['type']:''; ?></td>
                              <td><?php echo isset($key['address']) ? $key['address']:''; ?></td>
                              <td><?php echo isset($key['no_registrasi']) ? $key['no_registrasi']:''; ?></td>
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
          <form action="<?php echo site_url('pangkalan/del'); ?>" method="post">
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
<section id="services">
    <div class="container">
      <ol class="breadcrumb">
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo site_url('transaksi'); ?>"><i class="fa fa-minus-circle"></i> Transaksi</a></li>
          <li class="active"><i class="fa fa-plus-circle"></i> Tambah/Edit Transaksi</li>
      </ol>
      <?php if (isset($error)): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
              <center><strong><?php echo $error; ?></strong></center>
          </div>
      <?php endif ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            FORM TAMBAH/EDIT TRANSAKSI
          </div>
          <div id="panel-element-belum" class="panel-collapse collapse in">
            <div class="panel-body">
              <form class="form-horizontal" action="<?php echo site_url('transaksi/submit'); ?>" method="post" onsubmit="return confirm('Anda Yakin?');">
                  <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id']:''; ?>">
                  <div class="form-group">
                      <label class="control-label col-sm-3">ID Pengecer</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" required="" id="id_pengecer">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Pelanggan</label>
                      <div class="col-sm-7">
                          <select class="form-control" name="id_pengecer" id="select_pengecer">
                              <option value="">
                              <?php if (isset($pelanggan) && $pelanggan): ?>
                                  <?php foreach ($pelanggan as $key): ?>
                                      <option value="<?php echo isset($key['id_pengecer']) ? $key['id_pengecer']:''; ?>">
                                        <?php echo isset($key['name']) ? $key['name']:''; ?>
                                      </option>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Tanggal</label>
                      <div class="col-xs-5 date">
                          <input type="text" id="datepicker" name="tgl">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Qty</label>
                      <div class="col-sm-7">
                          <input type="number" class="form-control" name="qty" required="" min="1" id="qty">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Harga Eceran</label>
                      <div class="col-sm-7">
                          <input type="number" id="harga-eceran" class="form-control" readonly="" value="<?php echo isset($harga['harga_eceran']) ? $harga['harga_eceran']:''; ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3">Jumlah</label>
                      <div class="col-sm-7">
                          <input type="number" id="jml_uang" class="form-control" name="jml_uang" required="" min="1" readonly="">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-3 col-sm-offset-3">
                          <button type="submit" class="btn btn-primary submit" name="submit-transaksi" value="submit" disabled="">Submit</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
    </div>
  </section>
  <script type="text/javascript">
      $('#datepicker').datepicker({
          format: 'yy-mm-dd'
      });
      $('#select_pengecer').change(function() {
          var select = $('#select_pengecer option:selected').val();
          if (select == '') {
              $('.submit').attr('disabled','');
          }else{
              $('.submit').removeAttr('disabled','');
          }
          $('#id_pengecer').val(select);
          check_status(select);
      });
      $('#id_pengecer').keyup(function() {
          var id = $(this).val();
          $("select option").filter(function() {
              return $(this).val() == id; 
          }).prop('selected', true);
          $("select option").filter(function() {
              return $(this).val() != id; 
          }).prop('selected', false);
          var select = $('#select_pengecer option:selected').val();
          if (select == '') {
              $('.submit').attr('disabled','');
          }else{
              $('.submit').removeAttr('disabled','');
          }
          check_status(id);
      });

      function check_status (id) {
          var dataPost = 'id='+id;
          $('#qty').val('')
          $.ajax({
              url: '<?php echo site_url("request-limit"); ?>',
              type: 'POST',
              data: dataPost,
              dataType: 'text',
              success:function(result) {
                if (id == '') {
                    $('#span-limit').addClass('hidden');
                }else{
                    $('#span-limit').removeClass('hidden');
                }
                var max = 1000-result;
                $('#qty').attr('max', max);
                if (max==0) {
                    $('#span-limit').html('Pembelian bulan ini sudah mencapai batas maksimal');
                    $('#qty').attr('disabled', '');
                    $('.submit').attr('disabled', '')
                }else{
                  $('#span-limit').html('Pembelian bulan ini <label id="label-limit"></label>');
                    $('#qty').removeAttr('disabled', '');
                    $('.submit').removeAttr('disabled', '')
                }
                $('#label-limit').html(result);
              }
          });
      }

      $("#qty:input").bind('keyup mouseup', function () {
          var harga = $('#harga-eceran').val() * $(this).val();
          $('#jml_uang').val(harga);
      });
  </script>
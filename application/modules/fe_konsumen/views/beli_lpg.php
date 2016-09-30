
<!-- page -->
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Beli LPG</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo site_url('konsumen/beli-lpg'); ?>"><i class="fa fa-minus-circle"></i> Beli LPG</a>
            </li>
            <li class="active"><i class="fa fa-plus-circle"></i> Beli LPG</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url(''); ?>" style="margin-bottom: 15px;">
                <button class="btn btn-warning"><i class='icon fa-arrow-left'></i> Kembali</button>
            </a>
        </div>
    </div>
    <div class="page-content">
        <!-- Panel Form Elements -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Beli LPG Tanpa Bawa Uang Tunai</h3>
            </div>
            <div class="panel-body container-fluid">
                <p>
                    Anda hanya dapat membeli LPG dipangkalan yang telah Anda pilih saat mendaftar, Anda dapat langsung mendatangi Pangkalan 
                    <b><?php echo isset($data['name']) ? $data['name'] : ''; ?></b> di alamat <?php echo isset($data['address']) ? $data['address'] : ''; ?>. Anda dapat melakukan pembayaran langsung/tunai atau memanfaatkan layanan Tbank dari BRI yang telah terintegrasi dengan sistem kami.
                </p>
                <p>
                    Jika Anda ingin melakukan pembayaran dengan menggunakan BRI Tbank namun belum mendaftar sebagai pengguna Tbank berikut syarat yang perlu Anda penuhi:<br>
                    <ol>
                        <li>Memiliki KTP</li>
                        <li>Memiliki nomor handphone yang aktif (karena akan digunakan sebagai no. rekening)</li>
                    </ol>
                    Setelah Anda mendaftar dan punya rekening Tbank, langkah terakhir Anda hanya perlu mengisi saldo/Topup ke rekening Tbank Anda di agen-agen Tbank BRI terdekat.<br>
                    Apabila saldo Anda sudah terisi maka Anda dapat melakukan transaksi (pembelian LPG 3kg) melalui layanan BRI Tbank tanpa perlu lagi Anda membawa uang tunai.
                </p>
                <p>
                    Syarat lain yg harus terpenuhi adalah:<br>
                    <ol>
                        <li>Pangkalan LPG harus mempunyai rekening Tbank</li>
                        <li>Saldo Anda mencukupi (akan dicek otomatis oleh sistem)</li>
                    </ol>
                </p>
                <hr>
                <div class="col-sm-6">
                    <b>Cek Saldo Tbank Anda</b>
                    <div id="alertSaldoSuccess" style="display: none;">
                        <?php echo alertDarkSuccess() ?>
                    </div>
                    <div id="alertSaldoError" style="display: none;">
                        <?php echo alertDarkError() ?>
                    </div>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-4">No. Handphone</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nohandphone" value="<?php echo $kons->phone ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">PIN</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="pinsaldo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <?php echo loadingAjax('loadingSaldo') ?>
                                <button type="button" class="btn btn-primary" id="ceksaldo"><i class="fa fa-send"></i> Cek Saldo</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <b>Bayar pakai Tbank</b>
                    <div id="alertBayarSuccess" style="display: none;">
                        <?php echo alertDarkSuccess() ?>
                    </div>
                    <div id="alertBayarError" style="display: none;">
                        <?php echo alertDarkError() ?>
                    </div>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pangkalan</label>
                            <div class="col-sm-6">
                                <label class="control-label">
                                    <?php echo isset($data['name']) ? $data['name'] : ''; ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Tujuan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tujuan" value="<?php echo $data['hp_pemilik'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Banyaknya Tabung</label>
                            <div class="col-sm-6">
                                <input type="number" min="1" max="10000" class="form-control" name="qty" value="1">
                                <input type="hidden" id="harga_eceran" value="<?php echo $data['harga_eceran'] ?>">
                                Harga eceran Rp. <?php echo number_format($data['harga_eceran']) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Harus Dibayar</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="harga" value="<?php echo $data['harga_eceran'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">PIN</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="pin">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <?php echo loadingAjax('loadingBayar') ?>
                                <button type="button" class="btn btn-primary" id="bayar"><i class="fa fa-send"></i> Bayar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("input[name=qty]").keyup(function(){
        var jml = $(this).val();
        var ecer = $("input#harga_eceran").val();
        $("input[name=harga]").val(eval(ecer*jml));
    });
    $("#ceksaldo").click(function() {
        /* init */
        $("#alertSaldoSuccess, #alertSaldoError").hide();

        var me = $(this);
        var formData1 = {
            nohandphone: $("input[name=nohandphone]").val(),
            pin: $("input[name=pinsaldo]").val()
        };
        var formData = {
            cek: formData1
        }
        $.ajax({
            url: "<?php echo site_url('tbank/saldo') ?>",
            data: formData,
            dataType: "json",
            method: "POST",
            beforeSend: function() {
                me.hide();
                $("#loadingSaldo").show();  
            },
            success:function(data){
                //console.log(data);
                if (data.ResponseCode == "00") {
                    $("#alertSaldoSuccess").show();
                    $("#alertSaldoSuccess .alertDarkText").html('Saldo Anda: ' + data.Saldo);
                } else {
                    $("#alertSaldoError").show();
                    $("#alertSaldoError .alertDarkText").html('' + data.ResponseDescription);
                }
                clearFill(['input[name=pinsaldo]']);
                me.show();
                $("#loadingSaldo").hide();
            }
        });
    });
    $("#bayar").click(function(){
        /* init */
        $("#alertSaldoSuccess, #alertSaldoError").hide();
        var me = $(this);

        var formData1 = {
            nohandphonePengirim: '<?php echo $kons->phone ?>',
            nohandphonePenerima: $("input[name=tujuan]").val(),
            pin: $("input[name=pin]").val(),
            nominal: $("input[name=harga]").val()
        };
        var formData = {
            cek: formData1
        }
        $.ajax({
            url: "<?php echo site_url('tbank/transfer') ?>",
            data: formData,
            dataType: "json",
            method: "POST",
            beforeSend: function() {
                me.hide();
                $("#loadingBayar").show();  
            },
            success:function(data){
                //console.log(data);
                if (data.ResponseCode == "00") {
                    $("#alertBayarSuccess").show();
                    $("#alertBayarSuccess .alertDarkText").html('Terimakasih, Pembayaran Sebesar Rp. '+formData1.nominal+' Berhasil');
                } else {
                    $("#alertBayarError").show();
                    $("#alertBayarError .alertDarkText").html('' + data.ResponseDescription);
                }
                clearFill(['input[name=pin]']);
                me.show();
                $("#loadingBayar").hide();
            }
        });
    });
</script>
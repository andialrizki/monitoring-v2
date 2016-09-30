<div class="page animsition">
    <div class="page-header">
    </div>
    <?php if (isset($error)): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <center><strong><?php echo $error; ?></strong></center>
        </div>
    <?php endif ?>
    <div class="page-content">
        <!-- Panel Form Elements -->
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Tentang</h3>
                </div>
                <div class="panel-body container-fluid">
                    <!-- <div id="reader" style="width:300px;height:250px">
                    </div> -->
                    <p>
                        Monitoring LPG merupakan solusi keberhasilan implementasi sistem distribusi tertutup LPG 3 Kg di
                        Indonesia. Monitoring LPG mampu memenuhi kebutuhan penataan wilayah penyaluran mulai dari
                        penyalur sampai sub penyalur, dapat berfungsi sebagai Sistem Pendukung Keputusan (SPK) di
                        tingkat SPBE dan penyalur serta dapat juga menjadi mobile apps untuk sistem transaksi di sub
                        penyalur yang berhubungan langsung dengan distribusi LPG 3 Kg yang tepat sasaran kepada
                        pengguna.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/qrcode/jsqrcode-combined.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/qrcode/html5-qrcode.min.js' ?>"></script>
<script type="text/javascript">
    // $('#reader').html5_qrcode(function(data){
    //      // do something when code is read
    //      console.log(data);
    //      alert(data);
    //     },
    //     function(error){
    //         //show read errors 
    //     }, function(videoError){
    //         //the video stream could be opened
    //     }
    // );
</script>
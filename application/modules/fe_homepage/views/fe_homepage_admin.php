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
        <div class="col-xlg-4 col-md-6">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Transaksi Agen</h3>
                </div>
                <div class="panel-body container-fluid">
                    <canvas id="myChart"></canvas>

                </div>
            </div>
        </div>

        <div class="col-xlg-4 col-md-6">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Transaski SPPBE</h3>
                </div>
                <div class="panel-body container-fluid">
                    <canvas id="myChart2"></canvas>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Tentang</h3>
                </div>
                <div class="panel-body container-fluid">
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

        <!--div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title">Layanan Kami</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row">
                        <div class="col-sm-4 wow fadeInDown">
                            <div class="service-icon">
                                <a href="<?php //echo site_url('transaksi'); ?>"><i class="fa fa-money"></i></a>
                            </div>
                            <div class="service-info">
                                <h3>Transaksi</h3>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeInDown">
                            <div class="service-icon">
                                <a href="<?php //echo site_url('pelanggan'); ?>"><i class="fa fa-book"></i></a>
                            </div>
                            <div class="service-info">
                                <h3>Data Pelanggan</h3>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeInDown">
                            <div class="service-icon">
                                <a href="<?php //echo site_url('spbe'); ?>"><i class="fa fa-book"></i></i></a>
                            </div>
                            <div class="service-info">
                                <h3>Data SPBE</h3>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeInUp">
                            <div class="service-icon">
                                <a href="<?php //echo site_url('pangkalan'); ?>"><i class="fa fa-book"></i></a>
                            </div>
                            <div class="service-info">
                                <h3>Data dan Lokasi Pangkalan</h3>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeInUp">
                            <div class="service-icon">
                                <a href="<?php //echo site_url('lokasi-agen'); ?>"><i class="fa fa-map-marker"></i></a>
                            </div>
                            <div class="service-info">
                                <h3>Lokasi Agen</h3>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeInUp">
                            <div class="service-icon">
                                <a href="<?php //echo site_url('lokasi-pelanggan'); ?>"><i
                                        class="fa fa-map-marker"></i></a>
                            </div>
                            <div class="service-info">
                                <h3>Lokasi Pelanggan</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
    </div>
</div>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo $data['label']; ?>,
            datasets: [{
                label: 'jumlah tabung',
                data:  <?php echo $data['result']; ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    display: false
                }],
                yAxes: [{
                    ticks: {
                        max: 400000,
                        min: 10000,
                        stepSize: 150000
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo $data2['label']; ?>,
            datasets: [{
                label: 'jumlah tabung',
                data:  <?php echo $data2['result']; ?>,
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    display: false
                }],
                yAxes: [{
                    ticks: {
                        max: 400000,
                        min: 10000,
                        stepSize: 150000
                    }
                }]
            }
        }
    });
</script>
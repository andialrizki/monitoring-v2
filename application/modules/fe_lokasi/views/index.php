<head>
    <?php echo $map['js']; ?>
</head>
<style type="text/css">
    .marker{
        width: 35px;
        height: 20px;
        background: #ff0000;
        margin-right: 35px;
    }
</style>
<section id="services">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="active"><i class="fa fa-plus-circle"></i> Lokasi</li>
            </ol>
            <div class="panel panel-info">
                <div class="panel-heading">
                  <strong>LOKASI <?php echo strtoupper($title) ?></strong>
                </div>
                <div id="panel-element" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="col-xs-12">
                            <!--div class="form-group">
                                <div class="marker pull-left"></div>
                                <label class="control-label">: Pangkalan</label>
                                <br>
                                <div class="marker pull-left" style="background:#003F7F"></div>
                                <label class="control-label">: Pangkalan Perubahan</label>
                            </div-->
                            <?php echo $map['html']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>      
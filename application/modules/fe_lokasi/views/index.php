<head>
    <?php echo $map['js']; ?>
</head>
<style type="text/css">
    .marker {
        width: 35px;
        height: 20px;
        background: #ff0000;
        margin-right: 35px;
    }
</style>
<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Lokasi <?php echo $title ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Lokasi <?php echo $title ?></li>
        </ol>
    </div>
    <div class="page-content">
        <!-- Panel Form Elements -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Lokasi <?php echo $title ?></h3>
            </div>
            <div class="panel-body container-fluid">
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
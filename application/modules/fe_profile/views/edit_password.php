<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Edit Password</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo site_url('profile'); ?>"><i class="fa fa-minus-circle"></i> Profil</a></li>
            <li class="active"><i class="fa fa-plus-circle"></i> Edit Password</li>
        </ol>
        <div class="page-header-actions">
            <!-- for right button like add, post, etc -->
            <a href="<?php echo site_url('profile'); ?>" style="margin-bottom: 15px;">
                <button class="btn btn-warning"><i class='icon fa-arrow-left'></i>Kembali</button>
            </a>
        </div>
    </div>
    <?php if (isset($error)): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <center><strong><?php echo $error; ?></strong></center>
        </div>
    <?php endif ?>
    <div class="page-content">
        <!-- Panel Form Elements -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Password</h3>
            </div>
            <div class="panel-body container-fluid">
                <form class="form-horizontal" action="<?php echo site_url('profile/submit'); ?>" method="post">
                    <input type="hidden" name="action" value="password">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Password Lama</label>
                        <div class="col-sm-7">
                            <?php $id = $this->session->userdata(APP_PREFIX . 'id_admin'); ?>
                            <input type="password" class="form-control" name="old_password" required=""
                                   id="old_password" data-id="<?php echo $id; ?>">
                            <span class="text-danger hidden old_span">*Password lama salah</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Password Baru</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="new_password" required=""
                                   id="new_password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Ulangi Password Baru</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="retype_new_password" required=""
                                   id="retype_new_password">
                            <span class="text-danger hidden retype_span">*Password tidak sama</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-7 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary" name="submit-password" id="submit-password">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#new_password').keyup(function () {
        var pass = $(this).val();
        var repass = $('#retype_new_password').val();
        if (pass != '') {
            if (pass === repass) {
                $('.retype_span').removeClass('hidden');
                $('#retype_new_password').removeClass('error');
                $('#submit-password').removeAttr('disabled');
            } else {
                $('.retype_span').addClass('hidden');
                $('#retype_new_password').addClass('error');
                $('#submit-password').attr('disabled', '');
            }
        }
    });
    $('#retype_new_password').keyup(function () {
        var pass = $(this).val();
        var repass = $('#new_password').val();
        if (pass === repass) {
            $(this).removeClass('error');
            $('.retype_span').addClass('hidden');
            $('#submit-password').removeAttr('disabled');
        } else {
            $('.retype_span').removeClass('hidden');
            $(this).addClass('error');
            $('#submit-password').attr('disabled', '');
        }
    });
    $('#old_password').keyup(function () {
        var pass = $(this).val();
        var id = $(this).attr('data-id');
        var dataPost = "pass=" + pass + "&id=" + id
        $.ajax({
            url: '<?php echo site_url("request-password") ?>',
            type: 'POST',
            data: dataPost,
            dataType: 'text',
            success: function (result) {
                if (result == 'nok') {
                    $('#old_password').focus();
                    $('#old_password').addClass('error');
                    $('#submit-password').attr('disabled', '');
                    $('.old_span').removeClass('hidden');
                } else {
                    $('.old_span').addClass('hidden');
                    $('#old_password').removeClass('error');
                    $('#submit-password').removeAttr('disabled');
                }
            }
        });
    });
</script>
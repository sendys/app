<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BPOM Banda Aceh</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css">

    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <h3>BBPOM Aceh</h3>
                <h5>Aplikasi Pengawasan Produk (Sampling Data)</h5>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Masukan Informasi Anda.</p>
                    <form action="<?=site_url()?>account/index" method="POST">
                      <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control" id="InputName" placeholder="Username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>

                      <div class="form-group has-feedback">
                        <div class="checkbox">
                            <label>
                            <input type="checkbox" name="remember" value="TRUE"> Remember me
                            </label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-12">
                          <button type="submit" class="btn btn-danger pull-right">Sign In</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
                  </div> 
            </div>
        
        <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/notify/bootstrap-notify.js') ?>"></script>
        <script src="<?php echo base_url('assets/notify/bootstrap-notify.min.js') ?>"></script>
       <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
        <script src="<?php echo base_url('assets/plugins/morris/morris.min.js') ?>"></script>
       <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script> -->
        <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/dist/js/app.min.js') ?>"></script>
        
        <?php if ($this->session->flashdata('gagal')) { ?>
            <script type="text/javascript">
                $.notify({
                    // options
                    icon: 'glyphicon glyphicon-warning-sign',
                    title: '<strong>INFO</strong>',
                    message: "<?php echo $this->session->flashdata('gagal'); ?>"
                },
                {
                    // settings
                    element: 'body',
                    position: null,
                    type: "danger",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> &nbsp ' +
                        '<span data-notify="title">{1}</span><br> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                    '</div>' 
                });
            </script>
        <?php } ?>
        
    </body>
</html>
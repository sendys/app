<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="active tab-pane" id="activity">
                <br>
                <form class="form-horizontal" method="POST">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Simpan</button> <span><?php echo anchor(site_url('account/list_user'),'Batal', 'class="btn btn-warning"'); ?></span>
                    </div>
                  </div>
                </form>
            </div>
          
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/notify/bootstrap-notify.js') ?>"></script>
<script src="<?php echo base_url('assets/notify/bootstrap-notify.min.js') ?>"></script>

<?php foreach ($this->aauth->get_errors_array() as $error){ ?>
  <script type="text/javascript">
    $.notify({
            // options
            icon: 'glyphicon glyphicon-warning-sign',
            title: '<strong>WARNING</strong>',
            message: " &nbsp <?php echo $error; ?>"
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
      delay: 2000,
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

</script>
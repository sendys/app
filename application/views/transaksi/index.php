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
                    <label for="inputEmail" class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="datepicker" placeholder="Tahun" required>
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
<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>

<script type="text/javascript">
    $("#datepicker").datepicker( {
    format: " yyyy",
    viewMode: "years", 
    minViewMode: "years"
    });
</script>
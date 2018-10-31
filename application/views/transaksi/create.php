<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Sampling
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
                    <label for="inputBulan" class="col-sm-2 control-label">Bulan</label>
                    <div class="col-sm-10">
                      <select class="form-control input-sm" name="bln" style="width: 15%;">
                        <option selected="selected">Bulan</option>
                            <?php
                            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                            $jlh_bln=count($bulan);
                            for($c=0; $c<$jlh_bln; $c+=1){
                                echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                            }
                            ?>
                      </select>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label for="inputBulan" class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-10">
                      <select class="form-control input-sm" name="tahun" style="width: 15%;">
                        <option selected="selected">Tahun</option>
                            <?php
                            $now=date('Y');
                            for ($a=2015;$a<=$now;$a++)
                            {
                                echo "<option value='$a'>$a</option>";
                            }
                            ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-2 control-label">Kategori</label>
                    <div class="col-md-3">
                        <select class="form-control input-sm" name="kategori">
                                <option value="">---Select Category---</option>                    
                            <?php foreach($isket as $row) { ?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->kategori;?></option>
                            <?php } ?>
                        </select>    
                    </div>                
                </div>  
                
                <div class="form-group">
                  <label for="inputtrg" class="col-sm-2 control-label">TRG</label>
                  <div class="col-sm-1">
                    <input type="text" class="form-control input-sm" id="OnlyNumbers" onkeypress= "return AllowNumbersOnly(event)" placeholder="0">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputtrg" class="col-sm-2 control-label">PEM</label>
                  <div class="col-sm-1">
                  <input type="text" class="form-control input-sm" id="OnlyNumbers" onkeypress= "return AllowNumbersOnly(event)" placeholder="0">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputtrg" class="col-sm-2 control-label">KEU</label>
                  <div class="col-sm-1">
                  <input type="text" class="form-control input-sm" id="OnlyNumbers" onkeypress= "return AllowNumbersOnly(event)" placeholder="0">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputtrg" class="col-sm-2 control-label">TPS</label>
                  <div class="col-sm-1">
                  <input type="text" class="form-control input-sm" id="OnlyNumbers" onkeypress= "return AllowNumbersOnly(event)" placeholder="0">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputtrg" class="col-sm-2 control-label">LAB</label>
                  <div class="col-sm-1">
                  <input type="text" class="form-control input-sm" id="OnlyNumbers" onkeypress= "return AllowNumbersOnly(event)" placeholder="0">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputtrg" class="col-sm-2 control-label">MS</label>
                  <div class="col-sm-1">
                  <input type="text" class="form-control input-sm" id="OnlyNumbers" onkeypress= "return AllowNumbersOnly(event)" placeholder="0">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputtrg" class="col-sm-2 control-label">TMS</label>
                  <div class="col-sm-1">
                  <input type="text" class="form-control input-sm" id="OnlyNumbers" onkeypress= "return AllowNumbersOnly(event)" placeholder="0">
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
  function AllowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
      e.preventDefault();
    }
  }
</script>
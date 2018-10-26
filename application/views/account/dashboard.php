<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Main Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">

     <!-- Main row -->
      <div class="row">
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Visitors Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>

                <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                </div>     
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                  </ul>
                </div>

              </div>
              
              <div class="box-footer no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">United States of America
                      <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                    <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                    </li>
                    <li><a href="#">China
                      <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                    <li><a href="#">Indonesia
                      <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                    <li><a href="#">Banda Aceh
                      <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                  </ul>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-4">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
          </div>

          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>
              
              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
          </div>

          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
          </div>

          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
                  <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
          </div>
        </div>
      </div>
      <!-- Main Endrow -->

      <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                    <i class="fa fa-edit"></i>
                        <h3 class="box-title">Tabel Data Pengguna</h3>
                        <p>&nbsp &nbsp &nbsp &nbsp &nbsp Menampilkan nama pengguna aplikasi yang telah di verifikasi.</p>
                    </div>
                    <div style="padding-bottom: 10px; padding-left: 10px;"'>
        <?php echo anchor(site_url('auth/create'), '<i class="fa fa-plus-square" aria-hidden="true">&nbsp</i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
    <?php echo anchor(site_url('supplier/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true">&nbsp</i> Export Excel', 'class="btn btn-success btn-sm"'); ?></div>
                    
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                <th style="width:10px; font-size: 15px;">No</th>
                                <th style="width: 300px; text-align: center; font-size: 15px;">Nama Depan</th>
                                <th style="width: 500px; text-align: center; font-size: 15px;">Nama Belakang</th>
                                <th style="width: 200px; text-align: center; font-size: 15px;">Email</th>
                                <th style="width:35px;"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                   
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/chartjs/Chart.min.js') ?>"></script>

<script>
    var table;
    $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({"searching": false});
    });
</script>
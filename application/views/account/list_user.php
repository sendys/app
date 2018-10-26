<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Main
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">

      <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                    <i class="fa fa-edit"></i>
                        <h3 class="box-title">Tabel Data Pengguna</h3>
                        <p>&nbsp &nbsp &nbsp &nbsp &nbsp Menampilkan nama pengguna aplikasi yang telah di verifikasi.</p>
                    </div>
                    <div style="padding-bottom: 10px; padding-left: 10px;"'>
        <?php echo anchor(site_url('account/sign_up'), '<i class="fa fa-plus-square" aria-hidden="true">&nbsp</i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
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
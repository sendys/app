<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
        
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                    <i class="fa fa-edit"></i>
                        <h3 class="box-title">Tabel Data Pengguna</h3>
                        <p>&nbsp &nbsp &nbsp &nbsp &nbsp Menampilkan nama pengguna aplikasi yang telah di verifikasi.</p>
                    </div>
                    <div style="padding-bottom: 10px; padding-left: 10px;"'>
                        <button class="btn btn-danger btn-sm" onclick="add_person()"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data</button>
                        <button class="btn btn-warning btn-sm" onclick="reload_table()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Refresh</button>
                    </div>
        
                    <div class="box-body">
                    <table id="table" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                            <tr style="background-color:#3c8dbc;"> 
                                <td style="width:5%; color:white; font-size: 13px;">No</td> 
                                <td style="width:50%; color:white; font-size: 13px;">Jenis Kategori</td>
                                <td style="width:30%; color:white; font-size: 13px;">Aksi</td>
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
<script src="<?php echo base_url('assets/notify/sweetalert.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>

<script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({
            "loadingRecords": "Loading...", 
            "processing": true, 
            "serverSide": true,
            "language": {
                "lengthMenu": "Display _MENU_",
                "zeroRecords": "Nothing found - sorry",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
                },
            "pagingType": "full_numbers",
            "aLengthMenu": [[10,15,25, 75, -1], [10,15,30,50,75,100]], 
            "order": [],
            "iDisplayLength": 15,
            "ordering" :  false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('barang/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],

        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });

    function add_person()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal({backdrop: "static"}); // show bootstrap modal
        $('.modal-title').text('Pengguna Baru'); // Set Title to Bootstrap modal title
    }

    function edit_person(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('barang/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id"]').val(data.id);
                $('[name="kategori"]').val(data.kategori);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pengguna'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('barang/ajax_add')?>";
        } else {
            url = "<?php echo site_url('barang/ajax_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        });
    }

    function delete_person(id)
    {
        swal({
        title: "Yakin Hapus Data?",
        text: "Data akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) 
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('barang/ajax_delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
            swal("Data berhasil terhapus.", {icon: "success",});
        } 
        });
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="box box-info">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-vertical">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Kategori</label>
                                <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                        </div>
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
      </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
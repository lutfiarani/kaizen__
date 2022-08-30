<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>template/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-8">
           <h1 class="h3 mb-0 text-gray-800"><?php echo $judul;?></h1>
        </div>
       
    </div>


    <!-- Content Row -->
    <div class="row">
    
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="col-lg-4">

            <div class="card mb-4 py-3 border-left-primary">
                 <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Data Gedung (Klik gedung untuk mengedit)</h6>
                 </div>
                <div class="card-body">
                    <div class="table-responsive" >
                    <button type="button" name="add" id="add" class="btn btn-info">Tambah Gedung Baru</button>
                    <br>
                    <br>
                    <table id="sample_data" class="table table-bordered table-responsive table-sm">
							<thead>
								<tr>
									<th>ID</th>
									<th>NAMA GEDUNG</th>
                                    <th>Action</th>
                                   
								</tr>
							</thead>
                            <tbody id="gedung">
                            </tbody>
					</table>      
                    </div>
                </div>
            </div>
        </div>    
        <div class="col-lg-8">        
<!-- Memilih Gedung Departemen -->
            <div class="card mb-4 py-3 border-left-secondary">
            <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Data Departemen</h6>
                 </div>
                <div class="card-body">
                    <form method="post" id="update_dept" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Gedung</label>
                            <select class="form-control list_gedung"  data-show-subtext="true" data-live-search="true" id="gedung" name="gedung">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Departemen</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="dept" name="dept" style="text-transform: uppercase">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-success search_model" id="search_model" >Cari Departemen</button>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Related Departemen</label>
                                <div class="select2-blue">
                                    <select class="select2" multiple="multiple" data-placeholder="" data-dropdown-css-class="select2-purple" style="width: 100%;" id="model_tampil" name="model_tampil[]">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 date" >
                        
                        </div>
                       
                       
                    </div>
                    
                    <div class="text-center">
                        
                    </div>
                    <div class="card-footer float-end">
                        <p align="right">
                        <input type="submit" name="import" value="Simpan Perubahan" class="btn btn-primary btn-sm" />
                        </p>
                    </div>

                </form>   
                

                </div>
            </div>

        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-12">
             <div class="card mb-4 py-3 border-left-primary">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">List Departemen</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm" id="tabel_dept">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Departemen</th>
                                <th>Lokasi Gedung</th>
                                <th>Diupdate tanggal</th>
                            </tr>
                        </thead>
                        <tbody id="departemen">
                        </tbody>
                    </table>  
                </div>
            </div>    
        </div>
    </div>
       
        <!-- Pie Chart -->
    
   

   
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>template/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/plugins/bootstrap-4.4.1-dist/js/bootstrap.js"></script>
 <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   -->
<script type="text/javascript" src="<?php echo base_url();?>template/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript" src="<?php echo base_url();?>template/js/dataTables.bootstrap4.min.js"></script>
<!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script> -->
<!-- Select2 -->
<script src="<?php echo base_url();?>template/plugins/select2/js/select2.full.min.js"></script>

<script>
    
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    });

    // $('#tabel_dept').dataTable( {
	// 	// "bPaginate": false
	// } );

$(document).ready(function(){
    
    tampil();
    list_gedung();
    list_departemen();


    function tampil(){
        $.ajax({
            url : "<?php echo site_url('C_kaizen_admin/gedung_')?>",
            method : "POST",
            dataType : "JSON",
            success: function(data)
            {
                console.log(data)
                var html ='';
                var i ;
                var datas;
                for(i=0; i<data.length; i++){
                    datas = data[i]
                    html +='<tr><td>'+(i+1)+'</td>'+
                            '<td class="update" data-id="'+datas.ID_GEDUNG+'" data-column="NAMA_GEDUNG" contenteditable>'+datas.NAMA_GEDUNG+'</td>'+
                            '<td><button type="button" class="btn btn-danger btn-sm deleteGedung" id="deleteGedung" id_gedung="'+datas.ID_GEDUNG+'">X Delete</button></td></tr>';
                }
                $("#gedung").html(html);

            }
        })
    }

      
    $(document).on('click','.deleteGedung',function(){
        var id     = $(this).attr('id_gedung');
        
        $.ajax({
            url : "<?php echo site_url('C_kaizen_admin/deleteGedung')?>",
            method : "POST" ,
            data : {id:id},
            success:function(data){
                tampil();
                list_gedung();
                list_departemen();
            }
        });
    });

    $('#update_dept').submit(function(e){
            var dept = $('#dept').val();
            e.preventDefault(); 
                $.ajax({
                    url:'<?php echo site_url('C_kaizen_admin/update_dept')?>',
                    method:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                
                    success: function(data){
                        tampil();
                        list_gedung();
                        list_departemen();
                    }
                });
                $("#update_dept").unbind('submit');
                return false;
    });

    $(document).on('blur', '.update', function(){
            var id = $(this).data("id");
            var column = $(this).data("column");
            var value = $(this).text();
            update_data(id, column, value);
            
        });

    function update_data(id, column, value){
        $.ajax({
            url:"<?php echo site_url('C_kaizen_admin/update_gedung')?>",
            data : {id:id, column:column, value:value},
            method:"POST",
            dataType : 'json',
            success:function(data)
            {
                   tampil();
                   list_gedung();
                   list_departemen();
            }
            })
    }

    function list_gedung(){
        $.ajax({
            url : "<?php echo site_url('C_kaizen_admin/gedung_')?>",
            dataType  :'json',
            success : function(data){
                var html ='';
                var i;
                var datas;
                for(i=0; i<data.length; i++){
                    datas = data[i] 
                    html += '<option value="'+datas.ID_GEDUNG+'">'+datas.NAMA_GEDUNG+'</option>';
                }
                $(".list_gedung").html(html);
            }
        })
    }

    function list_departemen(){
        $.ajax({
            url : "<?php echo site_url('C_kaizen_admin/departemen')?>",
            dataType : 'json',
            success : function(data){
                var html =''
                var i
                var datas
                for(i=0; i<data.length; i++){
                    datas = data[i]
                    html +='<tr>'+
                           '<td>'+(i+1)+'</td>' +
                           '<td>'+datas.NAMA_DEPARTEMEN+'</td>' ;
                        if (datas.NAMA_GEDUNG === undefined || datas.NAMA_GEDUNG === null ){
                            html +='<td bgcolor="red"></td>' ;
                        }else{
                            html +='<td>'+datas.NAMA_GEDUNG+'</td>' ;
                        }
                           
                           html +='<td>'+datas.UPDATED_AT+'</td>' +
                           '</tr>';

                    
                }
                // $('#departemen').html(html);
                $('#tabel_dept tbody').append(html);
                $('#tabel_dept').DataTable();
            }
        })
    }

    $('#add').click(function(){
        var html = '<tr>';
        html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
        html += '<td contenteditable id="nama_gedung"></td>';
        
        html += '</tr>';
        $('#sample_data tbody').prepend(html);
    });
    

    $(document).on('click', '#insert', function(){
        var nama_gedung = $('#nama_gedung').text();
        if(nama_gedung != '')
        {
            $.ajax({
                url:"<?php echo site_url('C_kaizen_admin/add_gedung')?>",
                method:"POST",
                data:{nama_gedung:nama_gedung},
                success:function(data)
                {
                    $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                    // $('#sample_data').DataTable().destroy();
                    tampil();
                }
            });
            setInterval(function(){
            $('#alert_message').html('');
            }, 5000);
        }
        else
        {
            alert("Both Fields is required");
        }
        });


        $(document).on('click','.search_model',function(){
            var nama_dept = $('#dept').val();//$(this).attr('id');//
            $.ajax({
              
              type : "POST",
              url  : "<?php echo site_url('C_kaizen_admin/tampil_dept')?>",
              // dataType : "JSON",
              cache: false,
              data : {nama_dept:nama_dept},
              success: function(data){
                if (typeof data !== 'undefined') {
                  // alert("tidak ada data");
                  $('#model_tampil').html(data);
                }else{
                  alert("tidak ada data");
                }
              }
          });
          return false;
        });

       
    });

</script>
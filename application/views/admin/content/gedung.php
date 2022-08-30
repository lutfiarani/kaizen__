<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />




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
        <div class="col-lg-6">

            <div class="card mb-4 py-3 border-left-primary">
                 <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Data Gedung (Klik gedung untuk mengedit)</h6>
                 </div>
                <div class="card-body">
                    <div class="table-responsive" >
                    <button type="button" name="add" id="add" class="btn btn-info">Tambah Gedung Baru</button>
                    <table id="sample_data" class="table table-bordered table-responsive">
							<thead>
								<tr>
									<th>ID</th>
									<th>NAMA GEDUNG</th>
                                   
									
								</tr>
							</thead>
					</table>      
                    </div>
                </div>
            </div>
        </div>    
        <div class="col-lg-6">        
<!-- Memilih Gedung Departemen -->
            <div class="card mb-4 py-3 border-left-secondary">
            <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Data Departemen</h6>
                 </div>
                <div class="card-body">
                    <form method="post" id="import_file" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4" >
                        <div class="form-group">
                            <label>Gedung</label>
                            <select class="form-control"  data-show-subtext="true" data-live-search="true" id="status" name="status">
                            <?php
                                for ($i=0; $i<count($gedung); $i++){
                                    echo "<option value='".$gedung[$i]['ID_GEDUNG']."'>".$gedung[$i]['NAMA_GEDUNG']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Departemen</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="model" name="model" style="text-transform: uppercase">
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
       
        <!-- Pie Chart -->
    
   

   
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>

<script>
$(document).ready(function(){
    tampil();
    function tampil(){
        var dataTable = $('#sample_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "bPaginate":false, 
            "searching" : false,
            "info": false,
            "ajax":{
                url:"<?php echo site_url('C_kaizen_admin/gedung_')?>",
                type:"POST",
                // dataSrc:""
            },
            createdRow:function(row, data, rowIndex)
            {
                $.each($('td', row), function(colIndex){
                    if(colIndex == 1)
                    {
                        $(this).attr('data-name', 'NAMA_GEDUNG');
                        $(this).attr('class', 'NAMA_GEDUNG');
                        $(this).attr('data-type', 'text');
                        $(this).attr('data-pk', data[0]);
                    }
                    
                });
            }
	    });
    }

	$('#sample_data').editable({
		container:'body',
		selector:'td.NAMA_GEDUNG',
		url:'<?php echo site_url('C_kaizen_admin/update_gedung')?>',
		title:'Nama Gedung',
		type:'POST',
		validate:function(value){
			if($.trim(value) == '')
			{
				return 'This field is required';
			}
		}
	});

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
                    $('#sample_data').DataTable().destroy();
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
            var nama_model = $('#model').val();//$(this).attr('id');//
            $.ajax({
              
              type : "POST",
              url  : "<?php echo site_url('C_kaizen/tampil_model')?>",
              // dataType : "JSON",
              cache: false,
              data : {nama_model:nama_model},
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
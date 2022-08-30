<link href="<?php echo base_url();?>/template/css/rome.css" rel="stylesheet" />




<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-8">
           <h1 class="h3 mb-0 text-gray-800">Status Ide</h1>
        </div>
        <div class="col-xl-2">
            <a href="http://10.10.100.23/tier-tiga/" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm" id="tier3" type="button"><i
                class="fas fa-building fa-sm text-white-50"></i> Review Tier 3 Update</a>
        </div>
        <div class="col-xl-2">
            <a href="http://10.10.100.23/fld/" class="d-none d-sm-inline-block btn btn-lg btn-secondary shadow-sm" id="tier12" type="button"><i
                class="fas fa-users fa-sm text-white-50"></i> Review Tier 1&2 Update</a>
        </div>
    </div>


    <!-- Content Row -->
    <div class="row">
    
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-13">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Ide</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class = "col-xl-4">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="katakunci" name="katakunci">
                        </div>
                        <div class = "col-xl-2">
                            <input type="text" class="form-control bg-light border-1 small" placeholder="dari" aria-label="Search" aria-describedby="basic-addon2" id="dari">
                        </div>
                        <div class = "col-xl-2">
                            <input type="text" class="form-control bg-light border-1 small" placeholder="sampai" aria-label="Search" aria-describedby="basic-addon2" id="sampai">
                        </div>
                        <div class = "col-xl-2">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" id="cari_data" type="button"><i
                                    class="fas fa-search fa-sm text-white-50"></i> Cari Ide</a>
                        </div>
                        <div class = "col-xl-2">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="export_excel" type="button"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>
                    </div>
                   
                  
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive" id="tabel_ide">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Waktu isi ide</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Gedung</th>
                            <th scope="col">Bagian</th>
                            <th scope="col">Cell</th>
                            <th scope="col">Ide Kaizen</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="daftar_ide">
                        
                        </tbody>
                    </table>
                </div>
            
        </div>
       
        <!-- Pie Chart -->
    
   

   
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript" src="<?php echo base_url();?>template/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/js/rome.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/js/main.js"></script>



  <script>
  
    // $("#action_ide")
    //   .change(function() {
    //     var str = "";
    //     $( "#action_ide option:selected" ).each(function() {
    //       str += $( this ).text() + " ";
    //     });
    //     $( "#siapa" ).text( str );
    //   })
    //   .trigger( "change" );
   
    // $(document).on('change','#action_ide',function(){
    //     var action_id  = $(this).val();
    //     var id         = $(this).attr('id_ide');
    //     // var value = $('option:selected', this).text(); 
    //     // alert(value);
    //     edit_ide(id, action_id);
        
        
        
 
     $('#katakunci').keyup(function(){
          var query  = $('#katakunci').val();
          var dari   = $('#dari').val();
          var sampai = $('#sampai').val();
          if((query != '') || (($dari != '')&&($sampai !=''))){
            load_data(query,dari,sampai);
          }else{
            load_data();
          }
          
      });

      function load_data(query, dari, sampai)
      {
        $.ajax({
              url:"<?php echo site_url('C_kaizen/cari_ide')?>",
              method:"POST",
              data:{query:query, dari:dari, sampai:sampai},
              dataType : 'json',
              success:function(data)
              {
                console.log(data);
                var html = '';
                var i;
                var ide;
                var action;
                var response = {};
                for(i=0; i<data.length; i++){
                  ide = data[i];
                  response.val = ide.ACTION;
                  // document.getElementById("action_ide").value = ide.ACTION;
                    html +='<tr><td scope="col">'+(i+1)+'</th>'+
                    '<td scope="col">'+ide.LMNT_DTTM+'</td>'+
                    '<td scope="col">'+ide.NIK+'</td>'+
                    '<td scope="col">'+ide.NAME+'</td>'+
                    '<td scope="col">'+ide.JABATAN+'</td>'+
                    '<td scope="col">'+ide.FACTORY+'</td>'+
                    '<td scope="col">'+ide.DEPT+'</td>'+
                    '<td scope="col">'+ide.LOCATION+'</td>'+
                    '<td scope="col">'+ide.IDE+'</td>';
                    // $("#action_ide").val(ide.ACTION);
                    // '<td scope="col">'+ide.ACTION+'</td></tr>';
                    if(ide.ACTION == '1'){
                        action = 'Perlu follow up'
                    }else if(ide.ACTION == '2'){
                      action = 'sudah pernah'
                    }else if(ide.ACTION == '3'){
                      action = 'komplain(bukan ide)';
                    }
                    html +='<td id="siapa">'+action+'</td>';
                    html +='<td scope="col">'+
                            '<button type="button" id="status" data-id="'+ide.RECORDID+'" data-status="1" class="btn btn-primary btn-sm">Perlu Follow Up</button>'+
                            '<button type="button" id="status" data-id="'+ide.RECORDID+'" data-status="2" class="btn btn-warning btn-sm">Sudah Pernah</button>'+
                            '<button type="button" id="status" data-id="'+ide.RECORDID+'" data-status="3" class="btn btn-danger btn-sm">Komplain</button>'+
                            '</td>';
                    
                    '</tr>';
                    $("#action_ide option[data-value='" + response.val +"']").attr("selected","selected");
                        
                }
                $('#daftar_ide').html(html); 
                // console.log(data);
              }
        });
      }

      function edit_ide(id, action){
          var query  = $('#katakunci').val();
          var dari   = $('#dari').val();
          var sampai = $('#sampai').val();
          $.ajax({
              url:"<?php echo site_url('C_kaizen/edit_ide')?>",
              method:"POST",
              data:{id:id, action:action},
              dataType : 'json',
              success:function(data)
              {
                console.log(data);
                load_data(query, dari, sampai);
              }
        });
        }


        $(document).on('click','#cari_data',function(){
            var query  = $('#katakunci').val();
            var dari   = $('#dari').val();
            var sampai = $('#sampai').val();
            load_data(query, dari, sampai);

          });

        $(document).on('click','#status',function(){
          var id    =   $(this).attr('data-id');
          var action    =   $(this).attr('data-status');
          edit_ide(id, action);

        });

      $( "#export_excel" ).click(function() {
          var query  = $('#katakunci').val();
          var dari   = $('#dari').val();
          var sampai = $('#sampai').val();
          // var url="<?php echo site_url('C_list_ide/index/')?>" + $.param(parameter);
          //  var url="<?php echo site_url('C_kaizen/export_excel/')?>" + $.param(parameter);
          $.ajax({
              url:"<?php echo site_url('C_kaizen/export_excel_/')?>" ,
              method:"GET",
              data:{query:query, dari:dari, sampai:sampai},
              dataType: 'json',
              success:function(data)
              {
                console.log(data);
                
                window.open(data);
                
              }
          });
           

        });

       

       
  $(document).ready(function(){
	  
    // $('#tabel_ide').dataTable( {
	// 	// "bPaginate": false
	// } );


    load_data();
   
   
    });
    
    
 

  </script>

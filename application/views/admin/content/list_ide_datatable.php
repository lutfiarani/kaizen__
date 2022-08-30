<!-- <link href="<?php echo base_url();?>/template/css/rome.css" rel="stylesheet" /> -->
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" />






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
                        <!-- <div class = "col-xl-4">
                        <input type="text" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="katakunci" name="katakunci">
                        </div> -->
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
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="export_excel" type="button"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div> -->
                    </div>
                   
                  
                </div>
                <div class="card-body">
                    <table class="table table-bordered-sm table-responsive" id="tabel_ide">
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
                        <tbody>
                        
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
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/js/rome.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/js/main.js"></script>
<!-- 
https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js -->








  <script>
    var dataTable;

// function load_data(){
//     dataTable.ajax.reload(null,false);
// }

function load_data(query, dari, sampai){

// dataTable = $('#tabel_ide').DataTable({
//         dom: 'Bfrtip',
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ],
//         "processing": true,
//         "serverSide": true,
//         "order":[],
//         "bPaginate":false, 
//         "searching" : false,
//         "info": false,
//         "ajax":{
//             url:"<?php echo site_url('C_kaizen/cari_ide_datatable')?>",
//             type:"POST",
//             data:{query:query, dari:dari, sampai:sampai},
//             dataType : 'json',
//             success: function(data){
//                 console.log(data)
//             }
//         },
//         "columns": [
//                     {"data": "LMNT_DTTM",width:170},
//                     {"data": "NIK",width:100},
//                     {"data": "NAME",width:100},
//                     {"data": "JABATAN",width:100},
//                     {"data": "FACTORY",width:100},
//                     {"data": "DEPT",width:100},
//                     {"data": "LOCATION",width:100},
//                     {"data": "IDE",width:100}
//                 ],  
              
        
//     });

 $('#table_ide').DataTable({
				"ajax":{
					url : "<?php echo site_url('C_kaizen/cari_ide_datatable') ?>",
					type : 'POST',
                    data:{query:query, dari:dari, sampai:sampai},
					responsive: true,
                    dataType : 'json'
				}
            })

}
  
    $(document).on('change','#action_ide',function(){
        var action_id  = $(this).val();
        var id         = $(this).attr('id_ide');
        edit_ide(id, action_id);
    });

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
                $('#tabel_ide').DataTable().destroy();
                load_data(query, dari, sampai);
              }
        });
        }

		

    $( "#export_excel" ).click(function() {
          var query  = $('#katakunci').val();
          var dari   = $('#dari').val();
          var sampai = $('#sampai').val();
          
          $.ajax({
              url:"<?php echo site_url('C_kaizen/export_excel')?>",
              method:"POST",
              data:{query:query, dari:dari, sampai:sampai},
              dataType : 'json',
              success:function(data)
              {
                console.log(data);
                // window.open(data);
                
              }
          });
            // alert('hai');
        });

        $( "#action_ide" ).click(function() {
          var id    =   $(this).attr('id_ide');
          var action    =   $('#action_ide').val();
          edit_ide(id, action);

        });

       
  $(document).ready(function(){

    load_data();
 
      
    function load_data(dari, sampai){
        var tabel_ide  = $('#tabel_ide').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],       
            "processing": true,
            "order":[],
            "bPaginate":false, 
            "searching" : true,
            "info": false,
            "ajax":{
                            url : "<?php echo site_url('C_kaizen/cari_ide_datatable') ?>",
                            type : 'POST',
                            data:{ dari:dari, sampai:sampai},
                            responsive: true,
                            dataType : 'json'
                    }
                   
                })

            }

                
    $('#cari_data').on('click', function(){
            var dari   = $('#dari').val();
            var sampai = $('#sampai').val();
            // $('#tabel_ide').DataTable().destroy();
            load_data(dari, sampai);
         });
    });


    $(document).on('click','#status',function(){
            var action = $(this).attr('data-status');
            var id      = $(this).attr('data-id');
            $.ajax({
              url:"<?php echo site_url('C_kaizen/edit_ide')?>",
              method:"POST",
              data:{id:id, action:action},
              dataType : 'json',
              success:function(data)
              {
                // console.log(data);
                // // window.open(data);
                // $('#tabel_ide').DataTable().destroy();
                load_data(dari, sampai);
                
              }
          });
        
    })

    
 

  </script>

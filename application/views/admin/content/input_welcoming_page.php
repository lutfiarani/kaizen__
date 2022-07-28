<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/mdb.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/style.css">

 <!-- Main Content -->
 <div id="content">

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    
</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-8">
           <h1 class="h3 mb-0 text-gray-800">Welcoming Page Input Form</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Welcoming Page Input Form</h6>
                    
                </div>
                <!-- Card Body -->
                
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Preview Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Updated At</th>
                            
                            </tr>
                        </thead>
                        <tbody id="welcome">
                           
                        </tbody>
                    </table>
                </div>
            
        </div>
       
        <!-- Pie Chart -->
    
   

   
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- <script type="text/javascript" src="<?php echo base_url();?>template/js/jquery-3.4.1.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>template/mdb/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/mdb/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/mdb/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/mdb/js/mdb.min.js"></script>

  <script>
   
      function load_data()
      {
        var alamat      = "<?php echo base_url();?>template/images/welcoming_page";
        $.ajax({
              url:"<?php echo site_url('C_kaizen_admin/welcome')?>",
              method:"POST",
              dataType : 'json',
              success:function(data)
              {
                console.log(data);
                var html = '';
                var i;
                var datas;
                var action;
                var response = {};
                for(i=0; i<data.length; i++){
                  datas = data[i];
                  
                    html +='<tr><td scope="col">'+(i+1)+'</th>'+
                    '<td scope="col">'+
                        '<img src="'+alamat+'/'+datas.IMG+'" width="375" height="271" id="img1"></img>'+
                        '<div id="img2">'+
                        '<br><br>'+
                        '<form method="post" id="upload_img_welcome" enctype="multipart/form-data">'+
                            '<div class="custom-file">'+
                                '<input type="file" class="custom-file-input" id="formFileLg" name="file" img_id='+datas.IMG_ID+' accept="image/png, image/gif, image/jpeg">'+
                                '<label class="custom-file-label" for="formFileLg">Choose File </label>'+
                            '</div>'+
                            '<input type="submit" class="btn btn-cyan" id="upload_img"></input>'+
                        '</form>'+
                    '</td>'+
                    '<td scope="col"><div class="form-floating">'+
                            '<textarea class="form-control" id="floatingTextarea2" style="height: 325px; width:800px">'+datas.IMG_DESC+'</textarea>'+
                            '<label for="floatingTextarea2"></label>'+
                            '<button type="button" class="btn btn-cyan" id="desc_welcome">Save Changes</button>'+
                            '</div>'+
                            
                            '</td>'+
                   
                    '<td scope="col">'+datas.UPDATED_AT+'</td>';
                        
                }
                $('#welcome').html(html); 
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


      $( "#cari_data" ).click(function() {
            var query  = $('#katakunci').val();
            var dari   = $('#dari').val();
            var sampai = $('#sampai').val();
            load_data(query, dari, sampai);

          });

      $( "#export_excel" ).click(function() {
          var query  = $('#katakunci').val();
          var dari   = $('#dari').val();
          var sampai = $('#sampai').val();
          
          $.ajax({
              url:"<?php echo site_url('C_kaizen/export_excel')?>",
              method:"POST",
              data:{query:query, dari:dari, sampai:sampai},
              // dataType : 'json',
              success:function(data)
              {
                console.log(data);
                
              }
          });
            // alert('hai');
        });

        $( "#action_ide" ).click(function() {
          var id    =   $(this).attr('id_ide');
          var action    =   $('#action_ide').val();
          edit_ide(id, action);

        });

        $('#upload_img_welcome').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url: "<?php echo site_url('C_kaizen_admin/upload_welcome')?>",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend : function()
                    {
                        
                        // $("#img1").hide();
                        $("#img2").fadeOut();
                    },
                    success:function(data){
                        $('#img_welcome').val('');
                        
                        load_data();
                        
                    }
                })
          });
          $('#formFileLg').on("change",function() {
        console.log("change fire");
        var i = $(this).prev('label').clone();
        var file = $('#formFileLg')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file);

        });
  $(document).ready(function(){
	
    load_data();

   
    });
    
    
 

  </script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/mdb.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/style.css">
<link href="<?php echo base_url();?>/template/textarea/css/wysiwyg.css" rel="stylesheet">
<link href="<?php echo base_url();?>/template/textarea/css/highlight.min.css" rel="stylesheet">



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-8">
           <h1 class="h3 mb-0 text-gray-800"><?php echo $judul1;?></h1>
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
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul2;?></h6>
                    
                </div>
                <!-- Card Body -->
                <input type="hidden" name="param" id="param" value="<?php echo $param;?>"> 
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Preview Image</th>
                                <?php 
                                    if($param == 'aktivitas_kaizen'){
                                        echo '<th scope="col">Title</th>';
                                    }else{
                                        echo '';
                                    }
                                ?>
                                
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
<script src="<?php echo base_url();?>template/textarea/js/wysiwyg.js"></script>
<script src="<?php echo base_url();?>template/textarea/js/highlight.js"></script>
<!-- <script type="text/javascript">
    $(document).ready(function () {
        $('#editor').wysiwyg({
            highlight: true,
            debug: true
        });
    });
</script> -->

  <script>
   
      function load_data(param)
      {
        var alamat      = "<?php echo base_url();?>template/images/welcoming_page/";
        $.ajax({
              url:"<?php echo site_url('C_kaizen_admin/welcome')?>/"+param,
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
                            
                                '<input type="file" class="form-control" id="file" name="file" accept="image/png, image/gif, image/jpeg">'+
                                // '<label class="label-control" for="formFileLg">Choose File </label>'+
                            '<input type="hidden" id="img_id" name="img_id" value='+datas.IMG_ID+'>'+
                            '<input type="submit" class="btn btn-cyan" id="upload_img"></input>'+
                        '</form>'+
                    '</td>';
                    if(param=='aktivitas_kaizen'){
                        html += '<td><b>'+datas.IMG_TITLE+'</td>'
                    }else{
                        html +='';
                    }
                    html +='<td scope="col"><div class="form-floating">'+
                            '<textarea class="form-control cobaedit" id="deskripsi" data-id='+datas.IMG_ID+' name="deskripsi" style="height: 325px; width:800px">'+datas.IMG_DESC+'</textarea>'+
                            
                            '<button type="submit" class="btn btn-cyan" id="desc_welcome"  img_id='+datas.IMG_ID+'>Save Changes</button>'+
                            '</div>'+
                            
                            '</td>'+
                   
                    '<td scope="col">'+datas.UPDATED_AT+'</td>';
                        
                }
                $('#welcome').html(html); 
                
                // console.log(data);
              }
        });
      }

      function edit_desc(id, desc){
          $.ajax({
              url:"<?php echo site_url('C_kaizen_admin/edit_desc')?>",
              method:"POST",
              data:{id:id, desc:desc},
              dataType : 'json',
              success:function(data)
              {
                console.log(data);
                // load_data();
              }
        });
     }

  $(document).ready(function(){
	var param = $('#param').val();
    load_data(param);

    $(document).on('click','#desc_welcome',function(){
          var desc  = $('#deskripsi').val();
          var id   = $(this).attr("img_id");
        
          edit_desc(id, desc);
          load_data(param);
        });
    });


    $(document).on('submit','#upload_img_welcome',function(){

    // $('#upload_img_welcome').on('submit', function(event){
        var img_id   = $('#img_id').val();
        event.preventDefault();
        $.ajax({
            url: "<?php echo site_url('C_kaizen_admin/upload_image')?>",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                // $('#img_welcome').val('');
               
                load_data(param);
                
            }
        })

      

    });
    
    
 

  </script>

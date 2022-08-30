<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/mdb.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/template/mdb/css/style.css">
<link href="<?php echo base_url();?>/template/textarea/css/wysiwyg.css" rel="stylesheet">
<link href="<?php echo base_url();?>/template/textarea/css/highlight.min.css" rel="stylesheet">


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-xl-8">
           <h1 class="h3 mb-0 text-gray-800">Kaizen Story</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Kaizen Story Input Form</h6>
                    
                </div>
                <!-- Card Body -->
                
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Image</th>
                                <th scope="col">Fasilitas Kaizen</th>
                                <th scope="col">Total Kaizen Implemented</th>
                                <th scope="col">Total Hadiah</th>
                                <th scope="col">Dibuat tanggal</th>
                                <th scope="col">Diupdate tanggal</th>
                                <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody id="kaizen_story">
                           
                        </tbody>
                        <tfooter>
                            <tr>
                                <td></td>
                                <td id="title" contenteditable></td>
                                <td></td>
                                <td id="fasilitas" contenteditable></td>
                                <td id="kaizen_imple" contenteditable></td>
                                <td id="hadiah" contenteditable></td>
                                <td></td>
                                <td></td>
                                <td><button class="btn btn-success btn-xs insertNewRow" id="insertNewRow">+ Add</button></td>                        
                            </tr>
                        </tfooter>

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

<script>
    function load_data(){
      
        var alamat      = "<?php echo base_url();?>template/images/welcoming_page/";
        $.ajax({
              url:"<?php echo site_url('C_kaizen_admin/kaizen_story_')?>",
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
                    '<td scope="col" class="update" data-id="'+datas.ID+'" data-column="TITLE" contenteditable>'+datas.TITLE+'</th>'+
                    '<td scope="col">';
                    if(datas.IMG_TITLE == null){
                        html += '<div class="p-3 bg-gradient-danger text-white">NO IMAGE DISPLAYED, PLEASE UPLOAD</div>';
                    }else{
                        html +='<img src="'+alamat+'/'+datas.IMG_TITLE+'" width="200" height="144" id="img1"></img>';
                    }
                        html +='<div id="img2">'+
                        '<br><br>'+
                        '<form method="post" id="upload_img_welcome" enctype="multipart/form-data">'+
                            
                                '<input type="file" class="form-control" id="file" name="file" accept="image/png, image/gif, image/jpeg">'+
                                // '<label class="label-control" for="formFileLg">Choose File </label>'+
                            '<input type="hidden" id="img_id" name="img_id" value='+datas.ID+'>'+
                            '<input type="submit" class="btn btn-cyan" id="upload_img"></input>'+
                        '</form>'+
                    '</td>'+
                    '<td scope="col" class="update" data-id="'+datas.ID+'" data-column="FASILITAS" contenteditable   >'+datas.FASILITAS+'</td>'+
                    '<td scope="col" class="update" data-id="'+datas.ID+'" data-column="KAIZEN_IMPLE" contenteditable>'+datas.KAIZEN_IMPLE+'</td>'+
                    '<td scope="col" class="update" data-id="'+datas.ID+'" data-column="HADIAH" contenteditable>'+datas.HADIAH+'</td>'+
                    '<td scope="col">'+datas.CREATED_AT+'</td>'+
                    '<td scope="col">'+datas.UPDATED_AT+'</td>'+
                    '<td scope="col"><button class="btn btn-danger btn-xs deleteRow" id="deleteRow" id_img = "'+datas.ID+'">+ Delete</button></td>';
                    
                }
                $('#kaizen_story').html(html); 
                // console.log(data);
              }
        });
      }
    
      $('#insertNewRow').on('click', function(){
            var title        = $('#title').text();
            var fasilitas    = $('#fasilitas').text();
            var kaizen_imple = $('#kaizen_imple').text();
            var hadiah       = $('#hadiah').text();
            if((title=='')||(fasilitas=='')||(kaizen_imple=='')||(hadiah=='')){
                alert('pastikan semua field diisi');
                return false;
            }
            
            $.ajax({
                url : "<?php echo site_url('C_kaizen_admin/insertKaizenStory')?>",
                method : "POST" ,
                data : {title:title, fasilitas:fasilitas, kaizen_imple:kaizen_imple, hadiah:hadiah},
                // dataType : "json",
                success:function(data){
                    // console.log(data);
                    $('[name="title"]').text("");
                    $('[name="fasilitas"]').text("");
                    $('[name="kaizen_imple"]').text("");
                    $('[name="hadiah"]').text("");
                    // reload_table();
                    load_data();
                }
            });
        });

        function update_data(id, column, value){

            $.ajax({
              url:"<?php echo site_url('C_kaizen_admin/update_kaizen_story')?>",
              data : {id:id, column:column, value:value},
              method:"POST",
              dataType : 'json',
              success:function(data)
              {
                    load_data();
              }
            })
        }

       
      $(document).ready(function(){
        load_data();

        $(document).on('submit','#upload_img_welcome',function(){
                var img_id   = $('#img_id').val();
                event.preventDefault();
                $.ajax({
                    url: "<?php echo site_url('C_kaizen_admin/upload_kaizen_story')?>",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        
                        load_data();
                        
                    }
                })
            });

        $(document).on('click','#deleteRow',function(){
            var id   = $(this).attr('id_img');
            $.ajax({
                    url : "<?php echo site_url('C_kaizen_admin/delete_kaizen_story')?>",
                    method : "POST" ,
                    data : {id:id},
                    success:function(data){
                        load_data();
                    }
                });
        });

        $(document).on('blur', '.update', function(){
            var id = $(this).data("id");
            var column = $(this).data("column");
            var value = $(this).text();
            update_data(id, column, value);
            
        });




      });
    




</script>

<section class="news_section layout_padding img" style="background-repeat-y: no-repeat;" id="toTentangKami">
    <div class="containers">
      
      <div class="row">
        <!-- <div class="col-md-3"> -->
          <div class="box">
            
            <div class="detail-box" style="margin-top: 115px; padding:50px">
              <h2>
                <b>Tentang Kami</b>
              </h2>
              
                <p>
                    Bergerak bersama dengan segala strategi demi terbentuknya budaya Kaizen
                </p>
              
            
            </div>
          </div>
        <!-- </div> -->
        <?php
            for($i=0; $i<count($tentang_kami); $i++){
                $potongan = substr($tentang_kami[$i]['IMG_DESC'], 0, 25);
                echo '<div class="col-md-2 border-info" style="border-color: #ff9494 !important ; background:white; padding: 5px; ">
                <div class="box" style="margin-top:0px; border:1px solid; width=370px; margin-top: 115px;">
                  <div class="img-box">
                    <img src="';
                    echo base_url();
                    echo 'template/images/welcoming_page/'.$tentang_kami[$i]['IMG'].'" alt="" width="183" 
                    height="250">
                  </div>
                  
                  <div class="detail-box" style="padding: 15px;">
                    <h5><b>'.$tentang_kami[$i]['IMG_TITLE'].'</b>
                    </h5>
                    <p>
                      '.$potongan.'...
                    </p>
                    <div>
                      
                      <button class="btn btn-primary" style="margin-top: 30px;" id="tentangKami1" data-id_img="'.$tentang_kami[$i]['IMG_ID'].'">
                        Selengkapnya +
                      </button>
                    </div>
                  </div>
                </div>
              </div>';
            }
        
        ?>
       
      </div>
    <!-- </div> -->
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="kami1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><span id="title"></span></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="news_section layout_padding img" style="background-repeat-y: no-repeat;">
            <div class="container">
              
              <div class="row">
                <div class="col-md-4 border-info" style="border-color: #ff9494 !important; background:white; padding: 5px; ">
                  <div class="box" style="margin-top:0px; border:1px solid">
                    <div class="img-box">
                        <span id='gambar'>
                        </span>
                    </div>
                    
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="box">
                    
                    <div class="detail-box" style="margin-top: 115px;">
                      <h2>
                        <b><span id="title2"></span></b>
                      </h2>
                      <h3>
                        <p>
                          <span id="deskripsi"></span>
                        </p>
                      </h3>
                    
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click','#tentangKami1',function(){
    var id = $(this).attr("data-id_img")
    var alamat = "<?php echo base_url();?>template/images/welcoming_page/"
    $.ajax({
        type : "POST",
        url : "<?php echo site_url('C_kaizen_admin/tampil_welcome')?>",
        dataType :"JSON",
        data : {id:id},
        success: function(data){
          $('#kami1').modal('show');
          var gambar = '';
          gambar += '<img src="'+alamat+'/'+data.IMG+'" alt="">';

          var title ='';
          title += data.IMG_TITLE;

          var desc ='';
          desc += data.IMG_DESC;
          $('#title').html(title);
          $('#title2').html(title);
          $('#gambar').html(gambar);
          $('#deskripsi').html(desc);
          $('#kami1').modal('hide');

        }
    })
    
    
    // alert(id);
  }); 
</script>
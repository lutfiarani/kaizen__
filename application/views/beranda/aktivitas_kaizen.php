<style>
.portfolio_section .img-box {
    position: relative;
    margin: 0px;
}
.portfolio_section .img-box::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 0;
    height: 0;
    background-color: rgba(37, 28, 229, 0.8);
    opacity: 0%;
    border-radius: 25px;
    -webkit-transition: all 0.1s;
    transition: all 0.1s;
}
</style>
<section class="portfolio_section">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Aktivitas Kaizen
          
        </h2>
        <hr>
      </div>
      
      <div class="layout_padding2-top">
        <div class="row" style="background: #ff9494;">
          <div class="col-md-3" style="padding: 0px">
           <div class="img-box">
              <img src="<?php echo base_url();?>/template/images/<?php echo $aktivitas_kaizen[0]['IMG']; ?>" alt="">
              
            </div>
           
          </div>
          <div class="col-md-3" style="padding: 15px">
            <b><?php echo $aktivitas_kaizen[0]['IMG_TITLE'];?></b>
            <div class="img-box">
                <?php echo $aktivitas_kaizen[0]['IMG_DESC'];?>
            </div>
          </div>
          <div class="col-md-3" style="padding: 0px">
           
            <div class="img-box">
              <img src="<?php echo base_url();?>/template/images/<?php echo $aktivitas_kaizen[1]['IMG']; ?>" alt="">
              
            </div>
            
          </div>
          <div class="col-md-3" style="padding: 15px">
            <b><?php echo $aktivitas_kaizen[1]['IMG_TITLE'];?></b>
            <div class="img-box">
                <?php echo $aktivitas_kaizen[1]['IMG_DESC'];?>
            </div>
            
          </div>
          
        </div>



        <div class="row" style="background: #e0e0e0;">
          <div class="col-md-3" style="padding: 15px">
            <b><?php echo $aktivitas_kaizen[2]['IMG_TITLE'];?></b>
            <div class="img-box">
                
                <?php echo $aktivitas_kaizen[2]['IMG_DESC'];?>
            </div>
            
          </div>
          <div class="col-md-3" style="padding: 0px">
           
            <div class="img-box">
              <img src="<?php echo base_url();?>/template/images/<?php echo $aktivitas_kaizen[2]['IMG']; ?>" alt="">
              
            </div>
            
          </div>
          <div class="col-md-3" style="padding: 15px">
          <b><?php echo $aktivitas_kaizen[3]['IMG_TITLE'];?></b>
            <div class="img-box">
                
                <?php echo $aktivitas_kaizen[3]['IMG_DESC'];?>
            </div>
            
          </div>
          <div class="col-md-3" style="padding: 0px">
           
            <div class="img-box">
              <img src="<?php echo base_url();?>/template/images/<?php echo $aktivitas_kaizen[3]['IMG']; ?>" alt="">
              
            </div>
            
          </div>
        </div>


        <div class="row" style="background: #ff9494;">
          <div class="col-md-3" style="padding: 0px">
           
            <div class="img-box">
              <img src="<?php echo base_url();?>/template/images/<?php echo $aktivitas_kaizen[4]['IMG']; ?>" alt="">
            </div>
            
          </div>
          <div class="col-md-3" style="padding: 15px">
            <b><?php echo $aktivitas_kaizen[4]['IMG_TITLE'];?></b>
            <div class="img-box">
                
                <?php echo $aktivitas_kaizen[4]['IMG_DESC'];?>
            </div>
            
          </div>
          <div class="col-md-3" style="padding: 0px">
           
            <div class="img-box">
              <img src="<?php echo base_url();?>/template/images/<?php echo $aktivitas_kaizen[5]['IMG']; ?>" alt="">
              
            </div>
            
          </div>
          <div class="col-md-3" style="padding: 15px">
            <b><?php echo $aktivitas_kaizen[5]['IMG_TITLE'];?></b>
            <div class="img-box">
                
                <?php echo $aktivitas_kaizen[5]['IMG_DESC'];?>
            </div>
            
          </div>
          
          
        </div>
      </div>
    </div>
  </section>
<section class="portfolio_section" style="padding-top:45px">
    <div class="container">
      <div class="custom_heading-container">
        <h2>
          Kaizen Story
        </h2>
        <hr>
      </div>
      <p>
        Membangun kaizen selangkah demi selangkah, dan inilah bukti perjalanan kami. Dukung kami, agar kita selalu bisa konsisten membangun budaya kaizen.
      </p>
      <div class="layout_padding2-top" style="padding-top:20px">
        <div class="row">
          <?php 
          // for($i = 0; $i<=count($kaizen_story); $i++){
            foreach($kaizen_story as $ks ){
                echo '<div class="col-md-3">
                  
                  <div style="background-color:#ffffa8">
                    <center><h5>'.$ks->TITLE.'</h5></center>
                  </div>
                  <div class="img-box">
                  <img src="';
                        echo base_url();
                        echo 'template/images/welcoming_page/'.$ks->IMG_TITLE.'" alt="" width="243" 
                        height="176">
                  </div>
                  <table border="1" width="100%" style="margin-top:8px; font-size:13px; border: 1px solid #ffffff; background-color:#aecadb">
                    <tr>
                      <td style="padding-left:5px;">
                        <div style="height: 25px; overflow:hidden;">
                          Fasilitas Kaizen
                        </div>
                      </td>
                      <td style="padding-left:5px;">
                        <div style="height: 25px; overflow:hidden;">
                        '.$ks->FASILITAS.'
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-left:5px;">
                        <div style="height: 25px; overflow:hidden;">
                        Total Kaizen Imple.
                        </div>
                      </td>
                      <td style="padding-left:5px;">
                        <div style="height: 25px; overflow:hidden;">
                        '.$ks->KAIZEN_IMPLE.' ide
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-left:5px;">
                        <div style="height: 25px; overflow:hidden;">
                          Total Hadiah
                        </div>
                      </td>
                      <td style="padding-left:5px;">
                        <div style="height: 25px; overflow:hidden;">
                        '.$ks->HADIAH.'
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>';
              }
          ?>
         
          
        </div>
      </div>
    </div>
  </section>
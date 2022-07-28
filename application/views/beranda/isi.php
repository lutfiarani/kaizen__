
    <style>
    #toTop {
        padding: 5px 3px;
        position: fixed;
        bottom: 0;
        right: 5px;
        display: none;
        z-index: 999;
    }

    #arrow {
      /* width:20px;
      height:20px; */
      /* background: url('images/scrollUp.png'); */
      position:fixed;
      top:93%;
      background:#da0101;
      color:#ffffff;
      z-index: 999;
      /* margin-left: 1010px; */
    }

    #arrow a{
        display:inline-block;
        padding:10px 20px;
        cursor:pointer;
    }

    #bunder{
      width: auto;
      height: 15em;
      border-radius: 50%;
      background-color: #394ab3;
      border: 40px solid white;
      box-shadow: 0 0 0 5px #394ab3;
      text-align:center;
      line-height:8em;
      /* text-align: center; */
     
    }

    /* #outer-circle {
      background: #385a94;
      border-radius: 50%;
      height: 15em;
      width: auto;
      position: relative;
    }

    #inner-circle {
      position: absolute;
      background: #a9aaab;
      border-radius: 50%;
      height: 10em;
      width: auto;
      top: 50%;
      left: 50%;
      margin: -150px 0px 0px -150px;
    } */
    </style>
    <section class=" slider_section position-relative">

      <div class="slider_bg-container">
      </div>
      <div class="slider-container">

        <!-- <div class="detail-box">
          <div class="img-box">
            <div class="container">
                <img src="<?php echo base_url();?>/template/images/cobalah2.png" alt="">
                <div class="bottom-left"><button class="0">678</button></div>
                <div class="top-left">313</div>
                <div class="top-right">99999</div>
                <div class="bottom-right">105253</div>
                <div class="centered"><a href="#keIsiIde" class="click">Centered</a><br /></div>

                      
            </div>
          </div>
        </div> -->
        <div class="detail-box" >
          
          
        <div class="layout_padding2-top">
          <div class="row" >
            <div class="col-sm-4" style="padding: 0px">
            
              <div class="img-box" style="background:#394ab3; width:100%">
                <div class="card text-white">
                  <div class="card-header" style="font-size:12px; text-align:center; background:#394ab3">Ide Terkirim Hari Ini</div>
                  <div class="card-body text-white" style="text-align:center; background:#394ab3"><center><h1>99</h1></center></div>
                </div>
              </div>
              
            </div>
            <div class="col-sm-4" style="padding: 0px">
            <!-- <div class="img-box" style="background:#394ab3">
                <div class="card text-white">
                  <div class="card-header" style="font-size:12px; text-align:center; background:#394ab3">Ide Terkirim Hari Ini</div>
                  <div class="card-body text-white" style="text-align:center; background:#394ab3"><center><h1>99</h1></center></div>
                </div>
              </div> -->
            </div>
            <div class="col-sm-4" style="padding: 0px">
              <div class="img-box" style="background:#394ab3; width:100%">
                <div class="card text-white">
                  <div class="card-header " style="font-size:12px; text-align:center; background:#394ab3">Ide Terkirim 2022</div>
                  <div class="card-body text-white" style="text-align:center; background:#394ab3"><center><h1>999</h1></center></div>
                </div>
              </div>
              
            </div>
            
          </div>



          <div class="row">
            <div class="col-sm-4" style="padding: 15px">
            
              <div class="img-box">
                 
              </div>
              
            </div>
            <div class="col-sm-4" style="padding: 0px">
            
              <div class="img-box" style=" width:100%">

                <div id="bunder" class="click" href="#keIsiIde"><p style="font-size:40px">Isi Ide</h3></div>
              </div>
            </div>
            <div class="col-sm-4" style="padding: 15px">
            
            <div class="img-box">
                  
              </div>
              
            </div>
          </div>


          <div class="row" >
            <div class="col-sm-4" style="padding: 0px">
              
              <div class="img-box" style="background:#394ab3; width:100%">
                <div class="card text-white">
                  <div class="card-header " style="font-size:12px; text-align:center; background:#394ab3">Karyawan Kirim Ide</div>
                  <div class="card-body text-white" style="text-align:center; background:#394ab3"><center><h1>313</h1></center></div>
                </div>
              </div>
              
            </div>
            <div class="col-sm-4" style="padding: 15px">
            
              <div class="img-box">
              </div>
              
            </div>
            <div class="col-sm-4" style="padding: 0px">
            
              <div class="img-box" style="background:#394ab3; width:100%">
                <div class="card text-white">
                  <div class="card-header " style="font-size:12px; text-align:center; background:#394ab3">Implemented</div>
                  <div class="card-body text-white" style="text-align:center; background:#394ab3"><center><h1>678</h1></center></div>
                </div>
              </div>
              
            </div>
            
          </div>
        </div>


        </div>

        <div class="img-box" style="margin-left:0">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php echo base_url();?>/template/images/slider-img.jpg" alt="">
              </div>
              <div class="carousel-item">
                <img src="<?php echo base_url();?>/template/images/slider-img.jpg" alt="">
              </div>
              <div class="carousel-item">
                <img src="<?php echo base_url();?>/template/images/slider-img.jpg" alt="">
              </div>
            </div>

          </div>

        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- <a href="#keIsiIde" class="click">Click this to scroll to element 2!</a><br /> -->
  <!-- <a href="#toTentangKami" class="click"><img src="<?php //echo base_url() ?>assets/scroll.png" width="50px"></a><br /> -->
  <div id='toTop'><img src="<?php echo base_url() ?>assets/scroll-up2.png" width="50px"></div>
  <div id="arrow">
    <a class="previous">prev</a>
    <a class="next">next</a>
  </div>

  <script>
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#toTop').fadeIn();
            // $('#previous').fadeOut();
        } else {
            $('#toTop').fadeOut();
            $('#previous').fadeOut();
        }
    });

    $("#toTop").click(function () {
      $("html, body").animate({scrollTop: 0}, 1000);
    });

    // scroll to isi Ide
    $('.click').click(function(e){
      e.preventDefault();
      scrollToElement( $(this).attr('href'), 1000 );
    });

    var scrollToElement = function(el, ms){
        var speed = (ms) ? ms : 600;
        $('html,body').animate({
            scrollTop: $(el).offset().top
        }, speed);
    }
    // akhir scroll to isi Ide


    $(function(){
    
      var pagePositon = 0,
          sectionsSeclector = 'section',
          $scrollItems = $(sectionsSeclector),
          offsetTolorence = 30,
          pageMaxPosition = $scrollItems.length - 1;
      
      //Map the sections:
      $scrollItems.each(function(index,ele) { $(ele).attr("debog",index).data("pos",index); });

      // Bind to scroll
      $(window).bind('scroll',upPos);
      
      //Move on click:
      $('#arrow a').click(function(e){
          if ($(this).hasClass('next') && pagePositon+1 <= pageMaxPosition) {
              pagePositon++;
              $('html, body').stop().animate({ 
                    scrollTop: $scrollItems.eq(pagePositon).offset().top
              }, 300);
          }
          if ($(this).hasClass('previous') && pagePositon-1 >= 0) {
              pagePositon--;
              $('html, body').stop().animate({ 
                    scrollTop: $scrollItems.eq(pagePositon).offset().top
                }, 300);
              return false;
          }
      });
      
      //Update position func:
      function upPos(){
        var fromTop = $(this).scrollTop();
        var $cur = null;
          $scrollItems.each(function(index,ele){
              if ($(ele).offset().top < fromTop + offsetTolorence) $cur = $(ele);
          });
        if ($cur != null && pagePositon != $cur.data('pos')) {
            pagePositon = $cur.data('pos');
        }                   
      }
      
  });

  </script>
  
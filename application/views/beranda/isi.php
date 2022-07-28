<!-- slider section -->
<style>
#toTop {
    padding: 5px 3px;
    position: fixed;
    bottom: 0;
    right: 5px;
    display: none;
}

#arrow {
  /* width:20px;
  height:20px; */
  /* background: url('images/scrollUp.png'); */
  position:fixed;
  top:95%;
  background:#da0101;
  color:#ffffff
  /* margin-left: 1010px; */
}
#arrow a{
    display:inline-block;
    padding:10px 20px;
    cursor:pointer;
}
  </style>
    <section class=" slider_section position-relative">

      <div class="slider_bg-container">
      </div>
      <div class="slider-container">

        <div class="detail-box">
          <!-- <p> -->
          <div class="img-box">
            <div class="container">
                <img src="<?php echo base_url();?>/template/images/cobalah2.png" alt="">
                <div class="bottom-left">678</div>
                <div class="top-left">313</div>
                <div class="top-right">99999</div>
                <div class="bottom-right">105253</div>
                <div class="centered"><a href="#keIsiIde" class="click">Centered</a><br /></div>
            </div>
          </div>
        </div>
        <div class="img-box">
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
            // $('#arrow').fadeOut();
        } else {
            $('#toTop').fadeOut();
            // $('#arrow').fadeIn();
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
  
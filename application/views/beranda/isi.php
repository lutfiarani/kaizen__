<!-- slider section -->
<style>
#toTop {
    padding: 5px 3px;
    position: fixed;
    bottom: 0;
    right: 5px;
    display: none;
}
  </style>
    <section class=" slider_section position-relative">

      <div class="slider_bg-container">
            <!-- <img src="<?php echo base_url();?>/template/images/cobalah2.png" alt=""> -->
      </div>
      <div class="slider-container">

        <div class="detail-box">
          <!-- <a class="carousel-control-prev" href="<?php echo base_url();?>/template/#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="<?php echo base_url();?>/template/#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a> -->
         
          <!-- <p> -->
          <div class="img-box">
            <div class="container">
                <!-- <img src="img_snow_wide.jpg" alt="Snow" style="width:100%;"> -->
                <img src="<?php echo base_url();?>/template/images/cobalah2.png" alt="">
                <div class="bottom-left">678</div>
                <div class="top-left">313</div>
                <div class="top-right">99999</div>
                <div class="bottom-right">105253</div>
                <div class="centered">Centered</div>
            </div>
            <!-- <img src="<?php echo base_url();?>/template/images/cobalah2.png" alt=""> -->
          </div>
            <!-- It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem
          </p> -->
          <!-- <div>
            <a href="<?php echo base_url();?>/template/" class="slider-link">
              CONTACT US
            </a>
          </div> -->
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

  <a href="#keIsiIde" class="click">Click this to scroll to element 2!</a><br />
  <a href="#toTentangKami" class="click">Click this to scroll to element 2!</a><br />
  <div id='toTop'><img src="<?php echo base_url() ?>assets/scroll-up2.png" width="50px"></div>
  <!-- <a href="#toTentangKami" class="click">Click this to scroll to element 2!</a><br /> -->


  <script>
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
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
  </script>
  
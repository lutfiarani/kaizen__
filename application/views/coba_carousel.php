<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Testimonial Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500&display=swap');
body {
    font-family: 'Mulish', sans-serif;
    background: linear-gradient(to top left, #33ccff 0%, #ff99cc 100%);
    background-repeat: no-repeat;
    background-attachment: fixed;
}
#customers-testimonials .item {
    margin : 0px;
    text-align: center;
    padding: 0px;
    margin-bottom: 90px;
    opacity: .2;
    -webkit-transform: scale3d(0.8, 0.8, 1);
    transform: scale3d(0.95, 0.95, 1);
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    height:200px
}
#customers-testimonials .owl-item.active.center .item {
    opacity: 1;
    -webkit-transform: scale3d(1.0, 1.0, 1);
    transform: scale3d(1.3, 1.3, 1);
}
.owl-carousel .owl-item img {
    transform-style: preserve-3d;
    max-width: 210px;
    margin: 0 auto ;
}
#customers-testimonials.owl-carousel .owl-dots .owl-dot.active span, #customers-testimonials.owl-carousel .owl-dots .owl-dot:hover span {
    background: #4280bd;
    transform: translate3d(0px, -50%, 0px) scale(0.6);
}
#customers-testimonials.owl-carousel .owl-dots {
    display: inline-block;
    width: 100%;
    text-align: center;
}
#customers-testimonials.owl-carousel .owl-dots .owl-dot {
    display: inline-block;
    outline: none;
}
#customers-testimonials.owl-carousel .owl-dots .owl-dot span {
    background: #fff;
    display: inline-block;
    height: 20px;
    margin: 0 2px 5px;
    transform: translate3d(0px, -50%, 0px) scale(0.3);
    transform-origin: 50% 50% 0;
    transition: all 250ms ease-out 0s;
    width: 20px;
    border-radius: 100%;
}
 
  </style>
</head>
<body>
 
  <!-- TESTIMONIALS -->
  <section class="testimonials">
    <div class="container">
 
      <div class="row">
        <div class="col-sm-12">
          <div class="container-fluid px-3 px-sm-5 my-5 text-center">
            <h2>What Our Client Say</h2>
          </div>
          <div id="customers-testimonials" class="owl-carousel">
 
            <!--TESTIMONIAL 1 -->
            <div class="item">
              <div class="shadow-lg p-4  rounded">
                <!-- <img src="https://annedece.sirv.com/Images/pexels-andrea-piacquadio-762020%20(1).jpg" alt=""> -->
                <img  src="<?php echo base_url() ?>template/images/p-1.jpg" alt="">
                <!-- <h5 class="pb-2 pt-3">1</h5> -->
                <!-- <p class="mb-0 text-muted">Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p> -->
              </div>             
            </div>
            <!--END OF TESTIMONIAL 1 -->
            <!--TESTIMONIAL 2 -->
            <div class="item">
              <div class="shadow-lg p-4  rounded">
                <!-- <img  src="https://annedece.sirv.com/Images/pexels-andrea-piacquadio-839011.jpg" alt=""> -->
                <img  src="<?php echo base_url() ?>template/images/p-2.jpg" alt="">
                <!-- <h5 class="pb-2 pt-3">2</h5> -->
                <!-- <p class="mb-0 text-muted">Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p> -->
              </div>
             
            </div>
            <!--END OF TESTIMONIAL 2 -->
            <!--TESTIMONIAL 3 -->
            <div class="item">
              <div class="shadow-lg p-4  rounded">
                <!-- <img src="https://annedece.sirv.com/Images/pexels-stefan-stefancik-91227.jpg" alt=""> -->
                <img  src="<?php echo base_url() ?>template/images/p-3.jpg" alt="">
                <!-- <h5 class="pb-2 pt-3">3</h5> -->
                <!-- <p class="mb-0 text-muted">Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p> -->
              </div>
             
            </div>
            <!--END OF TESTIMONIAL 3 -->
            <!--TESTIMONIAL 4 -->
            <div class="item">
              <div class="shadow-lg p-4  rounded">
                <!-- <img  src="https://annedece.sirv.com/Images/pexels-tim-savage-736716.jpg" alt=""> -->
                <img  src="<?php echo base_url() ?>template/images/p-4.jpg" alt="">
                <!-- <h5 class="pb-2 pt-3">4</h5> -->
                <!-- <p class="mb-0 text-muted">Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p> -->
              </div>
              
            </div>
            <!--END OF TESTIMONIAL 4 -->

            <!--TESTIMONIAL 4 -->
            <div class="item">
              <div class="shadow-lg p-4  rounded">
                <!-- <img  src="https://annedece.sirv.com/Images/pexels-tim-savage-736716.jpg" alt=""> -->
                <img  src="<?php echo base_url() ?>template/images/p-5.jpg" alt="">
                <!-- <h5 class="pb-2 pt-3">5</h5> -->
                <!-- <p class="mb-0 text-muted">Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p> -->
              </div>
              
            </div>
            <!--END OF TESTIMONIAL 4 -->

            <!-- !--TESTIMONIAL 4 -->
            <div class="item">
              <div class="shadow-lg p-4  rounded">
                <!-- <img  src="https://annedece.sirv.com/Images/pexels-tim-savage-736716.jpg" alt=""> -->
                <img  src="<?php echo base_url() ?>template/images/p-6.jpg" alt="">
                <!-- <h5 class="pb-2 pt-3">6</h5> -->
                <!-- <p class="mb-0 text-muted">Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p> -->
              </div>
              
            </div>
            <!--END OF TESTIMONIAL 4 -->

            <!--TESTIMONIAL 4 -->
            <div class="item">
              <div class="shadow-lg p-4  rounded">
                <img  src="<?php echo base_url() ?>template/images/p-6.jpg" alt="">
                <!-- <h5 class="pb-2 pt-3">7</h5> -->
                <!-- <p class="mb-0 text-muted">Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p> -->
              </div>
              
            </div>
            <!--END OF TESTIMONIAL 4 -->
      
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END OF TESTIMONIALS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
  jQuery(document).ready(function($) {
                "use strict";
                //  TESTIMONIALS CAROUSEL HOOK
                $('#customers-testimonials').owlCarousel({
                    loop: true,
                    center: true,
                    items: 7,
                    margin: 0,
                    autoHeight:true,
                    autoplay: true,
                    dots:true,
                    autoplayTimeout: 5000,
                    smartSpeed: 450,
                    responsive: {
                      0: {
                        items: 1
                      },
                      600: {
                        items: 2
                      },
                      1000: {
                        items: 3
                      }
                    }
                });
            });
  </script>
</body>
</html>
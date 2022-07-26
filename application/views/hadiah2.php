
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/owl-carousel/carousel-custom.css" />
 
  <!-- TESTIMONIALS -->
  <section class="testimonials">
    <div class="container">
 
      <div class="row">
        <div class="col-sm-12">
          <div class="container-fluid px-2 px-sm-4 my-4 text-center">
            <h2>Pemberian Hadiah</h2>
          </div>
          <div id="customers-testimonials" class="owl-carousel">

            <?php 
              foreach ($pemberian_hadiah as $pemberian) {
                # code...
                echo '
                <div class="item">
                  <div class="shadow-lg p-4  rounded">
                    <img  src="'.base_url().'template/images/'.$pemberian->GAMBAR.'" alt="">
                  </div>             
                </div>
                ';
              }
            ?>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="container-fluid px-2 px-sm-4 my-4 text-center">
            <h2>Hadiah Kaizen</h2>
          </div>
          <div id="hadiah-testimonials" class="owl-carousel">

            <?php 
              foreach ($jenis_hadiah as $jenis) {
                # code...
                echo '
                <div class="item">
                  <div class="shadow-lg p-4  rounded">
                    <img  src="'.base_url().'template/images/'.$jenis->GAMBAR.'" alt="">
                  </div>             
                </div>
                ';
              }
            ?>
 
      
          </div>
        </div>
      </div>


    </div>
  </section>
  
  <script src="<?php echo base_url() ?>assets/owl-carousel/owl.carousel.min.js"></script>
  <script>
      $(document).ready(function($) {
          // "use strict";
          //  TESTIMONIALS CAROUSEL HOOK
          $('#customers-testimonials').owlCarousel({
              loop: true,
              center: true,
              // items: 7,
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


          $('#hadiah-testimonials').owlCarousel({
              loop: true,
              center: true,
              // items: 7,
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
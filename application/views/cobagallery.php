
    <!-- Stylesheets -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic,300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url();?>/template/js/owl_carousel/docs/assets/css/docs.theme.min.css">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url();?>/template/js/owl_carousel/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/template/js/owl_carousel/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
    <!-- Animate CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel='stylesheet' type='text/css'>
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>/template/carousel/carousel.css">

    <!-- Yeah i know js should not be in header. Its required for demos.-->

    <!-- javascript -->
    <script src="<?php echo base_url();?>/template/js/owl_carousel/docs/assets/owlcarousel/owl.carousel.js"></script>
  </head>
  <body>

    <!-- title -->
    <section class="title">
      <div class="row">
        <div class="large-12 columns">
          <h1>Pemberian Hadiah</h1>
        </div>
      </div>
    </section>

    <!--  Demos -->
    <section id="demos">
      <div class="row">
        <div class="large-12 columns">
        <div class="gallery-container">
        <div class="item">
      <img class="gallery-item gallery-item-1" src="http://fakeimg.pl/300/?text=1" data-index="1">
</div>
      <div class="item">
      <img class="gallery-item gallery-item-2" src="http://fakeimg.pl/300/?text=2" data-index="2">
      </div>
      <div class="item">
      <img class="gallery-item gallery-item-3" src="http://fakeimg.pl/300/?text=3" data-index="3">
      </div>
      <div class="item">
      <img class="gallery-item gallery-item-4" src="http://fakeimg.pl/300/?text=4" data-index="4">
      </div>
      <div class="item">
      <img class="gallery-item gallery-item-5" src="http://fakeimg.pl/300/?text=5" data-index="5">
      </div>
      <div class="item">
      <img class="gallery-item gallery-item-6" src="http://fakeimg.pl/300/?text=1" data-index="6">
      </div>
      <div class="item">
      <img class="gallery-item gallery-item-7" src="http://fakeimg.pl/300/?text=2" data-index="7">
      </div>
      </div>
      <div class="item">
      <img class="gallery-item gallery-item-8" src="http://fakeimg.pl/300/?text=3" data-index="8">
      </div>
      <div class="item">
      <img class="gallery-item gallery-item-9" src="http://fakeimg.pl/300/?text=4" data-index="9">
      </div>
      <div class="item">
      <img class="gallery-item gallery-item-10" src="http://fakeimg.pl/300/?text=5" data-index="10">
      </div>
      
    </div>
          </div>
         
          <script>
            $(document).ready(function() {
              var owl = $('.gallery-container');
              owl.owlCarousel({
                // items: 4,
                // loop: true,
                // margin: 10,
                // animateOut: 'animate__bounceInRight',
                // animateIn: 'animate__fadeInRight',
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })

            
         
          
          </script>
     
        </div>
      </div>
    </section>



    <!-- footer -->
   
    <!-- vendors -->
    <script src="<?php echo base_url();?>/template/js/owl_carousel/docs/assets/vendors/highlight.js"></script>
    <script src="<?php echo base_url();?>/template/js/owl_carousel/docs/assets/js/app.js"></script>
  </body>
</html>

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
          <div class="owl-carousel owl-theme gallery-container">
            <div class="item">
              <h4>1</h4>
            </div>
            <div class="item">
              <h4>2</h4>
            </div>
            <div class="item">
              <h4>3</h4>
            </div>
            <div class="item">
              <h4>4</h4>
            </div>
            <div class="item">
              <h4>5</h4>
            </div>
            <div class="item">
              <h4>6</h4>
            </div>
            <div class="item">
              <h4>7</h4>
            </div>
            <div class="item">
              <h4>8</h4>
            </div>
            <div class="item">
              <h4>9</h4>
            </div>
            <div class="item">
              <h4>10</h4>
            </div>
            <div class="item">
              <h4>11</h4>
            </div>
            <div class="item">
              <h4>12</h4>
            </div>
          </div>
         
          <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                animateOut: 'animate__bounceInRight',
                animateIn: 'animate__fadeInRight',
                autoplay: true,
                autoplayTimeout: 3000,
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
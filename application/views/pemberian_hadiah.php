<link rel="stylesheet" href="<?php echo base_url();?>/template/carousel/carousel.css">


  <div class="gallery">
    <div class="gallery-container">
      <img class="gallery-item gallery-item-1" src="http://fakeimg.pl/300/?text=1" data-index="1">
      <img class="gallery-item gallery-item-2" src="http://fakeimg.pl/300/?text=2" data-index="2">
      <img class="gallery-item gallery-item-3" src="http://fakeimg.pl/300/?text=3" data-index="3">
      <img class="gallery-item gallery-item-4" src="http://fakeimg.pl/300/?text=4" data-index="4">
      <img class="gallery-item gallery-item-5" src="http://fakeimg.pl/300/?text=5" data-index="5">
      <img class="gallery-item gallery-item-6" src="http://fakeimg.pl/300/?text=1" data-index="6">
      <img class="gallery-item gallery-item-7" src="http://fakeimg.pl/300/?text=2" data-index="7">
      <img class="gallery-item gallery-item-8" src="http://fakeimg.pl/300/?text=3" data-index="8">
      <img class="gallery-item gallery-item-9" src="http://fakeimg.pl/300/?text=4" data-index="9">
      <img class="gallery-item gallery-item-10" src="http://fakeimg.pl/300/?text=5" data-index="10">
    </div>
    <div class="gallery-controls"></div>
  </div>

  <script src="<?php echo base_url();?>/template/carousel/carousel.js"></script>
 <script> 
 $(document).ready(function() {
    var car = new Carousel();
    car.autoplayStart();
 })
</script>
<!--  -->
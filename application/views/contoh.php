<style>
    * {
  margin: 0;
  padding: 0;
}

.slider {
  position: relative;
  width: 100vw;
  max-width: 100%;
  height: 300px;
  margin: auto;
  overflow: hidden;
}

.slide {
  width: 100%;
  height: 300px;
  position: absolute;
  text-align: center;
  -webkit-transition: 0.6s ease;
  transition: 0.6s ease;
  -webkit-transform: translate(-100%, 0);
  transform: translate(-100%, 0);
}

.slide.active {
  -webkit-transform: translate(0, 0);
  transform: translate(0, 0);
}

.slide.active~.slide {
  -webkit-transform: translate(100%, 0);
  transform: translate(100%, 0);
}

* {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  text-align: center;
}

.slide {
  background: #222;
  color: white;
  padding: 30px;
}

button {
  margin-top: 20px;
  border: none;
  border-radius: 0;
  background: aliceblue;
  color: #333;
  padding: 10px;
  cursor: pointer;
}
    </style>

<div class="slider__wrapper">
  <div class="slider">
    <div class="slide active">
      <h3>Slide One</h3>
      <p>test</p>
    </div>
    <div class="slide">
      <h3>Slide Two</h3>
      <p>test</p>
    </div>
    <div class="slide">
      <h3>Slide Three</h3>
      <p>1234</p>
    </div>
  </div>

  <button id="prev" class="btn">Prev</button>
  <button id="next" class="btn">Next</button>

</div>

<script>
    function slider() {
  let slides = document.querySelectorAll(".slide"),
    slider = document.querySelector(".slider"),
    last = slider.lastElementChild,
    first = slider.firstElementChild,
    btn = document.querySelectorAll(".btn");

  slider.insertBefore(last, first);

  btn.forEach(btn => {
    btn.addEventListener("click", movement);
  });
  setInterval(function()
  {
      movement({target:{id:"next"}});
  }, 3000);
  function movement(e) {
    slider = document.querySelector(".slider");
    last = slider.lastElementChild;
    first = slider.firstElementChild;

    const activeSlide = document.querySelector(".active");

    if (e.target.id === "next") {
      slider.insertBefore(first, last.nextSibling);

      activeSlide.classList.remove("active");
      activeSlide.nextElementSibling.classList.add("active");
    } else {
      slider.insertBefore(last, first);
      activeSlide.classList.remove("active");
      activeSlide.previousElementSibling.classList.add("active");
    }
  }
}
slider();
    </script>
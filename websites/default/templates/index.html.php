<!--Carousel Wrapper-->
<div
  id="video-carousel-example"
  class="carousel slide carousel-fade"
  data-ride="carousel"
>
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li
      data-target="#video-carousel-example"
      data-slide-to="0"
      class="active"
    ></li>
    <li data-target="#video-carousel-example" data-slide-to="1"></li>
    <li data-target="#video-carousel-example" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <video class="video-fluid" autoplay loop muted>
        <source
          src="https://mdbootstrap.com/img/video/Tropical.mp4"
          type="video/mp4"
        />
      </video>
    </div>
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
        <source
          src="https://mdbootstrap.com/img/video/forest.mp4"
          type="video/mp4"
        />
      </video>
    </div>
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
        <source
          src="https://mdbootstrap.com/img/video/Agua-natural.mp4"
          type="video/mp4"
        />
      </video>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a
    class="carousel-control-prev"
    href="#video-carousel-example"
    role="button"
    data-slide="prev"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a
    class="carousel-control-next"
    href="#video-carousel-example"
    role="button"
    data-slide="next"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--Carousel Wrapper-->
<div class="container mt-5">
  <div class="row justify-content-around">
    <h3 class="font-weight-light mb-5">Featured Products</h1>
  </div>
  <div class="row mb-3 justify-content-around">
    <div class="col-md-4">
      <div class="card">
        <img
          src="/images/prints/alex_james-photobomb.jpg"
          class="card-img-top"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title">James Photobomb</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="#" class="btn btn-primary">View Product</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img
          src="/images/prints/alex_the-scream.jpg"
          class="card-img-top"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title">The Screams</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="#" class="btn btn-primary">View Product</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img
          src="/images/prints/james_ryan-and-horse.jpg"
          class="card-img-top"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title">Ryan and Horse</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="#" class="btn btn-primary">View Product</a>
        </div>
      </div>
    </div>

    <div class="row py-5 mt-5 bottom-banner">
      <div class="col-lg-6 justify-content-around">
        <h3 class="text-center">JOIN US AND GET A GIFT > ></h3>
      </div>
      <div class="col-lg-6 justify-content-around">
        <a class="btn btn-dark float-left" id="lnk-signup2" href="#">SIGN UP</a>
      </div>
    </div>
  </div>
</div>

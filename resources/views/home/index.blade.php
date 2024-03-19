<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<section class="text-white text-center p-5 background-image pagina-principal">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="display-1 font-weight-bold text-shadow courgette-regular">Temporal<br>Adventures</h1>
        <p class="lead my-5 text-shadow">Embark on an extraordinary journey through the annals of history with Temporal Adventures. Explore iconic moments and ancient civilizations. Our curated selection of immersive experiences offers glimpses into the past, from ancient wonders to pivotal events. Securely book your historical adventures and uncover the secrets of bygone eras. Discover the richness of our collective heritage and create unforgettable memories with us.</p>
        <a href="{{route('travel.index')}}" class="btn btn-primary btn-lg mb-5">Start Shopping</a>
      </div>
    </div>
  </div>
</section>
<section class="bg-light text-center py-5">
    <div class="container">
        <h2 class="mb-4">Discover Time Travel</h2>
        <p class="lead mb-5">Our time-travel platform makes journeying into the past a breeze with reliable, round-the-clock chrono-assistance and exclusive benefits for our adventurers. Step into history and experience the memories that await you.</p>
        <div class="row">
            <div class="col-md-4 mb-5">
                <i class="bi bi-clock-history fs-1"></i>
                <h5 class="mt-2">24/7 Chrono Support</h5>
                <p>Assistance at any point in time, always there when you need it</p>
            </div>
            <div class="col-md-4 mb-5">
                <i class="bi bi-arrow-return-left fs-1"></i>
                <h5 class="mt-2">Risk-Free Journeys</h5>
                <p>Guaranteed safe returns from every epoch, for your peace of mind</p>
            </div>
            <div class="col-md-4 mb-5">
                <i class="bi bi-badge-ad fs-1"></i>
                <h5 class="mt-2">Exclusive Era Access</h5>
                <p>Special passage to rarely visited times for members</p>
            </div>
            <div class="col-md-4 mb-5">
                <i class="bi bi-hourglass-split fs-1"></i>
                <h5 class="mt-2">Time-Saving Travel</h5>
                <p>Quick & easy booking for a seamless trip to the past</p>
            </div>
            <div class="col-md-4 mb-5">
                <i class="bi bi-map fs-1"></i>
                <h5 class="mt-2">Broad Epoch Selection</h5>
                <p>Choose from a wide array of historical periods</p>
            </div>
            <div class="col-md-4 mb-5">
                <i class="bi bi-shield-lock fs-1"></i>
                <h5 class="mt-2">Secure Chrono Payments</h5>
                <p>Protected transactions to ensure your temporal investments are safe</p>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-xl-8 text-center">
                <h2 class="mb-4">Our Adventures</h2>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                Here you can find a little sneak peak of the different pictures taken by
                previous tourist who have made business with us.
                </p>
            </div>
        </div>
        <div id="homeTravelCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#homeTravelCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#homeTravelCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#homeTravelCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/600/300" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/600/300" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/600/300" class="d-block w-100" alt="">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#homeTravelCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeTravelCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<section class="py-5">
  <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-xl-8 text-center">
          <h2 class="mb-4">Testimonials</h2>
          <p class="mb-4 pb-2 mb-md-5 pb-md-0">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
            numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
            quisquam eum porro a pariatur veniam.
          </p>
        </div>
      </div>

      <div class="row text-center d-flex align-items-stretch">
        <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
          <div class="card testimonial-card">
            <div class="card-up" style="background-color: #7a81a8;"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">Maria Smantha</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet eos adipisci,
                consectetur adipisicing elit.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
          <div class="card testimonial-card">
            <div class="card-up" style="background-color: #7a81a8;"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">Lisa Cudrow</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>Neque cupiditate assumenda in maiores
                repudi mollitia architecto.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-0 d-flex align-items-stretch">
          <div class="card testimonial-card">
            <div class="card-up" style="background-color: #7a81a8;"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">John Smith</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>Delectus impedit saepe officiis ab
                aliquam repellat rem unde ducimus.
              </p>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
<section class="bsb-cta-2 bg-primary py-5">
  <div class="container">
    <div class="card border-0 rounded-3 overflow-hidden text-center bg-transparent">
      <div class="card-body">
        <div class="row align-items-center justify-content-center">
          <div class="col-12 col-md-10">
            <span class="h5 mb-4 text-white text-uppercase">Discover Your Next Adventure Awaits!</span>
            <h2 class="display-5 text-white mb-5 mt-3">Embark on a journey of a lifetime with our curated list of unforgettable destinations.</h2>
            <a href="{{ route('travel.index') }}" class="btn btn-light btn-lg rounded mb-0 text-nowrap"> Start Your Adventure</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

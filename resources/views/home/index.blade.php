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
        <p class="lead">Our time-travel platform makes journeying into the past a breeze with reliable, round-the-clock chrono-assistance and exclusive benefits for our adventurers. Step into history and experience the memories that await you.</p>
        <div class="row">
            <div class="col-md-4 mb-3">
                <i class="bi bi-clock-history fs-1"></i>
                <h5 class="mt-2">24/7 Chrono Support</h5>
                <p>Assistance at any point in time, always there when you need it</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="bi bi-arrow-return-left fs-1"></i>
                <h5 class="mt-2">Risk-Free Journeys</h5>
                <p>Guaranteed safe returns from every epoch, for your peace of mind</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="bi bi-badge-ad fs-1"></i>
                <h5 class="mt-2">Exclusive Era Access</h5>
                <p>Special passage to rarely visited times for members</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="bi bi-hourglass-split fs-1"></i>
                <h5 class="mt-2">Time-Saving Travel</h5>
                <p>Quick & easy booking for a seamless trip to the past</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="bi bi-map fs-1"></i>
                <h5 class="mt-2">Broad Epoch Selection</h5>
                <p>Choose from a wide array of historical periods</p>
            </div>
            <div class="col-md-4 mb-3">
                <i class="bi bi-shield-lock fs-1"></i>
                <h5 class="mt-2">Secure Chrono Payments</h5>
                <p>Protected transactions to ensure your temporal investments are safe</p>
            </div>
        </div>
    </div>
</section>
@endsection

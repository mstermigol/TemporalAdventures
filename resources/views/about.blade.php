<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')

<section>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="https://picsum.photos/600/300" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-secondary">
  <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-xl-8 text-center">
          <h3 class="mb-4 text-white">Our Team Members</h3>
        </div>
      </div>

      <div class="row text-center d-flex align-items-stretch">
        <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
          <div class="card testimonial-card border-0">
            <div class="card-up" style="background-color: #7a81a8;"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">Ella</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                Lorem ipsum dolor sit amet eos adipisci,
                consectetur adipisicing elit.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
          <div class="card testimonial-card border-0">
            <div class="card-up" style="background-color: #7a81a8;"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">Esa</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                Neque cupiditate assumenda in maiores
                repudi mollitia architecto.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-0 d-flex align-items-stretch">
          <div class="card testimonial-card border-0">
            <div class="card-up" style="background-color: #7a81a8;"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">John Smith</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                Delectus impedit saepe officiis ab
                aliquam repellat rem unde ducimus.
              </p>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>

<section>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Contact us</h1>
        <p class="col-lg-10 fs-4">Let us know about your problems so we can better ignore you.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Subject" name="subject">
            <label for="floatingInput">Subject</label>
          </div>
          <div class="form-floating mb-3">
            <textarea style="height: 120px" class="form-control" id="floatingMessage" name="message" placeholder="Message"></textarea>
            <label for="floatingMessage">Message</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Send</button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection

<!-- Author: Miguel Jaramillo -->

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/be50e46cfb.js" crossorigin="anonymous"></script>
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Temporal Adventures')</title>
</head>

<body>

  <nav class="navbar navbar-expand-sm bg-light navbar-light d-sm-block d-md-none fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand p-0 m-0" href="#">
          <img src="{{ url('/images/logo-no-bg.png') }}" alt="Logo" style="width:50px;" class="rounded-pill">
        </a>
      <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-menu">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start offcanvas-light" id="offcanvas-menu">
        <div class="offcanvas-header bg-light justify-content-between">
          <h2 class="offcanvas-title">Name</h2>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body bg-light">
        <ul class="nav nav-pills flex-column pt-2">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.users')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.travels')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.community_posts')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.reviews')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.orders')</a>
          </li>
        </ul>
        <div class="container-fluid justify-content-center mt-4">
          <a href="#" class="btn btn-danger">@lang('admin.navbar_items.logout')</a>
        </div>
        </div>
      </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 d-none d-md-block p-0 m-0">
      <nav class="navbar sidebar bg-light vh-100 flex-column align-items-start py-5 position-sticky top-0">
        <div class="container-fluid justify-content-center">
        <a class="navbar-brand p-0 m-0" href="#">
          <img src="{{ url('/images/logo-no-bg.png') }}" alt="Logo" style="width:150px;" class="rounded-pill">
        </a>
        </div>
        <div class="container-fluid justify-content-center">
          <p class="h5">Name</p>
        </div>
        <ul class="nav nav-pills flex-column px-1 flex-grow-1 justify-content-center w-100">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.users')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.travels')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.community_posts')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.reviews')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#">@lang('admin.navbar_items.orders')</a>
          </li>
        </ul>
        <div class="container-fluid justify-content-center">
          <a href="#" class="btn btn-danger">@lang('admin.navbar_items.logout')</a>
        </div>
      </nav>
      </div>
      <div class="col-md-10 mt-4">
        <main>
          @yield('content')
        </main>
      </div>
    </div>
  </div>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
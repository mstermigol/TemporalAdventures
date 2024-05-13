<!-- Author: Miguel Jaramillo -->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css">
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <link rel="shortcut icon" href="{{ url('/images/logo-no-bg.png') }}" type="image/x-icon">
  <title>@yield('title', 'Temporal Adventures')</title>
</head>

<body>

<nav class="navbar bg-light navbar-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand p-0 m-0" href="{{ route('admin.user.index') }}">
            <img src="{{ url('/images/logo-no-bg.png') }}" alt="Logo" class="rounded-pill my-logo-medium">
        </a>
        <h1 class="text-center text-dark">@lang('admin.navbar_items.title')</h1>
        <div class="d-flex justify-content-end align-items-center">
            <div class="dropdown no-style">
                <div class="nav-link dropdown-toggle" role="button" id="navbarDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false"> <i class="bi bi-globe"></i> </div>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <div class="dropdown-item"> <a class="nav-link" href="{{ route('admin.lang.setLang', ['lange' => 'en']) }}">@lang('app.navbar_items.english') <i> <img
                                src="{{ url('/images/usa-flag.png') }}" alt="USA flag" width="20px" height="15px"></i></a> </div>
                    <div class="dropdown-item"> <a class="nav-link" href="{{ route('admin.lang.setLang', ['lange' => 'es']) }}">@lang('app.navbar_items.spanish') <i> <img
                                src="{{ url('/images/spain-flag.png') }}" alt="Spain flag" width="20px" height="15px"></i></a> </div>
                </div>
            </div>
            <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>

    </div>
</nav>


  <div class="offcanvas offcanvas-start offcanvas-light" id="offcanvas-menu">
    <div class="offcanvas-header bg-light justify-content-between">
      <h2 class="offcanvas-title">{{ Auth::user()->getFirstName() }}</h2>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body bg-light">
      <ul class="flex-column pt-2 no-style d-flex mx-auto px-0">
        <li>
          <a class="btn btn-primary w-100 my-1 @if (Request::segment(2) == 'users') active @endif"
            href="{{ route('admin.user.index') }}">@lang('admin.navbar_items.users')</a>
        </li>
        <li>
          <a class="btn btn-primary w-100 my-1 @if (Request::segment(2) == 'travels') active @endif"
            href="{{ route('admin.travel.index') }}">@lang('admin.navbar_items.travels')</a>
        </li>
        <li>
          <a class=" btn btn-primary w-100 my-1 @if (Request::segment(2) == 'communityposts') active @endif"
            href="{{ route('admin.communitypost.index') }}">@lang('admin.navbar_items.community_posts')</a>
        </li>
        <li>
          <a class="btn btn-primary w-100 my-1 @if (Request::segment(2) == 'reviews') active @endif"
            href="{{ route('admin.review.index') }}">@lang('admin.navbar_items.reviews')</a>
        </li>
        <li>
          <a class="btn btn-primary w-100 my-1  @if (Request::segment(2) == 'orders') active @endif"
            href="{{ route('admin.order.index') }}">@lang('admin.navbar_items.orders')</a>
        </li>
      </ul>
      <div class="container-fluid d-flex justify-content-center mb-2">
        <a href="{{ route('home.index') }}" class="btn btn-primary">@lang('admin.navbar_items.user_section')</a>
      </div>
      <div class="container-fluid d-flex justify-content-center mt-4">
        <form id="logout" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">@lang('admin.navbar_items.logout')</button>
        </form>
      </div>
    </div>
  </div>

  <div class="container-fluid d-flex justify-content-center">
    <div class="col-md-10 mt-4">
      <main>
        @yield('content')
      </main>
    </div>
  </div>




</body>

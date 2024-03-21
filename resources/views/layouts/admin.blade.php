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

    <nav class="navbar navbar-expand-sm bg-light navbar-light d-sm-block d-md-none sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand p-0 m-0" href="#">
                <img src="{{ url('/images/logo-no-bg.png') }}" alt="Logo" class="rounded-pill my-logo-medium">
            </a>
            <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start offcanvas-light" id="offcanvas-menu">
        <div class="offcanvas-header bg-light justify-content-between">
            <h2 class="offcanvas-title">{{ Auth::user()->getFirstName() }}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body bg-light">
            <ul class="flex-column pt-2">
                <li>
                    <a class="btn btn-primary w-100 my-1 @if (Request::segment(2) == 'users') active @endif"
                        href="{{ route('admin.user.index') }}">@lang('admin.navbar_items.users')</a>
                </li>
                <li>
                    <a class="btn btn-primary w-100 my-1 @if (Request::segment(2) == 'travels') active @endif" href="{{ route('admin.travel.index') }}>@lang('admin.navbar_items.travels')</a>
                </li>
                <li>
                    <a class=" btn btn-primary w-100 my-1 @if (Request::segment(2)=='communityposts' ) active @endif"
                        href="{{ route('admin.communitypost.index')}}">@lang('admin.navbar_items.community_posts')</a>
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
                        <a class="navbar-brand p-0 m-0" href="{{ route('admin.user.index') }}">
                            <img src="{{ url('/images/logo-no-bg.png') }}" alt="Logo" style="width:150px;"
                                class="rounded-pill">
                        </a>
                    </div>
                    <div class="container-fluid justify-content-center">
                        <p class="h5">{{ Auth::user()->getFirstName() }}</p>
                    </div>
                    <ul class="mt-4 flex-column px-1 flex-grow-1 justify-content-center w-100">

                        <li>
                            <a class="btn btn-primary w-100 my-1 @if (Request::segment(2) == 'users') active @endif"
                                href="{{ route('admin.user.index') }}">@lang('admin.navbar_items.users')</a>
                        </li>
                        <li>
                            <a class="btn btn-primary w-100 my-1 @if (Request::segment(2) == 'travels') active @endif"
                                href="{{ route('admin.travel.index') }}">@lang('admin.navbar_items.travels')</a>
                        </li>
                        <li>
                            <a class="btn btn-primary w-100 my-1  @if (Request::segment(2) == 'communityposts') active @endif"
                                href="{{ route('admin.communitypost.index')}}">@lang('admin.navbar_items.community_posts')</a>
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
                    <div class="container-fluid justify-content-center mb-2">
                        <a href="{{ route('home.index') }}"
                            class="btn btn-primary">@lang('admin.navbar_items.user_section')</a>
                    </div>
                    <div class="container-fluid justify-content-center mb-2">
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <button type="submit" class="btn btn-danger">@lang('admin.navbar_items.logout')</button>
                            @csrf
                        </form>
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




</body>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{asset('asset/css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('assets/img/now-logo.png')}}">
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}">
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">
        <div class="navbar-left">
          <a class="navbar-brand" href="/">
                <span class="text-danger">Blog CMS</span>
          </a>
        </div>
        @if (!Auth::check())
          <a class="btn btn-round btn-secondary text-success" href="{{route('login')}}">Login</a>
          @else
          <a class="btn btn-round btn-secondary text-success" href="{{route('posts.create')}}">Create Post</a>
        @endif
       
      </div>
    </nav><!-- /.navbar -->
      @yield('header')
    <!-- Header -->


    <!-- Main Content -->
    @yield('content')


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="/">Blog CMS</a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/WillieWilson"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/Code_the_guy"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/ilsonkiny/"><i class="fa fa-instagram"></i></a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="#">Elements</a>
              <a class="nav-link" href="#">Blocks</a>
              <a class="nav-link" href="#">About</a>
              <a class="nav-link" href="#">Blog</a>
              <a class="nav-link" href="#">Contact</a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->
    @yield('footer')
    <!-- Scripts -->
    <script src="{{asset('asset/js/page.min.js')}}"></script>
    <script src="{{asset('asset/js/script.js')}}"></script>

  </body>
</html>

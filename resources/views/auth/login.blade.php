<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        {{'Login'}}
    </title>

    <!-- Styles -->
    <link href="{{asset('asset/css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('asset/img/now-logo.png')}}">
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}">
  </head>
  <body class="layout-centered bg-img" style="background-image: url(../asset/img/bg/4.jpg);">
    <!-- Main Content -->
    <main class="main-content">

        <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
          <h3 class="mb-7 text-uppercase text-success text-center text-underline">Sign in</h3>

          <form method="POST" action="{{ route('login') }}">
              @csrf
            <div class="form-group row">
                <label for="email">{{ __('E-Mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror            
            </div>
            <div class="form-group flexbox py-3">
              <div class="custom-control custom-checkbox">
                {{-- <input type="checkbox" class="custom-control-input"> --}}
                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label">Remember me</label>
              </div>
              @if (Route::has('password.request'))
              <a class="text-muted small-2" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-info">
                    {{ __('Login') }}
                </button>
            </div>
          </form>
          <hr class="w-30">
          <p class="text-center text-muted small-2">Don't have an account? <a href="{{route('register')}}">Register here</a></p>
        </div>
  
      </main><!-- /.main-content -->
    <!-- Scripts -->
    <script src="{{asset('asset/js/page.min.js')}}"></script>
    <script src="{{asset('asset/js/script.js')}}"></script>

  </body>
</html>
  

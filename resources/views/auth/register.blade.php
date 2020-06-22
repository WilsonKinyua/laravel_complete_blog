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
          <h5 class="mb-2 text-center text-success">Create an account</h5>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
  
            <div class="form-group row">
                <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
  
            <div class="form-group row">
                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
  
            <div class="form-group row">
                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-block btn-primary">
                {{ __('Register') }}
            </button>
            </div>
          </form>

          <hr class="w-30">
  
          <p class="text-center text-muted small-2">Already a member? <a href="{{route('login')}}">Login here</a></p>
        </div>
  
      </main><!-- /.main-content -->
        <!-- Scripts -->
        <script src="{{asset('asset/js/page.min.js')}}"></script>
        <script src="{{asset('asset/js/script.js')}}"></script>
    
      </body>
    </html>

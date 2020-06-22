@extends('layouts.admin')

@section('title')

   Update Password {{$user->name}} 

@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-3">
        </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
          <h3 class="title">Update Password for: <span class="text-uppercase"><strong>{{$user->name}}</strong></span></h3>
          @include('partials.flash-messages') 
          {{-- @include('partials.errors')  --}}
          </div>
          <div class="card-body">
            <form action="{{route('user.update-password',$user->id)}}" method="POST">
                @csrf
                @method("PATCH")
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary col-md-12">Update Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-3">
      </div>
    </div>
  </div>
@endsection

@extends('layouts.admin')

@section('css')
    
@endsection

@section('title')

   Update Profile {{$user->name}} 
   
@endsection

@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
          <h3 class="title">Welcome : <span class="text-uppercase"><strong>{{$user->name}}</strong></span> To Update Profile Page</h3>
          @include('partials.flash-messages') 
          @include('partials.errors') 
          </div>
          <div class="card-body">
            <form action="{{route('update-profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
              <div class="row">
                <div class="col-md-5 pr-md-1">
                  <div class="form-group">
                    <label>Email (disabled)</label>
                    <input type="email" class="form-control text-danger" name="email" disabled=""  value="{{$user->email}}">
                  </div>
                </div>
                <div class="col-md-7 px-md-1">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Profile Picture</label>
                    <input type="file" name="photo_id" id="photo_id" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea rows="4" cols="80" class="form-control" name="about" value="">{{$user->about}}</textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary col-md-3">Update Profile</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-user">
          <div class="card-body">
            <p class="card-text">
              <div class="author">
                <div class="block block-one"></div>
                <div class="block block-two"></div>
                <div class="block block-three"></div>
                <div class="block block-four"></div>
                <a href="javascript:void(0)">
                  <img class="avatar" src="{{asset($user->photo ? $user->photo->file : Gravatar::src($user->email))}}" alt="...">
                  <h5 class="title">{{$user->name}}</h5>
                </a>
              </div>
            </p>
            <div class="card-description">
                <h5 class="title">About Me</h5>
             {{$user->about ? $user->about : ' Do not be scared of the truth because we need to restart the human foundation in truth And I love you like ...(CHANGE ME THIS IS A DEFAULT ABOUT ME)'}}
            </div>
          </div>
          <div class="card-footer">
            <div class="button-container">
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                <i class="fab fa-facebook"></i>
              </button>
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                <i class="fab fa-twitter"></i>
              </button>
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                <i class="fab fa-google-plus"></i>
              </button>
            </div>
              <div class="text-center">
                {!! Form::open(['method'=>"DELETE", 'action'=>["UsersController@destroyAccount" , $user->id] , 'files'=>true]) !!}
                {!! Form::submit('Delete Account',  ['class'=>'btn btn-danger col-md-12']) !!}
                {!! Form::close() !!}
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
    
@endsection
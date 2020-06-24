@extends('layouts.blog')

    @section('title')

        {{'Home Page'}}
        
    @endsection

@section('content')

    <!-- Header -->
    <header class="header text-white" style="background-image: url({{asset('asset/img/bg/1.jpg')}})" data-overlay="7">
      <div class="container text-center">

        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h3>Hello am Wilson, <span class="text-primary" data-typing="A Software Developer, Creator of this Blog CMS, Designer "></span></h3>
            <p class="lead-4">A Software Developer who loves involving himself with latest technologies. Feel free to contact me.</p>

            <br>
            <hr class="w-60px">
            <br>

            <a class="btn btn-lg btn-round btn-light" href="#posts">View Recents Posts</a>

          </div>
        </div>

      </div>
    </header><!-- /.header -->

  
<main id="posts"  class="main-content">
    <div class="section bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xl-9">
            <div class="row gap-y">
              @if ($posts)
              @forelse ($posts as $post)
              <div class="col-md-6" style="height:600px!important">
                <div class="card border hover-shadow-6 mb-6 d-block">
                  <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" width="100%" style="height:270px" src="{{asset($post->photo ? $post->photo->file : 'http://placehold.it/400x400')}}" alt="Card image cap"></a>
                  <div style="height:200px!important" class="p-6 text-center">
                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{route('blog.show',$post->id)}}">{{$post->category->name ? $post->category->name : 'No Category'}}</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show',$post->id)}}">{{$post->title ? $post->title : 'No title For This Post' }}</a></h5>
                  </div>
                </div>
              </div>
              @empty

              <p class="text-center">
                <div class="alert alert-danger">
                No search result found for <strong>{{request()->query('search')}}</strong>
                </div>
            </p>
            

              @endforelse
              @endif
            </div>
                @if ($posts)
                  {{$posts->appends(["search"=>request()->query('search')])->links()}}
                @endif
              
          </div>

          @include('partials.sidebar')

        </div>
      </div>
    </div>
  </main>
    
@endsection
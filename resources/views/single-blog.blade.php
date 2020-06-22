@extends('layouts.blog')

    @section('title')
        {{$post->title}}
    @endsection

        @if ($post)
        @section('header')
        <header class="header text-white h-fullscreen pb-80" style="background-image: url({{asset($post->photo ? $post->photo->file : '')}});" data-overlay="9">
            <div class="container text-center">
              <div class="row h-100">
                <div class="col-lg-8 mx-auto align-self-center">
                  <p class="opacity-70 text-uppercase small ls-1">{{$post->category ? $post->category->name : 'No Category'}}</p>
                    <h1 class="display-4 mt-7 mb-8">{{$post->title ? $post->title : 'No title for this Post'}}</h1>
                  <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#">{{$post->user ? $post->user->name : "Wilson Kinyua"}}</a></p>
                  <p><img class="avatar avatar-sm" src="{{asset($post->user->photo ? $post->user->photo->file : Gravatar::src($post->user->email))}}" alt="..."></p>
                </div>
                <div class="col-12 align-self-end text-center">
                  <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
                </div>
      
              </div>
      
            </div>
          </header><!-- /.header -->
      
            
        @endsection
    
        @section('content')
    
            <!-- Header -->
    
          
              <!-- Main Content -->
              <main class="main-content">
          
          
                <!--
                |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                | Blog content
                |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                !-->
                <div class="section" id="section-content">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12 mx-auto">
                        <blockquote class="blockquote">
                            <div class="quote-sign"></div>
                            <p>{!!$post->short_description ? $post->short_description : 'No description'!!}</p>
                            <footer>Description By: <cite title="Onemar Associates Inc.">{{$post->user ? $post->user->name : "Wilson Kinyua"}}.</cite></footer>
                          </blockquote>
                        <p class="lead">{!!$post->content ? $post->content : 'No Content for now'!!}.</p>
                        <hr class="w-100px">
                      </div>
                    </div>
         
                  </div>
                </div> 
                <!--
                |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                | Comments
                |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
                !-->
                <div class="section bg-gray">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-8 mx-auto">
                        <div class="media-list">
                          @if ($comments)
                          @forelse ($comments as $comment)
                          <div class="media">
                            <img class="avatar avatar-sm mr-4" src="{{asset($comment->photo ? $comment->photo : Gravatar::src($comment->user->email))}}" alt="...">
                            <div class="media-body">
                              <div class="small-1">
                                <strong>Maryam Amiri</strong>
                                <time class="ml-4 opacity-70 " datetime="">{{$comment->created_at->diffForHumans()}}</time>
                              </div>
                              <p class="small-2 mb-0">{{$comment->body}}</p>
                            </div>
                          </div>
                          @empty
                          <h1 class="display-4 mt-3 mb-5">No Comments For This Post</h1>
                          @endforelse
                          @endif
                        </div>
                        <h5 class="display-7 mt-7 mb-5">Leave a Comment</h5>
                        <hr>
                          @include('partials.flash-messages') 
                          @include('partials.errors') 
                            @if (Auth::check())
                            <form action="{{route('comments.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                              <div class="form-group">
                                <textarea class="form-control" name="body" placeholder="Comment" rows="4"></textarea>
                              </div>
                              <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                            </form>
                            @else
                            <a href="{{route('login')}}" class="btn btn-success btn-block">Sign in please to comment </a>
                            @endif
                      </div>
                    </div>
                  </div>
                </div>
              </main>
            @endsection
        @endif
    @section('footer')
    
    @endsection
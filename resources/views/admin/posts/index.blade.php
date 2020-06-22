@extends('layouts.admin')


@section('title')

   All Posts

@endsection


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                     <div>
                        <h2 class="card-title text-uppercase text-bold"> All Posts</h2>
                     </div>
                     <div>
                         <a class="btn btn-info" href="{{route('posts.create')}}">Add Post</a>
                     </div>
                     <div>
                        <a class="btn btn-primary" href="{{route('trashed-posts')}}">Trashed Posts</a>
                    </div>
                    </div>
                    @include('partials.flash-messages') 
                </div>
                    @if ($posts->count() > 0)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Category</th>
                                        <th>Comments
                                            <br>(Click the number to <br> view and approve <br> comments)
                                        </th>
    
                                        @if (Auth::check())
                                            @if (Auth::user()->isAdmin())
                                                <th>Created By</th>
                                            @endif
                                        @endif
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td><img style="width:120px!important; height:60px!important" class="rounded embed-responsive" src="{{asset($post->photo ? $post->photo->file : 'http://placehold.it/400x400')}}" alt=""></td>
                                            <td><a href="{{route('blog.show',$post->id)}}">{{Str::limit($post->title,50)}}</a></td>
                                            <td>{{$post->created_at->diffForHumans()}}</td>
                                            <td>{{$post->category ? $post->category->name : 'No category'}}</td>
                                            <td><a href="{{route('comments.show', $post->id)}}">{{$post->comments->count()}}</a></td>
                                            @if (Auth::check())
                                            @if (Auth::user()->isAdmin())
                                            <td>{{isset($post->user->name) ? $post->user->name : "Deleted User"}}</td>
                                            @endif
                                            @endif
                                            <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-success">Edit</a></td>
                                            <td>
                                                {!! Form::open(['method'=>"DELETE", 'action'=>["PostsController@destroy" , $post->id] , 'files'=>true]) !!}
                                                {!! Form::submit($post->trashed() ? 'Delete' : 'Trash', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <h1 class="text-center text-capitalize text-danger">No available Posts</h1>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

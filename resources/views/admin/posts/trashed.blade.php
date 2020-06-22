@extends('layouts.admin')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                     <div>
                        <h2 class="card-title text-uppercase text-bold"> All Trashed Posts</h2>
                     </div>
                     <div>
                        <a class="btn btn-secondary" href="{{route('posts.index')}}">View All Post</a>
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
                                    <th>Category</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td><img style="width:120px!important; height:60px!important" class="rounded embed-responsive" src="{{asset($post->photo ? $post->photo->file : 'http://placehold.it/400x400')}}" alt=""></td>
                                        <td>{{Str::limit($post->title,50)}}</td>
                                        <td>{{$post->category ? $post->category->name : 'No category'}}</td>
                                        @if (!$post->trashed())
                                        <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-success">Edit</a></td>
                                        @else
                                        <td>
                                            {!! Form::open(['method'=>"PUT", 'action'=>["PostsController@restore" , $post->id] , 'files'=>true]) !!}
                                            {!! Form::submit('Restore' , ['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                    </td>
                                        @endif
                                       
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
                <h1 class="text-center text-capitalize text-danger">No trashed Posts</h1>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection

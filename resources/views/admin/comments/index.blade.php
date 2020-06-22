@extends('layouts.admin')

@section('title')

   All Comments

@endsection


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                     <div>
                        <h2 class="card-title text-uppercase text-bold"> All comments</h2>
                     </div>
                     <div>
                        {{-- <a class="btn btn-primary" href="{{route('trashed-comments')}}">Trashed comments</a> --}}
                    </div>
                    </div>
                    @include('partials.flash-messages') 
                </div>
                    @if ($comments->count() > 0)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Id</th>
                                        <th>Post Title</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>{{$comment->post->title}}</td>
                                            <td>{{$comment->author}}</td>
                                            <td>{{Str::limit($comment->body,100)}}</td>
                                            <td>{{$comment->created_at->diffForHumans()}}</td>
                                            <td>
                                                @if ($comment->is_active == 1)
                                                {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentsController@update', $comment->id]]) !!}
                                                <input type="hidden" name="is_active" value="0">
                                                <div class="form-group">
                                                    {!! Form::submit('Un-approve', ['class'=>'btn btn-info']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                                    @else
                                                    {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentsController@update', $comment->id]]) !!}
                                                    <input type="hidden" name="is_active" value="1">
                                                    <div class="form-group">
                                                        {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                @endif
                                            </td>
                                            <td>
                                                {!! Form::open(['method'=>"DELETE", 'action'=>["CommentsController@destroy" , $comment->id] , 'files'=>true]) !!}
                                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <h1 class="text-center text-capitalize text-danger">No available comments</h1>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

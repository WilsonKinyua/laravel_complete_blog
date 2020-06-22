@extends('layouts.admin')

@section('title')

   All Tags

@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                     <div>
                        <h2 class="card-title text-uppercase text-bold"> All tags</h2>
                     </div>
                     <div>
                         <a class="btn btn-info" href="{{route('tags.create')}}">Add tag</a>
                     </div>
                    </div>
                    @include('partials.flash-messages') 
                </div>
                    @if ($tags->count() > 0)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Tag Name</th>
                                        <th>Created On</th>
                                        <th>Posts</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{Str::limit($tag->name,50)}}</td>
                                            <td>{{$tag->created_at->diffForHumans()}}</td>
                                            <td>{{$tag->posts->count()}}</td>
                                            <td><a href="{{route('tags.edit',$tag->id)}}" class="btn btn-success">Edit</a></td>
                                            @if (!$tag->posts->count() > 0)
                                            <td>
                                                {!! Form::open(['method'=>"DELETE", 'action'=>["TagsController@destroy" , $tag->id] , 'files'=>false]) !!}
                                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            @else
                                            <td><button disabled href="" class="btn btn-danger">Delete</button></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <h1 class="text-center text-capitalize text-danger">No available tags</h1>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

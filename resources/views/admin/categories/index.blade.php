@extends('layouts.admin')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                     <div>
                        <h2 class="card-title text-uppercase text-bold"> All categories</h2>
                     </div>
                     <div>
                         <a class="btn btn-info" href="{{route('categories.create')}}">Add category</a>
                     </div>
                    </div>
                    @include('partials.flash-messages') 
                </div>
                    @if ($categories->count() > 0)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Created On</th>
                                        <th>Posts</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{Str::limit($category->name,50)}}</td>
                                            <td>{{$category->created_at->diffForHumans()}}</td>
                                            <td>{{$category->posts->count()}}</td>
                                            <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-success">Edit</a></td>
                                            <td>
                                                {!! Form::open(['method'=>"DELETE", 'action'=>["CategoriesController@destroy" , $category->id] , 'files'=>false]) !!}
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
                    <h1 class="text-center text-capitalize text-danger">No available categories</h1>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

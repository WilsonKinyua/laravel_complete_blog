@extends('layouts.admin')


@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-8 mb-5 mt-5">
            <div class="d-flex justify-content-between mb-3">
                <div>
                   <h2 class="card-title text-uppercase text-bold"> All Todos</h2>
                </div>
               </div>
               @include('partials.flash-messages') 
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="text-primary">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($todos)

                            @forelse ($todos as $todo)
                                <tr>
                                    <td>{{$todo->title}}</td>
                                    <td>{{$todo->content}}</td>
                                    <td>{{$todo->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if ($todo->completed == 1)
                                        {!! Form::open(['method'=>'PATCH', 'action'=> ['TodosController@update', $todo->id]]) !!}
                                        <input type="hidden" name="completed" value="0">
                                        <div class="form-group">
                                            {!! Form::submit('Completed', ['class'=>'btn btn-info disabled']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                            @else
                                            {!! Form::open(['method'=>'PATCH', 'action'=> ['TodosController@update', $todo->id]]) !!}
                                            <input type="hidden" name="completed" value="1">
                                            <div class="form-group">
                                                {!! Form::submit('Not Completed', ['class'=>'btn btn-success']) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=>"DELETE", 'action'=>["TodosController@destroy" , $todo->id]]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <h2 class="title">No Todos</h2>
                            @endforelse
                            
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Create ToDo</h5>
                         @include('partials.errors') 
                </div>
                <div class="card-body">
                    <form action="{{route('todos.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title: </label>
                                    <input type="text" class="form-control" name="title" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea name="content" id="content" cols="10" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">Create Todo</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')


@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                     <div>
                        <h2 class="card-title text-uppercase text-bold"> All users</h2>
                     </div>
                     <div>
                         <a class="btn btn-info" href="{{route('users.create')}}">Add user</a>
                     </div>
                     <div>
                        <a class="btn btn-primary" href="{{route('user.trashed-accounts')}}">Trashed users</a>
                    </div>
                    </div>
                    @include('partials.flash-messages') 
                </div>
                    @if ($users->count() > 0)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>About</th>
                                        <th>Created At</th>
                                        <th>Make Admin</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{Str::limit($user->id,50)}}</td>
                                            <td><img style="width:120px!important; height:60px!important" class="rounded embed-responsive" src="{{asset($user->photo ? $user->photo->file : 'http://placehold.it/400x400')}}" alt=""></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->about ? Str::limit($user->about,20) : 'No User about'}}</td>
                                            <td>{{$user->created_at->diffForHumans()}}</td>
                                            <td>
                                               @if (!$user->trashed())
                                               @if (!$user->isAdmin())
                                               <form action="{{route('user.make-admin',$user->id)}}" method="POST">
                                                   @csrf
                                                   <button type="submit" class="btn btn-info">Make Admin</button>
                                               </form>
                                               @else
                                                   <button disabled class="btn btn-info">Already Admin</button>
                                               @endif
                                               @endif
                                            </td>
                                            <td>
                                                @if (!$user->trashed())
                                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-success">Edit</a>
                                                @endif
                                            </td>
                                            <td>
                                                {!! Form::open(['method'=>"DELETE", 'action'=>["UsersController@destroy" , $user->id] , 'files'=>true]) !!}
                                                {!! Form::submit( $user->trashed() ? 'Delete' : 'Trash',  ['class'=>'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <h1 class="text-center text-capitalize text-danger">No available users</h1>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

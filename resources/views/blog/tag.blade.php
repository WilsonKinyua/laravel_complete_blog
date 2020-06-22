@extends('layouts.blog')

@if ($category)

@section('title')

{{$category->name}}
    
@endsection


@section('header')
<!-- Header -->
<header class="header text-center text-white" style="background-image: linear-gradient(-225deg, rgb(19, 15, 54) 0%, rgb(32, 35, 37) 48%, rgb(20, 23, 26) 100%);">
<div class="container">

<div class="row">
<div class="col-md-8 mx-auto">

<h1>  {{$category->name}}</h1>
<p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>
</div>
</div>

</div>
</header><!-- /.header -->
@endsection
@section('content')
<!-- Main Content -->
<main class="main-content">
<div class="section bg-gray">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xl-9">
            <div class="row gap-y">
                @forelse ($posts as $post)
                <div  class="col-md-6">
                    <div class="card border hover-shadow-6 mb-6 d-block">
                        <a href="{{route('blog.show',$post->id)}}"><img width="100%" style="height:270px" class="card-img-top" src="{{asset($post->photo->file)}}" alt="Card image cap"></a>
                        <div class="p-6 text-center">
                            <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{$post->category->name}}</a></p>
                            <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show',$post->id)}}">{{$post->title}}</a></h5>
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


            </div>
            <div class="mt-5">
                {{$posts->appends(["search"=>request()->query('search')])->links()}}
            </div>
        </div>
        @include('partials.sidebar')
    </div>
</div>
</div>
</main>

@endsection
    
@endif
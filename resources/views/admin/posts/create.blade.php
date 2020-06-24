@extends('layouts.admin')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('title')

    Post {{isset($post) ?  $post->name : ''}} 

@endsection

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{isset($post) ? 'Edit Post' :'Create Post'}}</h5>
                         @include('partials.errors') 
                         <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>    
                            <strong>Note: Published time and date should be less than the date today if the post created is to be published now.</strong>
                        </div>
                </div>
                <div class="card-body">
                    <form action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            @if (isset($post))
                                @method('PUT')
                            @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title: </label>
                                    <input type="text" class="form-control" name="title" value="{{isset($post) ? $post->title : ''}} {{old('title')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($categories)
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" id="category_id" class="form-control text-danger">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                            @if (isset($post)) 
                                            @if ($category->id === $post->category->id) selected
                                             @endif 
                                             @endif
                                            >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-6 pl-md-1">
                                <div class="form-group">
                                    <label>Published At</label>
                                    <input id="published_at" type="text" name="published_at" class="form-control text-danger" value="{{old('published_at')}}">
                                </div>
                            </div>
                        </div>
                        @if ($tags)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tag</label>
                                    <div>
                                        <select name="tag_id" id="tag_id" class="form-control text-danger">
                                            @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description:</label>
                                    {{-- <textarea name="description" id="description" cols="10" class="form-control" rows="5">{{isset($post) ? $post->short_description : ''}}</textarea> --}}
                                    <input id="description" type="hidden" name="description" value="{{old('description')}}">
                                    <trix-editor input="description">{{isset($post) ? $post->short_description : ''}} </trix-editor>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content:</label>
                                    {{-- <textarea name="content" id="content" cols="30" class="form-control" rows="10">{{isset($post) ? $post->content : ''}}</textarea> --}}
                                    <input id="content" type="hidden" name="content" value="{{old('content')}}">
                                    <trix-editor input="content">{{isset($post) ? $post->content : ''}} </trix-editor>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            @if (isset($post))
                            <div class="form-group">
                                <img width="100%" height="500px"  src="{{asset($post->photo ? $post->photo->file : 'http://placehold.it/400x400')}}" alt="" class="img-responsive rounded">
                            </div>
                            @endif
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image:</label>
                                    <div class="">
                                        <input type="file" name="photo_id" id="photo_id" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{isset($post) ? 'Edit Post' :'Create Post'}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>
@endsection

@section('footer')

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#published_at', {

        enableTime: true,
        enableSeconds: true
    });

    $(document).ready(function() {
        $('.tags-selector').select2()
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection



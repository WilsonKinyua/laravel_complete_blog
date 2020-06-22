@extends('layouts.admin')

@section('title')

    Tag {{isset($tag) ?  $tag->name : ''}} 

@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{isset($tag) ? 'Edit tag' : 'Create tag'}}</h5>
                         @include('partials.errors') 
                </div>
                <div class="card-body">
                    <form action="{{isset($tag) ? route('tags.update',$tag->id) : route('tags.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($tag))
                            @method("PUT")
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tag Name: </label>
                                    <input type="text" class="form-control" name="name" value="{{isset($tag) ? $tag->name : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{isset($tag) ? 'Edit tag' : 'Create tag'}}</button>
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Editing Post</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Post Title:*</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
                </div>

                <div class="form-group">
                    <label for="body">Post Ticket:*</label>
                    <textarea class="form-control" rows="3" name="body">{{ $post->body }}</textarea>
                </div>

                <div class="form-group">
                    <label for="featured_image">Featured Image:</label>
                    <input type="file" name="featured_image" class="form-control" placeholder="image">
                    @if ($post->featured_image)
                        <img src="{{ url($post->featured_image) }}" width="300px">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

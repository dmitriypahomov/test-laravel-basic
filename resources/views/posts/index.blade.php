@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Posts</h1>
            <div>
                <a href="{{ route('posts.create')}}" class="btn btn-primary mb-3">Add Posts</a>
            </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Posts Title</td>
                        <td>Posts Body</td>
                        <td>Featured Image</td>
                        <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}} </td>
                        <td>{{$post->body}}</td>
                        @if ($post->featured_image)
                            <td>
                                <img src="{{ url($post->featured_image) }}" width="100px">
                            </td>
                        @else
                            <td> - </td>
                        @endif
                        <td>
                            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        <div>
    </div>
</div>
@endsection

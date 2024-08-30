@extends('layout/app')

@section('title' , 'edit post')

@section('content')

<style>
    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
</style>
<div class="form-container">
    <h2 class="text-center">Edit Post</h2>
    <form method="POST" action="{{ route('posts.update' , $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" value="{{$post->title}}" class="form-control" id="title" name="title" placeholder="Enter post title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Post Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter post content" required>{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="category">Categories</label>
                <select class="form-control" id="category" name="category">
                    <option value="programming">Programming</option>
                    <option value="funny">Funny</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input type="file" class="form-control" value="{{$post->image}}" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>
</div>
@endsection
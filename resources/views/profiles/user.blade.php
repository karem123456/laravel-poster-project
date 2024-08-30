@extends('layout/app')

@section('title' , 'profile')

@section('content')
<style>
.profile-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}
.profile-image {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 20px;
}
    .post {
        margin: 20px auto;
        max-width: 800px;
    }
    .post img {
        width: 600px;
        height: 500px;
    }
</style>

<div class="profile-container text-center">
    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Image" class="profile-image">
    <h2>{{ auth()->user()->name }}</h2>
    <p>{{ auth()->user()->email }}</p>
    <a class="btn btn-outline-info my-2 my-sm-1" href="{{route('profile.edit')}}">Edit profile</a>
    <br>
    <a class="btn btn-outline-success my-2 my-sm-1" href="{{route('posts.create')}}">Create Post</a>
</div>

<main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
    <h2>Your Posts</h2>
    <hr>
    @foreach ($posts as $post)
    <div class="post">
        <h3>{{$post->title}}</h3>
        <p>{{$post->content}}</p>
        @if ($post->image)
        <img src="{{asset('storage/' .$post->image)}}" class="img-fluid">
        @endif
        <a href="{{route('posts.view' , $post->id)}}" class="btn">🤔comment</a>
        <br>
        <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-outline-info my-2 my-sm-1">edit</a>
        <form action="{{route('posts.delete' , $post->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete" class="btn btn-outline-danger my-2 my-sm-1">
        </form>
    </div>
    <hr>
    @endforeach

</main>

@endsection
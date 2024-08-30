@extends('layout/app')

@section('title' , 'user profile')

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
        <img src="{{asset('storage/' . $user->image)}}" alt="User Image" class="profile-image">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->email }}</p>
    </div>
    
    <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
        <h2>{{$user->name}} Posts</h2>
        <hr>
        @foreach ($posts as $post)
        <div class="post">
            <h3>{{$post->title}}</h3>
            <p>{{$post->content}}</p>
            @if ($post->image)
            <img src="{{asset('storage/' .$post->image)}}" class="img-fluid">
            @endif
            <a href="{{route('posts.view' , $post->id)}}" class="btn">🤔comment</a>
        </div>
        <hr>
        @endforeach
    
    </main>
    
@endsection
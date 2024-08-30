@extends('layout/app')

@section('title' , 'home')

@section('content')
<style>
    .sidebar {
        background-color: #343a40;
        color: white;
    }
    .sidebar .nav-link {
        color: white;
    }
    .post {
        margin: 20px auto;
        max-width: 900px;
    }
    .post img {
        width: 400px;
        height: 400px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar -->
        <nav class="col-md-3 d-none d-md-block sidebar">
            <div class="sidebar-sticky">
                <h5 class="sidebar-heading">Categories</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('categories' , 'all')}}">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('categories' , 'programming')}}">Programming</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories' , 'funny')}}">Funny</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories' , 'other')}}">Other</a>
                    </li>
                    <!-- Add more users as needed -->
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
            <h2>Posts</h2>
            <hr>
            @foreach ($posts as $post)
            <div class="post">
                <a href="{{route('usersprofile' , $post->user_id)}}">
                    <img src="{{asset('storage/' . $post->user->image)}}" alt="" style="width: 60px;height: auto;" class="rounded-circle shadow custom-img">
                    <h5>{{$post->user->name}}</h5>
                </a>
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
                @if ($post->image)
                    <img src="{{asset('storage/' .$post->image)}}" class="img-fluid">
                @endif
                <br>
                <a href="{{route('posts.view' , $post->id)}}" class="btn">🤔comment</a>
            </div>
            <hr>
            @endforeach

        </main>
    </div>
</div>

@endsection

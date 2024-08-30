@extends('layout/app')

@section('title' , 'posta')

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
        width: 600px;
        height: 500px;
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
                        <a class="nav-link active" href="{{route('categories' , 'programming')}}">programming</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories' , 'funny')}}">funny</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories' , 'other')}}">other</a>
                    </li>
                    <!-- Add more users as needed -->
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
            <a href="{{url()->previous();}}" class="btn btn-info">back</a>
            <hr>
            <div class="post">
                <a href="{{route('usersprofile' , $post->user_id)}}">
                    <img src="{{asset('storage/' . $post->user->image)}}" alt="" style="width: 60px;height: auto;" class="rounded-circle shadow custom-img">
                    <h5>{{$post->user->name}}</h5>
                </a>
                <h3>{{$post->title}}</h3>
                <h5>{{$post->categories}}</h5>
                <p>{{$post->content}}</p>
                @if ($post->image)
                    <img src="{{asset('storage/' .$post->image)}}" class="img-fluid">
                @endif
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h5>Comments</h5>
                        </div>
                        <div class="card-body">
                            <!-- Comment Form -->
                            <form action="{{route('posts.create.comment' , $post->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Leave a comment:</label>
                                    <textarea class="form-control" id="comment" rows="3" name = 'text'></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">send</button>
                            </form>
                            <hr>
                            <!-- Comments List -->
                            @foreach ($comments as $comment)
                            <div class="media mb-4">
                                <img class="mr-3 rounded-circle" style="width: 50px;height: 50px" src="{{asset('storage/' . $comment->user->image)}}" alt="User Avatar">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$comment->user->name}}</h5>
                                    {{$comment->text}}
                                </div>
                            </div>
                            @endforeach
            
            </div>
        </main>
    </div>
</div>


@endsection
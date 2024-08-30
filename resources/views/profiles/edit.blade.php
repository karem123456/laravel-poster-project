@extends('layout/app')

@section('title' ,'edit profile')

@section('content')

<style>
    .login-container {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
</style>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  
<div class="login-container mx-auto">
    <h2 class="text-center">Edit your profile🤓</h2>
    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="mb-4">
            <label for="email" class="form-label">User name</label>
            <input type="text" name="name"class="form-control" value="{{auth()->user()->name}}" id="email" placeholder="Enter name">
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password"class="form-control" id="password" placeholder="Password">
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Confirm Password</label>
            <input type="password" name="cpassword"class="form-control" id="password" placeholder="Password">
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email"class="form-control" value="{{auth()->user()->email}}" id="email" placeholder="Enter email">
        </div>
        <div class="mb-4">
            <label for="image" class="form-label">Profile Image</label>
            <input type="file" class="form-control" value="{{auth()->user()->image}}" id="image" name="image">
        </div>
        <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">update</button>
    </form>
</div>

    
@endsection
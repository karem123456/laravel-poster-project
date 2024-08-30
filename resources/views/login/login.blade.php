@extends('layout/app')

@section('title' , 'login')

@section('content')
    
<head>
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

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <ul>
                    <li>{{$error}}</li>
                </ul>
            @endforeach
        </div>
    @endif

    <div class="login-container mx-auto">
        <h2 class="text-center">Log In</h2>
        <form action="{{route('login.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">User Name</label>
                <input type="text" name="name" class="form-control" id="email" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign In</button>
            <a href="{{route('forgetpass')}}">forget password?</a>
        </form>
    </div>

</html>


@endsection
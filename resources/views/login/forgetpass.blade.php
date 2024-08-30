@extends('layout/app')

@section('title' , 'resset password')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  
                @if(session('success'))
                    <div class="alert alert-success">
                     {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <h4 class="card-title text-center">Forgot Password</h4>
                    <form action="{{route('forgetpass.store')}}" method="post">
                        @csrf
                        <p>I will send password link to your email. </p>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
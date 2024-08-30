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
                <div class="card-body">
                    <h4 class="card-title text-center">set your new password</h4>
                    <form action="{{route('ressetpass.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="email">password</label>
                            <input type="password" class="form-control" id="email" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group">
                            <label for="email">confirm password</label>
                            <input type="password" class="form-control" id="email" name="cpassword" placeholder="Enter your confirm password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
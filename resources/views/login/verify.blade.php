@extends('layout/app')

@section('title' , 'verifiction email')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                @if(session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div>
                @endif

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

                    <h1>please verify your email</h1>
                    
                    <form action="{{route('verification.send')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">the email don't send ?</label>
                            <button class="btn btn-primary btn-block">Resend email</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
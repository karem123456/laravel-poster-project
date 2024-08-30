@extends('layout/app')

@section('title' , 'contact me')

@section('content')
    
  <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5>Contact Me</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <p>You can message me from here or email me at 
                                <a href="mailto:lotfyk947@gmail.com">lotfyk947@gmail.com</a>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name = "name" type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name = "email" type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name = "massege" class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
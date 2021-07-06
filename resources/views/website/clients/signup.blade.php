@extends('layouts.website.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="text-center text-white my-4">Sign Up</h3>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('clients.store')}}" method="POST">
                        @csrf
                    <input type="hidden">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" required placeholder="Enter Your Email Address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" required placeholder="Enter Your Password">
                    </div>
                    <button type="submit" class="btn btn-success">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.website.main')

@section('content')
    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-4 mb-3">Oops, something went wrong.</h1>
                <p class="lead mb-4">
                    An unexpected error occurred on our side. Our team has been notified and we are working to fix it.
                </p>
                <a href="{{ route('home') }}" class="btn btn-primary px-4">
                    Go back to Home
                </a>
            </div>
        </div>
    </section>
@endsection



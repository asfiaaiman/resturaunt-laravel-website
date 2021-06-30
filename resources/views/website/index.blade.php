@extends('layouts.website.main')
@section('content')
<main id="main">
@include('home_components.about')
@include('home_components.whyus')
    @include('home_components.menu')
    @include('home_components.specials')
    @include('home_components.events')
    @include('home_components.contact')

</main>




@endsection



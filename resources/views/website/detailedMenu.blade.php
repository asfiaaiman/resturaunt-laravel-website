@extends('layouts.website.main')
@section('content')
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu</h2>
                <p>Check Our Tasty Menu</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">

                        @forelse($foodtypes as $foodtype)
                            <li data-filter=".filter-{{ $foodtype->name }}">{{ $foodtype->name }}</li>
                        @empty
                            <li>No Food Type is here now</li>
                        @endforelse

                    </ul>
                </div>
            </div>
            @forelse($foodtypes as $foodtype)
                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                    @forelse($foodtype->foods as $food)

                        <div class="col-lg-6 menu-item filter-{{ $foodtype->name }}">
                            <img src="{{asset('storage/foods/images/'.$food->image)}}" class="menu-img" alt="">
                            <div class="menu-content">
                                <a href="#">{{ $food->name }}</a><span>${{ $food->price }}</span>
                            </div>
                            <a href="" class="btn btn-orange">Add to Cart</a>

                        </div>
                @empty
                @endforelse
                </div>
            @empty
                no food type still here
            @endforelse
        </div>
    </section><!-- End Menu Section -->

@endsection

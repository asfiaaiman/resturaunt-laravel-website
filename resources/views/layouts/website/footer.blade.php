@php
    $restaurantPhone = config('app.restaurant_phone');
    $restaurantHours = config('app.restaurant_hours');
    $restaurantEmail = config('app.restaurant_email');
    $restaurantAddress = config('app.restaurant_address');
    $socialFacebook = config('app.restaurant_facebook');
    $socialInstagram = config('app.restaurant_instagram');
    $socialTwitter = config('app.restaurant_twitter');
    $socialLinkedin = config('app.restaurant_linkedin');
    $latestEvents = \App\Models\Event::where('status', '1')->latest()->take(3)->get();
@endphp

<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
                <a href="{{route('home')}}" class="logo mr-auto">
                    <img src="{{asset('website-assets/assets/img/logo.png') }}" alt="{{ config('app.name') }}" class="img-fluid">
                </a>
              <p>
                {{ $restaurantAddress }}<br><br>
                <strong>Phone:</strong> {{ $restaurantPhone }}<br>
                <strong>Email:</strong> {{ $restaurantEmail }}<br>
              </p>
              <div class="social-links mt-3">
                @if($socialTwitter)
                    <a href="{{ $socialTwitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                @endif
                @if($socialFacebook)
                    <a href="{{ $socialFacebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                @endif
                @if($socialInstagram)
                    <a href="{{ $socialInstagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                @endif
                @if($socialLinkedin)
                    <a href="{{ $socialLinkedin }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                @endif
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Explore</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#menu">Menu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#specials">Specials</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#events">Events</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Highlights</h4>
            <p class="mb-2">
                <i class="icofont-clock-time icofont-rotate-90"></i>
                <strong>Open Hours:</strong><br>
                {{ $restaurantHours }}
            </p>
            @if($latestEvents->isNotEmpty())
                <h5 class="mt-3">Latest Events</h5>
                <ul>
                    @foreach($latestEvents as $event)
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="#events">{{ $event->title }}</a>
                            @if($event->price)
                                <span class="ml-1">- ${{ $event->price }}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
          <div class="copyright">
              &copy; {{ now()->year }}
              <strong><span>{{ config('app.name') }}</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
              <span>Crafted with ❤️ for food lovers.</span>
          </div>
      </div>
    </div>
  </footer><!-- End Footer -->

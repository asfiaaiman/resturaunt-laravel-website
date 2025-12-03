
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex">
    <div class="contact-info mr-auto">
      <i class="icofont-phone"></i> {{ config('app.restaurant_phone', '+1 5589 55488 55') }}
      <span class="d-none d-lg-inline-block">
          <i class="icofont-clock-time icofont-rotate-180"></i>
          {{ config('app.restaurant_hours', 'Mon-Sat: 11:00 AM - 23:00 PM') }}
      </span>
    </div>
    <div class="languages">
      <ul>
        <li>{{ __('website.languages.' . app()->getLocale()) }}</li>
        @foreach(config('app.available_locales', []) as $locale)
            @if($locale !== app()->getLocale())
                <li>
                    <a href="{{ route('locale.switch', $locale) }}">{{ __('website.languages.' . $locale) }}</a>
                </li>
            @endif
        @endforeach
      </ul>
    </div>
  </div>
</div>

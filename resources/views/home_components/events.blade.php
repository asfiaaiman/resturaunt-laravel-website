<!-- ======= Events Section ======= -->
<section id="events" class="events">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Events</h2>
            <p>Organize Your Events in our Restaurant</p>
        </div>

        <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="100">
            @forelse($events as $event)
            <div class="row event-item">
                <div class="col-lg-6">
                    <img src="{{ asset($event->image) }}" class="img-fluid" alt="{{ $event->title }}">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>{{ $event->title }}</h3>
                    @if($event->price)
                    <div class="price">
                        <p><span>${{ $event->price }}</span></p>
                    </div>
                    @endif
                    @if($event->short_description)
                    <p class="font-italic">
                        {{ $event->short_description }}
                    </p>
                    @endif
                    <ul>
                        @if($event->bullet_1)
                        <li><i class="icofont-check-circled"></i> {{ $event->bullet_1 }}</li>
                        @endif
                        @if($event->bullet_2)
                        <li><i class="icofont-check-circled"></i> {{ $event->bullet_2 }}</li>
                        @endif
                        @if($event->bullet_3)
                        <li><i class="icofont-check-circled"></i> {{ $event->bullet_3 }}</li>
                        @endif
                    </ul>
                    @if($event->description)
                    <p>
                        {{ $event->description }}
                    </p>
                    @endif
                    <div class="mt-3">
                        <a href="#" class="book-a-table js-open-event-booking">
                            Book an Event
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center">No events are available at the moment.</p>
            @endforelse
        </div>

        <!-- Event Booking Custom Modal -->
        <div id="eventBookingOverlay" class="event-booking-overlay">
            <div class="event-booking-modal">
                <button type="button" class="event-booking-close js-close-event-booking">&times;</button>
                <h2>Book an Event</h2>
                <p>Send us your event details</p>
                <form action="{{ route('events.book') }}" method="POST" class="event-booking-form">
                    @csrf
                    <div class="form-row">
                        <div class="col-lg-4 col-md-6 form-group">
                            <select name="event_id" class="form-control">
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone">
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="date" name="date" class="form-control" placeholder="Date">
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="time" name="time" class="form-control" placeholder="Time">
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="number" name="people" class="form-control" placeholder="# of people" min="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" rows="5" class="form-control" placeholder="Additional details (optional)"></textarea>
                    </div>
                    <div class="event-booking-feedback">
                        <div class="event-booking-success d-none"></div>
                        <div class="event-booking-error d-none"></div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" class="book-a-table">Book Event</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var overlay = document.getElementById('eventBookingOverlay');
                if (!overlay) {
                    return;
                }

                var openButtons = document.querySelectorAll('.js-open-event-booking');
                var closeButtons = document.querySelectorAll('.js-close-event-booking');
                var form = overlay.querySelector('.event-booking-form');

                openButtons.forEach(function (btn) {
                    btn.addEventListener('click', function (e) {
                        e.preventDefault();
                        overlay.classList.add('active');
                    });
                });

                closeButtons.forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        overlay.classList.remove('active');
                    });
                });

                overlay.addEventListener('click', function (e) {
                    if (e.target === overlay) {
                        overlay.classList.remove('active');
                    }
                });

                if (form) {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();

                        var submitBtn = form.querySelector('button[type="submit"]');
                        var successBox = form.querySelector('.event-booking-success');
                        var errorBox = form.querySelector('.event-booking-error');

                        successBox.classList.add('d-none');
                        errorBox.classList.add('d-none');
                        successBox.textContent = '';
                        errorBox.textContent = '';

                        var formData = new FormData(form);

                        if (submitBtn) {
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                                'Accept': 'application/json'
                            },
                            body: formData
                        }).then(function (response) {
                            if (submitBtn) {
                                submitBtn.disabled = false;
                            }

                            if (response.ok) {
                                return response.json().then(function (data) {
                                    successBox.textContent = data.message || 'Your booking was submitted successfully.';
                                    successBox.classList.remove('d-none');
                                    form.reset();
                                });
                            }

                            return response.json().then(function (data) {
                                var message = 'Something went wrong. Please try again.';

                                if (data && data.errors) {
                                    var parts = [];
                                    Object.keys(data.errors).forEach(function (key) {
                                        if (Array.isArray(data.errors[key])) {
                                            parts = parts.concat(data.errors[key]);
                                        }
                                    });
                                    if (parts.length) {
                                        message = parts.join(' ');
                                    }
                                }

                                errorBox.textContent = message;
                                errorBox.classList.remove('d-none');
                            });
                        }).catch(function () {
                            if (submitBtn) {
                                submitBtn.disabled = false;
                            }
                            errorBox.textContent = 'Unable to submit your booking. Please check your connection and try again.';
                            errorBox.classList.remove('d-none');
                        });
                    });
                }
            });
        </script>

    </div>
</section><!-- End Events Section -->

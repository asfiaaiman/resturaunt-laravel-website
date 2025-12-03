<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
          <iframe frameborder="0" allowfullscreen src="https://www.google.com/maps/d/embed?mid=1_wV22amgac2Wt4gvMqstKu57Fg0" style="border:0; width: 100%; height: 350px;"></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Islamabad, Pakistan</p>
              </div>

              <div class="open-hours">
                <i class="icofont-clock-time icofont-rotate-90"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  11:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+92 304 123456</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{route('home.store')}}" method="POST" class="contact-form">
                @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="contact-name" placeholder="Your Name" data-rule="minlen:4" required/>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="contact-email" placeholder="Your Email" data-rule="email"  required/>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="contact-subject" placeholder="Subject" required/>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="8" required placeholder="Message"></textarea>
              </div>
              <div class="contact-feedback mb-2">
                  <div class="contact-success d-none"></div>
                  <div class="contact-error d-none"></div>
              </div>
              <div class="text-center"><button class="btn btn-orange" type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>

      <script>
          document.addEventListener('DOMContentLoaded', function () {
              var form = document.querySelector('.contact-form');
              if (!form) {
                  return;
              }

              form.addEventListener('submit', function (e) {
                  e.preventDefault();

                  var submitBtn = form.querySelector('button[type="submit"]');
                  var successBox = form.querySelector('.contact-success');
                  var errorBox = form.querySelector('.contact-error');

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
                          'X-CSRF-TOKEN': form.querySelector('input[name=\"_token\"]').value,
                          'Accept': 'application/json'
                      },
                      body: formData
                  }).then(function (response) {
                      if (submitBtn) {
                          submitBtn.disabled = false;
                      }

                      if (response.ok) {
                          return response.json().then(function (data) {
                              successBox.textContent = data.message || 'Your message was sent successfully.';
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
                      errorBox.textContent = 'Unable to submit your message. Please check your connection and try again.';
                      errorBox.classList.remove('d-none');
                  });
              });
          });
      </script>

    </section><!-- End Contact Section -->

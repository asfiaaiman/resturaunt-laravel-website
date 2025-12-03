<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
<!-- Vendor JS Files -->
<script src="{{asset('website-assets/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{asset('website-assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('website-assets/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{asset('website-assets/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{asset('website-assets/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{asset('website-assets/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{asset('website-assets/assets/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{asset('website-assets/assets/vendor/aos/aos.js') }}"></script>
<!-- Template Main JS File -->
<script src="{{asset('website-assets/assets/js/main.js') }}"></script>

<style>
    .event-booking-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.8);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 10000;
    }

    .event-booking-overlay.active {
        display: flex;
    }

    .event-booking-modal {
        background: #1a1814;
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 30px;
        max-width: 900px;
        width: 90%;
    }

    .event-booking-modal h2 {
        color: #fff;
        margin-bottom: 10px;
    }

    .event-booking-modal p {
        margin-bottom: 20px;
    }

    .event-booking-close {
        background: transparent;
        border: 0;
        color: #fff;
        font-size: 24px;
        position: absolute;
        top: 15px;
        right: 20px;
        cursor: pointer;
    }

    .event-booking-feedback {
        margin-top: 10px;
    }

    .event-booking-success {
        color: #fff;
        background: #28a745;
        padding: 8px 12px;
        font-size: 14px;
    }

    .event-booking-error {
        color: #fff;
        background: #dc3545;
        padding: 8px 12px;
        font-size: 14px;
    }
</style>

@livewireScripts

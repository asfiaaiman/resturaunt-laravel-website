 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">
 <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
     <div class="row">
       <div class="col-lg-8">
         <h1>Welcome to <span>Eat It</span></h1>
         <h2>Delivering great food for more than 18 years!</h2>
         @php
             $onHome = request()->routeIs('home');
         @endphp
         <div class="btns">
           <a href="{{ $onHome ? '#menu' : route('detailedMenu') }}"
              class="btn-menu animated fadeInUp scrollto">
               {{ __('website.menu') }}
           </a>
           <a href="{{ $onHome ? '#book-a-table' : route('detailedMenu') }}"
              class="btn-book animated fadeInUp scrollto">
               {{ __('website.book_order') }}
           </a>
         </div>
       </div>
       <div class="col-lg-4 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
         <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
       </div>
     </div>
   </div>
 </section><!-- End Hero -->

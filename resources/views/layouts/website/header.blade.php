<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <!-- <h1 class="logo mr-auto"><a href="index.html">Restaurantly</a></h1> -->
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="/home" class="logo mr-auto"><img src="{{asset('website-assets/assets/img/logo.png') }}" alt="" class="img-fluid"></a>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="/home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="/detailedMenu">Menu</a></li>
        <li><a href="#specials">Specials</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="#contact">Contact</a></li>
          <li class="book-a-table text-center"><a href="{{route('detailedMenu')}}" >Book an Order</a></li>
        <li><a href=""><i class="icofont-shopping-cart"></i></a></li>
          <li class="dropdown">
              <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-accessible-icon"></i>User
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <a href="{{route('clients.signup')}}" class="dropdown-item" type="button">Sign Up</a>
                  <a href="{{route('clients.signin')}}">Sign In</a>
                  <a href="{{route('logout')}}">Log Out</a>
              </div>
          </li>

      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->

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
                  <i class="fa fa-user"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <a data-toggle="modal" data-target="#exampleModal">Sign Up</a>
                  <a data-toggle="modal" data-target="#exampleModal1">Sign In</a>
                  <a href="{{route('logout')}}">Log Out</a>
              </div>
          </li>

      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h3 class="text-center text-white my-4 text-dark">Sign Up Form</h3>
                  @if(count($errors) > 0)
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <p>{{$error}}</p>
                          @endforeach
                      </div>
                  @endif
                  <form action="{{route('clients.store')}}" method="POST">
                          @csrf
                      <input type="hidden">
                      <div class="form-group">
                          <input type="text" class="form-control" name="name" required placeholder="Enter Your Name">
                      </div>
                      <div class="form-group">
                          <input type="email" class="form-control" name="email" required placeholder="Enter Your Email Address">
                      </div>
                      <div class="form-group">
                          <input type="password" class="form-control" name="password" required placeholder="Enter Your Password">
                      </div>
                      <button type="submit" class="btn btn-success">Sign Up</button>
                  </form>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h3 class="text-center text-white my-4 text-dark">Sign In</h3>
                  @if(count($errors) > 0)
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <p>{{$error}}</p>
                          @endforeach
                      </div>
                  @endif
                  <form action="{{route('signin')}}" method="POST">
                      @csrf
                      <input type="hidden">
                      <div class="form-group">
                          <input type="email" class="form-control" name="email" required placeholder="Enter Your Email Address">
                      </div>
                      <div class="form-group">
                          <input type="password" class="form-control" name="password" required placeholder="Enter Your Password">
                      </div>
                      <button type="submit" class="btn btn-success">Sign In</button>
                  </form>
              </div>
          </div>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>

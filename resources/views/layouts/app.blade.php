<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ trans('panel.site_title') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css" rel="stylesheet" /> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700&display=swap&subset=latin-ext" rel="stylesheet" />
  <link href="{{ asset('css/frontend.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet" />


  @yield('styles')
</head>

<body class="hold-transition login-page">


  <header class="top-navbar">
    <nav class="navbar navbar-expand-lg ms-auto navbar-light bg-light">
      <div class="container ">
        <a class="navbar-brand " href="{{route('homepage')}}">

          <img src="images/logo.png" alt="logo" class="logo-image">
          <!-- <img src="./images/coldsis-logo.png" alt="" class="logo-image"> -->
        </a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
                aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}"><span class="active-home">Home</span></a></li>

            <li class="nav-item"><a class="nav-link" href="{{ route('aboutpage') }}">About Us </a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="features.html">Certification Program </a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ route('getInTouchpage') }}">Get In Touch </a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right" id="">


            <li><a class="hover-btn-new btn-sign" href="{{ route('login') }}"><span>Sign In</span></a></li>
          </ul>

          <ul class="nav navbar-nav navbar-register " id="">
            <!-- <li><a class="hover-btn-new btn-donate text-danger " href="{{ route('register') }}" ><span>Register</span></a></li> -->
            <li><a class="hover-btn-new btn-donate text-danger " href="{{ route('registrationpage') }}"><span>Register</span></a></li>
          </ul>

        </div>
      </div>
    </nav>
  </header>

  @yield('content')

  <!-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                       @if (Route::has('register'))
                         <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                             @endif
                               @endauth
                                 </div>
                                  @endif -->

  <footer class="footer">
    <div class="footercontainer">
      <div class="row">

        <div class="col-lg-2">

          <img src="images/logo.png" alt="logo" class="footer-logo">
        </div>
        <div class="col-lg-2">
          <ul class="footer-links">
            <li>
              <h4>Quick Links</h4>
            </li>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">FAQ`s</a></li>
          </ul>
        </div>
        <div class="col-lg-2">
          <ul class="footer-links">
            <li>
              <h4>Features</h4>
            </li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Digital Certificate</a></li>
            <li><a href="#">Vacancies</a></li>
            <li><a href="#">Advertise with Us</a></li>
          </ul>
        </div>

        <div class="col-lg-2 text-lg-end">

        </div>
        <div class="col-lg-4 newsletter">

          <img src="images/chatlogo.png" alt="logo" class="chatlogo">

          </a>
          <h4>Sign up for our newsletter</h4>
          <p>Stay updated with our latest news and Announcements.</p>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Enter your email">
            <button class="btn btn-primary" type="button">Send</button>
          </div>
        </div>
      </div>
      <hr>
      <div class="footer-copyright my-auto">
        <div class="copyright">
          <p>&copy; <span id="year">
              <script>
                document.getElementById('year').appendChild(document.createTextNode(new Date().getFullYear()))
              </script>
            </span> Certverification.com</p>
        </div>
        <div class="terms">
          <a href="#">Terms</a> | <a href="#">Privacy</a> | <a href="#">Security</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.3/icheck.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//code.tidio.co/afyvghjudisapiko8kh4qcavv6xgn3zx.js" async></script>
  <script src="{{ asset('css/owlcarousel/owl.carousel.min.js') }} "></script>
  <script src="{{ asset('css/owlcarousel/owl.carousel.js') }}"></script>
  @yield('scripts')

  <script>
    (function($) {
      "use strict";
      // Initiate the wowjs

      $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 45,
        dots: false,
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
          0: {
            items: 2
          },
          576: {
            items: 3
          },
          768: {
            items: 4
          },
          992: {
            items: 4
          }
        }
      });

    })(jQuery);
  </script>
</body>

</html>
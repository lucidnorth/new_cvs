<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Certification Verification</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700&display=swap&subset=latin-ext" rel="stylesheet" />
  <link href="{{ asset('css/frontend.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  @yield('styles')
</head>

<body class="hold-transition login-page">
  <header class="top-navbar">
    <nav class="navbar navbar-expand-lg ms-auto navbar-light bg-light">
      <div class="container ">
        <a class="navbar-brand " href="{{route('homepage')}}">
          <img src="{{ asset('images/logo.png')}}" alt="logo" class="logo-image">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""><i class="fa fa-bars navbar-toggler-bar " aria-hidden="true"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}"><span class="active-home">Home</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('aboutpage') }}">About Us </a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('getInTouchpage') }}">Get In Touch </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" id="">
            @if (Auth::check())
            <li><a class="hover-btn-new btn-sign " href="{{ route('user.dashboard') }}"><span>Dashboard</span></a></li>
            @else
            <li><a class="hover-btn-new btn-sign " href="{{ route('login') }}"><span>Sign In</span></a></li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-register " id="">
            <li><a class="hover-btn-new btn-donate text-danger " href="{{ route('registrationpage') }}"><span>Register</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  @yield('content')
  <footer class="footer">
    <div class="footercontainer">
      <div class="row">

        <div class="col-lg-2">
          <a href="/">
            <img src="images/logo.png" alt="logo" class="footer-logo">
          </a>
        </div>
        <div class="col-lg-2">
          <ul class="footer-links">
            <li>
              <h4>Quick Links</h4>
            </li>

            <li><a href="{{ route('aboutpage') }}">About</a></li>
            <li><a href="{{ route('aboutpage') }}?tab=faqs">FAQ's</a></li>
          </ul>
        </div>
        <div class="col-lg-2">
          <ul class="footer-links">
            <li>
              <h4>Features</h4>
            </li>
            <li><a href="{{ route('homepage')}}?modal=verification">Verification</a></li>
            <li><a href="{{ route('homepage')}}?modal=digitalModal">Digital Certificate</a></li>
            <li><a href="{{ route('homepage')}}?modal=formModal">Vacancies</a></li>
            <li><a href="{{ route('getInTouchpage') }}?tab=advert">Advertise with Us</a></li>
          </ul>
        </div>

        <div class="col-lg-2 text-lg-end">

        </div>
        <div class="col-lg-4 newsletter">
          <h4>Sign up for our newsletter</h4>
          <p>Stay updated with our latest news and Announcements.</p>
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif

          @if($errors->any())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
          </div>
          @endif

          <form action="{{ route('newsletter.signup') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
              <button class="btn btn-primary" type="submit">Send</button>
            </div>
          </form>
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

//     document.addEventListener('DOMContentLoaded', function() {
//     const hash = window.location.hash;

//     if (hash) {
//         // Activate the tab
//         $('a[href="' + hash + '"]').tab('show');

//         // Scroll to the tab content (optional)
//         document.querySelector(hash).scrollIntoView({ behavior: 'smooth' });
//     }
// });



document.addEventListener('DOMContentLoaded', function() {
    // Function to activate a tab based on its ID
    function activateTab(tabID) {
        const tabLink = document.querySelector(`a[href="#${tabID}"]`);
        const tabContent = document.getElementById(tabID);

        if (tabLink && tabContent) {
            $(tabLink).tab('show'); // Activate the tab
            tabContent.scrollIntoView({ behavior: 'smooth' }); // Scroll to the section if needed
        }
    }

    // Check if there's a `tab` query parameter in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('tab');

    // If there's a tab parameter, activate the corresponding tab
    if (tabParam) {
        activateTab(tabParam);
    }
});



    document.addEventListener('DOMContentLoaded', function() {
      // Get the query parameter from the URL
      const urlParams = new URLSearchParams(window.location.search);
      const modalParam = urlParams.get('modal');

      // If the modal parameter exists, open the corresponding modal
      if (modalParam) {
        if (modalParam === 'verification') {
          $('#verificationModal').modal('show');
        } else if (modalParam === 'digitalModal') {
          $('#digitalModal').modal('show');
        } else if (modalParam === 'formModal') {
          $('#formModal').modal('show');
        }
      }
    });

  </script>
  @yield('scripts')
</body>

</html>
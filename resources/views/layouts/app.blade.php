<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Certification Verification</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css" rel="stylesheet" /> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700&display=swap&subset=latin-ext" rel="stylesheet" />
  <link href="{{ asset('css/frontend.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('css/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  @yield('styles')
</head>
<body class="hold-transition login-page">
  <header class="top-navbar">
    <nav class="navbar navbar-expand-lg ms-auto navbar-light bg-light">
      <div class="container ">
        <a class="navbar-brand " href="{{route('homepage')}}">
          <img src="{{ asset('images/logo.png')}}" alt="logo" class="logo-image">
          <!-- <img src="./images/coldsis-logo.png" alt="" class="logo-image"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""><i class="fa fa-bars navbar-toggler-bar " aria-hidden="true"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}"><span class="active-home">Home</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('aboutpage') }}">About Us </a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="features.html">Certification Program </a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ route('getInTouchpage') }}">Get In Touch </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" id="">
          @if (Auth::check())
            <li><a class="hover-btn-new btn-sign " href="{{ route('user.dashboard') }}"><span>Dashboard
                  </span></a></li>
                  @else
                  <li><a class="hover-btn-new btn-sign " href="{{ route('login') }}"><span>Sign
                  In</span></a></li>
                  @endif
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
            <li><a href="{{ route('aboutpage') }}#faqs">FAQ's</a></li>
          </ul>
        </div>
        <div class="col-lg-2">
        <ul class="footer-links">
            <li>
              <h4>Features</h4>
            </li>
            <li><a  href="{{ route('homepage')}}#verification">Verification</a></li>
            <li><a href="{{ route('homepage')}}#digitalcertification">Digital Certificate</a></li>
            <li><a href="{{ route('homepage')}}#workwithus">Vacancies</a></li>
            <li><a  href="{{ route('getInTouchpage') }}#advert">Advertise with Us</a></li>
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
        (function ($) {
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
                    0:{
                        items:2
                    },
                    576:{
                        items:3
                    },
                    768:{
                        items:4
                    },
                    992:{
                        items:4
                    }
                }
            });

        })(jQuery);






        document.addEventListener('DOMContentLoaded', function() {
    // Get the hash from the URL (e.g., #faqs or #vacancies)
    var hash = window.location.hash;

    // If a hash is present, handle the scroll and tab activation
    if (hash) {
        // Scroll to the section if it exists
        var section = document.querySelector(hash);
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        }

        // Activate the corresponding tab if it's a Bootstrap tab
        var tab = document.querySelector('a[href="' + hash + '"]');
        if (tab) {
            var bootstrapTab = new bootstrap.Tab(tab); // Bootstrap tab activation
            bootstrapTab.show(); // Show the corresponding tab
        }
    }
});

    // document.addEventListener('DOMContentLoaded', function() {
    //     // Get the hash from the URL (e.g., #faqs)
    //     var hash = window.location.hash;

    //     // Check if the hash exists and if it matches the FAQ section
    //     if (hash === '#faqs') {
    //         // If you are using a section, scroll to it
    //         var faqSection = document.querySelector(hash);
    //         if (faqSection) {
    //             faqSection.scrollIntoView({ behavior: 'smooth' });
    //         }

    //         // If you are using a tab system (like Bootstrap), activate the tab
    //         var faqTab = document.querySelector('a[href="' + hash + '"]');
    //         if (faqTab) {
    //             faqTab.click();
    //         }
    //     }
    // });


    document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        // Parse the URL hash to find the section and modal (if any)
        var hash = window.location.hash;
        console.log("Hash detected: " + hash);

        var hashParts = hash.split('&'); // Split the hash to get section and modal
        console.log("Hash parts: ", hashParts);

        if (hashParts.length > 0) {
            var sectionID = hashParts[0]; // The first part is the section (e.g., #sectionID)
            var modalParam = hashParts[1]; // The second part is the modal (e.g., modal=digitalModal)
            console.log("Section ID: " + sectionID);
            console.log("Modal Param: " + modalParam);

            // Scroll to the section if sectionID is valid
            if (sectionID) {
                var section = document.querySelector(sectionID);
                if (section) {
                    console.log("Scrolling to section: " + sectionID);
                    section.scrollIntoView({ behavior: 'smooth' });
                } else {
                    console.log("Section not found: " + sectionID);
                }
            }

            // Open the modal if the modal parameter is valid
            if (modalParam && modalParam.startsWith('modal=')) {
                var modalID = modalParam.split('=')[1]; // Extract the modal ID from the parameter
                var modalElement = document.getElementById(modalID);
                if (modalElement) {
                    console.log("Opening modal: " + modalID);
                    var modal = new bootstrap.Modal(modalElement);
                    modal.show();
                } else {
                    console.log("Modal not found: " + modalID);
                }
            }
        }
    }, 500); // Delay in milliseconds
});
    </script>
  @yield('scripts')
</body>

</html>
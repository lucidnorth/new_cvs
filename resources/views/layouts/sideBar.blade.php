<style>
  /* Styles for active state */
  .nav-link.active {
    background-color: #596CFF !important;
    /* Blue background */
    color: white !important;
    /* White text */
  }

  .nav-link.active .icon,
  .nav-link.active .icon i {
    color: white !important;
    /* White icon */
  }

  /* General styles for nav links */
  .nav-link {
    color: #000;
    /* Default text color */
  }

  .nav-link:hover {
    color: #007bff;
    /* Hover text color */
  }
</style>

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="/" target="">
      <img src="{{ asset('images/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
      <!-- <span class="ms-1 font-weight-bold">Certverification.com</span> -->
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
        </l>
        @if(auth()->user()->my_institution)
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('UploadCertificate') ? 'active' : '' }} " href="{{ route('UploadCertificate') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <!-- <i class="fas fa-cloud-upload-alt text-dark text-sm opacity-10"></i> -->
            <i class="bi bi-cloud-arrow-up-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Uploads</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->employer)
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('packages') ? 'active' : '' }} " href="{{ route('packages') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-box2-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Packages</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->employer)
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('verified') ? 'active' : '' }} " href="{{ route('verified') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-check-circle-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Verified</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('papers') ? 'active' : '' }}" href="{{ route('papers')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

            <i class="bi bi-file-earmark-arrow-up-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Papers</span>
        </a>
      </li>
      <!-- @if(auth()->user()->employer)
        <li class="nav-item">
          <a class="nav-link " href="{{ route('SearchCertificate')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-search text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Search</span>
          </a>
        </li>
        
        @endif -->
      @if(auth()->user()->employer)
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('skillsearch') ? 'active' : '' }}" href="{{ route('skillsearch')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-suitcase-lg-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Skill Search</span>
        </a>
      </li>
      @endif

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('faqs') ? 'active' : '' }}" href="{{ route('faqs')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-question-circle-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">FAQs</span>
        </a>
      </li>

      @if(auth()->user()->my_institution)
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('payment') ? 'active' : '' }}" href="{{ route('payment')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-credit-card-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Payments</span>
        </a>
      </li>
      @endif

      @if(auth()->user()->my_institution)
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('institutionVerifiedCerticate') ? 'active' : '' }}" href="{{ route('institutionVerifiedCerticate')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

            <i class="bi bi-check-circle-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Verified Cerificates</span>
        </a>
      </li>
      @endif

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('reports') ? 'active' : '' }}" href="{{ route('reports')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-file-earmark-text-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Reports</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('talktoUs') ? 'active' : '' }}" href="{{ route('talktoUs')}}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-chat-left-dots-fill text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Talk to Us</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-collection text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Log out</span>
        </a>
      </li>
      <!-- Hidden form for logout -->
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

    </ul>
  </div>

  <script>
    // Get all navigation links
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    // Add click event listener to each link
    navLinks.forEach(link => {
      link.addEventListener('click', function(event) {
        // Remove 'active' class from all links
        navLinks.forEach(link => link.classList.remove('active'));

        // Add 'active' class to the clicked link
        this.classList.add('active');
      });
    });
  </script>
</aside>
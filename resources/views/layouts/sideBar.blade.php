<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
            <img src="{{ asset('images/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">

            <!-- <span class="ms-1 font-weight-bold">Certverification.com</span> -->
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user.dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('profile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            @if(auth()->user()->employer)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('packages') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-money-bill-alt text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Packages</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->employer)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('verified') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-check-circle  text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Verified</span>
                </a>
            </li>
            @endif


            <li class="nav-item">
                <a class="nav-link " href="{{ route('papers')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-alt text-dark text-sm opacity-10"></i>
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
                <a class="nav-link " href="{{ route('papers')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-lightbulb text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Skill Search</span>
                </a>
            </li>

            @endif

            @if(auth()->user()->my_institution)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('papers')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-credit-card text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Payments</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->my_institution)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('papers')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-history text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">History</span>
                </a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link " href="{{ route('papers')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-chart-line text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Analytics</span>
                </a>
            </li>
            @if(auth()->user()->my_institution)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('UploadCertificate')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-cloud-upload-alt text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Uplaods</span>
                </a>
            </li>
            @endif


            @if(auth()->user()->employer)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('talk-to-us')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-certificate text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Talk to Us</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->employer)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('reports')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Reports</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->employer)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('faqs')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="fa-regular fa-circle-question text-dark text-sm opacity-10"></i> --}}
                        <i class="bi bi-question-circle-fill text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">FAQs</span>
                </a>
            </li>
            @endif


            <!-- <li class="nav-item">
          <a class="nav-link " href="../pages/billing.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li> -->
            <!-- <li class="nav-item">
          <a class="nav-link " href="../pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/rtl.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li> -->
            <!-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li> -->

            <!-- <li class="nav-item">
          <a class="nav-link " href="../pages/sign-in.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li> -->
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
    <!-- <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="../assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div> -->
</aside>

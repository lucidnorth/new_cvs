@extends('layouts.Dashboard')


@section('title', ' Dashboard-Laravel Admin Panel')
@section('content')

<main class="main-content position-relative border-radius-lg ">



  <div class="container-fluid py-4">
    <h5 class="text-white mb-3">Welcome {{ auth()->user()->name}}</h1>


      <!-- Institution dashboard -->

      <!-- Employer dashboard -->

      @if(auth()->user()->my_institution)
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">PAYMENTS DUE</p>
                    <h5 class="font-weight-bolder">
                      $53,000
                    </h5>
                    <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="{{ route('verified') }}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Verifications</p>
                      <h5 class="font-weight-bolder">
                      {{ $institutionSearchCount}}
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle pb-5">
                      <!-- <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i> -->
                      <i class="ni ni-check-bold ni-2x text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">UPLOAD GRADUATES DATA</p>
                    <h5 class="font-weight-bolder">
                      +3,462
                    </h5>
                    <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="{{ route('reports')}}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Reports</p>
                      <h5 class="font-weight-bolder">
                        Click to view reports
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                      <i class="ni ni-folder-17 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endif
      @if(auth()->user()->employer)
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="{{ route('packages') }}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Verification Left</p>
                      @if(auth()->user()->activePackage())
                      <h5 class="font-weight-bolder">

                        {{ auth()->user()->activePackage()->searches_left }}
                      </h5>
                      @else
                      <h5 class="font-weight-bolder">
                        No package
                      </h5>
                      @endif

                      <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                      <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                      <i class="ni ni-paper-diploma ni-2x text-lg opacity-10" aria-hidden="true"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="{{ route('verified') }}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Verifications</p>
                      <h5 class="font-weight-bolder">
                        {{ $searchCount }}
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle pb-5">
                      <!-- <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i> -->
                      <i class="ni ni-check-bold ni-2x text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="{{ route('papers')}}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Papers Submitted</p>
                      <h5 class="font-weight-bolder">
                        {{ $papersCount }}
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                      <i class="ni ni-single-copy-04 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="{{ route('reports')}}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Reports</p>
                      <h5 class="font-weight-bolder">
                        Click to view reports
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                      <i class="ni ni-folder-17 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      @endif
      <div class="row mt-4">
        @if(auth()->user()->my_institution)
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Sales overview</h6>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <!-- <canvas id="chart-line" class="chart-canvas" height="300"></canvas> -->
                <div style="width: 75%; margin: auto;">
                  {!! $chart->container() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">

          @endif
          @if(auth()->user()->employer)
          <div class="col-md-12">


            <div class="card">
              @if(session('error'))
              <div class="alert alert-danger" id="error-alert">
                <h6 class="text-white fw-bold">{!! session('error') !!} <a class="text-su " href="{{ route('packages') }}">
                    <h5 class="fw-bold text-white">Kindly Click here to buy a package</h5>
                  </a></h6>
              </div>
              @endif

              @if(session('status'))

              <div class="alert alert-info" id="error-alert">
                <h6 class="text-white fw-bold"> {{ session('status') }} <a class="text-su " href="{{ route('packages') }}">
                    <h5 class="fw-bold text-white">Kindly Click here to buy a package</h5>
                  </a></h6>
              </div>
              @endif


              @if(session('certificate_error'))
              <div class="alert alert-danger" id="error-alert">
                <h6 class="text-white fw-bold">
                  {!! session('certificate_error') !!}
                </h6>
              </div>
              @endif


              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">
                  <h3>Verify Certificate</h3>
                  </p>
                </div>
              </div>
              <div class="card-body">
                <!-- <p class="text-uppercase text-sm">User Information</p> -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="searchcard p-4">

                      <form id="" class="verificationform" action="{{ route('employer.search')}}" method="POST">
                        <div class="row mb-3">

                          @csrf
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Certifcate Number</label>
                              <input class="form-control mr-sm-2" type="text" placeholder="Search" name="certificate_number" id="certificate_number">
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Select Institution</label>
                              <select class="form-control" name="institution_id" id="institution_id">
                                <option value="">Select Institution <i class="fa fa-sort-desc" aria-hidden="true"></i></option>
                                @foreach ($institutions as $institution )
                                <option value="{{ $institution->id }}">{{ $institution->institutions }}</option>
                                @endforeach
                                <i class="fa fa-sort-desc" aria-hidden="true"></i>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <button type="submit" class="btn btn-primary mt-4 col-12">Verify</button>
                          </div>


                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <!-- <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">City</label>
                    <input class="form-control" type="text" value="New York">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Country</label>
                    <input class="form-control" type="text" value="United States">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Postal code</label>
                    <input class="form-control" type="text" value="437300">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">About me</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">About me</label>
                    <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                  </div>
                </div> -->
                </div>
              </div>
            </div>
          </div>
          @endif

          @if(session('certificate'))

          <div class="row justify-content-center search-result-section">
            <div class="col-md-12">
              <div class="searchcard printable p-4" style="background-color: #DCE8E8;">
                <h3 class="verifiedresult-text mb-4" style="color: rgb(7, 160, 40);">Verified Result</h3>
                <div class="row row-cols-3 justify-content-center">
                  <div class="col cardone">
                    <div class="passport-photo">
                      <img src="placeholder.jpg" alt="Passport Photo" class="img-fluid mb-2" style="width: 100%; height: 100%;">
                    </div>
                    <div>
                      <img src="placeholder.jpg" alt="University Logo" class="img-fluid mb-2">
                    </div>
                    <div class="certificate-number-section">
                      <!-- <h6>Verified<i class="bi bi-patch-check-fill text-success"></i></h6> -->
                      <p class="resultqrcode" id="qrCode"></p>
                    </div>
                  </div>
                  <div class="col cardtwo">
                    <div>
                      <h4>Bio Data</h4>
                      <p class="search-result"><span class="titlebg">First Name:</span> {{ session('certificate')->first_name }}</p>
                      <p class="search-result"><span class="titlebg">Middle Name: </span> {{ session('certificate')->middle_name }}</p>
                      <p class="search-result"><span class="titlebg">Last Name: </span> {{ session('certificate')->last_name }}</p>
                      <p class="search-result"><span class="titlebg"> Date of Birth:</span> {{ session('certificate')->date_of_birth }}t</p>
                    </div>
                  </div>
                  <div class="col cardthree">
                    <div>
                      <h4>Academic Data</h4>
                      <p class="search-result"><span class="titlebg">Institution:</span> {{ session('certificate')->institution->institutions}} </p>
                      <p class="search-result"><span class="titlebg">Student Identification:</span> {{ session('certificate')->student_identification }}</p>
                      <p class="search-result"><span class="titlebg">Qualification Type: </span> {{ session('certificate')->qualification_type }}</p>
                      <p class="search-result"><span class="titlebg">Certificate Number:</span> {{ session('certificate')->certificate_number }}</p>
                      <p class="search-result"><span class="titlebg">Year of Entry: </span> {{ session('certificate')->year_of_entry}}</p>
                      <p class="search-result"><span class="titlebg"> Year of Completion:</span> {{ session('certificate')->year_of_completion }}</p>

                      <p class="save-print">
                        <i class="bi bi-floppy" onclick="saveResult()"></i>
                        <i class="bi bi-printer" onclick="printResult()">Print Result</i>
                      </p>
                    </div>
                  </div>
                </div>
                <p class="websiteinfo">Verified on www.certverification.com</p>
                <p class="verifiedtext">Verified t sdolores rem animi? Culpa est illum nostrum expedita laboriosam.</p>
              </div>
            </div>
          </div>
          @elseif(session('error'))
          <p>{{ session('error') }}</p>
          @endif

          <!-- <div class="col-lg-5">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('../assets/img/carousel-1.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Get started with Argon</h5>
                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-2.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Faster way to create web pages</h5>
                    <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-3.jpg');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Share with us your design tips!</h5>
                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div> -->
        </div>

        @if(auth()->user()->my_institution)
        <div class="row mt-4">
          <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card ">
              <div class="card-header pb-0 px-3">
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="mb-0">Payments</h6>
                  </div>
                  <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <i class="far fa-calendar-alt me-2"></i>
                    <small>23 - 30 March 2020</small>
                  </div>
                </div>
              </div>
              <div class="card-body pt-4 p-3">
                <!-- <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Total Payments Recieved</h6>
                        <span class="text-xs">27 March 2020, at 12:30 PM</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                      - $ 2,500
                    </div>
                  </li>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Payments Overdue</h6>
                        <span class="text-xs">27 March 2020, at 04:30 AM</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                      + $ 2,000
                    </div>
                  </li>
                </ul> -->
                <!-- <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6> -->
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Total Payments Recieved</h6>
                        <span class="text-xs">26 March 2020, at 13:45 PM</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                      + $ 750
                    </div>
                  </li>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Discounts</h6>
                        <span class="text-xs">26 March 2020, at 12:30 PM</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                      + $ 1,000
                    </div>
                  </li>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Rates (Degree)</h6>
                        <span class="text-xs">26 March 2020, at 08:30 AM</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                      + $ 2,500
                    </div>
                  </li>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-exclamation"></i></button>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Discounts</h6>
                        <span class="text-xs">26 March 2020, at 05:00 AM</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                      25%
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Categories</h6>
              </div>
              <div class="card-body p-3">
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="ni ni-mobile-button text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Devices</h6>
                        <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                    </div>
                  </li>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="ni ni-tag text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                        <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                    </div>
                  </li>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="ni ni-box-2 text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                        <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                    </div>
                  </li>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="ni ni-satisfied text-white opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                        <span class="text-xs font-weight-bold">+ 430</span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        @endif


        @if(auth()->user()->employer)
        <div class="row mt-4">
          <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card ">
              <div class="card-header pb-0 px-3">
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="mb-0 fs-4">Recently Verified</h6>
                  </div>
                  <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <small></small>
                  </div>
                </div>
              </div>
              <div class="card-body pt-4 p-3">

                <ul class="list-group">
                  @if ($certificates->isEmpty())
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"> No verified certificates found.</h6>

                      </div>
                    </div>
                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">

                    </div>
                  </li>
                  @else
                  @foreach ($certificates as $certificate)
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark fw-bold fs-6 ">{{ $certificate->first_name }} {{ $certificate->middle_name }} {{ $certificate->last_name }}</h6>
                        <span class="text fw-bold fs-6">{{ $certificate->institution ? $certificate->institution->institutions : 'No Institution Name' }} | {{ $certificate->programme }} | {{ $certificate->class}} </span>
                      </div>
                    </div>

                  </li>
                  @endforeach
                  @endif
                </ul>

                <div class="click d-flex justify-content-end">
                  <a href="{{ route('verified') }}" class="fw-bold fs-6">Click to view more </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Verified</h6>
              </div>


              <!-- <canvas id="myChart"></canvas> -->

              <canvas id="qualificationChart"></canvas>
              <!-- {!! $chart->container() !!} -->

            </div>
          </div>
        </div>
        @endif

      </div>


      <!-- @if(isset($institution) && $institution)
    <span>Welcome {{ $institution->institutions }}</span>
@else
    <h1>Welcome to the Dashboard</h1>
@endif -->

      <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
      <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> -->
      <title>Chart Example</title>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>



      <!-- <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script> -->


      <script>
        // Dismiss the success alert after 5 seconds (5000 milliseconds)
        setTimeout(function() {
          document.getElementById('error-alert').style.display = 'none';
        }, 5000);
      </script>


      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var labels = @json(array_keys($qualificationTypeCounts));
          var data = @json(array_values($qualificationTypeCounts));

          var ctx = document.getElementById('qualificationChart').getContext('2d');
          var qualificationChart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: labels,
              datasets: [{
                data: data,
                backgroundColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(243, 229, 0, 1)'
                ],
                borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              plugins: {
                datalabels: {
                  formatter: function(value) {
                    let total = data.reduce((sum, val) => sum + val, 0);
                    let percentage = (value / total * 100).toFixed(1) + "%";
                    return percentage;
                  },
                  color: 'greem'
                }
              },
              scales: {
                x: {
                  display: false
                },
                y: {
                  display: false
                }
              }
            },

            plugins: [ChartDataLabels]
          });
        });
      </script>

</main>
@endsection
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
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">VERIFIED CANDIDATES</p>
                    <h5 class="font-weight-bolder">
                      2,300
                    </h5>
                    <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Notifications</p>
                    <h5 class="font-weight-bolder">
                      $103,430
                    </h5>
                    <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @if(auth()->user()->employer)
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
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
                      No active package
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
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
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
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
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
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
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
                  <p class="mb-0 display-6 fw-bold">Verify certificates</p>

                </div>
              </div>
              <div class="card-body">
                <!-- <p class="text-uppercase text-sm">User Information</p> -->
                <div class="row">
                  <form id="institution-form " class="form " action="{{ route('employer.search')}}" method="POST">

                    @csrf
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Student</label>
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" name="certificate_number" id="certificate_number">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Select Category</label>
                        <select class="form-control" name="institution_id" id="institution_id">
                          <option value="">Select Institution</option>
                          @foreach ($institutions as $institution )
                          <option value="{{ $institution->id }}">{{ $institution->institutions }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <hr class="horizontal dark">

                    <div class="text-end"> <!-- Added class "text-end" to push button to the right -->
                      <button class="btn btn-primary btn-sm" type="submit">Search</button>
                    </div>
                  </form>

                  <!-- Display search result or error message -->
                  @if(session('certificate'))
                  <h2>Search Result</h2>
                  <ul>
                    <li>Institution: {{ session('certificate')->institution->institutions}}</li>
                    <li>First Name: {{ session('certificate')->first_name }}</li>
                    <li>Middle Name: {{ session('certificate')->middle_name }}</li>
                    <li>Last Name: {{ session('certificate')->last_name }}</li>
                    <li>Date of Birth: {{ session('certificate')->date_of_birth }}</li>
                    <li>Qualification Type: {{ session('certificate')->qualification_type }}</li>
                    <li>Gender: {{ session('certificate')->gender }}</li>
                    <li> Certificate Number: {{ session('certificate')->certificate_number }}</li>
                    <li> Student Identification: {{ session('certificate')->student_identification }}</li>
                    <li> Qualification Type: {{ session('certificate')->Qualification_Type }}</li>
                    <li> Year of Entry: {{ session('certificate')->year_of_entry}}</li>
                    <li> Year of Completion: {{ session('certificate')->year_of_completion }}</li>

                    <!-- Include other institution-related data as needed -->
                  </ul>
                  @elseif(session('error'))
                  <p>{{ session('error') }} <a href="'.route('packages.index').'">Click here to buy</a></p>
                  @endif
                  <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Last name</label>
                    <input class="form-control" type="text" value="Lucky">
                  </div>
                </div> -->
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


        <!-- <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
      </div>


      <!-- @if(isset($institution) && $institution)
    <span>Welcome {{ $institution->institutions }}</span>
@else
    <h1>Welcome to the Dashboard</h1>
@endif -->


      <script>
        // Dismiss the success alert after 5 seconds (5000 milliseconds)
        setTimeout(function() {
          document.getElementById('error-alert').style.display = 'none';
        }, 5000);
      </script>

</main>
@endsection
@extends('layouts.Dashboard')


@section('title', ' Dashboard-Laravel Admin Panel')
@section('content')


<style>
  .title-big {
    font-size: 1.3rem;
    color: #596CFF;
    font-weight: 650;
  }

  #qualificationChart {
    max-width: 490px;
    max-height: 490px;
    width: 100%;
    height: 100%;
    padding: 20px;
    margin: auto;
  }

  .result-container {
           
            padding: 30px;
            border-radius: 15px;
            background-color: #DCE8E8 !important;
        }


  table {
            font-size: 0.80rem;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        th, td {
            padding: 15px 10px;
            border: 2px solid #1E8FFD !important;
        }

        th {
            width: 25%;
            font-weight: bold;
            color: #DCE8E8 !important;
            background-color: #1E8FFD !important;
        }

        td {
            width: 40%;
            font-weight: bold;
            color: #363636;
           
           
        }

        tr {
            margin: 10px 0 !important;
        }

        .passport-photo {
            border: 0px solid #7c7979 !important;
            
        }

        .university-logo {
            border: 0px solid #757575 !important;
        }

        .vrf{
            margin-left: -10px;
        }
        
        .passport-size{
            border: 1px solid black !important;
            width: 10rem;
            height: 12rem;
            object-fit: contain;
            margin-left: 110px;
         
        }

        .universitylogo-size{
            /* border: 1px solid black !important; */
            width: 10rem;
            height: 2rem;
            object-fit: contain;
            margin-left: 110px;
        }

        .link-text a {
            margin-right: 340px;
            text-decoration: none;
            font-weight: Normal;
            color: #005526;
        }

        .text-center {
            margin-left: 0;
        }

        .center-result {
            margin-right: 80px;
        }

        .print-btn{
            margin-left: 320px;
        }

        .verified-on{
            color: #02c258;
            font-weight: bold;
            letter-spacing: 1px;
        }

        @media print {
            body * {
                visibility: hidden;
                font-size: 11px;
            }

            .resultbox, .resultbox * {
                visibility: visible;
            }

            .container {
                box-shadow: none;
                border: none;
            }


            .vrf{
               font-size: 12px;
               margin-bottom: -98px;
            }

            .passport-size{
                border: 1px solid black !important;
                width: 7rem;
                height: 8rem;
                object-fit: contain;
                margin-left: -15px;
                margin-top: 30px;
             
            }

            .universitylogo-size{
                border: 1px solid black !important;
                width: 8.5rem;
                height: 1.5rem;
                object-fit: contain;
                margin-left: -24px;

            }

            .passport-photo, .university-logo {
                width: 6rem;
                margin-bottom: 10px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            table {
                font-size: 1.4rem;
                width: 100%;
                margin-bottom: 15px;
            }

            th, td {
                padding: 5px;
              
            }

          
    
            th {
                background-color: #1E8FFD !important;
                color: #ffffff !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
    

            .print-btn {
                visibility: hidden;
            }

           .bi-printer-fill {
                visibility: hidden;
                display: none;
            }
        }
</style>

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
              <div class="row"  style="padding:30px 0;">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0  font-weight-bold">Payment(s) Due</p>
                    <h5 class="font-weight-bolder">
                    {{$amountDue}}
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
                <div class="row"  style="padding:30px 0;">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 font-weight-bold">Verification(s)</p>
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
              <div class="row"  style="padding:30px 0;">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 font-weight-bold">Uploaded Graduates Data</p>
                    <h5 class="font-weight-bolder">
                      {{ $institutionCertificateCount}}

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
                <div class="row"  style="padding:30px 0;">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 font-weight-bold">Report(s)</p>
                      <h5 class="font-weight-bolder">
                        View reports
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-dark shadow-success text-center rounded-circle">
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
                <div class="row"  style="padding:30px 0;">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0  font-weight-bold">Verification(s) Left</p>
                      @if(auth()->user()->activePackage())
                      <h5 class="font-weight-bolder">

                        {{ auth()->user()->activePackage()->searches_left }}
                      </h5>
                      @else
                      <h5 class="font-weight-bolder">
                        Buy a Package
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
                <div class="row"  style="padding:30px 0;">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0  font-weight-bold">Verification(s)</p>
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
                <div class="row"  style="padding:30px 0;">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0  font-weight-bold">Paper(s) Submitted</p>
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
                <div class="row"  style="padding:30px 0;">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0  font-weight-bold">Report(s)</p>
                      <h5 class="font-weight-bolder">
                        View reports
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-dark shadow-success text-center rounded-circle">
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
              <h6 class="text-capitalize title-big" style="font-size: 20px;">Verified Candidate(s)</h6>
              <!-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
            </p> -->
            </div>
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="chart-container" style="height: 600px;">
                    
                  @if ($hasData)
    <!-- Display Chart -->
    <canvas id="institutionCertsChart"></canvas>
@else
    <!-- Display No Data Message -->
    <h4 class="text-center" style="padding: 270px 0;">No employer has verified your candidate yet.</h4>
@endif
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="gender-box">
                    <h6 class="text-capitalize">Gender</h6>
                    <hr>
                    <div class="gender-merge">
                      <div class="gender-label">Male(s):<span class="gender-count"><?php echo $maleCount; ?></span></div>
                      <!-- <div class="gender-count" id="maleCount"><?php echo $maleCount; ?></div> -->
                      <div class="gender-label1">Female(s):<span class="gender-count"><?php echo $femaleCount; ?></div>
                      <!-- <div class="gender-count" id="femaleCount"><?php echo $femaleCount; ?></div> -->
                    </div>
                  </div>
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
                  <h3 class="title-big">Verify Certificate</h3>
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

          @if (session('certificate'))
    @php
        $certificate = session('certificate');
        $source = session('certificate_source'); // Get the source (local or api)
    @endphp

    @if ($source === 'local')

          <div class="container my-5 result-container">
    <!-- <div class="text-center">
        <h4 class="text-success">Verified Result</h4>
        <img src="passport_photo.jpg" alt="Passport Photo" class="passport-photo img-fluid">
        <img src="university_logo.jpg" alt="University Logo" class="university-logo img-fluid">
    </div> -->

    <div class="row ">

        <div class="col-md-4 ">
            <table class="table table-bordered text-center">
                <tbody class="result-images">
                    <tr>
                        <td class="passport-photo"> 
                            <h4 class="text-success vrf">Verified Result</h4>
                                <div class="passport-size">
                                    <img src="" alt="Passport Photo" class=" img-fluid">
                                </div>  
                           
                            </td>
                    </tr>
                    <tr>
                        <td class="university-logo">   
                            <div class="universitylogo-size">
                        

                                <img src="{{ session('certificate')->institution->logo }}" alt="University Logo" class=" img-fluid">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h5>Bio Data</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>First Name:</th>
                        <td> {{ session('certificate')->first_name }}</td>
                    </tr>
                <tbody>

                    <tr>
                        <th>Middle Name:</th>
                        <td>{{ session('certificate')->middle_name }}</td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td>{{ session('certificate')->last_name }}</td>
                    </tr>

                    <tr>
                        <th>Date of Birth:</th>
                        <td>{{ session('certificate')->date_of_birth }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h5>Academic Data</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Institution:</th>
                        <td>Accra Technical University</td>
                    </tr>
                    <tr>
                        <th>Student Identification:</th>
                        <td>{{ session('certificate')->student_identification }}</td>
                    </tr>
                    <tr>
                        <th>Qualification Type:</th>
                        <td>{{ session('certificate')->qualification_type }}</td>
                    </tr>
                    <tr>
                        <th>Certificate Number:</th>
                        <td> {{session('certificate')->certificate_number }}</td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td> {{session('certificate')->class }}</td>
                    </tr>
                    <tr>
                        <th>Year of Entry:</th>
                        <td> {{ session('certificate')->year_of_entry}}</td>
                    </tr>
                    <tr>
                        <th>Year of Completion:</th>
                        <td> {{ session('certificate')->year_of_completion}}</td>
                        
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary print-btn" onclick="window.print()"><i class="bi bi-printer-fill"></i> Print</button>
            
        </div>
    </div>

    <div class="text-center">
        <p><small class="verified-on">Verified on certverification.com</a></small></p>
  </div>
</div>

@elseif ($source === 'api')
<div class="container my-5 result-container">
    <!-- <div class="text-center">
        <h4 class="text-success">Verified Result</h4>
        <img src="passport_photo.jpg" alt="Passport Photo" class="passport-photo img-fluid">
        <img src="university_logo.jpg" alt="University Logo" class="university-logo img-fluid">
    </div> -->

    <div class="row ">

        <div class="col-md-4 ">
            <table class="table table-bordered text-center">
                <tbody class="result-images">
                    <tr>
                        <td class="passport-photo"> 
                            <h4 class="text-success vrf">Verified Result</h4>
                                <div class="passport-size">
                                    
                                      <!-- Display image from API -->
        @if (isset($certificate['image']) && $certificate['image'])
            <img src="{{ $certificate['image'] }}" alt="Certificate Image" class="img-fluid">
        @else
            <p>No image available.</p>
        @endif
                                </div>  
                           
                            </td>
                    </tr>
                    <tr>
                        <td class="university-logo">   
                            <div class="universitylogo-size">
                        

                            @if (isset($certificate['institution_logo']))
            <img src="{{ $certificate['institution_logo'] }}" alt="University Logo" class="img-fluid">
        @else
            <p>No logo available.</p>
        @endif
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h5>Bio Data</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>First Name:</th>
                        <td> First Name:</strong> {{ $certificate['First_Name'] }}</td>
                    </tr>
                <tbody>

                    <tr>
                        <th>Middle Name:</th>
                        <td>Middle Name:</strong> {{ $certificate['Middle_Name'] }}</td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td>Last Name:</strong> {{ $certificate['Last_Name'] }}</td>
                    </tr>

                 
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h5>Academic Data</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Institution:</th>
                        <td>Institution:</strong> {{ $certificate['Institution'] }}</td>
                    </tr>
                    <tr>
                        <th>Student Identification:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Qualification Type:</th>
                        <td>Qualification Type:</strong> {{ $certificate['Qualification_Type'] }}</td>
                    </tr>
                    <tr>
                        <th>Certificate Number:</th>
                        <td> Certificate Number:</strong> {{ $certificate['Certificate_Number'] }}</td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td>>Class:</strong> {{ $certificate['Class'] }}</td>
                    </tr>
                    <tr>
                        <th>Year of Entry:</th>
                        <td>Year of Entry:</strong> {{ $certificate['Year_Of_Entry'] }}</td>
                    </tr>
                    <tr>
                        <th>Year of Completion:</th>
                        <td>Year of Completion:</strong> {{ $certificate['Year_Of_Completion'] }}</td>
                        
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary print-btn" onclick="window.print()"><i class="bi bi-printer-fill"></i> Print</button>
            
        </div>
    </div>

    <div class="text-center">
        <p><small class="verified-on">Verified on certverification.com</a></small></p>
  </div>
</div>

    @else
        <p>No certificate found.</p>
    @endif
    @else
    <p>No certificate found.</p>
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
          <div class="col-lg-5 mb-lg-0 mb-4">
            <div class="card ">
              <div class="card-header pb-0 px-3">
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="mb-0 title-big">Payments</h6>
                  </div>
                  <div class="col-md-6 d-flex justify-content-end align-items-center">
                    
                    <small></small>
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
                  @foreach($payments as $payment)
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Total Payments Recieved</h6>
                        </br>
                        <span class="text-xs"><b>Amount :</b> GH₵ {{ $payment->amount }}</span>
                        </br>
                        <span class="text-xs"><b>Date:</b> {{ $payment->payment_date }}</span>
                      </div>
                    </div>

                  </li>
                  @endforeach

                  <!-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
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
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="card">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0 title-big">User Activities</h6>
              </div>

              @if(session('certificate'))
    <div>
        <h3>Certificate Details</h3>
        <p>Certificate Number: {{ session('certificate')->certificate_number }}</p>
        <p>Institution Name: {{ session('certificate')->institution->name }}</p>
    </div>
    <div>
        <h3>Calculation Details</h3>
        <p>Price Per Search: {{ session('price_per_search') }}</p>
        <p>Amount to Give to Institution: {{ session('amount_to_give_to_institution') }}</p>
        <p>Updated Amount Given to Institution: {{ session('updated_amount_given_to_institution') }}</p>
    </div>
@endif

@if(session('certificate_error'))
    <div>
        <p>Error: {{ session('certificate_error') }}</p>
    </div>
@endif


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
                    <h6 class="mb-0 fs-4 title-big">Recently Verified</h6>
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
                  <a href="{{ route('verified') }}" class="fw-bold fs-6 " style="color:blue;">Click to view more </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0 fs-4 title-big">Qualification Type</h6>
              </div>


              <!-- <canvas id="myChart"></canvas> -->
              <div class="card-body pb-0 p-3">
              @if ($hasData1)
    <!-- Display Chart -->
    <canvas id="qualificationChart"></canvas>
@else
    <!-- Display No Data Message -->
    <h6 class="mb-1 text-dark text-sm"> No verified certificates found.</h6>
@endif
</div>
              <!-- {!! $chart->container() !!} -->

            </div>
          </div>
        </div>
        @endif

      </div>

      <style>
        .title-big {
          font-size: 1.3rem;
          color: #596CFF;
          font-weight: 650;
        }

        #qualificationChart {
          max-width: 600px;
          max-height: 6000px;
          width: 100%;
          height: 100%;
          padding: 20px;
          margin: auto;
        }

        .chart-container {
          padding: 0px 100px;
        }


        .gender-box {
          background-color: #fff;
          padding: 10px;
          width: 70%;
          margin-left: 50px;
          margin-top: 150px;


        }

        .gender-label {
          padding: 15px;
          border: 4px solid;
        }

        .gender-label1 {
          padding: 15px;
          border: 4px solid;
          margin-top: 20px
        }

        .gender-box h6 {
          margin-bottom: 20px;
          font-size: 30px;
          font-weight: 700;
          color: blue;
        }

        .gender-merge {
          font-weight: bold;

          font-size: 20px;
        }

        .gender-count {
          flex: 1;
          /* Take remaining space */
          text-align: right;
          margin-left: 50px;

          padding: 25px 10px;

        }
      </style>


      <!-- @if(isset($institution) && $institution)
    <span>Welcome {{ $institution->institutions }}</span>
@else
    <h1>Welcome to the Dashboard</h1>
@endif -->

      <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
      <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> -->
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
        }, 10000);
      </script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get data from Laravel
    var hasData1 = @json($hasData1);
    var labels = @json(array_keys($qualificationTypeCounts));
    var data = @json(array_values($qualificationTypeCounts));

    var ctx = document.getElementById('qualificationChart').getContext('2d');

    if (hasData1) {
        new Chart(ctx, {
            type: 'doughnut',
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
                        color: 'green' // Corrected color value from 'greem'
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
    } else {
        // Optionally handle case when no data is available (e.g., hide chart container)
        document.getElementById('qualificationChart').style.display = 'none';
    }
});
</script>



      <!-- Script for institution certificates chart -->
      <!-- Script for institution certificates chart -->
      <script>
document.addEventListener('DOMContentLoaded', function() {
    var hasData = @json($hasData);
    var ctx = document.getElementById('institutionCertsChart').getContext('2d');
    
    if (hasData) {
        var chartData = @json($institutionQualificationTypeCounts);

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(chartData),
                datasets: [{
                    label: 'Institution Certs',
                    data: Object.values(chartData),
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
                        'rgba(255, 159, 64, 1)',
                        'rgba(243, 229, 0, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            var total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                            var percentage = (value / total) * 100;
                            return percentage.toFixed(1) + '%';
                        },
                        color: '#fff',
                    }
                },
                scales: {
                    x: {
                        display: false
                    },
                    y: {
                        display: false
                    }
                },
            },
            plugins: [ChartDataLabels]
        });
    } else {
        // Optionally handle case when no data is available (e.g., hide chart container)
        document.getElementById('institutionCertsChart').style.display = 'none';
    }
});
</script>




</main>
@endsection
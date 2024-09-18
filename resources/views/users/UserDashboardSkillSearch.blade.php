@extends('layouts.Dashboard')


@section('title', ' Dashboard-Laravel Admin Panel')
@section('content')
<style>

.title-big {
    font-size: 1.3rem;
    color: #596CFF;
    font-weight: 650;
  }

  .skill-btn{
    margin-top: 40px;
  }

</style>
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
   
            <!-- Employer dashboard -->
            <div class="row mt-4">
            <div class="col-xl-12 col-sm-12 mb-xl-5 mb-5">
        <div class="">
          <div class="">
            <div class="row">
              <h5 class="text-white">Skill Search </h5>
            </div>
          </div>
        </div>
      </div>
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
                                    <h3></h3>
                                    </p>
                                </div>
                            </div>

                            
                            <div class="card-body">
                                <!-- <p class="text-uppercase text-sm">User Information</p> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="searchcard p-4">

                                            <form id="institution-form" class="verificationform" action="{{ route('dashboard.skills.search') }}" method="POST">
                                                <div class="row mb-3">
                                                    @csrf
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label title-big ">Search for Skills</label>   
                                                            <input class="form-control mr-sm-2" type="text" placeholder="Search for programme" name="programme_type" id="programme_type" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-primary skill-btn col-12">Search for skils</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @if(isset($programmeType) && $programmeType)
            <!-- <h2>Re</h2> -->

            @if($certificates->isEmpty())
                <p>No certificates found for the specified programme.</p>
            @else
                <table class="table table-dark table-striped text-center fs-6">
                    <thead>
                        <tr>
                        <th>Institution <br> Name</th>
                            <th>Full <br> Name</th>
                            <th>Date of <br> Birth</th>
                            <th>Qualification <br>Type</th>
                            <th>Gender</th>
                            <th>Certificate <br> Number</th>
                            <th>Student <br> Identification</th>
                            <th>Year of <br> Entry</th>
                            <th>Year of <br> Completion</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($certificates as $certificate)
                            <tr>
                            <td>{{ $certificate->institution ? $certificate->institution->institutions : 'No Institution Name' }}</td>
                            <td>{{ $certificate->first_name }} {{ $certificate->middle_name }} {{ $certificate->last_name }}</td>
                            <td>{{ $certificate->date_of_birth }}</td>
                            <td>{{ $certificate->qualification_type }}</td>
                            <td>{{ $certificate->gender }}</td>
                            <td>{{ $certificate->certificate_number }}</td>
                            <td>{{ $certificate->student_identification }}</td>
                            <td>{{ $certificate->year_of_entry }}</td>
                            <td>{{ $certificate->year_of_completion }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endif

                                        </div>

                                    </div>
                                </div>

                                <div class="row">


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- @endif -->

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
                                                <i class="bi bi-printer" onclick="printResult()"></i>
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
                </div>



            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
            <script>
                // Dismiss the success alert after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    document.getElementById('error-alert').style.display = 'none';
                }, 5000);
            </script>

</main>
@endsection
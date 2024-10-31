@extends('layouts.Dashboard')


@section('title', ' Dashboard-Laravel Admin Panel')
@section('content')

<main class="main-content position-relative border-radius-lg ">
  <div class="container-fluid py-4">
    <div class="row">
    @if(session('success'))
    <div class="alert alert-success" role="alert" id="success-alert" >
    {{ session('success') }}
</div>
@endif
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Search for certificate Paper</p>

            </div>
          </div>
          <div class="card-body">
            <!-- <p class="text-uppercase text-sm">User Information</p> -->
            <div class="row">
  <form id="institution-form " class="form " action="{{ route('user.search')}}" method="POST">

    @csrf
    <div class="col-md-12">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Paper Title</label>
            <input class="form-control mr-sm-2" type="text" placeholder="Search"  name="certificate_number" id="certificate_number">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Select Category</label>
            <select class="form-control" name="institution_id" id="institution_id">
                            <option value="">Select Institution</option>
                            @foreach ($institution as $institution )
                            <option value="{{ $institution->id }}" >{{ $institution->institutions }}</option>                 
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
       <p>{{ session('error') }}</p>
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
      <div class="col-lg-4">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">My Uploads</h6>
              </div>
              <div class="col-6 text-end">
                <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
              </div>
            </div>
          </div>
          <div class="card-body p-3 pb-0">
            <ul class="list-group">
            
    
    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
        <div class="d-flex flex-column">
            <h6 class="text-dark mb-1 font-weight-bold text-sm"></h6>
            <span class="text-xs"></span>
        </div>
        <div class="d-flex align-items-center text-sm">
        


           
            <a href="" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                <i class="fas fa-file-pdf text-lg me-1"></i> PDF
            </a>
            
            
        </div>
    </li>
  


   

            </ul>
          </div>
        </div>
      </div>

      
    </div>
  </div>

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Download a Paper</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paper Title</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File</th>
                  </tr>
                </thead>
                <tbody>

             
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">

                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"></h6>

                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">

                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"></h6>

                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"></p>

                    </td>

                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"></span>
                    </td>
                    <td class="align-middle">
                      <a href=""  class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Download
                      </a>
                    </td>
                  </tr>
                
                
                 
                 
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

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
    <!-- </div>
  </div> -->
   


    <!-- <h1> {{ auth()->user()->email}}</h1>
<h1>{{ auth()->user()->address}}</h1> -->

<script>
    // Dismiss the success alert after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 5000);
</script>

</main>
@endsection
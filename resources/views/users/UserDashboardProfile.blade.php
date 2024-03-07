
@extends('layouts.Dashboard')


@section('title', ' Dashboard-Laravel Admin Panel')
@section('content')

<main class="main-content position-relative border-radius-lg ">
<div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
  
   
    <!-- <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                Sayo Kravits
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Public Relations
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="ni ni-app"></i>
                    <span class="ms-2">App</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-email-83"></i>
                    <span class="ms-2">Messages</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-settings-gear-65"></i>
                    <span class="ms-2">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0"></h6>
              <h6 class="mb-0">Institution Details</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-4 text-sm"></h6>
                    
                    <span class="mb-4 text-xs">Name: <span class="text-dark font-weight-bold ms-sm-2">{{ auth()->user()->name}}</span></span>
                    @if ($institution)
                    <span class="mb-4 text-xs">Country: <span class="text-dark font-weight-bold ms-sm-2">{{ $institution->country }}</span></span>
                    <span class="mb-4 text-xs">Email : <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->email }}</span></span>
                    <span class="text-xs mb-4">Pone: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->phone }}</span></span>
                    <span class="text-xs mb-4">Address: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->address }}</span></span>
                    <span class="text-xs mb-4">Website: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->website }}</span></span>
                    @else
    
                   <span class="text-xs mb-4"> <span class="text-dark ms-sm-2 font-weight-bold">No institution information found for the current user.</span></span>
                        @endif

                    

                  </div>
                  <div class="ms-auto text-end">
                    <!-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a> -->
                    <!-- <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a> -->
                  </div>
                </li>                               
              </ul>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Admin Details</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    
                  @if ($institution)
                    <h6 class="mb-4 text-sm">{{ $institution->fullname }}</h6>
                    <span class="mb-4 text-xs">Role: <span class="text-dark font-weight-bold ms-sm-2"> Account Manager</span></span>
                    <!-- <span class="mb-4 text-xs">Country: <span class="text-dark font-weight-bold ms-sm-2"> Account Manager</span></span>
                    <span class="mb-4 text-xs">Email : <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->email }}</span></span>
                    <span class="text-xs mb-4">Pone: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->phone }}</span></span>
                    <span class="text-xs mb-4">Address: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->address }}</span></span>
                    <span class="text-xs mb-4">Website: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->website }}</span></span> -->
                    @else
    
                   <span class="text-xs mb-4"> <span class="text-dark ms-sm-2 font-weight-bold">No institution information found for the current user.</span></span>
                        @endif

                    
                  </div>
                  <div class="ms-auto text-end">
                    
                    <!-- <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a> -->
                  </div>
                </li>                               
              </ul>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">User Information</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="">
                    <h6 class="mb-4 text-sm">Eric Adams</h6>
                    <!-- <span class="mb-4 text-xs">Gender: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span> -->
                    <span class="mb-4 text-xs">Email : <span class="text-dark ms-sm-2 font-weight-bold">eric@gmail.com</span></span>
                    <span class="text-xs mb-4">Pone: <span class="text-dark ms-sm-2 font-weight-bold">0245348765</span></span>
                    <span class="text-xs mb-4">Role: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                    

                  </div>
                  <div class="ms-auto text-end">
                    <!-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a> -->
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Manage User</a>
                  </div>
                </li> 
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="">
                    <h6 class="mb-4 text-sm">Eric Adams</h6>
                    <!-- <span class="mb-4 text-xs">Gender: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span> -->
                    <span class="mb-4 text-xs">Email : <span class="text-dark ms-sm-2 font-weight-bold">eric@gmail.com</span></span>
                    <span class="text-xs mb-4">Pone: <span class="text-dark ms-sm-2 font-weight-bold">0245348765</span></span>
                    <span class="text-xs mb-4">Role: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                    

                  </div>
                  <div class="ms-auto text-end">
                    <!-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a> -->
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Manage User</a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="">
                    <h6 class="mb-4 text-sm">Eric Adams</h6>
                    <!-- <span class="mb-4 text-xs">Gender: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span> -->
                    <span class="mb-4 text-xs">Email : <span class="text-dark ms-sm-2 font-weight-bold">eric@gmail.com</span></span>
                    <span class="text-xs mb-4">Pone: <span class="text-dark ms-sm-2 font-weight-bold">0245348765</span></span>
                    <span class="text-xs mb-4">Role: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                    

                  </div>
                  <div class="ms-auto text-end">
                    <!-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a> -->
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Manage User</a>
                  </div>
                </li>                              
              </ul>
            </div>
          </div>
          <!-- <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button class="btn btn-primary btn-sm ms-auto">Settings</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">User Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input class="form-control" type="text" value="lucky.jesse">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address</label>
                    <input class="form-control" type="email" value="jesse@example.com">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">First name</label>
                    <input class="form-control" type="text" value="Jesse">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Last name</label>
                    <input class="form-control" type="text" value="Lucky">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Contact Information</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Address</label>
                    <input class="form-control" type="text" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                  </div>
                </div>
                <div class="col-md-4">
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
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="../assets/img/team-2.jpg" class="rounded-circle img-fluid border border-2 border-white">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <!-- <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">22</span>
                      <span class="text-sm opacity-8">Friends</span>
                    </div>
                    <div class="d-grid text-center mx-4">
                      <span class="text-lg font-weight-bolder">10</span>
                      <span class="text-sm opacity-8">Photos</span>
                    </div>
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">89</span>
                      <span class="text-sm opacity-8">Comments</span>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="text-center mt-4">
                <h5>
                {{ $institution->fullname }}
                </h5>
                <div class="h6 font-weight-300">
                  Account Manager
                </div>
                <!-- <div class="h6 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div> -->
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="p-3">
                <a href="" data-bs-toggle="modal" data-bs-target="#formModal " class="btn btn-sm btn-info mb-0 d-none d-lg-block mb-3">Edit Profile</a>
                <!-- <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a> -->
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Add User</a>
                <!-- <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a> -->
              </div>
            </div>
      
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
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
      </footer>
    </div>
  </div>


  <!-- Profile Update Modal -->
  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Submit your Carriculumn Vitae </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body">
      <form id="institution-form" class="form" action="{{ route('dashboard.profile.update')}}" method="POST">
    @csrf
    @method('PUT')
    <h3 class="welcometext">Update Profile</h3>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label for="institutionName">Name of Institution<i class="asteric"> *</i></label>
            <input type="text" class="form-control" id="institutionName" name="name" value="{{$institution->institutions}}" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
            <input type="text" class="form-control" id="fullName" name="fullname" value="{{ $institution->fullname }}" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="countrySelect">Select Country:</label>
            <select class="form-control" id="countrySelect" name="country" required>
                <option value="gh" {{ $institution->country === 'gh' ? 'selected' : '' }}>Ghana</option>
                <option value="ng" {{ $institution->country === 'ng' ? 'selected' : '' }}>Nigeria</option>
                <option value="uk" {{ $institution->country === 'uk' ? 'selected' : '' }}>United Kingdom</option>
                <option value="us" {{ $institution->country === 'us' ? 'selected' : '' }}>United States</option>
            </select>
        </div>
        <div class="col-md-12 mb-3">
            <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
            <input type="tel" class="form-control" id="phoneNumber" name="phone" value="{{ $institution->phone }}" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="physicalAddress">City<i class="asteric"> *</i></label>
            <input type="text" class="form-control" id="physicalAddress" name="address" value="{{ $institution->address }}" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="email">Email<i class="asteric"> *</i></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $institution->email }}" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="location">Location<i class="asteric"> *</i></label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $institution->location }}" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="website">Website<i class="asteric"> *</i></label>
            <input type="text" class="form-control" id="website" name="website" value="{{ $institution->website }}" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="password">Password<i class="asteric"> *</i></label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-md-12 mb-3">
            <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
        </div>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
        <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted CVS <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
    </div>
    <button type="submit" class="btn btn-primary w-100">Update</button>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<!-- <h1> {{ auth()->user()->email}}</h1>
<h1>{{ auth()->user()->address}}</h1> -->



  </main>
@endsection




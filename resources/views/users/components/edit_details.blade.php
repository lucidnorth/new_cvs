
<style>



</style>



<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0"></h6>

          @if(auth()->user()->employer)
          <h6 class="mb-0"> Employer Details</h6>
          @elseif(auth()->user()->institution_id)
          <h6 class="mb-0"> Institution Details</h6>
          @endif

        </div>
        <div class="card-body pt-4 p-3">
    <ul class="list-group">
        <li class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center mb-4">
                        <h6 class="text-sm">User Information</h6>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                        <span class="text-xs">Name: <span class="text-dark font-weight-bold ms-sm-2">{{ auth()->user()->name }}</span></span>
                    </div>
                    @if ($data)
                        @if(auth()->user()->institution_id)
                            <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                                <span class="text-xs">Country: <span class="text-dark font-weight-bold ms-sm-2">{{ $data->country }}</span></span>
                            </div>
                        @endif
                        <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                            <span class="text-xs">Email: <span class="text-dark ms-sm-2 font-weight-bold">{{ auth()->user()->email }}</span></span>
                        </div>
                        <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                            <span class="text-xs">Phone: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->phone }}</span></span>
                        </div>
                        <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                            <span class="text-xs">Address: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->address }}</span></span>
                        </div>
                        @if(auth()->user()->institution_id)
                            <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                                <span class="text-xs">Website: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->website }}</span></span>
                            </div>
                        @endif
                        @if(auth()->user()->employer)
                            <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                                <span class="text-xs">Registration Number: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->registrationnumber }}</span></span>
                            </div>
                            <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                                <span class="text-xs">ID Type: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->idtype }}</span></span>
                            </div>
                            <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                                <span class="text-xs">ID Number: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->idnumber }}</span></span>
                            </div>
                            <div class="col-md-5 mb-4 d-flex justify-content-between align-items-center border-bottom pb-2">
                                <span class="text-xs">Industry: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->industry }}</span></span>
                            </div>
                        @endif
                    @else
                        <div class="col-12 text-center">
                            <span class="text-xs"><span class="text-dark ms-sm-2 font-weight-bold">No institution information found for the current user.</span></span>
                        </div>
                    @endif
                </div>
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

                @if ($data)
                <h6 class="mb-4 text-sm">{{ $data->fullname }}</h6>
                <span class="mb-4 text-xs">Role: <span class="text-dark font-weight-bold ms-sm-2"> Account Manager</span></span>
         
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
        <div class="row justify-content-center">
         
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
              {{ $data->fullname }}
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
          @if(auth()->user()->institution_id)
            <a href="" data-bs-toggle="modal" data-bs-target="#InstitutionformModal " class="btn btn-sm btn-info mb-0 d-none d-lg-block mb-3">Edit Profile</a>
            @endif
            @if(auth()->user()->employer)
            <a href="" data-bs-toggle="modal" data-bs-target="#EmployeeformModal" class="btn btn-sm btn-info mb-0 d-none d-lg-block mb-3">Edit Profile</a>
            @endif
            <!-- <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a> -->
            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Add User</a>
            <!-- <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a> -->
          </div>
        </div>

      </div>
    </div>
  </div>

</div>


 <!-- Profile Update Modal -->
 <div class="modal fade" id="InstitutionformModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="text" class="form-control" id="institutionName" name="name" value="{{$data->institutions}}" required>
              </div>

              <div class="col-md-12 mb-3">
                <label for="institutionName">Name of Employer<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="institutionName" name="name" value="{{ auth()->user()->name}}" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="fullName" name="fullname" value="{{ $data->fullname }}" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="countrySelect">Select Country:</label>
                <select class="form-control" id="countrySelect" name="country" required>
                  <option value="gh" {{ $data->country === 'gh' ? 'selected' : '' }}>Ghana</option>
                  <option value="ng" {{ $data->country === 'ng' ? 'selected' : '' }}>Nigeria</option>
                  <option value="uk" {{ $data->country === 'uk' ? 'selected' : '' }}>United Kingdom</option>
                  <option value="us" {{ $data->country === 'us' ? 'selected' : '' }}>United States</option>
                </select>
              </div>
              <div class="col-md-12 mb-3">
                <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                <input type="tel" class="form-control" id="phoneNumber" name="phone" value="{{ $data->phone }}" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="physicalAddress">City<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="physicalAddress" name="address" value="{{ $data->address }}" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="email">Email<i class="asteric"> *</i></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="location">Location<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $data->location }}" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="website">Website<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="website" name="website" value="{{ $data->website }}" required>
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

  <!-- Employee Profile Update Modal -->
 <div class="modal fade" id="EmployeeformModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Submit your Carriculumn Vitae </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
        <div class="modal-body">
        <form id="employer-form" class="form" action="{{ route('dashboard.profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="profile_type" value="employer">
        <h3 class="welcometext">Update Profile</h3>
        <div class="form-row">
            <!-- Form fields for employer profile as provided -->
            <div class="col-md-12 mb-3">
                <label for="employerName">Name of Company<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="institutionName" name="name" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id ="fullName" name="fullname" value="{{ $data->fullname }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                <input type="tel" class="form-control" id="phoneNumber" name="phone" value="{{ $data->phone }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="physicalAddress">City<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="physicalAddress" name="address" value="{{ $data->address }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="email">Email<i class="asteric"> *</i></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="registrationnumber">Registration Number<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="registrationnumber" name="location" value="{{ $data->registrationnumber }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="idtype">ID Type<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="idtype" name="idtype" value="{{ $data->idtype }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="idnumber">ID Number<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="idnumber" name="idnumber" value="{{ $data->idnumber }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="industry">Industry<i class="asteric"> *</i></label>
                <input type="text" class="form-control" id="industry" name="industry" value="{{ $data->industry }}" required>
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
  <span class="text-xs mb-4">Registration Number: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->registrationnumber }}</span></span>
                <span class="text-xs mb-4">ID Type: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->idtype}}</span></span>
                <span class="text-xs mb-4">IDNumber: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->idnumber}}</span></span>
                <span class="text-xs mb-4">Industry: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->industry }}</span></span>
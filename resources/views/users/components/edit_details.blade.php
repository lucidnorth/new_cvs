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
                    <!-- <h6 class="text-sm">User Information</h6> -->
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
          <h6 class="mb-0">Account Manager Details</h6>
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


    </div>

    <div class="col-md-4">
      <div class="card card-profile">
        <div class="row justify-content-center">

        </div>
        <div class="card-body pt-0">
          <div class="text-center mt-4">
            <h5>
              {{ $data->fullname }}
            </h5>
            <div class="h6 font-weight-300">
              Account Manager
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
          <div class="p-3">
            @if(auth()->user()->institution_id)
            <a href="" data-bs-toggle="modal" data-bs-target="#InstitutionformModal " class="btn btn-sm btn-info mb-0 d-none d-lg-block mb-3">Edit Account Manager Profile</a>
            @endif
            @if(auth()->user()->employer)
            <a href="" data-bs-toggle="modal" data-bs-target="#EmployeeformModal" class="btn btn-sm btn-info mb-0 d-none d-lg-block mb-3">dit Account Manager Profile</a>
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
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
      </div>
      <div class="modal-body">
        <ul class="nav mb-3 d-flex justify-content-center" id="myTabs">
          <li class="nav-item">
            <a class="nav-link fs-6 active" data-bs-toggle="pill" href="#InstitutionProfile">Profile Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6" data-bs-toggle="pill" href="#InstitutionPass">Password</a>
          </li>
        </ul>

        <div class="tab-content account-tab-content mt-3">
          <div class="tab-pane container active" id="InstitutionProfile">
            <form id="institution-form" class="form" action="{{ route('institution.profile.update') }}" method="POST">
              @csrf
              <h5 class="welcometext text-center mb-3">Account Details</h5>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="institutionName">Name of Institution<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="institutionName" name="name" value="{{$data->institutions}}" required readonly>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="fullName" name="fullname" value="{{ $data->fullname }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="countrySelect">Select Country:</label>
                  <select class="form-control" id="countrySelect" name="country" required>
                    <option value="gh" {{ $data->country === 'gh' ? 'selected' : '' }}>Ghana</option>
                    <option value="ng" {{ $data->country === 'ng' ? 'selected' : '' }}>Nigeria</option>
                    <option value="uk" {{ $data->country === 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="us" {{ $data->country === 'us' ? 'selected' : '' }}>United States</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                  <input type="tel" class="form-control" id="phoneNumber" name="phone" value="{{ $data->phone }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="physicalAddress">City<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="physicalAddress" name="address" value="{{ $data->address }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email">Email<i class="asteric"> *</i></label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required readonly>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="location">Location<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="location" name="location" value="{{ $data->location }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="website">Website<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="website" name="website" value="{{ $data->website }}" required>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="confirmPassword">Current Password<i class="asteric"> *</i></label>
                  <input type="password" class="form-control" id="confirmPassword" name="password" required>
                </div>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
                <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted CVS <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
              </div>
              <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
          </div>


          <div class="tab-pane container" id="InstitutionPass">
            <form id="password-form" class="form" action="" method="POST">
              @csrf
              <h5 class="text-center pb-3">Change Password</h5>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="currentPassword">Current Password<i class="asteric"> *</i></label>
                  <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="newPassword">New Password<i class="asteric"> *</i></label>
                  <input type="password" class="form-control" id="newPassword" name="new_password" required>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="confirmNewPassword">Confirm New Password<i class="asteric"> *</i></label>
                  <input type="password" class="form-control" id="confirmNewPassword" name="new_password_confirmation" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100">Update Password</button>
            </form>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- Employee Profile Update Modal -->
<div class="modal" id="EmployeeformModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header d-flex justify-content-center">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
      </div>

      <div class="modal-body">
        <ul class="nav mb-3 d-flex justify-content-center" id="myTabs">
          <li class="nav-item">
            <a class="nav-link fs-6 active" data-bs-toggle="pill" href="#profile">Profile Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6" data-bs-toggle="pill" href="#pass">Password</a>
          </li>
        </ul>


        <div class="tab-content account-tab-content mt-3">
          <div class="tab-pane container active" id="profile">
            <form id="employer-form" class="form" action="#!" method="POST">
              <h5 class="text-center pb-3">Account Details</h5>
              @csrf
              @method('PUT')
              <input type="hidden" name="profile_type" value="employer">
              <div class="row">
                <!-- Form fields for employer profile as provided -->
                <div class="col-md-6 mb-3">
                  <label for="employerName">Name of Company<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="institutionName" name="name" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="fullName" name="fullname" value="{{ $data->fullname }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                  <input type="tel" class="form-control" id="phoneNumber" name="phone" value="{{ $data->phone }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="physicalAddress">City<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="physicalAddress" name="address" value="{{ $data->address }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email">Email<i class="asteric"> *</i></label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="registrationnumber">Registration Number<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="registrationnumber" name="location" value="{{ $data->registrationnumber }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="idtype">ID Type<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="idtype" name="idtype" value="{{ $data->idtype }}" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="idnumber">ID Number<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="idnumber" name="idnumber" value="{{ $data->idnumber }}" required>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="industry">Industry<i class="asteric"> *</i></label>
                  <input type="text" class="form-control" id="industry" name="industry" value="{{ $data->industry }}" required>
                </div>
                <!-- <div class="col-md-12 mb-3">
                  <label for="password">Password<i class="asteric"> *</i></label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div> -->

                <div class="col-md-12 mb-3">
                  <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
                  <input type="password" class="form-control" id="confirmPassword" name="password" required>
                </div>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
                <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted CVS <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
              </div>
              <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
          </div>

          <div class="tab-pane container" id="pass">
            <form id="employer-form" class="form" action="#!" method="POST">
              <h5 class="text-center pb-3">Change Password</h5>
              @csrf
              @method('PUT')
              <input type="hidden" name="profile_type" value="employer">
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="password">Current Password<i class="asteric"> *</i></label>
                  <input type="password" class="form-control" id="password" name="password" required>
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
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
                <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted CVS <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
              </div>
              <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- <span class="text-xs mb-4">Registration Number: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->registrationnumber }}</span></span>
<span class="text-xs mb-4">ID Type: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->idtype}}</span></span>
<span class="text-xs mb-4">IDNumber: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->idnumber}}</span></span>
<span class="text-xs mb-4">Industry: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->industry }}</span></span> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
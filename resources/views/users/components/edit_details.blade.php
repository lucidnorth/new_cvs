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
            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-4 text-sm"></h6>

                <span class="mb-4 text-xs">Name: <span class="text-dark font-weight-bold ms-sm-2">{{ auth()->user()->name}}</span></span>
                @if ($institution)
                @if(auth()->user()->institution_id)
                <span class="mb-4 text-xs">Country: <span class="text-dark font-weight-bold ms-sm-2">{{ $institution->country }}</span></span>
                @endif
                <span class="mb-4 text-xs">Email : <span class="text-dark ms-sm-2 font-weight-bold">{{ auth()->user()->email }}</span></span>
                <span class="text-xs mb-4">Pone: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->phone   }}</span></span>
                <span class="text-xs mb-4">Address: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->address }}</span></span>
                @if(auth()->user()->institution_id)
                <span class="text-xs mb-4">Website: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->website }}</span></span>
                @endif
                @if(auth()->user()->employer)
                <span class="text-xs mb-4">Registration Number: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->registrationnumber }}</span></span>
                <span class="text-xs mb-4">ID Type: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->idtype}}</span></span>
                <span class="text-xs mb-4">IDNumber: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->idnumber}}</span></span>
                <span class="text-xs mb-4">Industry: <span class="text-dark ms-sm-2 font-weight-bold">{{ $institution->industry }}</span></span>
                @endif
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
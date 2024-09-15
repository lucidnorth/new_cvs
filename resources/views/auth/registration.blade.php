@extends('layouts.registration')
@section('content')
<style>
  .modal-header {
    background: #0b5ed6;
  }

  .modal-header h1 {
    color: white;
  }

  .modal-body {
    text-align: Justify;
  }

  /*.modal-body ul{*/
  /*    font-size: 1.2rem;*/
  /*}*/
  .bullet {
    list-style-type: none;
    /* Remove the default bullet */
    padding-left: 20px;
    /* Add space for the custom bullet */
    line-height: 25px;
  }

  .bullet li {
    position: relative;
    padding-left: 20px;
    /* Adjust space for bullet */
    color: black;
    /* Text color */
  }

  .bullet li::before {
    content: "\2022";
    /* Unicode for bullet */
    color: #0b5ed6;
    /* Bullet color */
    font-size: 32px;
    /* Bullet size */
    position: absolute;
    left: 0;
    top: -3px;
  }
  .password-container {
    position: relative;
    width: 100%; /* Adjust based on your design */
}

.password-container input {
    padding-right: 30px; /* Space for the eye icon */
    width: 100%; /* Ensure it fits the container */
}

.password-container i {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}
</style>
<script>
    var errors = @json($errors->all());
</script>

<!-- Custom Modal -->
<style>
/* .nav-pills .nav-link {
  border-radius: 0.5rem;
  padding: 12px 20px;
  font-size: 1.1rem;
}

.nav-pills .nav-link.active {
  background-color: #007bff;
  color: #fff;
  border: none;
} */

.card { 
  border: none;
  border-radius: 0.75rem;
  overflow: hidden;
  transition: box-shadow 0.3s ease;
}

.card:hover {
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.card-img-top {
  height: 200px;
  object-fit: cover;
}

.card-body {
  padding: 1.5rem;
}

.card-title {
  font-size: 1.25rem;
  font-weight: bold;
}

.card-text {
  font-size: 1rem;
  color: #6c757d; 
}

.btn {
  border-radius: 0.25rem;
  font-size: 0.9rem;
  padding: 0.5rem 1rem;
}

.btn-primary {
  background-color: #007bff;
  border: none;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.btn-secondary {
  background-color: #6c757d;
  border: none;
}

.btn-secondary:hover {
  background-color: #5a6268;
}

.container {
  padding: 30px;
}

.book-single {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 0.75rem;
}

/* Responsiveness*/
@media (max-width: 768px) {
  .card-img-top {
    height: 150px;
  }

  .card-title {
    font-size: 1rem;
  }

  .card-text {
    font-size: 0.9rem;
  }
}


</style>

<!-- Custom Modal -->
<div id="errorModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 70px; z-index: 1000; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
    <div id="modalErrors"></div>
    <button class="btn btn-primary" style="float: right;" onclick="closeModal()">Close</button>
</div>

<div id="modalBackdrop" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;"></div>




<div class="container register-bg"> 
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="register-card">
                    <div class="row">
                        <div class="col-lg-6 left-side">
                            <div class="logo">
                                <a href="{{route('homepage')}}">
                                  <img src="{{ asset('images/logo.png') }}" alt="CertVerification.com">
                                </a>
                              </div>
                              <div class="select-div">
                                <label for="registrationType">Select Registration Type:</label>
                                <select id="registrationType" class="form-control" onchange="showSelectedForm()">
                                  <option value="" selected>--select--</option>
                                  <option value="business">Business Registration ( Employer )</option>
                                  <option value="institution">Institution Registration ( Academic )</option>
                                </select>
                  
                                <div id="business-description" class="form-description">
                                </div>
                                <div id="institution-description" class="form-description">
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-wrapper">
                                <div id="welcome-message" class="welcome-message">
                                  <p class="welcometext">Welcome to <br> Certverification.com</p>
                                  <img src="{{ asset('images/institute.jpg') }}" alt="image" class="institute-image">
                                </div>
                  
                                <!-- Employer Form -->
                                <form id="business-form" class="form" action="{{ route('register.employer') }}" method="POST">
                                  @csrf
                                  <h3 class="form-title">Register a Business</i></h3>
                                  <div class="row">
                                    <div class="col-md-6 mb-3">
                                      <label for="businessName">Business Name<i class="asteric">*</i></label>
                                      <input type="text" class="form-control" id="businessName" name="name" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                      <label for="fullName">Full Name (Account Creator)<i class="asteric">*</i></label>
                                      <input type="text" class="form-control" id="fullName" name="fullname" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="businessRegistration">Business Registration<i class="asteric"> *</i></label>
                                      <input type="text" class="form-control" id="businessRegistration" name="registrationnumber" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                                      <input type="text" class="form-control" id="phoneNumber" name="phone" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="businessLocation">Business Location<i class="asteric"> *</i></label>
                                      <input type="businessLocation" class="form-control" id="businesslocation" name="address">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="Idtype" >ID Type *</label>
                                      <select class="form-select" id="idtype" name="idtype" required>
                                          <option value="">--select--</option>
                                          <option value="National ID">National ID</option>
                                          <option value="Driver's License">Driver's License</option>
                                          <option value="Passport">Passport</option>
                                      </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="website">Business Website<i class="asteric"></i></label>
                                      <input type="text" class="form-control" id="website" name="website">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="idNumber">ID Number<i class="asteric"> *</i></label>
                                      <input type="text" class="form-control" id="idnumber" name="idnumber" required>
                                    </div>
                  
                                    <div class="col-md-6 mb-3">
                                      <label for="industry">Email<i class="asteric"> *</i></label>
                                      <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                  
                                    <div class="col-md-6 mb-3">
                                      <label for="industry">Industry<i class="asteric"> *</i></label>
                                      <input type="text" class="form-control" id="industry" name="industry" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="password">Password<i class="asteric"> *</i></label>
                                      <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
                                      <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                                    </div>
                                  </div>
                                  <p class="text-warning">Please choose a stronger password. Use a mix of letters, numbers and symbols.</p>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="agreement" required>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        By clicking on register you have confirmed that you have read and accepted certverification.com <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span>
                                    </label>
                                  </div>
                                  <button type="submit" class="btn btn-primary w-100">Register</button>
                                </form>
                  
                                <!-- Institution Form -->
                                <form id="institution-form" class="form" action="{{ route('register.institution') }}" method="POST">
                                  @csrf
                                  <h3 class="form-title">Register an Institution</h3>
                                  <div class="row">
                                    <div class="col-md-6 mb-3">
                                      <label for="institutionName">Name of Institution<i class="asteric"> *</i></label>
                                      <input type="text" class="form-control" id="institutionName" name="institutions" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                                      <input type="text" class="form-control" id="fullName" name="fullname" required>
                                    </div>
                  
                                    <div class="col-md-6 mb-3">
                                      <label for="countries">Select Country:</label>
                                      <select class="form-select" id="countries">
                                        <option value="">Loading countries...</option>
                                      </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                                      <input type="tel" class="form-control" id="phoneNumber" name="phone" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="physicalAddress">City<i class="asteric"> *</i></label>
                                      <input type="text" class="form-control" id="physicalAddress" name="address" required>
                                    </div>
                  
                                    <div class="col-md-6 mb-3">
                                      <label for="email">Email<i class="asteric"> *</i></label>
                                      <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="location">Location<i class="asteric"> *</i></label>
                                      <input type="text" class="form-control" id="location" name="location" required>
                                    </div>
                  
                                    <div class="col-md-6 mb-3">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password-input">Password</label>
                                    <!-- <input type="password" class="form-control" id="password-input" placeholder="Enter Password" required> -->

                                    <div class="password-container">
                                    <input id="password" type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">
                                    <i class="fa fa-eye" id="togglePassword" aria-hidden="true"></i>
                                    </div>
                                  
                                </div>
                                    </div>
                                    
                  
                                    <div class="col-md-6 mb-3">
                                      <label for="website">Website<i class="asteric"> </i></label>
                                      <input type="text" class="form-control" id="website" name="website" >
                                    </div>
                  
                                    <div class="col-md-6 mb-3">
                                      <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
                                      <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                                    </div>
                                  </div>
                                  <p class="text-warning">Please choose a stronger password. Use a mix of letters, numbers and symbols.</p>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" name="agreement" required>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        By clicking on register you have confirmed that you have read and accepted certverification.com <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span>
                                    </label>
                                  </div>
                                  <button type="submit" class="btn btn-primary w-100">Register</button>
                                </form>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function showModal() {
        document.getElementById('errorModal').style.display = 'block';
        document.getElementById('modalBackdrop').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('errorModal').style.display = 'none';
        document.getElementById('modalBackdrop').style.display = 'none';
    }

    if (errors.length > 0) {
        let errorMessage = "<ul>";
        
        errors.forEach(function(error) {
            errorMessage += "<li>" + error + "</li>";
        });
        errorMessage += "</ul>";

        // Insert the error messages into the modal
        document.getElementById('modalErrors').innerHTML = errorMessage;

        // Show the modal
        showModal();
    }
</script>


@endsection
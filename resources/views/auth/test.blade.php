@extends('layouts.auth')

@section('content')

<style>
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

<div class="container-fluid bg-gradient">
    <div class="row">
        <div class="col-lg-8 login-card mx-auto">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-6 my-auto images">
                        <div class="logo">
                            <a href="{{route('homepage')}}">
                                <img src="{{ asset('images/logo.png') }}" alt="CertVerification.com">
                            </a>
                        </div>
                        <div class="other">
                            <img src="{{ asset('images/login-image.jpeg') }}" alt="image.jpeg">
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form">
                            <div class="logo">
                                <a href="{{route('homepage')}}">
                                    <img src="{{ asset('images/logo.png') }}" alt="CertVerification.com">
                                </a>
                            </div>
                            <h5 class="welcome">Welcome Back</h5>
                            <h4 class="signin">Sign In</h4>
                            @if(session('message'))
                                <p class="alert alert-info">
                                    {{ session('message') }}
                                </p>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email-input">Email</label>
                                    <!-- <input type="email" class="form-control" id="username-input" placeholder="Enter email" required> -->
                                    <input id="email" type="email" name="email" class="form-control" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                                    @if($errors->has('email'))
                                    <p class="help-block">
                                        {{ $errors->first('email') }}
                                    </p>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password-input">Password</label>
                                    <!-- <input type="password" class="form-control" id="password-input" placeholder="Enter Password" required> -->

                                    <div class="password-container">
                                    <input id="password" type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">
                                    <i class="fa fa-eye" id="togglePassword" aria-hidden="true"></i>
                                    </div>
                                    @if($errors->has('password'))
                                    <p class="help-block">
                                        {{ $errors->first('password') }}
                                    </p>
                                    @endif
                                </div>

              
                                <div class="checkbox icheck">
                                    <label><input type="checkbox" name="remember"> {{ trans('global.remember_me') }}</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>
                            <div class="d-flex justify-content-between">
                                <i>@if(Route::has('password.request'))<a href="{{ route('password.request') }}">Forgot Password?</a> @endif</i>
                                <i class="signup"><a href="{{ route('registrationpage') }}">Sign up Here</a></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const passwordType = passwordField.getAttribute('type');
    
    if (passwordType === 'password') {
        passwordField.setAttribute('type', 'text');
        this.classList.remove('fa-eye');
        this.classList.add('fa-eye-slash');
    } else {
        passwordField.setAttribute('type', 'password');
        this.classList.remove('fa-eye-slash');
        this.classList.add('fa-eye');
    }
});


</script>
@endsection
@section('scripts')
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>


@endsection






















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
<div id="errorModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; z-index: 1000; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
<div class="modal-header">
        <h6 class="modal-title text-center text-white" id="exampleModalLabel">Take Note</h6>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
<div id="modalErrors">


</div>
    <button  class="btn btn-primary" onclick="closeModal()">Close</button>
</div>

<div class="container-fluid bg-gradient ">
  <div class="row">
    <div class="col-lg-9 bg-white mx-auto register-card ">
      <div class="wrapper ">
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
                <option value="" selected>--Select--</option>
                <option value="business">Business Registration</option>
                <option value="institution">Institution Registration</option>
              </select>
            </div>
          </div>


          <div class="col-lg-6">
            <div class="form-wrapper">
              <div id="welcome-message" class="welcome-message">
                <p class="welcometext">Welcome to <br> Certverification.com</p>
                <img src="{{ asset('images/institute.jpg') }}" alt="image" class="institute-image">
              </div>

              <!-- Employer Form -->
              <form id="business-form" class="form" action="{{ route('register.employer') }}" method="POST">
                @csrf 
                <h3 class="form-title">Register a Business</i></h3>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="businessName">Business Name<i class="asteric">*</i></label>
                    <input type="text" class="form-control" id="businessName" name="name">
                  </div>
                  <div class="col-md-6 mb-2">
                    <label for="fullName">Full Name (Account Creator)<i class="asteric">*</i></label>
                    <input type="text" class="form-control" id="fullName" name="fullname">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="businessRegistration">Business Registration<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="businessRegistration" name="registrationnumber">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="phoneNumber" name="phone">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="businessLocation">Business Location<i class="asteric"> *</i></label>
                    <input type="businessLocation" class="form-control" id="businesslocation" name="address">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="Idtype">ID Type<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="idtype" name="idtype">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="website">Business Website<i class="asteric"> </i></label>
                    <input type="text" class="form-control" id="website" name="website">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="idNumber">ID Number<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber">
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="industry">Email<i class="asteric"> *</i></label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="industry">Industry<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="industry" name="industry">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="password">Password<i class="asteric"> *</i></label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation">
                  </div>
                </div>
                <p class="text-warning">Please choose a stronger password. Use a mix of letters, numbers and symbols.</p>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="agreement" name="agreement">
                  <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted certverification.com <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
              </form>

              <!-- Institution Form -->
              <form id="institution-form" class="form" action="{{ route('register.institution') }}" method="POST">
                @csrf
                <h3 class="form-title">Register an Institution</h3>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="institutionName">Name of Institution<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="institutionName" name="institutions" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="fullName" name="fullname" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="fullName">Select Country<i class="asteric"> *</i></label>
                    <input type="text" list="country-list" class="form-control" id="country-input" name="country" placeholder="Type to search countries" required>
                    <datalist id="country-list">
                      <!-- Options will be dynamically populated here -->
                    </datalist>
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
    <label for="password">Password<i class="asteric"> *</i></label>
    <div class="password-container">
        <input type="password" class="form-control" id="password" name="password" required>
        <i class="fa fa-eye" id="togglePassword" aria-hidden="true"></i>
    </div>
</div>


                  <div class="col-md-6 mb-3">
                    <label for="website">Website<i class="asteric"></i></label>
                    <input type="text" class="form-control" id="website" name="website" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                    
                  </div>
                </div>
                <p class="text-warning">Please choose a stronger password. Use a mix of letters, numbers and symbols.</p>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
                  <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted CVS <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
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
document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

</script>
<script>
  function showSelectedForm() {
    const selectField = document.getElementById('registrationType');
    const selectedOption = selectField.value;

    const welcomeMessage = document.getElementById('welcome-message');
    const forms = document.querySelectorAll('.form');
    const descriptions = document.querySelectorAll('.form-description');

    if (selectedOption === '') {
      welcomeMessage.style.display = 'block';
      forms.forEach(form => {
        form.style.display = 'none';
      });
      descriptions.forEach(desc => {
        desc.style.display = 'none';
      });
    } else {
      welcomeMessage.style.display = 'none';
      forms.forEach(form => {
        form.style.display = 'none';
      });
      descriptions.forEach(desc => {
        desc.style.display = 'none';
      });

      document.getElementById(selectedOption + '-form').style.display = 'block';
      document.getElementById(selectedOption + '-description').style.display = 'block';
    }
  }

  // Ensure welcome message is displayed when default option is manually selected
  document.addEventListener('DOMContentLoaded', function() {
    const selectField = document.getElementById('registrationType');
    const welcomeMessage = document.getElementById('welcome-message');

    if (selectField.value === '') {
      welcomeMessage.style.display = 'block';
    }
  });
</script>

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
        let errorMessage = "<ul class='bullet'>";
        
        errors.forEach(function(error) {
            errorMessage += "<li>" + error + "</li>";
        });
        errorMessage += "<ul class='bullet'>";

        // Insert the error messages into the modal
        document.getElementById('modalErrors').innerHTML = errorMessage;

        // Show the modal
        showModal();
    }
</script>

@endsection








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
<div id="errorModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; z-index: 1000; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
<div class="modal-header">
        <h6 class="modal-title text-center text-white" id="exampleModalLabel">Take Note</h6>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
<div id="modalErrors">


</div>
    <button  class="btn btn-primary" onclick="closeModal()">Close</button>
</div>

<div class="container-fluid bg-gradient ">
  <div class="row">
    <div class="col-lg-9 bg-white mx-auto register-card ">
      <div class="wrapper ">
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
                <option value="" selected>--Select--</option>
                <option value="business">Business Registration</option>
                <option value="institution">Institution Registration</option>
              </select>
            </div>
          </div>


          <div class="col-lg-6">
            <div class="form-wrapper">
              <div id="welcome-message" class="welcome-message">
                <p class="welcometext">Welcome to <br> Certverification.com</p>
                <img src="{{ asset('images/institute.jpg') }}" alt="image" class="institute-image">
              </div>

              <!-- Employer Form -->
              <form id="business-form" class="form" action="{{ route('register.employer') }}" method="POST">
                @csrf 
                <h3 class="form-title">Register a Business</i></h3>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="businessName">Business Name<i class="asteric">*</i></label>
                    <input type="text" class="form-control" id="businessName" name="name">
                  </div>
                  <div class="col-md-6 mb-2">
                    <label for="fullName">Full Name (Account Creator)<i class="asteric">*</i></label>
                    <input type="text" class="form-control" id="fullName" name="fullname">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="businessRegistration">Business Registration<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="businessRegistration" name="registrationnumber">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="phoneNumber" name="phone">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="businessLocation">Business Location<i class="asteric"> *</i></label>
                    <input type="businessLocation" class="form-control" id="businesslocation" name="address">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="Idtype">ID Type<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="idtype" name="idtype">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="website">Business Website<i class="asteric"> </i></label>
                    <input type="text" class="form-control" id="website" name="website">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="idNumber">ID Number<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber">
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="industry">Email<i class="asteric"> *</i></label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="industry">Industry<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="industry" name="industry">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="password">Password<i class="asteric"> *</i></label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation">
                  </div>
                </div>
                <p class="text-warning">Please choose a stronger password. Use a mix of letters, numbers and symbols.</p>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="agreement" name="agreement">
                  <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted certverification.com <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
              </form>

              <!-- Institution Form -->
              <form id="institution-form" class="form" action="{{ route('register.institution') }}" method="POST">
                @csrf
                <h3 class="form-title">Register an Institution</h3>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="institutionName">Name of Institution<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="institutionName" name="institutions" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                    <input type="text" class="form-control" id="fullName" name="fullname" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="fullName">Select Country<i class="asteric"> *</i></label>
                    <input type="text" list="country-list" class="form-control" id="country-input" name="country" placeholder="Type to search countries" required>
                    <datalist id="country-list">
                      <!-- Options will be dynamically populated here -->
                    </datalist>
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
    <label for="password">Password<i class="asteric"> *</i></label>
    <div class="password-container">
        <input type="password" class="form-control" id="password" name="password" required>
        <i class="fa fa-eye" id="togglePassword" aria-hidden="true"></i>
    </div>
</div>


                  <div class="col-md-6 mb-3">
                    <label for="website">Website<i class="asteric"></i></label>
                    <input type="text" class="form-control" id="website" name="website" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                    
                  </div>
                </div>
                <p class="text-warning">Please choose a stronger password. Use a mix of letters, numbers and symbols.</p>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="agreement" name="agreement" required>
                  <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted CVS <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
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
document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

</script>
<script>
  function showSelectedForm() {
    const selectField = document.getElementById('registrationType');
    const selectedOption = selectField.value;

    const welcomeMessage = document.getElementById('welcome-message');
    const forms = document.querySelectorAll('.form');
    const descriptions = document.querySelectorAll('.form-description');

    if (selectedOption === '') {
      welcomeMessage.style.display = 'block';
      forms.forEach(form => {
        form.style.display = 'none';
      });
      descriptions.forEach(desc => {
        desc.style.display = 'none';
      });
    } else {
      welcomeMessage.style.display = 'none';
      forms.forEach(form => {
        form.style.display = 'none';
      });
      descriptions.forEach(desc => {
        desc.style.display = 'none';
      });

      document.getElementById(selectedOption + '-form').style.display = 'block';
      document.getElementById(selectedOption + '-description').style.display = 'block';
    }
  }

  // Ensure welcome message is displayed when default option is manually selected
  document.addEventListener('DOMContentLoaded', function() {
    const selectField = document.getElementById('registrationType');
    const welcomeMessage = document.getElementById('welcome-message');

    if (selectField.value === '') {
      welcomeMessage.style.display = 'block';
    }
  });
</script>

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
        let errorMessage = "<ul class='bullet'>";
        
        errors.forEach(function(error) {
            errorMessage += "<li>" + error + "</li>";
        });
        errorMessage += "<ul class='bullet'>";

        // Insert the error messages into the modal
        document.getElementById('modalErrors').innerHTML = errorMessage;

        // Show the modal
        showModal();
    }
</script>

@endsection
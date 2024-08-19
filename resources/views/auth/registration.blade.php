@extends('layouts.registration')
@section('content')

<div class="container-fluid h-100 bg-gradient">
  <div class="row h-100">
    <div class="col-md- col-lg-8 mx-auto my-auto inner-div">

      <div class="image">
        <a href="{{route('homepage')}}">
          <div class="logo mb-5"><img src="{{ asset('images/logo.png') }}" alt="CertVerification.com"></div>
        </a>

        <!-- <img src="institute.jpg" alt="image" class="institute-image"> -->

        <div class="select-div">
          <label for="registrationType">Select Registration Type:</label>
          <select id="registrationType" class="form-control" onchange="showSelectedForm()">
            <option value="" selected>--Select--</option>
            <option value="business">Business Registration</option>
            <option value="institution">Institution Registration</option>
          </select>

          <div id="business-description" class="form-description">
            <p>This form is for registering businesses. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, impedit magnam earum consequatur debitis accusantium?</p>
          </div>
          <div id="institution-description" class="form-description">
            <p>This form is for registering institutions. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam fugit possimus illo.</p>
          </div>
        </div>

      </div>

      <div class="vertical-divider"></div>

      <div class="form-div">

        <div id="welcome-message" class="welcome-message">
          <p class="welcometext">Welcome to Certverification.com</p>
          <img src="{{ asset('images/institute.jpg') }}" style="height: 150px; border-radius: 10px;" alt="image" class="institute-image">
          <!-- <img src="{{ asset('images/institute.jpg') }}" alt="image.jpeg"> -->
        </div>

        <!-- Employer Form -->
        <form id="business-form" class="form" action="{{ route('register.employer') }}" method="POST">
          @csrf
          <h3 class="welcometext">Register a Business</i></h3>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="businessName">Business Name <i class="asteric"> *</i></label>
              <input type="text" class="form-control" id="businessName" name="name">
            </div>
            <div class="col-md-6 mb-2">
              <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
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
              <label for="website">Business Website<i class="asteric">*</i></label>
              <input type="url" class="form-control" id="website" name="website">
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
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="agreement" name="agreement">
            <label class="form-check-label" for="agreement">By clicking on register you have confirmed that you have read and accepted certverification.com <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
          </div>
          <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <!-- Institution Form -->
        <form id="institution-form" class="form" action="{{ route('register.institution') }}" method="POST">
          @csrf
          <h3 class="welcometext">Register an Institution</h3>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="institutionName">Name of Institution<i class="asteric"> *</i></label>
              <input type="text" class="form-control" id="institutionName" name="institutions" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
              <input type="text" class="form-control" id="fullName" name="fullname" required>
            </div>
            <!-- <div class="col-md-6 mb-3">
                <label for="countrySelect">Select Country:</label>
                <select class="form-control" id="countrySelect" name="country">
                  <option value="select a country">Select a country</option>
                  <option value="us">Ghana</option>
                  <option value="ng">Nigeria</option>
                  <option value="uk">United Kingdom</option>
                  <option value="us">Unites States</option>
                </select>
              </div> -->

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
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="website">Website<i class="asteric"> *</i></label>
              <input type="text" class="form-control" id="website" name="website" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
              <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
            </div>
          </div>
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
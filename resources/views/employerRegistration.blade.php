@extends('layouts.inst')
@section('content')
<div class="container-fluid h-100 bg-gradient">
    <div class="row h-100">
        <div class="col-md- col-lg-8 mx-auto my-auto inner-div">


            <div class="image">
                <div class="logo"> <a href="{{route('homepage')}}">  <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="CertVerification.com"></div></a></div>

                <img src="{{ asset('images/employer.jpg') }}"
    alt="image.jpeg">

                   

<!-- <img src="institute.jpg"
    alt="image" class="institute-image"> -->


                
            </div>



            <div class="vertical-divider"></div>

            <div class="form-div">
                
                    <form>
                        <h3 class="welcometext">Welcome to Certverification.com</i></h3>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="businessName">Business Name <i class="asteric"> *</i></label>
                          <input type="text" class="form-control" id="businessName" name="businessName">
                        </div>
                        <div class="col-md-6 mb-2">
                          <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                          <input type="text" class="form-control" id="fullName" name="businessRegistration">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="businessRegistration">Business Registration<i class="asteric"> *</i></label>
                          <input type="text" class="form-control" id="businessRegistration" name="businessrRegistration">
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                          <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="businessLocation">Business Location<i class="asteric"> *</i></label>
                          <input type="businessLocation" class="form-control" id="businessLocation" name="businessLocation">
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="Idtype">ID Type<i class="asteric"> *</i></label>
                          <input type="text" class="form-control" id="Idtype" name="Idtype">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="website">Business Website<i class="asteric"> *</i></label>
                          <input type="url" class="form-control" id="website" name="website">
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="idNumber">ID Number<i class="asteric"> *</i></label>
                          <input type="text" class="form-control" id="idNumber" name="idNumber">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-12 mb-3">
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
                          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                        </div>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="agreement" name="agreement">
                        <label class="form-check-label" for="agreement">By clicking on register  you have  confirmed that you have read and accepted certverification.com <span class="terms">Terms of use</span> and <span class="privacy">Privacy Policy.</span></label>
                      </div >
                      <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                  </div>
            </div>
            @endsection

@section('scripts')
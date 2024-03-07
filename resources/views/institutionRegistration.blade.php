@extends('layouts.inst')
@section('content')
<div class="container-fluid h-100 bg-gradient">
            <div class="row h-100">
                <div class="col-md- col-lg-8 mx-auto my-auto inner-div">


                    <div class="image">
                    <a href="{{route('homepage')}}">  <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="CertVerification.com"></div></a>

                        <!-- <img src="institute.jpg"
                            alt="image" class="institute-image"> -->

                            <img src="{{ asset('images/institute.jpg') }}"
                            alt="image.jpeg">
                        
                    </div>

     

                    <div class="vertical-divider"></div>

                    <div class="form-div">
                      <form>
                          <h3 class="welcometext">Welcome to Certverification.com</h3>
                          <div class="form-row">
                              <div class="col-md-6 mb-3">
                                  <label for="institutionName">Name of Institution<i class="asteric"> *</i></label>
                                  <input type="text" class="form-control" id="institutionName" name="institutionName" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label for="fullName">Full Name (Account Creator)<i class="asteric"> *</i></label>
                                  <input type="text" class="form-control" id="fullName" name="fullName" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label for="countrySelect">Select Country:</label>
                                  <select class="form-control" id="countrySelect">
                                      <option value="">Select a country</option>
                                      <option value="us">Ghana</option>
                                      <option value="ng">Nigeria</option>
                                      <option value="uk">United Kingdom</option>
                                      <option value="us">Unites States</option>
                                  </select>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label for="phoneNumber">Phone Number<i class="asteric"> *</i></label>
                                  <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                              </div>
                              <div class="col-md-6 mb-3">
                                  <label for="physicalAddress">City<i class="asteric"> *</i></label>
                                  <input type="text" class="form-control" id="physicalAddress" name="physicalAddress" required>
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
                                  <input type="url" class="form-control" id="website" name="website" required>
                              </div>
                             
                              <div class="col-md-6 mb-3">
                                  <label for="confirmPassword">Confirm Password<i class="asteric"> *</i></label>
                                  <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
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
            @endsection

@section('scripts')
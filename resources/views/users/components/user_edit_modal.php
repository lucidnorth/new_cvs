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
                <label for="password">Kindly confirm your password to Update your <i class="asteric"> *</i></label>
             
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
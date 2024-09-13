@extends('layouts.app')
@section('content')

<style>
  .modal-header {
    background: #0b5ed6;
    justify-content: center;
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
</style>


<div class="jumbotron">
  <div class="container jumbotron-items">
    <div class="row jumbotron-rows-item ">
      <div class="col jumbotron-item1 my-auto">
        <div class="jumbotron-item1-content1">Conveniently Verify Academic
          And Professional Qualifications On Our Accredited Platform.</div>
        <p class="jumbotron-item1-content2">Authentic Verification<i class="bi bi-dot"></i>Real Time<i class="bi bi-dot"></i>Secure</p>
        <div class="d-flex">
          <a class="btn-sign" href="{{ route('login') }}">Sign In</a>
          <a class="btn-register" href="{{ route('registrationpage') }}">Register</a>
        </div>
      </div>
      <div class="col jumbotron-item2-content">
        <div class="">
          <!-- <img src="images/jumboimage.png" alt="logo"> -->
          <img src="{{ asset('images/jumboimage.png') }}" alt="Banner Image">

        </div>
      </div>
    </div>
  </div>
</div>

<div class="container px-4 text-center partners-container">
  <p class="partners-title">We have a special relationship with:</p>
  <div class="row gx-5 justify-content-center mb-3">

    <div class="owl-carousel vendor-carousel">
      <img src="{{ asset('images/knustlogo.jpg') }}" alt="knustlogo" class="partner-logo">
      <img src="{{ asset('images/central.png') }}" alt="central" class="partner-logo">
      <img src="{{ asset('images/knustlogo.jpg') }}" alt="knustlogo" class="partner-logo">
      <img src="{{ asset('images/ug.png') }}" alt="ug" class="partner-logo">
    </div>

  </div>
</div>


<div class="features container-fluid" id="features">
  <div class="container overflow-hidden text-center">
    <div class="titles">
      Features
    </div>
    <div class="row gy-5">
      <div class="col-lg-4 col-sm-12" id="verification">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#verificationModal">
          <div class="p-3">
            <img src="{{ asset('images/vnf.png') }}" alt="vnf" class="mb-3 feature-image">
            <div class="card-body">
              <h5 class="feature-title mb-3">Verification</h5>
              <p class="feature-text mb-3">We verify both academic and professional certifications. We have special relationship and
                accreditations from regulators, academic discourse communities and professional bodies.</p>

            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#employerModal">
          <div class="p-3">
            <img src="{{ asset('images/Employer.png') }}" alt="vnf" class="mb-3 feature-image">
            <div class="card-body">
              <h5 class="feature-title mb-3">Required Info To Sign Up As An Employer</h5>
              <p class="feature-text mb-3">To maintain our veracity, recruiters or employers are required to provide the following</p>

            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#institutionModal  ">
          <div class="p-3">
            <img src="{{ asset('images/Academic.png') }}" alt="vnf" class="mb-3 feature-image">

            <div class="card-body">
              <h5 class="feature-title mb-3">Required Info To Sign Up As An Academic Institution</h5>
              <p class="feature-text mb-3">To maintain our veracity, academic Institutions or professional institutions are required to
                provide the following</p>

            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-sm-12" id="digitalcertification">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#digitalModal  ">
          <div class="p-3">
            <img src="{{ asset('images/certverification.png') }}" alt="vnf" class="mb-3 feature-image">

            <div class="card-body">
              <h5 class="feature-title mb-3">Digital Certification</h5>
              <p class="feature-text mb-3">Our digital certificates are the modern version of traditional academic certificates.</p>

            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-sm-12" id="workwithus">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#profModal">
          <div class="p-3">
            <img src="{{ asset('images/professional.png') }}" alt="vnf" class="mb-3 feature-image">

            <div class="card-body">
              <h5 class="feature-title mb-3">Professional Recruitment Services</h5>
              <p class="feature-text mb-3">Our international and indigenous expertise recruits’ executives and qualified multilingual
                staff for business and academic institutions.</p>

            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#formModal ">
          <div class="p-3">
            <img src="{{ asset('images/work.png') }}" alt="vnf" class="mb-3 feature-image">

            <div class="card-body">
              <h5 class="feature-title mb-3">Work With Us From Anywhere</h5>
              <p class="feature-text mb-3">You can work from any place you feel most energized.</p>

            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="verificationModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Verification</h1>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
        <p>
          Certverification.com is a platform for verifying academic and professional credentials of
          potential and existing employees by employers, recruiters and academicians. More often
          than not, employers, recruitment agencies and academic institutions go through a lot to
          ascertain whether the qualifications of their staff or candidate are genuine. <br><br>This service
          removes the obstacles employers go through to validate credentials. Additionally, the portal
          offers the assessment of other vital information apart from the educational verification. Our
          system offers:
        </p>
        <ul class="bullet">
          <li>Verify the educational background of the potential and existing employees.</li>
          <li>Search for potential employees with key skills.</li>
          <li>Access remarks of former employers.</li>
          <li>Based on previous verification and searches, a recommendation list can be previewed.</li>
          <li>Reports on Industry case studies related to employment, training and the job market.</li>
          <li>Reports on Industry Skill Gaps to employment and training.</li>
          <li>Reports on new discipline introduced in the academic discourse community.</li>
          <li>News on Fraudulent job candidates.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="institutionModal" tabindex="-1" aria-labelledby="institutionModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Required Information to Sign Up as an Academic Institution</h1>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">

        <ul class="bullet">
          <li>Institution Name</li>
          <li>Account Manager’s Name</li>
          <li>City</li>
          <li>Country</li>
          <li>ID Type and Number</li>
          <li>Website (If any)</li>
          <li>Email Address</li>
          <li>Phone Number</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="employerModal" tabindex="-1" aria-labelledby="employerModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Required Information to Sign Up as an Employer</h1>
        <!--<button type="button" class="btn-close" style="color: white;" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
        <ul class="bullet">
          <li>Business Name</li>
          <li>Account Manager’s Name</li>
          <li>Business Registration Number</li>
          <li>Business Location</li>
          <li>ID Type and Number</li>
          <li>Business Website (If any)</li>
          <li>Email Address</li>
          <li>Phone Number</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="digitalModal" tabindex="-1" aria-labelledby="digitalModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Digital Certification</h1>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
        <p>
          Our
          digital certificates are hosted on a secured dedicated credential record with options to
          share. Digital certificates present all the same information as a traditional certificate and
          provide room for additional evidence such as transcripts, honor roll recognition, exam
          results, group works, worksheets, and dissertation (thesis) grades. <br><br>The credential page also
          includes details about the higher education program, the issuing institution, and a link to
          other credentials held by the recipient. We offer the following services for our digital
          certifications.
        </p>
        <ul class="bullet">
          <li>Issuance on Behalf of Academic Institutions</li>
          <li>Replacements</li>
          <li>Verification</li>
          <li>Sharing</li>
          <li>Security</li>
          <li>Longevity</li>
          <li>Portability</li>
          <li>Design</li>
          <li>Printable Certificates</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="profModal" tabindex="-1" aria-labelledby="profModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Professional Recruitment Services</h1>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
        <p>
          Our international and indigenous expertise recruits’ executives and qualified multilingual
          staff for business and academic institutions. Our process involves,
        </p>

        <ul class="bullet">
          <li>Identification</li>
          <li>Attracting</li>
          <li>Screening</li>
          <li>Verification and Validation of Credentials</li>
          <li>Shortlisting</li>
          <li>Interviewing</li>
          <li>Selecting</li>
          <li>Hiring</li>
          <li>Orientation</li>
          <li>Training and Onboarding</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Submit your Curriculumn Vitae </h1>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="name" class="col-form-label">Your Full Name:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">Phone Number:</label>
            <input type="telephone" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Country:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="mb-3">

            <input type="file" class="form-control" id="recipient-name">
          </div>
          <div style="text-align: right;">
            <button type="button" class="btn btn-primary">Submit CV</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container px-4 text-center academic-items mb-5">
  <div class="row academic-rows-item ">
    <div class="col academic-item1 my-auto">
      <div class="p-3 academic-item1-content1">To Invite Us Or Contact Us For Engagements.</div>
      <!--<p class="academic-item1-content2 p-3">Discover the original certificate of employees at the comfort of your home.</p>-->
      <div class="d-flex">
        <ul class="nav navbar-nav navbar-register">
          <li><a class="hover-btn-new btn-donate text-danger" href="{{ route('getInTouchpage') }}"><span>Click Here</span></a></li>
        </ul>
      </div>
    </div>
    <div class="col jumbotron-item2-content">
      <div class="p-3"><img src="{{ asset('images/academic-Image.png') }}" alt="logo"></div>
    </div>
  </div>
</div>

<div class="container-fluid announcement">
  <div class="container px-4 text-center mt-5">
    <div class=" mb-4 titles ">
      News
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-12">
        <div class="p-3"> 
          <a class="" href="" data-bs-toggle="modal" data-bs-target="#announcementModal  ">
            <div class="news-card">
              <img src="{{ asset('images/News-image.png') }}" alt="logo" class="mb-3 feature-image">
              <!-- <img src="{{ asset('images/news-image.png') }}" alt="employer" class="mb-3 feature-image">   -->
              <div class="announcement-body">
                <h5 class="announcement-title">Card title</h5>
                <p class="announcement-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-sm-12">
        <div class="p-3">
          <a class="" href="" data-bs-toggle="modal" data-bs-target="#announcementModal  ">
            <div class="news-card">
              <!-- <img src="images/news-image.png" alt="logo" class="mb-3 feature-image"> -->
              <img src="{{ asset('images/News-image.png') }}" alt="logo" class="mb-3 feature-image">
              <div class="announcement-body">
                <h5 class="announcement-title">Card title</h5>
                <p class="announcement-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-sm-12">
        <div class="p-3">
          <a class="" href="" data-bs-toggle="modal" data-bs-target="#announcementModal  ">
            <div class="news-card">
              <!-- <img src="images/news-image.png" alt="logo" class="mb-3 feature-image"> -->
              <img src="{{ asset('images/News-image.png') }}" alt="logo" class="mb-3 feature-image">
              <div class="announcement-body">
                <h5 class="announcement-title">Card title</h5>
                <p class="announcement-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <!-- <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">News Title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> -->
      <div class="modal-body">
        <div class="card" style="width: 100%;">
          <img src="images/news-image.png" class="card-img-top" alt="...">
          <div class="card-body">
            <p href="#" class="card-link">Date</a>
              <a href="#" class="card-link">Author</a>
            <h5 class="card-title mt-3">News Title</h5>
            <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container academic-items">
  <div class="row academic-rows-item ">
    <div class="col-lg-6 col-sm-12 academic-item1 my-auto">
      <div class="academic-item1-content1">Other Services We Offer</div>
      <!--<p class="academic-item1-content2 p-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatesa</p>-->

      <div class="international-items">
        <ol type="1" class="international-list">
          <li>SOCIAL BACKGROUND CHECK</li>
          <li>CRIMINAL BACKGROUND CHECK</li>
          <li>VERIFICATION OF DOCUMENTS AND CREDENTIALS CHECK</li>
          <li>SOCIAL MEDIA ACTIVITIES CHECK</li>
          <li>EMPLOYER AND COLLEAGUE RELATIONS</li>
          <li>TUTOR AND COLLEAGUE RELATIONS</li>
        </ol>
      </div>

      <a href="{{ route('getInTouchpage') }}" class="btn cont-btn">Contact Us</a>

      <!-- <div class="d-flex ">
        <ul class="nav navbar-nav navbar-register">
          <li><a class="hover-btn-new btn-donate text-danger" href="{{ route('getInTouchpage') }}"><span>Contact Us</span></a></li>
        </ul>
      </div> -->
    </div>

    <div class="col-lg-6 col-sm-12 jumbotron-item2-content">
      <div class="p-3">
        <img src="images/international-image.png" alt="image">
      </div>
    </div>
  </div>
</div>

<div class="full-width-section mt-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6">
        <div class="full-width-image">
          <img src="images/analytics.jpg" alt="Analytics Image" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="full-width-text">
          <h1 class="getperformance">Get Performance<br>Analytics</h1>
          <br>
          <a href="#" class="analysis btn btn-primary">Get Analytics</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="cardcontainer ">
  <div class="row">
    <div class="col-md-4">
      <a href="{{route('skills.index')}}">
        <div class="flip-card first">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="{{ asset('images/industrycasestudies1.png')}}" alt="logo" class="frontflip-img">
            </div>
            <div class="flip-card-back">
              <img src="{{ asset('images/industrycasestudies2.png')}}" alt="logo" class="frontflip-img">
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="{{route('skills.index')}}">
        <div class="flip-card second">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="{{ asset('images/skillsgap1.png')}}" alt="logo" class="frontflip-img">
            </div>
            <div class="flip-card-back">
              <img src="{{ asset('images/skillsgap2.png')}}" alt="logo" class="frontflip-img">
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="{{route('skills.index')}}">
        <div class="flip-card third">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="{{ asset('images/futureneededskills1.png')}}" alt="logo" class="frontflip-img">
            </div>
            <div class="flip-card-back">
              <img src="{{ asset('images/futureneededskills2.png')}}" alt="logo" class="frontflip-img">
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

@endsection
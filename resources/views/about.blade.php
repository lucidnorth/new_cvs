@extends('layouts.app')
@section('content')

<style>

/* .about-tab-content{
  margin: auto 0;
} */

</style>
<div class="container about-us-blade">

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  <h1 class="mb-4 mt-5 about-head">About Us</h1>
  <!-- Nav pills -->
  <ul class="nav nav-pills justify-content-center" id="myTabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#integrity">Integrity</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#accreditation">Mission</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#vision">Vision</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#faqs">FAQs</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class=" tab-content about-tab-content ">
    <div class="tab-pane container active" id="integrity">
      <p style="text-align: justify;">At Certverifcation.com, integrity means being true and authentic to our code of beliefs. It means that others can rely on us to act consistently and honestly, in accordance with this code. To operate with integrity requires us to have a clear understanding of what we want to achieve, and what we hold as most important, and to maintain harmony between these objectives and values, and our decisions and actions.
        <br><br>We are not prone to act in the moment to maximize short term benefits, to make choices based on emotion rather than rational consideration, to ignore little concerns when the overall proposition is attractive. <br><br>Operating with integrity requires us to choose the more difficult path, in the short-term, in order to get to where we really want to be in the longer term.
        We understand that integrity is the centrality of our business model and brand position.
      </p>
    </div>

    <div class="tab-pane container fade" id="vision">
      <p style="text-align: center; margin : 100px 0;">To constantly achieve customer intimacy by providing innovative solutions for recruiters, academic and professional discourse communities.</p>
    </div>

    <div class="tab-pane container fade" id="accreditation">
      <p style="text-align: center; margin : 100px 0;">To help people make productive decisions by providing real time verification and authentication of qualifications and documents. </p>
    </div>

    <div class="tab-pane container fade" id="faqs">

      <h2>Frequently Asked Questions</h2>

      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              How Does The Verification Work?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              What Do I Need To Sign Up As An Employer?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              What Do I Need To Sign Up As An Academic Institution?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
              What Is The Purpose Of The Digital Certificate?
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
              What Other International Services Do you Offer?
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
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
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
              How Can I Work With Certverifcation?
            </button>
          </h2>
          <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <form action="{{ route('form.workwithus') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="col-form-label">Your Full Name:</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="message" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message" name="message" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="phone" class="col-form-label">Phone Number:</label>
                  <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                  <label for="country" class="col-form-label">Country:</label>
                  <input type="text" class="form-control" id="country" name="country" required>
                </div>
                <div class="mb-3">
                  <label for="cv" class="col-form-label">Upload Your CV:</label>
                  <input type="file" class="form-control" id="cv" name="cv" required>
                </div>
                <div style="text-align: right;">
                  <button type="submit" class="btn btn-primary">Submit CV</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
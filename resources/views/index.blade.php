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
      <img src="{{ asset('images/upsa-logo.png') }}" alt="knustlogo" class="partner-logo">
      <img src="{{ asset('images/ghana-logo.png') }}" alt="central" class="partner-logo">
      <img src="{{ asset('images/knust-logo.png') }}" alt="knustlogo" class="partner-logo">
      <img src="{{ asset('images/ucc-logo.png') }}" alt="ug" class="partner-logo">
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
      <form action="{{ route('form.workwithus') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Your Full Name:</label>
                    <input type="text" class="form-control" id="recipient-name" name="name">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text" name="userMessage"></textarea>
                </div>
                <div class="mb-3">
                    <label for="phone" class="col-form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="country" class="col-form-label">Country:</label>
                    <<input type="text" class="form-control" id="country" name="country">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" id="cv" name="cv">
                </div>
                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Submit CV</button>
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
              <img src="{{ asset('images/first-news.jpg') }}" alt="logo" class="mb-3 feature-image">
              <!-- <img src="{{ asset('images/news-image.png') }}" alt="employer" class="mb-3 feature-image">   -->
              <div class="announcement-body">
                <h5 class="announcement-title fs-small">The Importance of Education Verification in Your Company’s Hiring Processes.</h5>
                <p class="announcement-text">Education verification should always be an integral part of your company’s hiring processes.</p>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-sm-12">
        <div class="p-3">
          <a class="" href="" data-bs-toggle="modal" data-bs-target="#announcementModal2  ">
            <div class="news-card">
              <!-- <img src="images/news-image.png" alt="logo" class="mb-3 feature-image"> -->
              <img src="{{ asset('images/second-news.jpg') }}" alt="logo" class="mb-3 feature-image">
              <div class="announcement-body">
                <h5 class="announcement-title">Fake Doctor Busted for FraudS</h5>
                <p class="announcement-text"> 31-year-old Daniel Okyere, who posed as a medical doctor to defraud his victim of an amount of Eighteen Thousand, Nine Hundred and Sixty-One Ghana Cedis (GH₵ 18,961.00), has been arrested by the Dansoman Police.</p>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-sm-12">
        <div class="p-3">
          <a class="" href="" data-bs-toggle="modal" data-bs-target="#announcementModal3  ">
            <div class="news-card">
              <!-- <img src="images/news-image.png" alt="logo" class="mb-3 feature-image"> -->
              <img src="{{ asset('images/third-news.webp') }}" alt="logo" class="mb-3 feature-image">
              <div class="announcement-body">
                <h5 class="announcement-title">How Thousands Of Nurses Got Licensed With Fake Degrees</h5>
                <p class="announcement-text">There’s an old, but now fast growing degree mill industry doing an estimated $7 billion a year worldwide in fraudulent diplomas and transcripts.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- News Model -->

<div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg  modal-dialog-scrollable">
    <div class="modal-content">
      <!-- <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">News Title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> -->
      <div class="modal-body" style="width: 1oo%;">
      <div class="" >
  <img src="{{ asset('images/first-news.jpg') }}" class="card-img-top" alt="...">
  <div class="card-body">
  <ul class=" ">
    <li class="list-group-item mt-3">Date :  </li>
    <li class="list-group-item mt-3">Author:</li>
    <li class="list-group-item mt-3 fw-bold fs-5">The Importance of Education Verification in Your Company’s Hiring Processes</li>
    <li class="list-group-item mt-3">
Education verification should always be an integral part of your company’s hiring processes. When completing a background check on prospective employees, it is important to know that the candidate in question is not only qualified, but their credentials can be verified. Knowing that incoming employees are credible will go a long way to building confidence and trust in them.

Some candidates may be tempted to embellish – or outright lie about – their educational background and degrees obtained on their resumes. If you do not verify their credentials, you risk hiring unqualified and unreliable employees that would, undoubtedly, damage your business and its reputation. Not completing background checks is the most common way that business’s allow negligent hiring practices to take hold.

Whatever industry, organisation or business type you find yourself in, understanding the education verification process will help ensure that you are hiring trustworthy and capable candidates every time. Here are some common questions surrounding education verification in the hiring process:

What Is Education Verification?
Complete educational background checks will aim to verify the certifications, qualifications, training and educational histories of prospective employees. Education verification services will assess the veracity of an applicant’s backgrounds to ensure high-quality candidates are found. It is important to ensure that all candidates you hire are who and what they claim to be.

Jobseekers may provide inaccurate or incomplete information about degrees, certificates or diplomas in order to secure a job opportunity. This is why verifying the educational history of a job applicant is a vital part of the vetting and hiring processes. The majority of jobs in South Africa require a minimum level of education to apply and that high school, university or technical qualification must always be verified.

What Does a Robust Education Verification Process Do for Employers?
Ensure that applicants are trustworthy and fully qualified

Hiring new employees at your company can be a huge benefit to your workplace or a risk to the way you do business and how that business is seen by the market. You want make sure your newly hired employees fall into the former. Education verification services can help you find fully qualified and credible candidates by authenticating their educational background, such as certificates, diplomas and degrees.

Avoid negligent hiring liability

Having the requisite skills, qualifications and knowledge to perform a job reliably is the foundation of a good hiring process. However, if you do not verify the educational background of a prospective employee, your business or organisation could be liable for negligent hiring practices, if their inability causes harm. Thoroughly screening candidates will help your business find the right person for the job and avoid any legal liability.

Recognise fake degrees, qualifications and institutions

The proliferation of the Internet, digital technologies and online actors has led to a rise in the creation and sale of fake credentials. These “diploma mills” will give out degrees and other qualifications to anyone willing to pay. The certifications obtained may seem legitimate and even have websites, phone numbers and email addresses associated with them. It is critical to be able to identify unaccredited, falsified and phony qualifications from fake institutions.

Verify that licenses and certifications for specialised work are legitimate

There are many positions in different industries that require job-specific training and qualifications, such as in the health care, education, travel, legal, fitness and financial industries. The licenses and certifications associated with work in these fields are critical for ensuring that those professionals have the skills and education to perform their jobs successfully. Again, failure to verify their training can lead the negligent hiring liability for your organisation.

Identify falsifications of degrees achieved and universities attended

Another way that applicants misrepresent their educational backgrounds is to claim degrees they did not complete or claim that their qualifications are from a university they never attended. If the goal of an employer is to find the most qualified and trustworthy candidates for the job, companies need to verify their educational backgrounds. This includes less overt attempts to falsify degrees, like lying about how, where and if they completed the degree.

Receive fast and reliable reports to make the hiring process easier

Attempting to verify the educational background of a potential employee, by needing to contact every institution and receive proof of their claims, can take weeks to conduct. Investing in an educational verification service will help employers obtain accurate, quick and complete information on that candidate. The broad access they have to labour, institutional and occupational databases make the reporting process much more streamlined than doing it yourself.

Know that your company complies with privacy and data security laws

The POPI Act is the latest and biggest information protection regulation that South Africa’s government has introduced. Naturally, the hiring process will have employers handling sensitive data and the personal information of candidates, which requires them to be in compliance with all privacy laws. Verification service providers will always ensure that personal information is handled with care and in accordance with the law.

What Should Employers Do About It?
Employers need to make sure that every new hire is the best person for the job, with the right credentials and skills for the job. Your hiring process should include more than a quick, superficial background check, like a simple phone call, Google search and LinkedIn visit. You can perform various official checks, such as academic verification reports, certificate verification and criminal histories through a trusted partner. Do not be taken for a ride!

Start with the following:

Notify the applicant that you intend to complete a pre-employment screening.
Get the applicant’s signed consent to perform the background check.
Get the applicant’s full name that he or she graduated under, as well as his or her current full name.
Get the educational institution’s name, contact information and address.
Get the dates of attendance.
Ask for the degree field and the type of degree that was achieved, this includes non-degree qualifications or certifications that are obtained.
How Long Does Education Verification Take?
The extent of an educational background check will depend on the type and complexity of the verification processes being conducted. A candidate with a high school diploma and a few short courses will take much longer than a candidate with multiple tertiary qualifications and degrees. Subject focus, level of education, dates attended and trainings completed will all play a role in the length and extent of the education verification process.

Whether it takes a few days or few weeks, it is worth knowing that your new employee is credible and honest; with all the right skills and qualifications for the post. Having a reliable verification service provider, like MarisIT, will help streamline your business’s hiring processes and help employers secure the right candidate for the job.</li>
  </ul>
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="announcementModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <!-- <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">News Title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> -->
      <div class="modal-body" style="width: 1oo%;">
      <div class="" >
  <img src="{{ asset('images/second-news.jpg') }}" class="card-img-top" alt="...">
  <div class="card-body">
  <ul class=" ">
    <li class="list-group-item mt-3">Date :  </li>
    <li class="list-group-item mt-3">Author:</li>
    <li class="list-group-item mt-3 fw-bold fs-5">FAKE DOCTOR BUSTED FOR FRAUD</li>
    <li class="list-group-item mt-3">
    A 31-year-old Daniel Okyere, who posed as a medical doctor to defraud his victim of an amount of Eighteen Thousand, Nine Hundred and Sixty-One Ghana Cedis (GH₵ 18,961.00), has been arrested by the Dansoman Police.

According to the victim, she met the suspect in June 2018, at the Kotoka International Airport, where contacts were exchanged.

In one of their telephone conversations, the suspect introduced himself as a medical doctor resident in London. He further stated that his mother, who also lives in London, died, and that he being her only son, needed five family members to accompany him travel to London for the funeral rites.

Daniel Okyere later told the victim that he intended to include her for the trip and thereby demanded her passport and the said amount to enable him acquire United Kingdom Visa within three months.

However, after having provided the money, the suspect failed to make available the documents, and all efforts to get him proved futile.

The victim, on July 8, 2018, called for the re-arrest of Daniel Okyere when she overhead that he was arrested in a similar case and subsequently detained at Asamankese Police Station.

Daniel Okyere admitted to having committed the crime and is assisting police in investigations.

The police further suspect him of having used the same modus to defraud unsuspecting victims and therefore calling on anybody who has fallen victim to any of his fraudulent schemes to report to the Dansoman Police for further statements in investigating him.

The Accra Regional Police Command is hereby using this medium to caution the general public against persons or agents who appear to offer assistance during Visa acquisition processes but rather resort to the consular section of the embassies.

 Post Views: 1,953</li>
  </ul>
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="announcementModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <!-- <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">News Title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> -->
      <div class="modal-body" style="width: 1oo%;">
      <div class="" >
  <img src="{{ asset('images/third-news.webp') }}" class="card-img-top" alt="...">
  <div class="card-body">
  <ul class=" ">
    <li class="list-group-item mt-3">Date :  </li>
    <li class="list-group-item mt-3">Author:</li>
    <li class="list-group-item mt-3 fw-bold fs-5">How Thousands Of Nurses Got Licensed With Fake Degrees</li>
    <li class="list-group-item mt-3">
    Aloved one is in the hospital or a nursing home. How do you know if that registered nurse or licensed practical nurse providing bedside care has received the proper training? In January, the Justice Department unsealed criminal conspiracy and wire fraud charges against 25 people in connection with the sale of 7,600 fake diplomas from three now-defunct Southern Florida nursing schools for $114 million. The certificates enabled untrained individuals to sit for the national nursing board exams and at least 2,800 of them passed.

The unsettling result: fake nurses were working everywhere from Texas nursing homes to a New Jersey assisted living facility to a New York agency caring for homebound pediatric patients. The Department of Veterans Affairs has had to remove 89 phony-degreed nurses from direct patient care as a result of what the Feds call “Operation Nightingale.’’ (The VA says it has uncovered no actual patient harm.) State licensing boards are also scrambling—Delaware has annulled 26 licenses of working nurses, Georgia has asked 22 to surrender their licenses, and Washington state is investigating 150 applicants with fraudulent credentials.

In recent months, Republican Congressman George Santos’ lies have drawn attention to the problem of fraudulent degree claims (in a survey last year, nearly a fourth of workers admitted to having fibbed on a resume about a college degree or credential), while ChatGPT has heightened concerns about how easy it is—and how much easier it might become—to cheat one’s way to a legitimate degree.

Now, the nursing diploma scandal and a new scholarly book are putting the spotlight on another underappreciated and fast growing fraud problem in education: phony degree mills. Fake Degrees and Fraudulent Credentials in Higher Education, edited by three Canadian academics, argues academic integrity scholars have paid too little attention to fake degrees, which are “just as important, if not more so, than other forms of academic fraud,’’ such as cheating and plagiarism.

In fact, there’s so little scholarly research on degree mills that the Canadian editors turned for insight to Allen Ezell, an 81-year-old retired FBI agent who holds 65 degrees, only one of them legitimate—an associate’s degree in accounting from Strayer University. Ezell spent the last 11 of his 31 years as an FBI agent running Operation Diploma Scam (Dipscam), before retiring at the end of 1991 to a job in corporate fraud investigations at a big bank, and then “retiring” again in 2010, to research, write and lecture on diploma mills.

While no one can really know the size of the market, Ezell estimates that phony degree mills now do $7 billion a year in sales worldwide, with much of that market in the United States and the Middle East, particularly the Gulf region. That’s exploded from $1 billion in 2004, he figures, thanks to the internet, the push to educate more adults online and the Covid-19 era shift to online classes for college-aged students too.

The U.S. has long been a hotbed for fake diplomas because of its emphasis on educational degrees, its decentralized system for accrediting schools and its relatively free market in education, the book asserts. House and Senate committees have held hearings on the problem for decades—but those haven’t actually led to any legislative fixes.

In separate interviews with Forbes, Ezell and University of Calgary professor and academic integrity expert Sarah Eaton, one of the Canadian book editors, described how governments devote too little effort to shutting down diploma mills and hiring managers, including at universities themselves, do too little to check for fake degrees—whether they be from mills or fraudulent claims of degrees from legit universities (a la George Santos).

“We work in higher education where degrees matter a lot, and you need not just one, but multiple degrees to get a full-time job now,” Eaton says. “When we found out anecdotally that there was no systematic practice for hiring managers to check the credentials of applicants, we were floored.”

Notably, the United States does not explicitly outlaw advertising, issuing, or holding fake degrees, though prosecutors have used various broad criminal statutes, including wire and mail fraud, to go after different schemes. “There’s a law against people holding a fake passport, so why not against holding a fake degree?” asks Eaton.

Eaton and Ezell don’t underplay the difficulty of cracking down on the mills or screening out fake degree holders. For example, Eaton notes, creating a definitive blacklist of fake schools or diploma mills would be impossible, because the fraudsters can easily change their names, internet domains and other information to keep themselves off such lists. Instead, she suggests employers check with a reputable education agency—in the United States, the Department of Education maintains a list of current and formerly accredited and legitimate colleges and universities. Ezell points approvingly to Oregon, where by law, its Office of Degree Authorization (ODA) protects students, employers and licensing boards by compiling information on accredited programs, evaluating transcripts from unaccredited ones and providing information on degree mills.</li>
Eaton’s book argues that the terms “diploma mill” and “degree mill” are often used too broadly by the media and those in higher education to describe low-quality, for-profit schools that leave graduates with comparatively worthless credentials—the kind of schools the government has attempted to cut off from federal student loans. That doesn’t make them fake degree mills, which provide no classes, require no work and often exist only online. As Ezell tells it, the 64 fake bachelors, master’s and doctorates he holds were obtained with money, sometimes claims of “life experience” and “really not doing any work.” The most work he ever did for a fraudulent degree was a four-page paper for a master’s. Today, presumably, he could have spit the paper out with ChatGPT.

Ezell’s FBI Dipscam team (which disappeared after he retired from the agency), investigated around 80 suspected diploma mills, dismantled more than 40 of them and obtained 21 convictions. The brazenness of the business always impressed him. His first investigation, in 1980, was of Southeastern University of Greenville, S.C., a degree mill run out of a tiny two-bedroom house. The proprietor actually invited Ezell and another agent who had also bought a degree from him to tour his operation, and showed off student records, fake diplomas, seals and ribbons that the FBI would later seize in a raid. The proprietor died by suicide the night of the raid and when the FBI reviewed his records, it found 171 of Southeastern’s 620 “graduates” were employed by federal, state or local governments—evidence that it’s not just private businesses or universities that have long been lax when it comes to checking degrees.

Southeastern was small potatoes compared to some of today’s internet-enabled operations. The largest and most notorious diploma mill Ezell has studied is Axact, a 25-year-old Pakistan-based operation that sells transcripts and fake degrees, running from high school diplomas to PhDs. Despite a 2015 New York Times investigation of Axact, followed by criminal convictions in the U.S. and Pakistan, Axact is still up and running. In its 2016 prosecution of an Axact executive operating in the U.S., the U.S. Attorney for the Southern District of New York said Axact had collected $140 million through U.S. based bank accounts from tens of thousands of customers.

Ezell says Axact continues to operate through dozens of school names and web sites that are “nothing but layers and layers of flypaper”—trapping students looking to earn a legitimate online degree, as well as those looking for a fraud mill. For example, one current front, California Imperial University, touts its “Joe Biden Scholarship Program” and claims to be accredited by the American Higher Education Commission, with a red, white and blue logo to boot. (No, that isn’t a real accreditor.)

To hear Ezell tell it, the damage goes beyond fake degrees. He says Axact employees have blackmailed some holders of its degrees, demanding more money so they won’t be exposed. “Now that they have all this information about you, you’re in the right position to be extorted, to be blackmailed, to be threatened with publicity, with arrest, with deportation—to the point of suicide,” Ezell said. “We’ve seen single victims give up to $1.4 million.” 
</ul>
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
      <a href="{{route('skills.index')}}#skills-gap">
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
      <a href="{{route('skills.index')}}#future-needed-skills">
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




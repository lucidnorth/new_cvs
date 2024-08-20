@extends('layouts.app')
@section('content')

<div class="jumbotron">
  <div class="container px-4 text-center jumbotron-items">
    <div class="row jumbotron-rows-item ">
      <div class="col jumbotron-item1">
        <div class="p-3 jumbotron-item1-content1">Access the most reliable
          certificate verification
          system anywhere.</div>
        <p class="jumbotron-item1-content2 p-3">Discover the original certificate of employees at the confort of your
          home.</p>

        <div class="d-flex">

          <ul class="nav navbar-nav home-signup" id="">
            <li><a class="hover-btn-new btn-sign " href="Security/login?BackURL=dashboard"><span>Sign
                  In</span></a></li>
          </ul>

          <ul class="nav navbar-nav navbar-register">
            <li><a class="hover-btn-new btn-donate text-danger" href="{$BaseHref}/auth/"><span>Register</span></a></li>
          </ul>

        </div>
      </div>
      <div class="col jumbotron-item2-content">
        <div class="p-3">
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



<div class="features container-fluid">

  <div class="container overflow-hidden text-center">


    <div class="titles ">

      Features


    </div>

    <div class="row gy-5">


      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#exampleModal  ">
          <div class="p-3">
            <img src="{{ asset('images/vnf.png') }}" alt="vnf" class="mb-3 feature-image">
            <div class="card-body">
              <h5 class="feature-title mb-3">Verification and Fees</h5>
              <p class="feature-text mb-3">We have partnerships with the top
                companies and our data is provided
                directly and verified</p>

            </div>
          </div>
        </a>
      </div>



      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#exampleModal  ">
          <div class="p-3">
            <img src="{{ asset('images/employer.png') }}" alt="employer" class="mb-3 feature-image">
            <div class="card-body">
              <h5 class="feature-title mb-3">Required Document to sign up as an Employer</h5>
              <p class="feature-text mb-3">We have partnerships with the top
                companies and our data is provided
                directly and verified</p>

            </div>
          </div>
        </a>
      </div>




      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#exampleModal  ">
          <div class="p-3">
            <img src="images/Academic.png" alt="logo" class="mb-3 feature-image">
            <div class="card-body">
              <h5 class="feature-title mb-3">Required Document to sign up as an Academic Institution</h5>
              <p class="feature-text mb-3">We have partnerships with the top
                companies and our data is provided
                directly and verified</p>

            </div>
          </div>
        </a>
      </div>


      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#exampleModal  ">
          <div class="p-3">
            <img src="images/Certverification.png" alt="logo" class="mb-3 feature-image">
            <div class="card-body">
              <h5 class="feature-title mb-3">Certverification.com Digital Certification</h5>
              <p class="feature-text mb-3">We have partnerships with the top
                companies and our data is provided
                directly and verified</p>

            </div>
          </div>
        </a>
      </div>


      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#exampleModal  ">
          <div class="p-3">
            <img src="images/Professional.png" alt="logo" class="mb-3 feature-image">
            <div class="card-body">
              <h5 class="feature-title mb-3">Professional Training Programmes</h5>
              <p class="feature-text mb-3">We have partnerships with the top
                companies and our data is provided
                directly and verified</p>

            </div>
          </div>
        </a>
      </div>


      <div class="col-lg-4 col-sm-12">
        <a class="feature-itself" href="" data-bs-toggle="modal" data-bs-target="#formModal ">
          <div class="p-3">
            <img src="images/work.png" alt="logo" class="mb-3 feature-image">
            <div class="card-body">
              <h5 class="feature-title mb-3">Work With Us</h5>
              <p class="feature-text mb-3">We have partnerships with the top
                companies and our data is provided
                directly and verified</p>

            </div>
          </div>
        </a>
      </div>


    </div>
  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Feature Title </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Submit your Carriculumn Vitae </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

            <input type="file" class="form-control" id="recipient-name">
          </div>

          <button type="button" class="btn btn-primary">Submit CV</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<div class="container px-4 text-center academic-items">
  <div class="row academic-rows-item ">
    <div class="col academic-item1">
      <div class="p-3 academic-item1-content1">For academic and
        professional discourse
        communities.</div>
      <p class="academic-item1-content2 p-3">Discover the original certificate of employees at the comfort of your home.</p>

      <div class="d-flex">



        <ul class="nav navbar-nav navbar-register">
          <li><a class="hover-btn-new btn-donate text-danger" href="{$BaseHref}/auth/"><span>Register</span></a></li>
        </ul>

      </div>
    </div>
    <div class="col jumbotron-item2-content">
      <div class="p-3"><img src="images/academic-image.png" alt="logo"></div>
    </div>
  </div>
</div>


<div class="container-fluid announcement mt-5  ">


  <div class="container px-4 text-center mt-5">

    <div class="announcement-titles mb-3 ">

      Announcements


    </div>


    <div class="row gx-5">

      <div class="col-lg-4 col-sm-12">
        <div class="p-3">

          <a class="" href="" data-bs-toggle="modal" data-bs-target="#announcementModal  ">
            <div class="" style="width: 23rem;">
              <img src="images/news-image.png" alt="logo" class="mb-3 feature-image">

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
            <div class="" style="width: 23rem;">
              <img src="images/news-image.png" alt="logo" class="mb-3 feature-image">

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
            <div class="" style="width: 23rem;">
              <img src="images/news-image.png" alt="logo" class="mb-3 feature-image">

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
  <div class="modal-dialog modal-xl">
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




<div class="container px-4 text-center academic-items">
  <div class="row academic-rows-item ">
    <div class="col-lg-6 col-sm-12 academic-item1">
      <div class="p-3 academic-item1-content1">For our International Client</div>
      <p class="academic-item1-content2 p-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatesa</p>

      <div class="international-items p-3">
        <ol type="1" class="international-list">
          <li>ACADEMIC</li>
          <li>SOCIAL BACKGROUND</li>
          <li>CRIMINAL BACKGROUND</li>
          <li>VERIFICATION OF OTHER DOCUMENTS</li>
          <li>SOCIAL MEDIA ACTIVITIES</li>
          <li>EMPLOYER AND OR ACADEMIC RELATIONS</li>
        </ol>
      </div>

      <div class="d-flex justify-content-center">
        <ul class="nav navbar-nav navbar-register">
          <li><a class="hover-btn-new btn-donate text-danger" href="{$BaseHref}/auth/"><span>Register</span></a></li>
        </ul>
      </div>
    </div>

    <div class="col-lg-6 col-sm-12 jumbotron-item2-content">
      <div class="p-3"><img src="images/international-image.png" alt="logo"></div>
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
      <div class="flip-card first">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/industrycasestudies1.png" alt="logo" class="frontflip-img">
          </div>
          <div class="flip-card-back">
            <img src="images/industrycasestudies2.png" alt="logo" class="frontflip-img">

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="flip-card second">
        <div class="flip-card-inner">
          <div class="flip-card-front">

            <img src="images/skillsgap1.png" alt="logo" class="frontflip-img">
          </div>
          <div class="flip-card-back">
            <img src="images/skillsgap2.png" alt="logo" class="frontflip-img">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="flip-card third">
        <div class="flip-card-inner">
          <div class="flip-card-front">

            <img src="images/futureneededskills1.png" alt="logo" class="frontflip-img">
          </div>
          <div class="flip-card-back">
            <img src="images/futureneededskills2.png" alt="logo" class="frontflip-img">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
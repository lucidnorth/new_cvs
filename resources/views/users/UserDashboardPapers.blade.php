@extends('layouts.Dashboard')


@section('title', ' Dashboard-Laravel Admin Panel')
@section('content')

<style>
  .custom-file-input {
    display: none;
  }

  .custom-file-label {
    border: 1px solid #ced4da;
    padding: .375rem .75rem;
    width: 100%;
    cursor: pointer;
  }

  .title-big {
    font-size: 1.3rem;
    color: #596CFF;
    font-weight: 650;
  }
</style>

<main class="main-content position-relative border-radius-lg ">
  <div class="container-fluid py-4">
    <div class="row">
      @if(session('success'))
      <div class="alert alert-success" role="alert" id="success-alert">
        {{ session('success') }}
      </div>
      @endif
      <div class="col-xl-12 col-sm-12 mb-xl-5 mb-5">
        <div class="">
          <div class="">
            <div class="row">
              <h5 class="text-white">Papers Uploads</h5>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0 title-big">Upload a Paper</p>

            </div>
          </div>
          <div class="card-body">
            <!-- <p class="text-uppercase text-sm">User Information</p> -->
            <div class="row">

              <form id="institution-form" class="form" action="{{ route('user.papers.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Paper Title</label>
                    <input class="form-control" type="text" value="" name="name">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Select Category </label>
                    <select class="form-control" id="file-format" name="category">
                      <option value="">Select Category</option>
                      <option value="Case Study">Case Study</option>
                      <option value="Skills Gap Set">Skills Gap Set</option>
                      <option value="Research Paper">Research Paper</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="form-label">Paper Description </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                  </div>
                </div>
                

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="file-upload" class="form-control-label">Upload File</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="file-upload" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" name="file">
                      <label class="custom-file-label " for="file-upload" id="file-upload-label" style="font-size: 0.875rem;
    font-weight: 400;">Choose file</label>
                    </div>
                    <small id="fileHelp" class="form-text fs-6">Please upload PDF files only.</small>
                  </div>
                </div>


                <div class="text-end"> <!-- Added class "text-end" to push button to the right -->
                  <button class="btn btn-primary btn-sm">Upload</button>
                </div>

              </form>


              <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Last name</label>
                    <input class="form-control" type="text" value="Lucky">
                  </div>
                </div> -->
            </div>

            <div class="row">

              <!-- <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">City</label>
                    <input class="form-control" type="text" value="New York">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Country</label>
                    <input class="form-control" type="text" value="United States">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Postal code</label>
                    <input class="form-control" type="text" value="437300">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">About me</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">About me</label>
                    <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                  </div>
                </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0 title-big">My Uploads</h6>
              </div>
              <div class="col-6 text-end">
                <!-- <button class="btn btn-outline-primary btn-sm mb-0">View All</button> -->
              </div>
            </div>
          </div>
          <div class="card-body p-3 pb-0">
            <ul class="list-group">

              @foreach ($papers as $paper)
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex flex-column">
                  <h6 class="text-dark mb-1 font-weight-bold text-sm"> {{ $paper->name }}</h6>
                  <span class="text-xs"> <b>Category:</b> {{ $paper->category }} <b>Date:</b> {{ $paper->created_at->format('F d, Y') }}</span>
                  <p>
                  <p>
                </div>
                <div class="d-flex align-items-center text-sm">
                  <a href="{{ route('user.download.paper', $paper->id) }}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                    Download
                  </a>
                  <a href="{{ route('user.view.paper', $paper->id) }}" target="_blank" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                    View
                  </a>


                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-4">


    <div class="container">





      <!-- <div class="tab-pane container fade" id="faqs">
  <p> all this mistaken idea of denouncing pleasure and praising 
    pain was born and I will give you a complete account of the system, and expound the actual
     teachings of the great explorer of the truth, the master-builder of human happiness.
      No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because 
      those who do not know how to pursue pleasure rationally encounter consequences that
       are extremely painful. Nor again is there anyone who loves or pursues or desires 
       to obtain pain of itself, because it is pain, but because occasionally 
       circumstances occur in which toil and pain can procure him some great pleasure.
          or one who avoids a pain that produces no resultant pleasure?</p> 

          <h2>Frequently Asked Questions</h2>

          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Accordion Item #1
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Accordion Item #2
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Accordion Item #3
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
          </div>

</div> -->
    </div>
  </div>
  <!-- <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
  <!-- </div>
  </div> -->
 


  <!-- <h1> {{ auth()->user()->email}}</h1>
<h1>{{ auth()->user()->address}}</h1> -->

  <script>
    // Dismiss the success alert after 5 seconds (5000 milliseconds)
    setTimeout(function() {
      document.getElementById('success-alert').style.display = 'none';
    }, 5000);
  </script>

  <script>
    document.getElementById('file-upload').addEventListener('change', function() {
      var fileName = this.files.length ? this.files[0].name : 'Choose file';
      document.getElementById('file-upload-label').textContent = fileName;
    });
  </script>

</main>
@endsection
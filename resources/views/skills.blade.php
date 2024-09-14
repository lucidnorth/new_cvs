@extends('layouts.app')
@section('content')

<div class="container">

  <h1 class="mb-4 mt-5"></h1>
  <!-- Nav pills -->
  <ul class="nav nav-pills justify-content-center" id="myTabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#integrity">Industry Case Studies</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#skills-gap">Skills Gap</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#future-needed-skills">Future Needed Skills</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class=" tab-content about-tab-content">
    <div class="tab-pane container active" id="integrity">
      <div class="books">
        <div class="container">
          <div class="book-area">
            <div class="row overflow-hidden">


              @foreach ($caseStudyPapers as $paper)
              <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="book-single shadow">
                  <img src="{{ asset($paper->image_path) }}" class="card-img-top" alt="Paper Image">
                  <p class="price"><span>{{ $paper->name }}</span></p>
                  <p class="description">{{ $paper->description }}</p>
                  <div class="d-flex justify-content-center">
                    <a href="{{ route('papersupload.download', $paper->id) }}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
                    <a href="#" class="btn"><i class="fa fa-book" aria-hidden="true"></i></a>

                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="tab-pane container fade" id="skills-gap">
      <div class="books">
        <div class="container">
          <div class="book-area">
            <div class="row overflow-hidden">



              @foreach ($skillsGapSetPapers as $paper)
              <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="book-single shadow">
                  <img src="{{ asset($paper->image_path) }}" class="card-img-top" alt="Paper Image">
                  <p class="price"><span>{{ $paper->name }}</span></p>
                  <p class="description">{{ $paper->description }}</p>
                  <div class="d-flex justify-content-center">
                    <a href="{{ route('papersupload.download', $paper->id) }}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
                    <a href="#" class="btn"><i class="fa fa-book" aria-hidden="true"></i></a>

                  </div>
                </div>
              </div>
              @endforeach





            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tab-pane container fade" id="future-needed-skills">
      <div class="books">
        <div class="container">
          <div class="book-area">
            <div class="row overflow-hidden">


              @foreach ($researchPaperPapers as $paper)
              <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="book-single shadow">
                  <img src="{{ asset($paper->image_path) }}" class="card-img-top" alt="Paper Image">
                  <p class="price"><span>{{ $paper->name }}</span></p>
                  <p class="description">{{ $paper->description }}</p>
                  <div class="d-flex justify-content-center">
                    <a href="{{ route('papersupload.download', $paper->id) }}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>

                    <a href="#" class="btn"><i class="fa fa-book" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
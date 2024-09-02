@extends('layouts.app')
@section('content')

<style>
/* .nav-pills .nav-link {
  border-radius: 0.5rem;
  padding: 12px 20px;
  font-size: 1.1rem;
}

.nav-pills .nav-link.active {
  background-color: #007bff;
  color: #fff;
  border: none;
} */

.card { 
  border: none;
  border-radius: 0.75rem;
  overflow: hidden;
  transition: box-shadow 0.3s ease;
}

.card:hover {
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.card-img-top {
  height: 200px;
  object-fit: cover;
}

.card-body {
  padding: 1.5rem;
}

.card-title {
  font-size: 1.25rem;
  font-weight: bold;
}

.card-text {
  font-size: 1rem;
  color: #6c757d; 
}

.btn {
  border-radius: 0.25rem;
  font-size: 0.9rem;
  padding: 0.5rem 1rem;
}

.btn-primary {
  background-color: #007bff;
  border: none;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.btn-secondary {
  background-color: #6c757d;
  border: none;
}

.btn-secondary:hover {
  background-color: #5a6268;
}

.container {
  padding: 30px;
}

.book-single {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 0.75rem;
}

/* Responsiveness*/
@media (max-width: 768px) {
  .card-img-top {
    height: 150px;
  }

  .card-title {
    font-size: 1rem;
  }

  .card-text {
    font-size: 0.9rem;
  }
}

</style>

<div class="container">
  <h1 class="mb-4 mt-5"></h1>
  <ul class="nav nav-pills justify-content-center" id="myTabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#integrity">Industry Case Studies</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#vision">Skills Gap</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#accreditation">Future Needed Skills</a>
    </li>
  </ul>

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

    <div class="tab-pane container fade" id="vision">
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

    <div class="tab-pane container fade" id="accreditation">
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
                    <a href="{{ route('papers.view', $paper->id) }}" class="btn"><i class="fa fa-book" aria-hidden="true"></i></a>
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


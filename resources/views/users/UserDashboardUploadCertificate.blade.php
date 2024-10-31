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
              <h5 class="text-white">Certificate Uploads</h5>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0 title-big">Upload yourschool Certificate

              </p>

            </div>
          </div>
          <div class="card-body">
            <!-- <p class="text-uppercase text-sm">User Information</p> -->
            <div class="row">

              <form id="institution-form" class="form" action="{{ route('user.uploadcertificates.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <div class="form-group">
                    <!-- <label for="example-text-input" class="form-control-label">Institution Title</label> -->
                    <input class="form-control" type="hidden" value="{{ auth()->user()->name}}" name="title">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                  </div>
                </div>
                <!-- <hr class="horizontal dark"> -->
                <div class="col-md-12 mt-5">
                  <div class="form-group">
                    <label for="file-upload" class="form-control-label">Upload File</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="file-upload" accept=".xlsx,.xls,.csv" name="file">
                      <label class="custom-file-label" for="file-upload" id="file-upload-label"  style="font-size: 0.875rem;
    font-weight: 400;">Choose file</label>
                    </div>
                    <small id="fileHelp" class="form-text fs-6">Please upload CSV  files only.</small>
                  </div>
                </div>
                <div class="text-end"> <!-- Added class "text-end" to push button to the right -->
                  <button class="btn btn-primary btn-sm">Upload</button>
                </div>
              </form>
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
                <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
              </div>
            </div>
          </div>
          <div class="card-body p-3 pb-0">
            <ul class="list-group">
            @foreach ($certs as $paper)
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex flex-column">
                  <h6 class="text-dark mb-1 font-weight-bold text-sm"> {{ $paper->title }}</h6>
                  <span class="text-xs"> <b>Description:</b> {{ $paper->description }} <b>Date:</b> {{ $paper->created_at->format('F d, Y') }}</span>
                  <p>
                  <p>
                </div>
           
              </li>
              @endforeach
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <!-- <h1> {{ auth()->user()->email}}</h1>
<h1>{{ auth()->user()->address}}</h1> -->

    <script>
      // Dismiss the success alert after 5 seconds (5000 milliseconds)
      setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
      }, 5000);
    </script>

</main>
@endsection
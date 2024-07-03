@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUa0lW4Y+8zHV/3BecMWGs30KeQll6Z8RoJSGW2l9F5XZT7NFhZe9sJoW8vy" crossorigin="anonymous">
<style>
  .table-responsive {
    margin-top: 20px;
  }

  .table {
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 40px;
  }

  th {
    background-color: #343a40;
    color: #5e72e4;
    text-align: left;
    vertical-align: middle;
    font-size: 20px;
  }

  td {
    text-align: left;
    vertical-align: middle;
    font-size: 15px;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  .dataTables_wrapper .dataTables_paginate {
    padding-top: 20px;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0.5em 1em;
  }

  .custom-pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
    /* Adjusted margin for spacing */
  }

  .custom-pagination input[type="number"] {
    width: 60px;
    text-align: center;
    height: 38px;
    margin: 0 5px;
    /* Adjusted margin for spacing */
  }

  .custom-pagination button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 0.5em 1em;
    cursor: pointer;
    height: 38px;
    margin: 0 5px;
    /* Adjusted margin for spacing */
  }

  .custom-pagination button:hover {
    background-color: #0056b3;
  }

  .dataTables_filter input {
    width: 300px;
    /* Adjust the width as needed */
    padding: 8px;
    /* Adjust padding as needed */
    border-radius: 5px;
    border: 1px solid #ced4da;
    background-color: #fff;
    background-image: none;
    margin-bottom: 20px;
    margin-top: 70px;
  }

  .container-fluid {
    margin-top: -70px;
  }

  /* Adjust card margin */
  .card {
    margin-bottom: 20px;
    /* Adjust as needed */
  }
</style>


<main class="main-content position-relative border-radius-lg">
  <div class="container-fluid py-4">
    <div class="container-fluid py-5 mt-5">
      <header class="mt-5">
        <div class="row">    
          <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
          <a href="{{ route('verified') }}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Verifications</p>
                      <h5 class="font-weight-bolder">
                        {{ $searchCount }}
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle pb-5">
                      <!-- <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i> -->
                      <i class="ni ni-check-bold ni-2x text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
          <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
          <a href="{{ route('reports')}}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Reports</p>
                      <h5 class="font-weight-bolder">
                        Click to view reports
                      </h5>
                      <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                      <i class="ni ni-folder-17 text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        </div>
      </header>
      <div class="table-responsive">
        <table id="example" class="display table table-hover table-bordered" style="width:100%;">
          <thead>
            <tr>
              <th>Verified On</th>
              <th>Institution</th>
              <th>Cert Number</th>
              <th>Name</th>
              <th>Student ID</th>
              <th>Class</th>
              <th>Programme</th>
              <th>Qua.</th>
              <th>DOB</th>
              <th>Gender</th>
              <th>Entry</th>
              <th>Completion</th>
            </tr>
          </thead>
          <tbody>
            @if ($certificates->isEmpty())
            <tr>
              <td colspan="12" class="text-center">No verified certificates found.</td>
            </tr>
            @else
            @foreach ($certificates as $certificate)
            <tr>
              <td>{{ \Carbon\Carbon::parse($certificate->date_verified)->format('d M Y') }}</td>
              <td>{{ $certificate->institution ? $certificate->institution->institutions : 'No Institution Name' }}</td>
              <td>{{ $certificate->certificate_number }}</td>
              <td>{{ $certificate->first_name }} {{ $certificate->middle_name }} {{ $certificate->last_name }}</td>
              <td>{{ $certificate->student_identification }}</td>
              <td>{{ $certificate->class }}</td> <!-- New field for Class -->
              <td>{{ $certificate->programme }}</td> <!-- New field for Programme -->
              <td>{{ $certificate->qualification_type }}</td>
              <td>{{ \Carbon\Carbon::parse($certificate->date_of_birth)->format('d M Y') }}</td>
              <td>{{ $certificate->gender }}</td>
              <td>{{ \Carbon\Carbon::parse($certificate->year_of_entry)->format('M Y') }}</td>
              <td>{{ \Carbon\Carbon::parse($certificate->year_of_completion)->format('M Y') }}</td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
        <div class="pagination-container">
          <div class="custom-pagination">
            <button id="prevPage" class="btn btn-primary">Previous</button>
            <input type="number" id="currentPage" min="1" value="1">
            <button id="nextPage" class="btn btn-primary">Next</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- DataTable Initialization -->
<script>
  $(document).ready(function() {
    var table = $('#example').DataTable({
      "info": false,
      "lengthChange": false,
      "pageLength": 20, // Display 20 rows per page by default
      "ordering": false,
      "paging": false // Disable default pagination
    });

    var currentPage = 1;
    var totalPages = Math.ceil(table.data().length / 20); // Calculate the total number of pages

    $('#currentPage').val(currentPage);

    function updateTable() {
      table.page(currentPage - 1).draw(false);
    }

    $('#prevPage').on('click', function() {
      if (currentPage > 1) {
        currentPage--;
        $('#currentPage').val(currentPage);
        updateTable();
      }
    });

    $('#nextPage').on('click', function() {
      if (currentPage < totalPages) {
        currentPage++;
        $('#currentPage').val(currentPage);
        updateTable();
      }
    });

    $('#currentPage').on('change', function() {
      var newPage = parseInt($(this).val());
      if (newPage >= 1 && newPage <= totalPages) {
        currentPage = newPage;
        updateTable();
      } else {
        $(this).val(currentPage); // Reset to the current page if the input is invalid
      }
    });

    $('#example').on('page.dt', function() {
      var pageInfo = table.page.info();
      $('#currentPage').val(pageInfo.page + 1);
    });

    // Set placeholder text for DataTable search input
    $('.dataTables_filter input').attr('placeholder', 'kindly search here');

    // Initial page load
    updateTable();
  });
</script>

@endsection
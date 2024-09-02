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
        color: white;
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
        margin-top: 20px; /* Adjusted margin for spacing */
    }

    .custom-pagination input[type="number"] {
        width: 60px;
        text-align: center;
        font-size: 18px;
        height: 38px;
        margin: 0 5px; /* Adjusted margin for spacing */
    }

    .custom-pagination button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 0.5em 1em;
        cursor: pointer;
        height: 38px;
        margin: 0 5px; /* Adjusted margin for spacing */
    }

    .custom-pagination button:hover {
        background-color: #0056b3;
    }

    .dataTables_filter {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .dataTables_filter input {
        width: 300px; /* Adjust the width as needed */
        padding: 8px; /* Adjust padding as needed */
        border-radius: 5px;
        border: 1px solid #ced4da;
        background-color: #fff;
        background-image: none;
        margin-bottom: 20px;
        margin-top: 70px;
    }

    #results-counter {
        font-size: 22px;
        font-weight: bold;
        color: blue;
        margin-left: 20px;
        margin-top: 70px;
        position: absolute;
        display: none; /* Initially hide the counter */
    }

    #results-counter .count {
        color: black;
        font-weight: bold;
    }

    .container-fluid{
        margin-top: -70px;
    }

    /* Adjust card margin */
    .card {
        margin-bottom: 20px; /* Adjust as needed */
    }

    #page-indicator {
        text-align: center;
        margin-top: 70px;
        margin-left: 600px;
        font-size: 15px;
       
        position: absolute;
        
    }

    .table-container {
        position: relative;
    }
</style>


<main class="main-content position-relative border-radius-lg">
  <div class="container-fluid py-4">
    <div class="container-fluid py-5 mt-5">

    <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h5>Verified Certificates</h5>
                            </div>
                        </div>
                    </div>
                </div>
      <header class="mt-5">
        <div class="row">    
          
        </div>
      </header>

      <div class="table-responsive table-container mt-5">
                <div id="results-counter" class="mb-3">Results: <span class="count">0</span></div>
                <div id="page-indicator">Showing page 1 of 1</div> <!-- Page indicator here -->
                
                <table id="example" class="table  table-dark table-striped text-center fs-6 text-white" style="width:100%;">
                    <thead>
                        <tr>
                            <!-- <th>Verified On</th> -->
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
                    @foreach($institutionCertificates as $log)
                        <tr>
                        @if($log->certificate) 
                            <td>{{ $log->certificate->certificate_number }}</td>
                            <td>{{$log->certificate->first_name }} {{ $log->certificate->middle_name }} {{ $log->certificate->last_name }} </td>
                            <td>{{$log->certificate->student_identification }}</td>
                            <td>{{ $log->certificate->class }}</td> <!-- New field for Class -->
                            <td>{{$log->certificate->programme }}</td> <!-- New field for Programme -->
                            <td>{{ $log->certificate->qualification_type }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->certificate->date_of_birth)->format('d M Y') }}</td>
                            <td>{{$log->certificate->gender }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->certificate->year_of_entry)->format('M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($log->certificate->year_of_completion)->format('M Y') }}</td>
                            @else
                        <td >Certificate not found</td>
                    @endif
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <div class="pagination-container">
                    <div class="custom-pagination">
                        <button id="prevPage" class="btn btn-primary">Previous</button>
                        <input type="number" id="currentPage" min="1" value="1" class="form-control">
                        <button id="nextPage" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </div>
     
    </div>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ho8CB4QsqOa28FhNdll8+6o4r36xtZGE2+8a3EVv9L9fSVzNj9v8aApX0PvJ0IsR" crossorigin="anonymous"></script>

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
            $('#page-indicator').text('Showing page ' + currentPage + ' of ' + totalPages); // Update page indicator

            // Hide or show Previous button
            if (currentPage <= 1) {
                $('#prevPage').hide();
            } else {
                $('#prevPage').show();
            }

            // Hide or show Next button
            if (currentPage >= totalPages) {
                $('#nextPage').hide();
            } else {
                $('#nextPage').show();
            }
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

        // Custom search function for exact match
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            var searchTerm = $('.dataTables_filter input').val().toLowerCase();
            if (!searchTerm) {
                $('#results-counter').hide(); // Hide counter if no search term
                return true; // If no search term, show all rows
            } else {
                $('#results-counter').show(); // Show counter if search term exists
            }

            for (var i = 0; i < data.length; i++) {
                if (data[i].toLowerCase() === searchTerm) {
                    return true; // If an exact match is found, show the row
                }
            }
            return false; // Otherwise, hide the row
        });

        // Update the results counter
        function updateResultsCounter() {
            var info = table.page.info();
            $('#results-counter .count').text(info.recordsDisplay);
        }

        // Update results counter on table draw
        table.on('draw', function() {
            updateResultsCounter();
        });

        // Initial update of results counter
        updateResultsCounter();

        // Initial update of table (to handle initial state of pagination buttons)
        updateTable();
    });
</script>

@endsection
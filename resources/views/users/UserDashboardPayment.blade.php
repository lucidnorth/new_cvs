@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')



<style>
  .table-responsive {
    margin-top: 150px;
  }

  .table {
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

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
    margin-top: 20px;
    /* Adjusted margin for spacing */
  }

  .custom-pagination input[type="number"] {
    width: 60px;
    text-align: center;
    font-size: 18px;
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

  .container-fluid {
    margin-top: -70px;
  }

  /* Adjust card margin */
  .card {
    margin-bottom: 20px;
    /* Adjust as needed */
  }

  #page-indicator {
    text-align: center;
    margin-top: 50px;
    margin-left: 600px;
    font-size: 15px;
    color: white;
    position: absolute;

  }

  .table-container {
    position: relative;
  }

  .jpush {
    margin-top: 30px;

  }
</style>

<main class="main-content position-relative border-radius-lg">
  <div class="jpush container-fluid">
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Paid</p>
                  <h5 class="font-weight-bolder">
                    GH₵ {{ $totalAmount }}
                  </h5>
                  <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday
                    </p> -->
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <a href="{{ route('verified') }}">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Receivables</p>
                    <h5 class="font-weight-bolder">
                      GH₵ {{ $totalAmountGivenToInstitution}}
                    </h5>
                    <!-- KIT42387 -->
                    <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle pb-5">
                    <!-- <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i> -->
                    <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Amount Due</p>
                  <h5 class="font-weight-bolder">
                    GH₵ {{ $amountDue}}

                  </h5>
                  <!-- <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> -->
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-briefcase-24 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div>
        <canvas id="lineChart"></canvas>
    </div>
    <div id="page-indicator">Showing page 1 of 1</div> <!-- Page indicator here -->
    <div class="table-responsive table-container">
      <!-- <div id="results-counter" class="mb-3">Results: <span class="count">0</span></div> -->
      <table id="example" class="table  table-dark table-striped text-center fs-6 text-white" style="width:100%;">
        <thead>
          <tr>
            <th>Amount</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($payments as $payment)
          <tr>
            <td>{{ $payment->amount }}</td>
            <td>{{ $payment->payment_date }}</td>
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
  <h2>Payment Statistics</h2>
    <div>
        <canvas id="lineChart"></canvas>
    </div>

</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ho8CB4QsqOa28FhNdll8+6o4r36xtZGE2+8a3EVv9L9fSVzNj9v8aApX0PvJ0IsR" crossorigin="anonymous"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('lineChart').getContext('2d');

            var data = {
                labels: ['Total Amount', 'Total Amount Given to Institution', 'Amount Due'],
                datasets: [{
                    label: 'Payment Statistics',
                    data: @json([$totalAmount, $totalAmountGivenToInstitution, $amountDue]),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false,
                }]
            };

            var chart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Category'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Amount'
                            }
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }
                }
            });
        });
    </script>
    <script>
  $(document).ready(function() {
    var table = $('#example').DataTable({
      "info": false,
      "lengthChange": false,
      "pageLength": 20, // Display 20 rows per page by default
      "ordering": false,
      "paging": false, // Disable default pagination
      "searching": hide
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
@extends('layouts.admin')
@section('content')
<div class="content">
    <main class="main-content position-relative border-radius-lg">
      <div class="container-fluid py-4">
        <div class="container-fluid py-5 mt-5">
          <h5 class="text-white mb-3">Payment</h5>
          <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#paymentModal">Add Payment</button>
          <div class="table-responsive table-container">
            <div id="results-counter" class="mb-3">Results: <span class="count">0</span></div>
            <div id="page-indicator">Showing page 1 of 1</div> <!-- Page indicator here -->
            <table id="example" class="table  text-center fs-6 text-white" style="width:100%;">
              <thead>
                <tr>
                  <th>Institution</th>
                  <th>Amount Paid</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
             
                @foreach($finances as $finance)
                        <tr>
                            <td>{{ $finance->institution }}</td>
                            <td>GH₵{{ $finance->amount }}</td>
                            <td>{{ $finance->payment_date }}</td>
                           
                        </tr>
                    @endforeach
                <tbody>
               
            </table>
            
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModalLabel">Add Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="paymentForm" method="POST" action="{{ route('admin.finance.confirmation') }}">
                @csrf
                <div class="form-group">
                    <label for="institution">Institution</label>
                    <select class="form-control" id="institution" name="institution" required>
                        <option value="" disabled selected>Select Institution</option>
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->institutions }}">{{ $institution->institutions }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <div class="form-group">
                    <label for="paymentDate">Payment Date</label>
                    <input type="date" class="form-control" id="paymentDate" name="paymentDate" required>
                </div>
                <div class="form-group">
                    <label for="paymentStatus">Payment Status</label>
                    <input type="text" class="form-control" id="paymentStatus" name="paymentStatus" value="Paid" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>

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
    //   updateTable();

    //   $('#paymentForm').on('submit', function(e) {
    //     e.preventDefault();
    //     var institution = $('#institution').val();
    //     var amount = $('#amount').val();
    //     var paymentDate = $('#paymentDate').val();
    //     var paymentStatus = $('#paymentStatus').val();

    //     table.row.add([
    //       institution,
    //       amount,
    //       paymentDate,
    //       paymentStatus
    //     ]).draw(false);

    //     $('#paymentModal').modal('hide');
    //     this.reset();
    //     updateResultsCounter();
    //     totalPages = Math.ceil(table.data().length / 20);
    //     updateTable();
    //   });
    });
  </script>
@endsection
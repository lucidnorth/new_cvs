@extends('layouts.Dashboard')

@section('title', 'Dashboard-Laravel Admin Panel')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid py-4">
        
        <!-- Scrollable Table -->
        <div class="container-fluid py-5 mt-5">
        <header class="mt-5">
        <div class="mb-3 p-3  mx-auto text-center">
            <h1 class="display-4 fw-normal text-body-emphasis text-white fw-bold">View Details of verified candidtaes</h1>
            <!-- <p class="fs-5 text-body-secondary text-white">Select package to buy .</p> -->
        </div>
    </header>
            <div class="table-responsive">
                <table id="example" class="display table table-hover table-bordered" style="width:100%; background-color: #ffffff;">
                    <thead>
                        <tr>
                            <th>Institution<br>Name</th>
                            <th>First<br>Name</th>
                            <th>Middle<br>Name</th>
                            <th>Last<br>Name</th>
                            <th>Date of<br>Birth</th>
                            <th>Qualification<br>Type</th>
                            <th>Gender</th>
                            <th>Certificate<br>Number</th>
                            <th>Student<br>Identification</th>
                            <th>Year of<br>Entry</th>
                            <th>Year of<br>Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($certificates->isEmpty())
                        <tr>
                            No verified certificates found.
                        </tr>
                        @else
                        @foreach ($certificates as $certificate)
                        <tr>
                            <td>{{ $certificate->institution ? $certificate->institution->institutions : 'No Institution Name' }}</td>
                            <td>{{ $certificate->first_name }}</td>
                            <td>{{ $certificate->middle_name }}</td>
                            <td>{{ $certificate->last_name }}</td>
                            <td>{{ $certificate->date_of_birth }}</td>
                            <td>{{ $certificate->qualification_type }}</td>
                            <td>{{ $certificate->gender }}</td>
                            <td>{{ $certificate->certificate_number }}</td>
                            <td>{{ $certificate->student_identification }}</td>
                            <td>{{ $certificate->year_of_entry }}</td>
                            <td>{{ $certificate->year_of_completion }}</td>
                        </tr>
                        @endforeach
                        @endif

                        <!-- More rows as needed -->
                    </tbody>
                </table>
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
        $('#example').DataTable();
    });
</script>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
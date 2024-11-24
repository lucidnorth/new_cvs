@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')

<style>
    .modal-body{
        font-size: 18px;
    }
    .report-carda {
        margin-top: 50px;
    }
    table{
        text-align: left !important;
    }
    @media (max-width: 767.98px) {
        .list-group-flush .list-group-item{
            display: flex;
            flex-direction: column !important;
        }
    }

    @media (max-width: 768px) {
        
    }

    @media (max-width: 991.98px) {
        
    }
</style>
<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid">
        <header>

            <div class="row">
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                    <div class="">
                        <div class="">
                            <div class="row">
                                <h5 class="text-white">User Reports</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-sm-12 mb-xl-0 report-carda">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @if(auth()->user()->institution_id)
                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div class="">
                                        <h2 style="font-size: 22px;">Verified Candidates</h2>
                                        <h3 style="font-weight: 500;">Information on all verified candidates</h3>
                                    </div>

                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary me-2" type="button" data-bs-toggle="modal" data-bs-target="#verified-candidates">View Report</button>
                                            <a href="{{ route('download.institution.verified.certificates') }}" class="btn btn-primary">Download Report</a>
                                        </div>

                                        <div class="modal fade" id="verified-candidates" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Verified Candidates Report</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($institutionCertificates->isEmpty())
                                                        <div class="text-center">No employer has verified your candidates yet.</div>
                                                        @else
                                                        <table  id="myTable" class="table table-stripped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th>Institution</th> -->
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
                                                                    <td>Certificate not found</td>
                                                                    @endif
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route('download.institution.verified.certificates') }}" class="btn btn-primary">Export</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                        <h2 style="font-size: 22px;">Payments</h2>
                                        <h3 style="font-weight: 500;">Information on all payments</h3>
                                    </div>

                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#payments" type="button">View Report</button>
                                            <a href="{{ route('download.institution.payments') }}" class="btn btn-primary">Download Report</a>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="payments" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Report</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($payments->isEmpty())
                                                    <div class="text-center">No payments found.</div>
                                                    @else
                                                    <table id="myTable" class="table table-stripped table-hover ">
                                                        <thead>
                                                            <tr>
                                                                <th>Month</th>
                                                                <th>Amount</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($payments as $payment)
                                                            <tr>
                                                                <td>>{{ \Carbon\Carbon::parse($payment->created_at)->format('F Y') }}</td>
                                                                <td>{{ $payment->amount }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('Y-m-d') }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('download.institution.payments') }}" class="btn btn-primary">Export</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif

                                @if(auth()->user()->employer)
                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div class="">
                                        <h2 style="font-size: 22px;">Verified Candidates</h2>
                                        <h3 style="font-weight: 500;">Information on all verified candidates</h3>
                                    </div>

                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#verified-candidates">View Report</button>
                                            <a href="{{ route('download.verified.certificates') }}" class="btn btn-primary">Download Report</a>
                                        </div>

                                        <div class="modal fade" id="verified-candidates" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Verified Candidates Report</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($certificates->isEmpty())
                                                        <div class="text-center">No verified candidates found.</div>
                                                        @else
                                                        <table  id="myTable" class="table table-stripped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Institution</th>
                                                                    <th>Full Name</th>
                                                                    <th>Date of Birth</th>
                                                                    <th>Qualification Type</th>
                                                                    <th>Gender</th>
                                                                    <th>Certificate Number</th>
                                                                    <th>Student Identification</th>
                                                                    <th>Year of Entry</th>
                                                                    <th>Year of Completion</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($certificates as $certificate)
                                                                <tr>
                                                                    <td>{{ $certificate->institution ? $certificate->institution->institutions : 'No Institution Name' }}</td>
                                                                    <td>{{ $certificate->first_name }} {{ $certificate->middle_name }} {{ $certificate->last_name }}</td>
                                                                    <td>{{ $certificate->date_of_birth }}</td>
                                                                    <td>{{ $certificate->qualification_type }}</td>
                                                                    <td>{{ $certificate->gender }}</td>
                                                                    <td>{{ $certificate->certificate_number }}</td>
                                                                    <td>{{ $certificate->student_identification }}</td>
                                                                    <td>{{ $certificate->year_of_entry }}</td>
                                                                    <td>{{ $certificate->year_of_completion }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route('download.verified.certificates') }}" class="btn btn-primary">Export</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div class="">
                                        <h2 style="font-size: 22px;">Recommendations</h2>
                                        <h3 style="font-weight: 500;">Information on all recommendations</h3>
                                    </div>

                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#skillsearch">View Report</button>
                                            <a href="{{ route('download.skill_search_logs') }}" class="btn btn-primary">Download Report</a>
                                        </div>

                                        <div class="modal fade" id="skillsearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Recommendations</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($skillSearchLogs->isEmpty())
                                                        <div class="text-center">No recommendations found!</div>
                                                        @else
                                                        <table id="myTable" class="table table-stripped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>User</th>
                                                                    <th class="text-center">Search Term</th>
                                                                    <th>Search On</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($skillSearchLogs as $log)
                                                                <tr>
                                                                    <td>{{ $log->id }}</td>
                                                                    <td class="text-center">{{ $log->search_term }}</td>
                                                                    <td>{{ $log->created_at }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route('download.skill_search_logs') }}" class="btn btn-primary">Export</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                        <h2 style="font-size: 22px;">Industry Case Study</h2>
                                        <h3 style="font-weight: 500;">Information on all industry case studies</h3>
                                    </div>

                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#icspapers" type="button">View Report</button>
                                            <a href="{{ route('download.industry_case_study_papers') }}" class="btn btn-primary">Download Report</a>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="icspapers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Industry Case Study Report</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($caseStudyPapers->isEmpty())
                                                    <div class="text-center">No papers found.</div>
                                                    @else
                                                    <table id="myTable3" class="table display table-stripped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Category</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($caseStudyPapers as $paper)
                                                            <tr>
                                                                <td>{{ $paper->name }}</td>
                                                                <td>{{ $paper->category }}</td>
                                                                <td>{{ $paper->created_at }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('download.industry_case_study_papers') }}" class="btn btn-primary">Export</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                        <h2 style="font-size: 22px;">Skills Gap Set</h2>
                                        <h3 style="font-weight: 500;">Information on all skills gap set</h3>
                                    </div>

                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sgspapers" type="button">View Report</button>
                                            <a href="{{ route('download.skills_gap_set_papers') }}" class="btn btn-primary">Download Report</a>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="sgspapers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Skills Gap Set Report</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($skillsGapSetPapers->isEmpty())
                                                    <div class="text-center">No papers found.</div>
                                                    @else
                                                    <table id="myTable2" class="table table-stripped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Category</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($skillsGapSetPapers as $paper)
                                                            <tr>
                                                                <td>{{ $paper->name }}</td>
                                                                <td>{{ $paper->category }}</td>
                                                                <td>{{ $paper->created_at }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('download.skills_gap_set_papers') }}" class="btn btn-primary">Export</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                        <h2 style="font-size: 22px;">Research Paper</h2>
                                        <h3 style="font-weight: 500;">Information on all research papers</h3>
                                    </div>

                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rpapers" type="button">View Report</button>
                                            <a href="{{ route('download.research_papers') }}" class="btn btn-primary">Download Report</a>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="rpapers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Verified Candidates Report</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($researchPaperPapers->isEmpty())
                                                    <div class="text-center">No papers found.</div>
                                                    @else
                                                    <table id="myTable3" class="table display table-stripped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Category</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($researchPaperPapers as $paper)
                                                            <tr>
                                                                <td>{{ $paper->name }}</td>
                                                                <td>{{ $paper->category }}</td>
                                                                <td>{{ $paper->created_at }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('download.research_papers') }}" class="btn btn-primary">Export</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                        <h2 style="font-size: 22px;">Payments</h2>
                                        <h3 style="font-weight: 500;">Information on all payments</h3>
                                    </div>

                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payments" type="button">View Report</button>
                                            <a href="{{ route('download.user_packages') }}" class="btn btn-primary">Download Report</a>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="payments" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Verified Candidates Report</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($userPackages->isEmpty())
                                                    <div class="text-center">No payments found.</div>
                                                    @else
                                                    <table id="myTable4" class="table table-stripped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($userPackages as $package)
                                                            <tr>
                                                                <td>{{ $package->amount }}</td>
                                                                <td>{{ $package->payment_status }}</td>
                                                                <td>{{ $package->created_at }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('download.user_packages') }}" class="btn btn-primary">Export</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </header>
        <main>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ho8CB4QsqOa28FhNdll8+6o4r36xtZGE2+8a3EVv9L9fSVzNj9v8aApX0PvJ0IsR" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->


    <script>
    let table = new DataTable('#myTable', {
        // options
    });

    let table1 = new DataTable('#myTable2', {
        // options
    });

    let table2 = new DataTable('#myTable3', {
        // options
    });

    let table3 = new DataTable('#myTable4', {
        // options
    });


    $(document).ready( function () {
        $('#myTable3').DataTable();
    } );
    </script>

    @endsection
@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')

<style>
    .report-carda {
        margin-top: 50px;
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
                                                        <table class="table table-stripped table-hover text-center">
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
                                                    <table class="table table-stripped table-hover text-center">
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
                                                        <table class="table table-stripped table-hover text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>Institution</th>
                                                                    <th>Full Name</th>
                                                                    <th>Date of Birth</th>
                                                                    <th>Student Identification</th>
                                                                    <th>Qualification Type</th>
                                                                    <th>Gender</th>
                                                                    <th>Certificate Number</th>
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
                                                                    <td>{{ $certificate->student_identification }}</td>
                                                                    <td>{{ $certificate->qualification_type }}</td>
                                                                    <td>{{ $certificate->gender }}</td>
                                                                    <td>{{ $certificate->certificate_number }}</td>
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
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Verified Candidates Report</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($skillSearchLogs->isEmpty())
                                                        <div class="text-center">No recommendations found!</div>
                                                        @else
                                                        <table class="table table-stripped table-hover text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>User</th>
                                                                    <th>Search Term</th>
                                                                    <th>Search On</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($skillSearchLogs as $log)
                                                                <tr>
                                                                    <td>{{ $log->id }}</td>
                                                                    <td>{{ $log->search_term }}</td>
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
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Verified Candidates Report</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($caseStudyPapers->isEmpty())
                                                    <div class="text-center">No papers found.</div>
                                                    @else
                                                    <table class="table table-stripped table-hover text-center">
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
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Verified Candidates Report</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($skillsGapSetPapers->isEmpty())
                                                    <div class="text-center">No papers found.</div>
                                                    @else
                                                    <table class="table table-stripped table-hover text-center">
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
                                                    <table class="table table-stripped table-hover text-center">
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
                                                    <table class="table table-stripped table-hover text-center">
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

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const exampleModal = document.getElementById('exampleModal');
            exampleModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const packageName = button.getAttribute('data-package-name');
                const packageAmount = button.getAttribute('data-package-amount');
                const modalPackageNameInput = exampleModal.querySelector('#package-name');
                const modalPackageAmountInput = exampleModal.querySelector('#package-amount');
                modalPackageNameInput.value = packageName;
                modalPackageAmountInput.value = packageAmount;
            });
        });
    </script>

    @endsection
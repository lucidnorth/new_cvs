@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')

<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid">
        <header>
            {{-- <div class="pricing-header p-3 pb-md-4 mx-auto">
                <h1 class="display-4 fw-normal text-body-emphasis text-white">Package Pricing</h1>
                <p class="fs-5 text-body-secondary text-white">Select package to buy .</p>
            </div> --}}
           
            <div class="row">
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h5>Payments</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-sm-12 mb-xl-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                        

                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                    <h2 style="font-size: 25px;">Paid</h2>
                                    <h3 style="font-weight: 600;">Information on all Paid</h3>

                                    </div>
                                 
                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" type="button">View Report</button>
                                            <button class="btn btn-primary" type="button">Download Report</button>
                                        </div>
                                    </div>
                                </li>
<!-- 
                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                        <h5>Payments</h5>
                                        <small>Information on all payments</small>
                                    </div>
                                    {{-- <div>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                choose date
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" type="button">View Report</button>
                                            <button class="btn btn-primary" type="button">Download Report</button>
                                        </div>
                                    </div>
                                </li> -->

                              

                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                    <h2 style="font-size: 25px;">Receivables </h2>
                                    <h3 style="font-weight: 600;">Information on all  Receivables </h3>
                                    </div>
                                    {{-- <div>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                choose date
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" type="button">View Report</button>
                                            <button class="btn btn-primary" type="button">Download Report</button>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between  align-items-center">
                                    <div>
                                    <h2 style="font-size: 25px;">Amount Due</h2>
                                    <h3 style="font-weight: 600;">Information on all Due</h3>

                                    </div>
                                    {{-- <div>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                choose date
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    <div>
                                        <div class="gap-2  mx-auto">
                                            <button class="btn btn-primary" type="button">View Report</button>
                                            <button class="btn btn-primary" type="button">Download Report</button>
                                        </div>
                                    </div>
                                </li>
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
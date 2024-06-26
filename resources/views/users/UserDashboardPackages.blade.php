@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')

<style>
    .package {
        width: 280px;
        height: 445px;
        box-shadow: 5px 5px 25px #ccc;
        border-radius: 70px 0px 70px 0px;
        padding: 10px 20px;
        position: relative;
        background: #fff;
        /* margin-top: 100px; */
        margin: 50px auto;
    }

    .package .package-name {
        text-align: center;
        text-transform: capitalize;
        font-size: 23px;
        font-weight: bold;
        color: #344767;
        padding-bottom: 1px;
    }

    .package .package-price {
        position: relative;
        left: 175px;
        top: 10px;
        background: #344767;
        color: white !important;
        width: 99px;
        padding: 5px 10px;
        border-radius: 0px;
        text-align: center;
    }

    .package .package-price span {
        position: absolute;
        bottom: -22px;
        right: 1px;
        width: 0;
        height: 0;
        border-top: 13px solid grey;
        border-bottom: 10px solid transparent;
        border-right: 13px solid transparent;
        z-index: 1;
    }

    .package ul {
        list-style: none;
        padding-top: 20px;
        text-align: left !important;
    }

    .package ul li {
        font-size: 15px;
        font-weight: bold;
        border-bottom: 1px solid #ccc;
    }

    .package ul li span .bi-check {
        color: #0B6623;
    }

    .package ul li span .bi-x {
        color: red;
    }

    .package .select {
        position: relative;
        left: -100px;
        top: 22px;
        background: #344767;
        color: #fff;
        width: 149px;
        text-decoration: none;
        border-radius: 0;
        padding: 10px 20px;
        text-transform: uppercase;
        font-size: 15px;
        letter-spacing: 1px;
        font-weight: 500;
    }

    .package .select span {
        position: absolute;
        bottom: -22px;
        left: 0;
        height: 0;
        border-top: 13px solid grey;
        border-bottom: 10px solid transparent;
        border-left: 13px solid transparent;
        z-index: -1;
        padding-top: -60px;
    }

    .package .duration {
        margin-top: 40px;
        margin-right: 60px;
        color: #344767;
        font-weight: bold;
        font-style: italic;
    }

    /* 2 */
    .package2 {
        width: 300px;
        height: 480px;
        box-shadow: 5px 5px 25px #ccc;
        border-radius: 70px 0px 70px 0px;
        padding: 10px 20px;
        position: relative;
    }

    .package2 .package-name {
        text-align: center;
        text-transform: uppercase;
        font-size: 32px;
        font-weight: bold;
        color: #007bff;
        padding-bottom: 1px;
    }

    .package2 .package-price {
        position: relative;
        left: 195px;
        background: #007bff;
        color: #fff;
        width: 99px;
        padding: 5px 10px;
        border-radius: 0px;
        text-align: center;
    }

    .package2 .package-price span {
        position: absolute;
        bottom: -22px;
        right: -0px;
        width: 0;
        height: 0;
        border-top: 13px solid #12086F;
        border-bottom: 10px solid transparent;
        border-right: 13px solid transparent;
        z-index: -5;
    }

    .package2 ul {
        list-style: none;
        padding-top: 20px;
    }

    .package2 ul li {
        font-size: 15px;
        font-weight: bold;
        border-bottom: 1px solid #ccc;
    }

    .package2 ul li span .bi-check {
        color: #0B6623;
    }

    .package2 ul li span .bi-x {
        color: red;
    }

    .package2 .select {
        position: relative;
        left: -30px;
        background: #007bff;
        color: #fff;
        width: 149px;
        text-decoration: none;
        border-radius: 0;
        padding: 10px 20px;
        text-transform: uppercase;
        font-size: 15px;
        letter-spacing: 1px;
        font-weight: 500;
    }

    .package2 .select span {
        position: absolute;
        bottom: -22px;
        left: 0;
        height: 0;
        border-top: 13px solid #12086F;
        border-bottom: 10px solid transparent;
        border-left: 13px solid transparent;
        z-index: -1;
        padding-top: -40px;
    }

    .package2 .duration {
        margin-top: 10px;
        color: #007bff;
        font-weight: bold;
        font-style: italic;
    }


    /* 3 */
    .package3 {
        width: 300px;
        height: 480px;
        box-shadow: 5px 5px 25px #ccc;
        border-radius: 70px 0px 70px 0px;
        padding: 10px 20px;
        position: relative;
    }

    .package3 .package-name {
        text-align: center;
        text-transform: uppercase;
        font-size: 32px;
        font-weight: bold;
        color: #28a745;
        padding-bottom: 1px;
    }

    .package3 .package-price {
        position: relative;
        left: 195px;
        background: #28a745;
        color: #fff;
        width: 99px;
        padding: 5px 10px;
        border-radius: 0px;
        text-align: center;
    }

    .package3 .package-price span {
        position: absolute;
        bottom: -22px;
        right: -0px;
        width: 0;
        height: 0;
        border-top: 13px solid #2E8B57;
        border-bottom: 10px solid transparent;
        border-right: 13px solid transparent;
        z-index: -5;
    }

    .package3 ul {
        list-style: none;
        padding-top: 20px;
        align-items: left;
    }

    .package3 ul li {
        font-size: 15px;
        font-weight: bold;
        border-bottom: 1px solid #ccc;
        text-align: left !important;
    }

    .package3 ul li span .bi-check {
        color: #0B6623;
    }

    .package3 ul li span .bi-x {
        color: red;
    }

    .package3 .select {
        position: absolute;
        left: 10px !important;
        bottom: 0;
        background: #28a745;
        color: #fff;
        width: 149px;
        text-decoration: none;
        border-radius: 0;
        padding: 10px 20px;
        text-transform: uppercase;
        font-size: 15px;
        letter-spacing: 1px;
        font-weight: 500;
    }

    .package3 .select span {
        position: absolute;
        bottom: -22px;
        left: 0;
        height: 0;
        border-top: 13px solid #2E8B57;
        border-bottom: 10px solid transparent;
        border-left: 13px solid transparent;
        z-index: -1;
        padding-top: -40px;
    }

    .package3 .duration {
        margin-top: 20px;
        color: #28a745;
        font-weight: bold;
        font-style: italic;
    }
</style>

<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid py-2">
        <h5 class="text-white mb-3">Packages</h1>
            <header>
                @if(auth()->user()->employer)
                <div class="row mt-3">
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Verifications Left</p>
                                            @if(auth()->user()->activePackage())
                                            <h5 class="font-weight-bolder">
                                                {{ auth()->user()->activePackage()->searches_left }}
                                            </h5>
                                            @else
                                            <h5 class="font-weight-bolder">
                                                No package
                                            </h5>
                                            @endif

                                            <!-- <p class="mb-0">
                                            <span class="text-success text-sm font-weight-bolder">+55%</span>
                                            since yesterday
                                            </p> -->
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                            <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                                            <i class="ni ni-paper-diploma ni-2x text-lg opacity-10" aria-hidden="true"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Active Package</p>
                                            @if($activePackage)
                                           <h5> {{ $activePackage->amount }}</h5>
                                           @else
                                            <h5 class="font-weight-bolder">
                                                No active package
                                            </h5>
                                            @endif

                                            <!-- <p class="mb-0">
                                            <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                            since last quarter
                                            </p> -->
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                            <i class="ni ni-bag-17 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </header>
            <main>


                @if(session('status'))

                <div class="alert alert-success" id="error-alert">
                    <h6 class="text-white fw-bold">
                        {{ session('status') }} <a class="" href="{{ route('user.dashboard') }}">
                            <h5 class="fw-bold text-white">Kindly Click here to start searching</h5>
                        </a>
                    </h6>
                </div>
                @endif
                <div class="row row-cols-1 row-cols-md-3  text-center">

                    @foreach($packages as $package)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">

                        <div class="package">
                            <div class="package-name">{{ $package->name }}</div>
                            <div class="package-price ">
                                <h6 class="text-white">₵{{ $package->amount }}</h6>
                                <span></span>
                            </div>
                            <ul>
                                <li><span class="icon"><i class="bi fs-5 bi-check"></i></span> {{ $package->search_limit }} Verifications</li>
                                <li><span class="icon"><i class="bi fs-5 bi-check"></i></span> View Academic Paper</li>
                                <li><span class="icon"><i class="bi fs-5 bi-check"></i></span> View Industry Paper</li>
                                <li class="not-included"><span class="icon"><i class="bi fs-5 bi-x"></i></span> Download Academic Paper</li>
                                <li class="not-included"><span class="icon"><i class="bi fs-5 bi-x"></i></span> Download Industry Paper</li>
                            </ul>
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal" data-package-name="{{ $package->name }}" data-package-amount="{{ $package->amount }}" class="select">Select<span></span></a>
                            {{-- <p class="duration">Duration: 3 months</p> --}}
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Enter Details to Pay</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="purchase-form" method="POST" action="{{ route('packages.purchase') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="package-name" class="col-form-label">Package Name</label>
                                        <input type="text" class="form-control" id="package-name" name="package_name" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="package-amount" class="col-form-label">Amount</label>
                                        <input type="text" class="form-control" id="package-amount" name="package_amount" readonly>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('purchase-form').submit();">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
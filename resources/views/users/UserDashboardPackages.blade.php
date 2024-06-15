@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')

 <style>
    .package-card{
            width: 300px;
            border-radius: 10px;
            margin: auto;
            border: 1px solid #3486C5;
        }
        .package-card-pro .btn-pro,
        .package-card-pro .btn-pro:hover{
            background-color: #ffc107 !important;
        }
        .package-card .card-header{
            padding-top: 20px;
        }
        .package-card button,
        .package-card button:hover{
            background-color: #3486C5 !important;
            color: #fff !important;
        }
        .package-card .package-name{
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .package-card .package-price{
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .package-card .package-price span{
            font-size: 13px;
            font-weight: normal;
            color: grey;
        }

        .package-card .package-des{
            color: grey;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .package-card ul{
            list-style: none;
            margin-left: -32px;
        }
        .package-card .card-body h6{
            font-size: 13.5px;
        }

    </style>
<main class="main-content position-relative border-radius-lg">
<div class="container py-3">
    <header>
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal text-body-emphasis text-white">Package Pricing</h1>
            <p class="fs-5 text-body-secondary text-white">Select package to buy .</p>
        </div>
    </header>
    <main>

    
    @if(session('status'))
         
         <div class="alert alert-success" id="error-alert">
          <h6 class="text-white fw-bold">  {{ session('status') }} <a class="" href="{{ route('user.dashboard') }}"> <h5 class="fw-bold text-white">Kindly Click here to start searching</h5> </a></h6> 
         </div>
         @endif
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <!-- @foreach($packages as $package)
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">{{ $package->name }}</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">${{ $package->amount }}<small class="text-body-secondary fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>{{ $package->search_limit }} searches</li>
                        </ul>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-package-name="{{ $package->name }}" data-package-amount="{{ $package->amount }}">Get started</button>
                    </div>
                </div>
            </div>
            @endforeach -->
            @foreach($packages as $package)
            <div class="col-lg-4 mb-4">
                    <div class="card package-card">
                        <div class="card-header">
                            <div class="package-name">{{ $package->name }}</div>
                            <div class="package-price">₵{{ $package->amount }} </div>
                            <div class="package-des">Get up to{{ $package->search_limit }} searches</div>
                            <div class="d-grid">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-package-name="{{ $package->name }}" data-package-amount="{{ $package->amount }}">Buy Plan</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="text-uppercase">Features</h6>
                            <small>Everything in our basic plan plus..</small>
                            <ul>
                                <li><span class="icon"><i class="bi fs-5 bi-check"></i></span> 50 Verifications</li>
                                <li><span class="icon"><i class="bi fs-5 bi-check"></i></span> View Academic Paper</li>
                                <li><span class="icon"><i class="bi fs-5 bi-check"></i></span> View Industry Paper</li>
                                <li class="not-included"><span class="icon"><i class="bi fs-5 bi-x"></i></span> Download Academic Paper</li>
                            </ul>
                        </div>
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
document.addEventListener('DOMContentLoaded', function () {
    const exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function (event) {
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

 <script>
        documen
    </script>
@endsection

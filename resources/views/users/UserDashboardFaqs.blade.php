@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')

<style>
    .accordion-body {
        color: #000;
    }

</style>

<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid">
        <header>
            {{-- <div class="pricing-header p-3 pb-md-4 mx-auto">
                <h1 class="display-4 fw-normal text-body-emphasis text-white">Package Pricing</h1>
                <p class="fs-5 text-body-secondary text-white">Select package to buy .</p>
            </div> --}}
            @if(auth()->user()->employer)
            <div class="row">
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h5>Frequently Asked Questions</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-sm-12 mb-xl-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                                     <div class="accordion" id="accordionExample">
                                        @foreach ($faqs as $index => $faq)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $index }}">
                                                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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

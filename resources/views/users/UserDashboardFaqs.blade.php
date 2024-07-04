@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')

<style>
        .fq-con{
            margin-top: 300px;
        }
        .faq-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .faq-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 32px;
        }
        @media (min-width: 768px) {
            .faq-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        .faq-section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 16px;
        }
        .faq-text-muted {
            color: #718096;
        }
        .faq-link-primary {
            color: #2b6cb0;
            text-decoration: none;
        }
        .faq-link-primary:hover {
            text-decoration: underline;
        }
        .faq-details {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 16px;
        }
        .faq-details summary {
            cursor: pointer;
            color: #2b6cb0;
        }
        .faq-card {
            background-color: rgb(202, 202, 202);
            color: #1a202c;
            padding: 32px;
            margin-top: 48px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        @media (min-width: 768px) {
            .faq-card {
                flex-direction: row;
                justify-content: space-between;
            }
        }
        .faq-card h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .faq-card p {
            color: #718096;
        }
        .faq-buttons {
            display: flex;
            gap: 16px;
        }
        .faq-button {
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
        }
        .faq-button-primary {
            background-color: #2b6cb0;
            color: white;
        }
        .faq-button-primary:hover {
            background-color: #2c5282;
        }
        .faq-button-secondary {
            background-color: #e2e8f0;
            color: #2b6cb0;
        }
        .faq-button-secondary:hover {
            background-color: #cbd5e0;
        }
    </style>

<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid">
        <!-- <header>
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
                                                    <p class="fs-5">{{ $faq->answer }}</p>
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
        </header> -->
        <div class="fq-con">
        <div class="faq-grid">
            <div>
                <h2 class="faq-section-title">General FAQs</h2>
                <p class="faq-text-muted">Everything you need to know about the product and how it works. Can't find an answer? <a href="#" class="faq-link-primary">Chat with our team</a>.</p>
            </div>
            <div>
                <div class="space-y-4">
                    <details class="faq-details">
                        <summary>Is there a free trial available?</summary>
                        <p class="mt-2">Yes, we have a free version of Untitled UI available for you to try out! It’s an incredibly powerful and large UI kit for Figma in its own right, but it doesn’t use the latest component property features announced at Config 2022. You can duplicate this UI kit here and use it in as many projects as you’d like. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                    </details>
                    <details class="faq-details">
                        <summary>What does the free version include?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>Do you have an affiliate program?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>Do I need to know how to use Figma?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>Do I need to pay for Figma?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>Is there a version for Sketch or XD?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                </div>
            </div>
            <div>
                <h2 class="faq-section-title">Payments FAQs</h2>
                <p class="faq-text-muted">Everything you need to know about our payment packages. Can't find an answer? <a href="#" class="faq-link-primary">Chat with our team</a>.</p>
            </div>
            <div>
                <div class="space-y-4">
                    <details class="faq-details">
                        <summary>Is it a one-time payment?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>What does "lifetime access" mean?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>What is your cancellation policy?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>Can other info be added to an invoice?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>How does billing work?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>How do I change my account email?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                </div>
            </div>
            <div>
                <h2 class="faq-section-title">Verified Certificate FAQs</h2>
                <p class="faq-text-muted">Details about obtaining verified certificates. Can't find an answer? <a href="#" class="faq-link-primary">Chat with our team</a>.</p>
            </div>
            <div>
                <div class="space-y-4">
                    <details class="faq-details">
                        <summary>How can I obtain a verified certificate?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>What are the benefits of a verified certificate?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>How do I share my verified certificate?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                </div>
            </div>
            <div>
                <h2 class="faq-section-title">Skill Search FAQs</h2>
                <p class="faq-text-muted">Information about the skill search feature. Can't find an answer? <a href="#" class="faq-link-primary">Chat with our team</a>.</p>
            </div>
            <div>
                <div class="space-y-4">
                    <details class="faq-details">
                        <summary>How do I use the skill search feature?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>What skills can I search for?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                    <details class="faq-details">
                        <summary>How do I add my skills to the skill search?</summary>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.</p>
                    </details>
                </div>
            </div>
        </div></div>
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
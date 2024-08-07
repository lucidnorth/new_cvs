@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')

@section('content')

<style>
.faq-container {
        width: 60%;
        margin: 50px auto;
        background: #fff;
        padding: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h1 {
        text-align: center;
        margin-top: 120px;
        margin-bottom: 80px;
        font-size: 4rem;
        font-weight: 400;
        color: #cccccc;
    }

    .faq-item {
        border-bottom: 1px solid #ddd;
        padding: 15px 0;
    }

    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }

    .faq-question span {
        font-size: 20px;
        font-weight: 450;
        color: #333;
    }

    .view-btn, .close-btn {
        background: #596CFF;
        color: #fff;
        border: none;
        padding: 10px 50px; /* Increased padding for wider buttons */
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .faq-answer {
        display: none;
        margin-top: 10px;
        font-size: 25px;
        color: #666;
    }

    .faq-answer p {
        margin: 5px 0;
        font-size: 16px;
    }

</style>

<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid">
        <header>
          
            <div class="row">
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">

                        <h1 class="faq-maintitle">Frequently Asked Questions</h1>

                    </div>
                </div>

                <div class="col-xl-12 col-sm-12 mb-xl-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">

        <div class="faq-item">
            <div class="faq-question">
                <span>What is Certverification?</span>
                <button class="view-btn">View</button>
            </div>
            <div class="faq-answer">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>Payment Issues</span>
                <button class="view-btn">View</button>
            </div>
            <div class="faq-answer">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
                <p>Contact: mail@cvs.com or call 02334343</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>Search Issues</span>
                <button class="view-btn">View</button>
            </div>
            <div class="faq-answer">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>Skill Search</span>
                <button class="view-btn">View</button>
            </div>
            <div class="faq-answer">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>Verified Candidate</span>
                <button class="view-btn">View</button>
            </div>
            <div class="faq-answer">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
            </div>
        </div>
    </div>



                                     {{-- <div class="accordion" id="accordionExample">


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
                                    </div> --}}
                                </div>
                            </div>
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
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach((item, index) => {
                const btn = item.querySelector('.view-btn, .close-btn');
                const answer = item.querySelector('.faq-answer');

                if (index === 0) {
                    answer.style.display = 'block';
                    btn.textContent = 'Close';
                    btn.classList.add('close-btn');
                    btn.classList.remove('view-btn');
                }

                btn.addEventListener('click', function() {
                    if (answer.style.display === 'block') {
                        answer.style.display = 'none';
                        btn.textContent = 'View';
                        btn.classList.remove('close-btn');
                        btn.classList.add('view-btn');
                    } else {
                        answer.style.display = 'block';
                        btn.textContent = 'Close';
                        btn.classList.remove('view-btn');
                        btn.classList.add('close-btn');
                    }
                });
            });
        });
    </script>

    @endsection
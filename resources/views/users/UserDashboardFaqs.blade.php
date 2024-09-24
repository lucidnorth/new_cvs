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

    .view-btn,
    .close-btn {
        background: #596CFF;
        color: #fff;
        border: none;
        padding: 10px 50px;
        /* Increased padding for wider buttons */
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
    .accordion-body{
        font-size: 16px;
    }
    .accordion-header button{
        font-size: 18px;
    }

    .faq-card{
        margin-top: 60px;
    }
</style>

<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid">
        <header>

        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                    <div class="">
                        <div class="">
                            <div class="row">
                                <h5 class="text-white">Frequently Asked Questions</h5>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="col-xl-12 col-sm-12 mb-xl-0 faq-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                                    @foreach ($categories as $category)
                                    <div class="faq-category">
                                        <div class="faq-items">
                                           
                                            <div class="faq-item">
                                                <div class="faq-question">
                                                    <span class="fw-bold">{{ $category->category }}</span>
                                                    <button class="view-btn">View</button>
                                                </div>
                                                <div class="faq-answer">
                                                    @foreach ($category->questions as $index => $question)
                                                    <div class="accordion-item mb-3">
                                                        <h2 class="accordion-header" id="heading{{ $category->id }}{{ $index }}">
                                                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $category->id }}{{ $index }}">
                                                                {{ $question->question }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $category->id }}{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample{{ $category->id }}">
                                                            <div class="accordion-body">
                                                                {{ $question->answer }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
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

    </header>
<main>


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
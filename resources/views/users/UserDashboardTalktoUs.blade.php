@extends('layouts.Dashboard')

@section('title', 'Dashboard - Laravel Admin Panel')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUa0lW4Y+8zHV/3BecMWGs30KeQll6Z8RoJSGW2l9F5XZT7NFhZe9sJoW8vy" crossorigin="anonymous">
<style>
    .min-vh-100 {
        min-height: 800vh;
        display: grid;
        place-items: center;
    }

    .bg-light {

    }

    h1 {
        text-align: center;
        margin-top: 0px;
        margin-bottom: 0px;
        font-size: 4rem;
        font-weight: 400;
        color: #cccccc;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0px;
        max-width: 1200px;
        padding: 20px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .card-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 0px;
    }

    .card-container h2 {
        font-size: 2rem;
        font-weight: bolder;
        margin-bottom: 1rem;

    }

    .card-container p {
        font-size: 1.25rem;
        color: #6c757d;
        margin-bottom: 1rem;
    }

    .line-text {
        color: #d3dae0;
        margin-right: 10px;
    }

    .btn-send {
        width: 100%;
        padding: 0.75rem;
        font-size: 1.2rem;
    }

    .contact-info {
        background-color: #6074DF;
        color: white;
        padding: 20px;
        border-radius: 0px;
    }

    .contact-info h2 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1rem;
        color: #ffffff
    }

    .contact-info p {
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }

    .contact-info h3 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;

    }

    @media (min-width: 768px) {
        .grid-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>


<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid">
        <header>
            
            <div class="row">
                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">

                        <h1 class="faq-maintitle">Talk to Us</h1>

                    </div>
                </div>

                <div class="col-xl-12 col-sm-12 mb-xl-0 mt-4">
                    <div class="card">
                    <h2>Contact Us</h2>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

                            <div class="row">
                                <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">

                                    <div class="container-fluid min-vh-100 ">
                                        <div class="grid-container">
                                            <div class="card-container ">
                                                <h2>Send us a Message</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed</p>
                                                <form action="{{ route('users.contacts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="recipient" class="form-label">Select Recipient</label>
                <select class="form-select" id="recipient" name="recipient">
                    <option>customercare@certverification.com</option>
                    <option>accountant@certverification.com</option>
                    <option>admin@certverification.com</option>
                </select>
                @error('recipient')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
                @error('subject')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-send">Send</button>
        </form>
                                            </div>
                                            <div class="contact-info">
                                                <h2>Contact Information</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapi.</p>
                                                <div class="mb-4">
                                                    <h3>Digital Address</h3>
                                                    <p>GA-111-1234 Greater Accra, Ghana.</p>
                                                </div>
                                                <div class="mb-4">
                                                    <h3>Phone</h3>
                                                    <p><span class="line-text">Line 1:</span> +233 123 456 789</p>
                                                    <p><span class="line-text">Line 2:</span> +233 123 456 789</p>
                                                    <p><span class="line-text">Line 2:</span> +233 123 456 789</p>
                                                    <p><span class="line-text">Line 3:</span> +233 123 456 789</p>
                                                    <p><span class="line-text">Line 4:</span> +233 123 456 789</p>
                                                </div>
                                                <div>
                                                    <h3>Email</h3>
                                                    <p>customercare@certverification.com</p>
                                                    <p>accounts@certverification.com</p>
                                                    <p>admin@certverification.com</p>
                                                </div>
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



<script>

</script>

@endsection
@extends('layouts.app')

@section('content')

@if (session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hello!</strong>{{ session('success') }}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">
    <h1 class="mb-4">Get In Touch</h1>

    <!-- Nav pills -->
    <ul class="nav nav-pills justify-content-center" id="myTabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#contact">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#customercare">Customer Care</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#vacancies">Vacancies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#advert">Advertisement</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content mt-4">
        <div class="tab-pane fade show active" id="contact">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mb-4">CONTACT US</h1>
                    <form action="{{ route('form.contactus') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="contactMethod" class="form-label">Preferred Contact Medium</label>
                            <select class="form-select" id="contactMethod" name="contactMethod">
                                <option value="email">Email</option>
                                <option value="phone">Phone</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Type your message here</label>
                            <textarea class="form-control" id="message" name="userMessage" rows="4" required></textarea>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
                <div class="col-md-6">
                    <div class="contact-details">
                        <div class="overlay">
                            <h2>Contact Details of CertVerification</h2>
                            <p>
                            <h4>Contact Number:</h4> +233 302 523 734</p>

                            <h4>Email:</h4> support@certverification.com<br>admin@certverification.com</p>
                            <p>
                            <h4>Working Hours:</h4>For Online Verfications; <br>
                            (All Days Including Holidays) <br><br>
                            For Contact Numbers: <br>
                            Monday To Friday (9AM To 5PM)</p>
                            <p>
                            <h4>Live Support:</h4> <i>Coming Soon </i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="customercare">
            <div class="col-md-12">
                <h1 class="mb-4">Customer Care</h1>
                <form action="{{ route('form.customercare') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="issue" class="form-label">Report Issues</label>
                        <select class="form-select" id="issue" name="issue" required>
                            <option selected disabled>--select an issue--</option>
                            <option value="Payments">Payments</option>
                            <option value="Login and Sign up">Login and Sign up</option>
                            <option value="Customer Feedback">Customer Feedback</option>
                            <option value="Privacy Concerns">Privacy Concerns</option>
                            <option value="Advertisements">Advertisements</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Type your message here</label>
                        <textarea class="form-control" id="message" name="userMessage" rows="4" required></textarea>
                    </div>
                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="vacancies">
            <h1 class="mb-4">Vacancies</h1>
            <form action="{{ route('form.vacancy') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="issue" class="form-label">Vacancy</label>
                    <select class="form-select" id="issue" name="vacancy">
                        <option selected>--select a vacancy--</option>
                        <option value="Customer Care Expert">Customer Care Expert</option>
                        <option value="Researcher">Researcher</option>
                        <option value="Finance Officer">Finance Officer</option>
                        <option value="Software Developer">Software Developer</option>
                        <option value="Product Manager">Product Manager</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Your Full Name:</label>
                    <input type="text" class="form-control" id="recipient-name" name="name">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text" name="userMessage"></textarea>
                </div>
                <div class="mb-3">
                    <label for="phone" class="col-form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="country" class="col-form-label">Country:</label>
                    <textarea class="form-control" id="country" name="country"></textarea>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" id="cv" name="cv">
                </div>
                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Submit CV</button>
                </div>
            </form>

        </div>

        <div class="tab-pane fade" id="advert">
            <h1 class="mb-4">Advertisement</h1>
            <form action="{{ route('form.advertisement') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="col-form-label">Your Full Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message" name="userMessage" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="phone" class="col-form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="country" class="col-form-label">Country:</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
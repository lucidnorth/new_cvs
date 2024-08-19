@extends('layouts.app')

@section('content')
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
                    <form>
                        <div class="mb-3">
                            <label for="contactMethod" class="form-label">Preferred Contact Medium</label>
                            <select class="form-select" id="contactMethod" name="contactMethod">
                                <option value="email">Email</option>
                                <option value="phone">Phone</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Type your message here</label>
                            <textarea class="form-control" id="message" name="message" rows="4"></textarea>
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
                                <h4>Working Hours:</h4>Monday To Friday (9AM To 5PM)</p>
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
                <form>
                    <div class="mb-3">
                        <label for="issue" class="form-label">Report Issues</label>
                        <select class="form-select" id="issue" name="issue">
                            <option value="text">Select An Issue</option>
                            <option value="text">Payments</option>
                            <option value="text">Login and Sign up</option>
                            <option value="text">Customer Feedback</option>
                            <option value="text">Privacy Concerns</option>
                            <option value="text">Advertisements</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Type your message here</label>
                        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                    </div>
                    <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="tab-pane fade" id="vacancies">
        <h1 class="mb-4">Vacancies</h1>
        <form>
        <label for="issue" class="form-label">Report Issues</label>
                        <select class="form-select" id="issue" name="issue">
                            <option value="text">Select A Vacancy</option>
                            <option value="text">Customer Care Expert</option>
                            <option value="text">Researcher</option>
                            <option value="text">Finance Officer</option>
                            <option value="text">Software Developer</option>
                            <option value="text">Product Manager</option>
                        </select>
          <div class="mb-3">
            <label for="name" class="col-form-label">Your Full Name:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">Phone Number:</label>
            <input type="telephone" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Country:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="mb-3">

            <input type="file" class="form-control" id="recipient-name">
          </div>
          <div style="text-align: right;">
          <button type="button" class="btn btn-primary">Submit CV</button>
          </div>
        </form>
        </div>

        <div class="tab-pane fade" id="advert">
        <h1 class="mb-4">Advertisements</h1>
        <form>
          <div class="mb-3">
            <label for="name" class="col-form-label">Your Full Name:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">Phone Number:</label>
            <input type="telephone" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Country:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
         
          <div style="text-align: right;">
          <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </form>
        </div>
    </div>
</div>
@endsection


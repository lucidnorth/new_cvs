@extends('layouts.app')
@section('content')

<div class="container">

    <h1 class="mb-4">Get in Touch</h1>
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
        <!-- <li class="nav-item">
    <a class="nav-link" data-bs-toggle="pill" href="#faqs">FAQs</a>
  </li> -->
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane container active" id="contact">

            <div class="container mt-5">
                <div class="row">
                    <!-- Left Inner Section - Contact Form -->
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <!-- Right Inner Section - Contact Details -->
                    <div class="col-md-6">
                        <div class="contact-details">
                            <div class="overlay">
                                <h2>Contact Details of CVS</h2>
                                <p>
                                <h4>Contact Number:</h4> (xxxxxxxxxxx)</p>
                                <p>
                                <h4>Phone Number:</h4> (xxxxxxx)</p>
                                <p>(xxxxxxx)</p>
                                <p>
                                <h4>Email:</h4> (xxxxxx)</p>
                                <p>
                                <h4>Working Hours:</h4> (xxxxxx)</p>
                                <p>
                                <h4>Live Support:</h4> (xxxxxx)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="tab-pane container fade" id="customercare">
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <!-- customer care contents -->






            <div class="container mt-4 intouch-page">

                <h2 class="intouch">Cutomer Care </h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste ducimus quos
                    obcaecati facere vero reiciendis nulla nesciunt suscipit deleniti.
                    Officia fugiat et accusantium deserunt minima cupiditate maiores
                    beatae recusandae iste?</p>
                <div class="row">
                    <!-- Card 1 - Payments -->
                    <div class="col-md-2">
                        <div class="card">
                            <img src="your_payments_background_image.jpg" class="card-img" alt="Payments">
                            <div class="overlay-card" data-bs-toggle="modal" data-bs-target="#paymentsModal">
                                <h5 class="card-title">Payments</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 - Login/Signup -->
                    <div class="col-md-2">
                        <div class="card">
                            <img src="your_login_signup_background_image.jpg" class="card-img" alt="Login/Signup">
                            <div class="overlay-card" data-bs-toggle="modal" data-bs-target="#loginSignupModal">
                                <h5 class="card-title">Login/Signup</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 - Customer Feedback -->
                    <div class="col-md-2">
                        <div class="card">
                            <img src="your_customer_feedback_background_image.jpg" class="card-img" alt="Customer Feedback">
                            <div class="overlay-card" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                                <h5 class="card-title">Customer Feedback</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 - Privacy Concerns -->
                    <div class="col-md-2">
                        <div class="card">
                            <img src="your_privacy_concerns_background_image.jpg" class="card-img" alt="Privacy Concerns">
                            <div class="overlay-card" data-bs-toggle="modal" data-bs-target="#privacyModal">
                                <h5 class="card-title">Privacy Concerns</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Card 5 - Advertisements -->
                    <div class="col-md-2">
                        <div class="card">
                            <img src="your_advertisements_background_image.jpg" class="card-img" alt="Advertisements">
                            <div class="overlay-card" data-bs-toggle="modal" data-bs-target="#advertisementsModal">
                                <h5 class="card-title">Advertisements</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Contents ------------------------------------------------------------------------------------------------>

            <!-- Payments Modal -->
            <div class="modal fade col-md-6" id="paymentsModal" tabindex="-1" role="dialog" aria-labelledby="paymentsModalLabel" aria-hidden="true">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                        <div class="modal-header">
                            <h4 class="modal-title" id="paymentsModalLabel">Report all Payments related Issues</h4>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            <!-- Payments modal content goes here -->



                            <p class="modal-text">Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Aperiam, sapiente,
                                ut magni illum error quas sequi modi cum ducimus, similique at impedit deleniti
                                beatae placeat quaerat distinctio? Ea, quae maxime?</p>

                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="tab-content">
                                <div class="tab-pane container active" id="contact">
                                    <div class="custom-contact-tab">
                                        <!-- Contact Form -->
                                        <div class="custom-contact-form">
                                            <!-- <h1 class="mb-4">CONTACT US</h1> -->
                                            <form>
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
                                                <button type="submit" class="btn btn-primary  btn-block">Submit</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>





                    </div>
                </div>
            </div>
        </div>

        <!-- Login/Signup Modal -->
        <div class="modal fade" id="loginSignupModal" tabindex="-1" role="dialog" aria-labelledby="loginSignupModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="paymentsModalLabel">Report all Login and Signup related Issues</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <!-- Payments modal content goes here -->



                        <p class="modal-text">Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Aperiam, sapiente,
                            ut magni illum error quas sequi modi cum ducimus, similique at impedit deleniti
                            beatae placeat quaerat distinctio? Ea, quae maxime?</p>

                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="tab-content">
                            <div class="tab-pane container active" id="contact">
                                <div class="custom-contact-tab">
                                    <!-- Contact Form -->
                                    <div class="custom-contact-form">
                                        <!-- <h1 class="mb-4">CONTACT US</h1> -->
                                        <form>
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
                                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>

        <!-- Customer Feedback Modal -->
        <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="paymentsModalLabel">Report all Feedback related Issues</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <!-- Payments modal content goes here -->



                        <p class="modal-text">Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Aperiam, sapiente,
                            ut magni illum error quas sequi modi cum ducimus, similique at impedit deleniti
                            beatae placeat quaerat distinctio? Ea, quae maxime?</p>

                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="tab-content">
                            <div class="tab-pane container active" id="contact">
                                <div class="custom-contact-tab">
                                    <!-- Contact Form -->
                                    <div class="custom-contact-form">
                                        <!-- <h1 class="mb-4">CONTACT US</h1> -->
                                        <form>
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
                                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>





                </div>
            </div>
        </div>

        <!-- Privacy Concerns Modal -->
        <div class="modal fade" id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="privacyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="paymentsModalLabel">Report all Privacy concerns here</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <!-- Payments modal content goes here -->



                        <p class="modal-text">Someone</p>

                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="tab-content">
                            <div class="tab-pane container active" id="contact">
                                <div class="custom-contact-tab">
                                    <!-- Contact Form -->
                                    <div class="custom-contact-form">
                                        <!-- <h1 class="mb-4">CONTACT US</h1> -->
                                        <form>
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
                                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>





                </div>
            </div>
        </div>

        <!-- Advertisements Modal -->
        <div class="modal fade" id="advertisementsModal" tabindex="-1" role="dialog" aria-labelledby="advertisementsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="paymentsModalLabel">Report advertisement related Issues</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <!-- Payments modal content goes here -->



                        <p class="modal-text">Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Aperiam, sapiente,
                            ut magni illum error quas sequi modi cum ducimus, similique at impedit deleniti
                            beatae placeat quaerat distinctio? Ea, quae maxime?</p>

                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="tab-content">
                            <div class="tab-pane container active" id="contact">
                                <div class="custom-contact-tab">
                                    <!-- Contact Form -->
                                    <div class="custom-contact-form">
                                        <!-- <h1 class="mb-4">CONTACT US</h1> -->
                                        <form>
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
                                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>





                </div>
            </div>
        </div>







    </div>
</div>



<div class="tab-pane container fade vacancy-contents" id="vacancies">
    <p>Explain to you how all this mistaken idea of denouncing pleasure and praising
        pain was born and I will give you a complete account of the system, and expound the actual
        teachings of the great explorer of the truth, the master-builder of human happiness.
        No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because
        those who do not know how to pursue pleasure rationally encounter consequences that
        are extremely painful. Nor again is there anyone who loves or pursues or desires
        to obtain pain of itself, because it is pain, but because occasionally
        circumstances occur in which toil and pain can procure him some great pleasure.
        or one who avoids a pain that produces no resultant pleasure?</p>
</div>

<div class="tab-pane container fade " id="advert">
    <p> all this mistaken idea of denouncing pleasure and praising
        pain was born and I will give you a complete account of the system, and expound the actual
        teachings of the great explorer of the truth, the master-builder of human happiness.
        No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because
        those who do not know how to pursue pleasure rationally encounter consequences that
        are extremely painful. Nor again is there anyone who loves or pursues or desires
        to obtain pain of itself, because it is pain, but because occasionally
        circumstances occur in which toil and pain can procure him some great pleasure.
        or one who avoids a pain that produces no resultant pleasure?</p>


</div>

@endsection
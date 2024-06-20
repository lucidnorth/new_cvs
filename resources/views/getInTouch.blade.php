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
                            <div class="mb-3">
                                <label for="contactMethod" class="form-label">Preferred Contact Medium</label>
                                <select class="form-select" id="contactMethod" name="contactMethod">
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <!-- Right Inner Section - Contact Details -->
                    <div class="col-md-6">
                        <div class="contact-details">
                        <div class="contact-details-ut-section">
    <div class="overlay-ut">
        <div class="container">
            <h2 class="contact-title-ut">Contact Details of CVS</h2>
            <div class="contact-info-ut">
                <p><strong>Contact Number:</strong> (xxxxxxxxxxx)</p>
                <p><strong>Phone Number:</strong> (xxxxxxx)</p>
                <p>(xxxxxxx)</p>
                <p><strong>Email:</strong> (xxxxxx)</p>
                <p><strong>Working Hours:</strong> (xxxxxx)</p>
                <p><strong>Live Support:</strong> (xxxxxx)</p>
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

    <div class="tab-pane container fade" id="customercare">
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <!-- customer care contents -->






            <div class="container mt-4 intouch-page">

                <h2 class="intouch">Cutomer Care </h2>
                <form>
                <div class="mb-3">
                                <label for="contactMethod" class="form-label">Preferred Contact Medium</label>
                                <select class="form-select" id="contactMethod" name="contactMethod">
                                    <option value="text">Select</option>
                                    <option value="text">Payments Issues</option>
                                    <option value="text">Login/Sign In Issues</option>
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
                            <div class="mb-3">
                                <label for="contactMethod" class="form-label">Preferred Contact Medium</label>
                                <select class="form-select" id="contactMethod" name="contactMethod">
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

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
@extends('layouts.app')
@section('content') 
  
<div class="container">

  <h1 class="mb-4 mt-5">About Us</h1>
  <!-- Nav pills -->
  <ul class="nav nav-pills justify-content-center" id="myTabs">
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="pill" href="#integrity">Integrity</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="pill" href="#vision">Vision & Mission</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="pill" href="#accreditation">Accreditations</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="pill" href="#faqs">FAQs</a>
  </li>
</ul>

<!-- Tab panes -->
<div class=" tab-content about-tab-content">
  <div class="tab-pane container active" id="integrity">
    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising 
      pain was born and I will give you a complete account of the system, and expound the actual
       teachings of the great explorer of the truth, the master-builder of human happiness.
        No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because 
        those who do not know how to pursue pleasure rationally encounter consequences that
         are extremely painful. Nor again is there anyone who loves or pursues or desires 
         to obtain pain of itself, because it is pain, but because occasionally 
         circumstances occur in which toil and pain can procure him some great pleasure.
            or one who avoids a pain that produces no resultant pleasure?</p>
  </div>

  <div class="tab-pane container fade" id="vision">
    <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising 
      pain was born and I will give you a complete account of the system, and expound the actual
       teachings of the great explorer of the truth, the master-builder of human happiness.
        No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because 
        those who do not know how to pursue pleasure rationally encounter consequences that
         are extremely painful. Nor again is there anyone who loves or pursues or desires 
         to obtain pain of itself, because it is pain, but because occasionally 
         circumstances occur in which toil and pain can procure him some great pleasure.
            or one who avoids a pain that produces no resultant pleasure?</p>
  </div>

  <div class="tab-pane container fade" id="accreditation">
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

  <div class="tab-pane container fade" id="faqs">

            <h2>Frequently Asked Questions</h2>

            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Accordion Item #1
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Accordion Item #2
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Accordion Item #3
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>

  </div>
</div>
</div>
@endsection
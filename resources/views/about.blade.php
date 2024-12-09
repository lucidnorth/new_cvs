@extends('layouts.app')
@section('content')

<style>

/* .about-tab-content{
  margin: auto 0;
} */

#mission p,
#vision p{
  text-align: center;
  margin : 70px 0;
}
#integrity p{
  text-align: left;
  margin: auto;
}

.accordion-header button{
  text-transform: capitalize;
}

</style>
<div class="container about-us-blade">

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  <h1 class="mb-4 mt-5 about-head">About Us</h1>
  <!-- Nav pills -->
  <ul class="nav nav-pills justify-content-center" id="myTabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#integrity">Integrity</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#mission">Mission</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#vision">Vision</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#faqs">FAQs</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class=" tab-content about-tab-content ">
    <div class="tab-pane container active" id="integrity">
      @if ($integrity)
      <p style="text-align: justify;">{!! $integrity->page_text !!}</p>
      @else
            <div class="mb-3">No content available yet.</div>
        @endif
    </div>

    <div class="tab-pane container fade" id="mission">
    @if ($mission)
      <p style="text-align:center; margin : 70px 0;">{!! $mission->page_text !!}</p>
      @else
            <div class="mb-3">No content available yet.</div>
        @endif
    </div>

    <div class="tab-pane container fade" id="vision">
    @if ($vision)
      <p style="text-align:center; margin : 0px 0;">{!! $vision->page_text !!}</p>
      @else
            <div class="mb-3">No content available yet.</div>
        @endif
    </div>

    <div class="tab-pane container fade" id="faqs">

      <h2>Frequently Asked Questions</h2>

      <div class="accordion" id="accordionExample">
        @if ($faqs->isNotEmpty())
            @foreach ($faqs as $index => $faq)
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-{{ $faq->id }}">
                  <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $faq->id }}">
                      {{ $faq->title }}
                  </button>
                </h2>
                <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $faq->page_text !!}
                    </div>
                </div>
              </div>
            @endforeach
        @else
            <p>No FAQs uploaded yet!</p>
        @endif

      </div>

    </div>
  </div>
</div>
@endsection
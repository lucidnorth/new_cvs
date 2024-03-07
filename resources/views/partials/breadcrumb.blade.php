@if(!request()->is('/'))
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
            @yield('breadcrumb') <!-- This is where specific breadcrumb items for each page will be added -->
        </ol>
    </nav>
@endif
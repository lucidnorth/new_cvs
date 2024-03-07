<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
header

    </header>

    <main> 
    @yield('page-content')

    </main>

    <footer>
footer 

    </footer>
</body>
</html>


 
@include('layouts.sideBar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    @include('layouts.navBar')
    <!-- End Navbar -->
    @yield('content') 
  </main>
 
  <link href="{{ asset('css/argon-dashboard.css') }}" rel="stylesheet"/>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet"/>
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
  
@extends('layouts.Dashboard')


@section('title', ' Dashboard-Laravel Admin Panel')
@section('content')

<main class="main-content position-relative border-radius-lg ">
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->

    
    @include('users.components.edit_details')

  </div>



    



  <!-- <h1> {{ auth()->user()->email}}</h1>
<h1>{{ auth()->user()->address}}</h1> -->



</main>
@endsection
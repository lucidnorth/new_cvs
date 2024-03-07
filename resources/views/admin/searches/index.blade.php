@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.search.title') }}
                </div>
                <div class="panel-body">
                    <p>
                        Text coming soon...

                        <form class="form-inline" action="{{ route('search') }}" method="POST">
                    @csrf
                    <label for="institution_id">Select Institution:</label>
                        <select name="institution_id" id="institution_id">
                            <option value="">Select Institution</option>
                            @foreach ($institution as $institution )
                            <option value="{{ $institution->id }}" >{{ $institution->institutions }}</option>                 
                            @endforeach
                        </select>

                    

                        <label for="certificate_number">Certificate Number:</label>
                        <input class="form-control mr-sm-2" type="text" placeholder="Search"  name="certificate_number" id="certificate_number">
                        <button class="btn btn-primary mb-2" type="submit">Search</button>
                      </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Display search result or error message -->
 @if(session('certificate'))
       <h2>Search Result</h2>
       <ul>
           <li>Institution: {{ session('certificate')->institution->institutions}}</li>
           <li>First Name: {{ session('certificate')->first_name }}</li>
            <li>Middle Name: {{ session('certificate')->middle_name }}</li>
            <li>Last Name: {{ session('certificate')->last_name }}</li>
            <li>Date of Birth: {{ session('certificate')->date_of_birth }}</li>
            <li>Qualification Type: {{ session('certificate')->qualification_type }}</li>
            <li>Gender: {{ session('certificate')->gender }}</li>
            <li> Certificate Number: {{ session('certificate')->certificate_number }}</li>
            <li> Student Identification: {{ session('certificate')->student_identification }}</li>
            <li> Qualification Type: {{ session('certificate')->Qualification_Type }}</li>
            <li> Year of Entry: {{ session('certificate')->year_of_entry}}</li>
            <li> Year of Completion: {{ session('certificate')->year_of_completion }}</li>
      
           
         
           <!-- Include other institution-related data as needed -->
       </ul>
   @elseif(session('error'))
       <p>{{ session('error') }}</p>
   @endif





   
@endsection

@csrf
       


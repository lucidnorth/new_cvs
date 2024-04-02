@extends('layouts.admin')
@section('content')
<div class="content">
 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Paper">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                  Paper Id
                                </th>
                                <th>
                                    Paper Title
                                </th>
                                <th>
                                    Paper Category
                                </th>
                                <th>
                                   Date
                                </th>
                                <th>
                                    Download Paper
                                </th>
                               
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($allpapers as $paper)
                            <tr>
                                <td width="10">

                                </td>                      
                                <td>
                                {{ $paper->id }}
                                </td>
                                <td>
                                {{ $paper->name }}
                                </td>
                                <td>
                                {{ $paper->category }}
                                </td>
                                <td>
                                {{ $paper->created_at->format('d/m/Y H:i:s') }}
                                </td>
                                <td>
                                  
                    <td class="align-middle">
                      <a href="{{ route('user.download.paper', $paper->id) }}"  class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Download
                      </a>
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success" role="alert" id="success-alert" >
    {{ session('success') }}
</div>
@endif
<form id="institution-form" class="form" action="{{ route('papersupload.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Paper Title</label>
            <input class="form-control" type="text" value="type" name="name">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Select Category</label>
            <select class="form-control" id="file-format" name="category">
                <option value="Case Study">Case Study</option>
                <option value="Skills Gap Set">Skills Gap Set</option>
                <option value="Research Paper">Research Paper</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-label">Paper Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
    </div>
    <hr class="horizontal dark">

    <div class="col-md-12 mt-5">
        <div class="form-group">
            <label for="file-upload" class="form-control-label">Upload File</label>
            <input type="file" class="form-control-file" id="file-upload" accept=".pdf" name="file">

            <small id="fileHelp" class="form-text text-muted">Please upload PDF files only.</small>
        </div>
    </div>
     <!-- New section for image upload -->
     <div class="col-md-12">
        <div class="form-group">
            <label for="image-upload" class="form-control-label">Upload Image</label>
            <input type="file" class="form-control-file" id="image-upload" accept="image/*" name="image">
            <small id="imageHelp" class="form-text text-muted">Please upload image files only.</small>
        </div>
    </div>
    <div class="text-end"> <!-- Added class "text-end" to push button to the right -->
        <button class="btn btn-primary btn-sm">Upload</button>
    </div>
</form>
@endsection
@section('scripts')
<script>
    // Dismiss the success alert after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 5000);
</script>
@parent
<script>
   

</script>
@endsection
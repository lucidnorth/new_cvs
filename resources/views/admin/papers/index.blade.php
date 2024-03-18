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
@endsection
@section('scripts')
@parent
<script>
   

</script>
@endsection
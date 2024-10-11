@extends('layouts.admin')

@section('content')

<div class='row'>
    <div class='col-md-12'>
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('global.app_excelImport')
            </div>

            <div class="panel-body table-responsive">
                <form class="form-horizontal" method="POST" action="{{ route($routeName) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="filename" value="{{ $filename }}" />
                    <input type="hidden" name="hasHeader" value="{{ $hasHeader }}" />
                    <input type="hidden" name="modelName" value="{{ $modelName }}" />
                    <input type="hidden" name="redirect" value="{{ $redirect }}" />

                    <!-- Table displaying headers and lines from the Excel file -->
                    <table class="table">
                        @if(isset($headers))
                            <tr>
                                @foreach($headers as $field)
                                    <th>{{ $field }}</th>
                                @endforeach
                            </tr>
                        @endif
                        @if($lines)
                            @foreach($lines as $line)
                                <tr>
                                    @foreach($line as $field)
                                        <td>{{ $field }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif

                        <!-- Dropdowns to map Excel columns to model fields -->
                        <tr>
                            @foreach($headers as $key => $header)
                                <td>
                                    <select name="fields[{{ $key }}]">
                                        <option value=''>Please select</option>
                                        @foreach($fillables as $k => $fillable)
                                            <option value="{{ $fillable }}" {{ strtolower($header) === strtolower($fillable) ? 'selected' : '' }}>{{ $fillable }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            @endforeach
                        </tr>
                    </table>

                    <!-- Submit Button for importing Excel data -->
                    <button type="submit" class="btn btn-primary">
                        @lang('global.app_import_data')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

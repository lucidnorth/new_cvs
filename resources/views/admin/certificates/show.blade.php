@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.certificate.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $certificate->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.photo') }}
                                    </th>
                                    <td>
                                    @if($certificate->photo)
                                        <a href="{{ $certificate->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $certificate->photo->getUrl('thumb') }}" alt="Student Photo" width="50">
                                        </a>
                                    @else
                                        No Photo
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $certificate->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.middle_name') }}
                                    </th>
                                    <td>
                                        {{ $certificate->middle_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $certificate->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Certificate::GENDER_SELECT[$certificate->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.date_of_birth') }}
                                    </th>
                                    <td>
                                        {{ $certificate->date_of_birth }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.institution') }}
                                    </th>
                                    <td>
                                        {{ $certificate->institution->institutions ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.certificate_number') }}
                                    </th>
                                    <td>
                                        {{ $certificate->certificate_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.student_identification') }}
                                    </th>
                                    <td>
                                        {{ $certificate->student_identification }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.qualification_type') }}
                                    </th>
                                    <td>
                                        {{ $certificate->qualification_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.programme') }}
                                    </th>
                                    <td>
                                        {{ $certificate->programme }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.class') }}
                                    </th>
                                    <td>
                                        {{ $certificate->class }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.year_of_entry') }}
                                    </th>
                                    <td>
                                        {{ $certificate->year_of_entry }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificate.fields.year_of_completion') }}
                                    </th>
                                    <td>
                                        {{ $certificate->year_of_completion }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
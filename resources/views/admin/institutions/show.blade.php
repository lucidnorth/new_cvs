@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.institution.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.institutions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.institution.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $institution->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.institution.fields.institutions') }}
                                    </th>
                                    <td>
                                        {{ $institution->institutions }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.institution.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($institution->logo)
                                            <a href="{{ $institution->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $institution->logo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.institution.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $institution->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.institution.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $institution->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.institution.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $institution->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.institution.fields.password') }}
                                    </th>
                                    <td>
                                        ********
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.institutions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#institution_certificates" aria-controls="institution_certificates" role="tab" data-toggle="tab">
                            {{ trans('cruds.certificate.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="institution_certificates">
                        @includeIf('admin.institutions.relationships.institutionCertificates', ['certificates' => $institution->institutionCertificates])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
<div class="content">
    @can('certificate_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.certificates.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.certificate.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Certificate', 'route' => 'admin.certificates.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.certificate.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-institutionCertificates">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.middle_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.gender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.date_of_birth') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.institution') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.certificate_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.student_identification') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.qualification_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.programme') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.class') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.year_of_entry') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificate.fields.year_of_completion') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($certificates as $key => $certificate)
                                    <tr data-entry-id="{{ $certificate->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $certificate->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($certificate->photo)
                                                <a href="{{ $certificate->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $certificate->photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $certificate->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->middle_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->last_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Certificate::GENDER_SELECT[$certificate->gender] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->date_of_birth ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->institution->institutions ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->certificate_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->student_identification ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->qualification_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->programme ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->class ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->year_of_entry ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificate->year_of_completion ?? '' }}
                                        </td>
                                        <td>
                                            @can('certificate_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.certificates.show', $certificate->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('certificate_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.certificates.edit', $certificate->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('certificate_delete')
                                                <form action="{{ route('admin.certificates.destroy', $certificate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

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
</div>
@section('scripts')
@parent

@endsection
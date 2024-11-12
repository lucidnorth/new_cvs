<div class="content">
    @can('certificate_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.certificates.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.certificate.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#excelImportModal">
                    Import Certificates
                </button>
                @include('excelImport.modal', ['model' => 'Certificate', 'route' => 'admin.certificates.parseExcelImport'])
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
                        <table class="table table-bordered table-striped table-hover datatable datatable-institutionCertificates">
                            <thead>
                                <tr>
                                    <th width="10"></th>
                                    <th>{{ trans('cruds.certificate.fields.id') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.photo') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.first_name') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.middle_name') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.last_name') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.gender') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.date_of_birth') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.institution') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.certificate_number') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.student_identification') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.qualification_type') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.programme') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.class') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.year_of_entry') }}</th>
                                    <th>{{ trans('cruds.certificate.fields.year_of_completion') }}</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($certificates as $key => $certificate)
                                    <tr data-entry-id="{{ $certificate->id }}">
                                        <td></td>
                                        <td>{{ $certificate->id ?? '' }}</td>
                                        <td>
                                        @if($certificate->getFirstMediaUrl('photo'))
                                            <a href="{{ $certificate->photo }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $certificate->getFirstMediaUrl('photo') }}" alt="Student Photo" width="50">
                                            </a>
                                        @else
                                            No Photo
                                        @endif
                                        </td>
                                        <td>{{ $certificate->first_name ?? '' }}</td>
                                        <td>{{ $certificate->middle_name ?? '' }}</td>
                                        <td>{{ $certificate->last_name ?? '' }}</td>
                                        <td>{{ $certificate->gender ?? '' }}</td>
                                        <td>{{ $certificate->date_of_birth ?? '' }}</td>
                                        <td>{{ $certificate->institution->institutions ?? '' }}</td>
                                        <td>{{ $certificate->certificate_number ?? '' }}</td>
                                        <td>{{ $certificate->student_identification ?? '' }}</td>
                                        <td>{{ $certificate->qualification_type ?? '' }}</td>
                                        <td>{{ $certificate->programme ?? '' }}</td>
                                        <td>{{ $certificate->class ?? '' }}</td>
                                        <td>{{ $certificate->year_of_entry ?? '' }}</td>
                                        <td>{{ $certificate->year_of_completion ?? '' }}</td>
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
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('certificate_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.certificates.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected') }}')

                    return
                }

                if (confirm('{{ trans('global.areYouSure') }}')) {
                    $.ajax({
                        headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }
                    })
                    .done(function () { location.reload() })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        $('.datatable-institutionCertificates:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    })
</script>
@endsection

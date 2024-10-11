@extends('layouts.admin')
@section('content')

<style>

.container {
    max-width: 900px;
    margin: 0 auto;
}

.table {
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
}

.table-hover tbody tr:hover {
    background-color: #f5f5f5;
}

.table thead {
    background-color: #15A57B;
    color: #ffffff;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #ddd;
}

.table thead th {
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.table td {
    vertical-align: middle;
}

.btn-primary {
    background-color: #15A57B;
    border-color: #15A57B;
}

.btn-primary:hover {
    background-color: #128e68;
    border-color: #128e68;
}

.text-center {
    font-weight: 600;
    font-size: 24px;
}

</style>
<div class="content">

<div class="container my-5">
    <h2 class="text-center mb-4">Uploaded Certificates</h2>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uploads as $upload)
                    <tr>
                        <td>{{ $upload->title }}</td>
                        <td>{{ $upload->description }}</td>
                        <td>{{ $upload->file }}</td>
                        <td>
                            @if ($upload->file)
                                <a href="{{ route('user.download', $upload->id) }}" class="btn btn-primary btn-sm">Download</a>
                            @else
                                <span class="text-muted">No file</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    @can('certificate_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.certificates.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.certificate.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#excelImportModal">
                    Import
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
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Certificate">
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
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Models\Certificate::GENDER_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
                                <select class="search">
    <option value>{{ trans('global.all') }}</option>
    @foreach($institutions as $id => $institution)
        <option value="{{ $id }}">{{ $institution }}</option>
    @endforeach
</select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('certificate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.certificates.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.certificates.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'first_name', name: 'first_name' },
{ data: 'middle_name', name: 'middle_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'gender', name: 'gender' },
{ data: 'date_of_birth', name: 'date_of_birth' },
{ data: 'institution_institutions', name: 'institution.institutions' },
{ data: 'certificate_number', name: 'certificate_number' },
{ data: 'student_identification', name: 'student_identification' },
{ data: 'qualification_type', name: 'qualification_type' },
{ data: 'programme', name: 'programme' },
{ data: 'class', name: 'class' },
{ data: 'year_of_entry', name: 'year_of_entry' },
{ data: 'year_of_completion', name: 'year_of_completion' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Certificate').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });


  $('.datatable-Certificates').DataTable({
    // ... other DataTables options ...
    columns: [
        // ... other columns ...
        {
            data: 'gender',
            name: 'gender',
            render: function (data, type, full, row, meta) {
                if (data && (data.toLowerCase() === 'male' || data.toLowerCase() === 'female')) {
                    return data;
                } else {
                    return 'Unknown';
                }
            }
        },
        // ... other columns ...
    ]
});






table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection
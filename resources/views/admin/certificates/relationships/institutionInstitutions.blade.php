<div class="content">
    @can('institution_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.institutions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.institution.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.institution.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-institutionInstitutions">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.institution.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.institution.fields.logo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.institution.fields.institution') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.institution.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.institution.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.institution.fields.email') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($institutions as $key => $institution)
                                    <tr data-entry-id="{{ $institution->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $institution->id ?? '' }}
                                        </td>
                                        <td>
                                            @if($institution->logo)
                                                <a href="{{ $institution->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $institution->logo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $institution->institution->gender ?? '' }}
                                        </td>
                                        <td>
                                            {{ $institution->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $institution->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $institution->email ?? '' }}
                                        </td>
                                        <td>
                                            @can('institution_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.institutions.show', $institution->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('institution_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.institutions.edit', $institution->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('institution_delete')
                                                <form action="{{ route('admin.institutions.destroy', $institution->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('institution_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.institutions.massDestroy') }}",
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-institutionInstitutions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
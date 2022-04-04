@can('our_service_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.our-services.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.ourService.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.ourService.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-typeOurServices">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ourService.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ourService.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.ourService.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.ourService.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.ourService.fields.icon') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ourServices as $key => $ourService)
                        <tr data-entry-id="{{ $ourService->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ourService->id ?? '' }}
                            </td>
                            <td>
                                {{ $ourService->name ?? '' }}
                            </td>
                            <td>
                                {{ $ourService->type->type ?? '' }}
                            </td>
                            <td>
                                {{ $ourService->description ?? '' }}
                            </td>
                            <td>
                                @if($ourService->icon)
                                    <a href="{{ $ourService->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $ourService->icon->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('our_service_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.our-services.show', $ourService->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('our_service_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.our-services.edit', $ourService->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('our_service_delete')
                                    <form action="{{ route('admin.our-services.destroy', $ourService->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('our_service_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.our-services.massDestroy') }}",
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
  let table = $('.datatable-typeOurServices:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@extends('layouts.admin')
@section('content')
@can('service_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.service-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.serviceRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.serviceRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ServiceRequest">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.serviceRequest.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceRequest.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceRequest.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceRequest.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceRequest.fields.service') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceRequests as $key => $serviceRequest)
                        <tr data-entry-id="{{ $serviceRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $serviceRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $serviceRequest->name ?? '' }}
                            </td>
                            <td>
                                {{ $serviceRequest->email ?? '' }}
                            </td>
                            <td>
                                {{ $serviceRequest->phone ?? '' }}
                            </td>
                            <td>
                                {{ $serviceRequest->service->type ?? '' }}
                            </td>
                            <td>
                                @can('service_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.service-requests.show', $serviceRequest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('service_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.service-requests.edit', $serviceRequest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('service_request_delete')
                                    <form action="{{ route('admin.service-requests.destroy', $serviceRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('service_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.service-requests.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-ServiceRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
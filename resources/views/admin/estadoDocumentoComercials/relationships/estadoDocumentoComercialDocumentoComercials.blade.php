@can('documento_comercial_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.documento-comercials.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.documentoComercial.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.documentoComercial.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-estadoDocumentoComercialDocumentoComercials">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.monto') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.fecha') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.adjunto') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.tipo_documento_comercial') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.estado_documento_comercial') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentoComercials as $key => $documentoComercial)
                        <tr data-entry-id="{{ $documentoComercial->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $documentoComercial->id ?? '' }}
                            </td>
                            <td>
                                {{ $documentoComercial->monto ?? '' }}
                            </td>
                            <td>
                                {{ $documentoComercial->fecha ?? '' }}
                            </td>
                            <td>
                                @if($documentoComercial->adjunto)
                                    <a href="{{ $documentoComercial->adjunto->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $documentoComercial->tipo_documento_comercial->descripcion ?? '' }}
                            </td>
                            <td>
                                @foreach($documentoComercial->estado_documento_comercials as $key => $item)
                                    <span class="badge badge-info">{{ $item->descripcion }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('documento_comercial_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.documento-comercials.show', $documentoComercial->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('documento_comercial_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.documento-comercials.edit', $documentoComercial->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('documento_comercial_delete')
                                    <form action="{{ route('admin.documento-comercials.destroy', $documentoComercial->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('documento_comercial_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documento-comercials.massDestroy') }}",
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
  let table = $('.datatable-estadoDocumentoComercialDocumentoComercials:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
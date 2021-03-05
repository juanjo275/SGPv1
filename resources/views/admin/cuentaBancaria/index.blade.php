@extends('layouts.admin')
@section('content')
@can('cuenta_bancarium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cuenta-bancaria.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.cuentaBancarium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.cuentaBancarium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CuentaBancarium">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.cbu') }}
                        </th>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.nro_cuenta') }}
                        </th>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.banco') }}
                        </th>
                        <th>
                            {{ trans('cruds.banco.fields.sucursal') }}
                        </th>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.tipo_cuenta') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cuentaBancaria as $key => $cuentaBancarium)
                        <tr data-entry-id="{{ $cuentaBancarium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cuentaBancarium->id ?? '' }}
                            </td>
                            <td>
                                {{ $cuentaBancarium->cbu ?? '' }}
                            </td>
                            <td>
                                {{ $cuentaBancarium->nro_cuenta ?? '' }}
                            </td>
                            <td>
                                {{ $cuentaBancarium->banco->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ $cuentaBancarium->banco->sucursal ?? '' }}
                            </td>
                            <td>
                                {{ $cuentaBancarium->tipo_cuenta->descripcion ?? '' }}
                            </td>
                            <td>
                                @can('cuenta_bancarium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cuenta-bancaria.show', $cuentaBancarium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cuenta_bancarium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cuenta-bancaria.edit', $cuentaBancarium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cuenta_bancarium_delete')
                                    <form action="{{ route('admin.cuenta-bancaria.destroy', $cuentaBancarium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cuenta_bancarium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cuenta-bancaria.massDestroy') }}",
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
  let table = $('.datatable-CuentaBancarium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
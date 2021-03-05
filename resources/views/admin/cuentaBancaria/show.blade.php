@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cuentaBancarium.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cuenta-bancaria.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.id') }}
                        </th>
                        <td>
                            {{ $cuentaBancarium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.cbu') }}
                        </th>
                        <td>
                            {{ $cuentaBancarium->cbu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.nro_cuenta') }}
                        </th>
                        <td>
                            {{ $cuentaBancarium->nro_cuenta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.banco') }}
                        </th>
                        <td>
                            {{ $cuentaBancarium->banco->descripcion ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cuentaBancarium.fields.tipo_cuenta') }}
                        </th>
                        <td>
                            {{ $cuentaBancarium->tipo_cuenta->descripcion ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cuenta-bancaria.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proveedore.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proveedores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proveedore.fields.id') }}
                        </th>
                        <td>
                            {{ $proveedore->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proveedore.fields.cuit') }}
                        </th>
                        <td>
                            {{ $proveedore->cuit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proveedore.fields.razon_social') }}
                        </th>
                        <td>
                            {{ $proveedore->razon_social }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proveedore.fields.telefono') }}
                        </th>
                        <td>
                            {{ $proveedore->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proveedore.fields.domicilio') }}
                        </th>
                        <td>
                            {{ $proveedore->domicilio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proveedore.fields.email') }}
                        </th>
                        <td>
                            {{ $proveedore->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proveedore.fields.cuenta_bancaria') }}
                        </th>
                        <td>
                            {{ $proveedore->cuenta_bancaria->cbu ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proveedores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
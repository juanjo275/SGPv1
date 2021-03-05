@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tipoDocumentoComercial.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tipo-documento-comercials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tipoDocumentoComercial.fields.id') }}
                        </th>
                        <td>
                            {{ $tipoDocumentoComercial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tipoDocumentoComercial.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $tipoDocumentoComercial->descripcion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tipo-documento-comercials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.estadoDocumentoComercial.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.estado-documento-comercials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.estadoDocumentoComercial.fields.id') }}
                        </th>
                        <td>
                            {{ $estadoDocumentoComercial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.estadoDocumentoComercial.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $estadoDocumentoComercial->descripcion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.estado-documento-comercials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#estado_documento_comercial_documento_comercials" role="tab" data-toggle="tab">
                {{ trans('cruds.documentoComercial.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="estado_documento_comercial_documento_comercials">
            @includeIf('admin.estadoDocumentoComercials.relationships.estadoDocumentoComercialDocumentoComercials', ['documentoComercials' => $estadoDocumentoComercial->estadoDocumentoComercialDocumentoComercials])
        </div>
    </div>
</div>

@endsection
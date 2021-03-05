@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.documentoComercial.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documento-comercials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.id') }}
                        </th>
                        <td>
                            {{ $documentoComercial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.monto') }}
                        </th>
                        <td>
                            {{ $documentoComercial->monto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.fecha') }}
                        </th>
                        <td>
                            {{ $documentoComercial->fecha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.adjunto') }}
                        </th>
                        <td>
                            @if($documentoComercial->adjunto)
                                <a href="{{ $documentoComercial->adjunto->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.tipo_documento_comercial') }}
                        </th>
                        <td>
                            {{ $documentoComercial->tipo_documento_comercial->descripcion ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentoComercial.fields.estado_documento_comercial') }}
                        </th>
                        <td>
                            @foreach($documentoComercial->estado_documento_comercials as $key => $estado_documento_comercial)
                                <span class="label label-info">{{ $estado_documento_comercial->descripcion }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documento-comercials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
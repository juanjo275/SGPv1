@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.banco.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bancos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.id') }}
                        </th>
                        <td>
                            {{ $banco->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.descripcion') }}
                        </th>
                        <td>
                            {{ $banco->descripcion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banco.fields.sucursal') }}
                        </th>
                        <td>
                            {{ $banco->sucursal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bancos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
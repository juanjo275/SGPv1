@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.banco.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bancos.update", [$banco->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="descripcion">{{ trans('cruds.banco.fields.descripcion') }}</label>
                <input class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $banco->descripcion) }}">
                @if($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.descripcion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sucursal">{{ trans('cruds.banco.fields.sucursal') }}</label>
                <input class="form-control {{ $errors->has('sucursal') ? 'is-invalid' : '' }}" type="text" name="sucursal" id="sucursal" value="{{ old('sucursal', $banco->sucursal) }}">
                @if($errors->has('sucursal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sucursal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banco.fields.sucursal_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
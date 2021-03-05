@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.proveedore.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.proveedores.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="cuit">{{ trans('cruds.proveedore.fields.cuit') }}</label>
                <input class="form-control {{ $errors->has('cuit') ? 'is-invalid' : '' }}" type="text" name="cuit" id="cuit" value="{{ old('cuit', '') }}">
                @if($errors->has('cuit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cuit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proveedore.fields.cuit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="razon_social">{{ trans('cruds.proveedore.fields.razon_social') }}</label>
                <input class="form-control {{ $errors->has('razon_social') ? 'is-invalid' : '' }}" type="text" name="razon_social" id="razon_social" value="{{ old('razon_social', '') }}">
                @if($errors->has('razon_social'))
                    <div class="invalid-feedback">
                        {{ $errors->first('razon_social') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proveedore.fields.razon_social_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.proveedore.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                @if($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proveedore.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="domicilio">{{ trans('cruds.proveedore.fields.domicilio') }}</label>
                <input class="form-control {{ $errors->has('domicilio') ? 'is-invalid' : '' }}" type="text" name="domicilio" id="domicilio" value="{{ old('domicilio', '') }}">
                @if($errors->has('domicilio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('domicilio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proveedore.fields.domicilio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.proveedore.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proveedore.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cuenta_bancaria_id">{{ trans('cruds.proveedore.fields.cuenta_bancaria') }}</label>
                <select class="form-control select2 {{ $errors->has('cuenta_bancaria') ? 'is-invalid' : '' }}" name="cuenta_bancaria_id" id="cuenta_bancaria_id">
                    @foreach($cuenta_bancarias as $id => $cuenta_bancaria)
                        <option value="{{ $id }}" {{ old('cuenta_bancaria_id') == $id ? 'selected' : '' }}>{{ $cuenta_bancaria }}</option>
                    @endforeach
                </select>
                @if($errors->has('cuenta_bancaria'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cuenta_bancaria') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.proveedore.fields.cuenta_bancaria_helper') }}</span>
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
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cuentaBancarium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cuenta-bancaria.update", [$cuentaBancarium->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="cbu">{{ trans('cruds.cuentaBancarium.fields.cbu') }}</label>
                <input class="form-control {{ $errors->has('cbu') ? 'is-invalid' : '' }}" type="text" name="cbu" id="cbu" value="{{ old('cbu', $cuentaBancarium->cbu) }}">
                @if($errors->has('cbu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cbu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cuentaBancarium.fields.cbu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nro_cuenta">{{ trans('cruds.cuentaBancarium.fields.nro_cuenta') }}</label>
                <input class="form-control {{ $errors->has('nro_cuenta') ? 'is-invalid' : '' }}" type="text" name="nro_cuenta" id="nro_cuenta" value="{{ old('nro_cuenta', $cuentaBancarium->nro_cuenta) }}">
                @if($errors->has('nro_cuenta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nro_cuenta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cuentaBancarium.fields.nro_cuenta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banco_id">{{ trans('cruds.cuentaBancarium.fields.banco') }}</label>
                <select class="form-control select2 {{ $errors->has('banco') ? 'is-invalid' : '' }}" name="banco_id" id="banco_id">
                    @foreach($bancos as $id => $banco)
                        <option value="{{ $id }}" {{ (old('banco_id') ? old('banco_id') : $cuentaBancarium->banco->id ?? '') == $id ? 'selected' : '' }}>{{ $banco }}</option>
                    @endforeach
                </select>
                @if($errors->has('banco'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banco') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cuentaBancarium.fields.banco_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipo_cuenta_id">{{ trans('cruds.cuentaBancarium.fields.tipo_cuenta') }}</label>
                <select class="form-control select2 {{ $errors->has('tipo_cuenta') ? 'is-invalid' : '' }}" name="tipo_cuenta_id" id="tipo_cuenta_id">
                    @foreach($tipo_cuentas as $id => $tipo_cuenta)
                        <option value="{{ $id }}" {{ (old('tipo_cuenta_id') ? old('tipo_cuenta_id') : $cuentaBancarium->tipo_cuenta->id ?? '') == $id ? 'selected' : '' }}>{{ $tipo_cuenta }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_cuenta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo_cuenta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cuentaBancarium.fields.tipo_cuenta_helper') }}</span>
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